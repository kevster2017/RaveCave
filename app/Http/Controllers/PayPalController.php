<?php

namespace App\Http\Controllers;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Ticket;
use App\Models\Event;

class PayPalController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('paypal');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function payment(Request $request)
    {
        $userId = auth()->user()->id;

        $cart = Cart::where('userId', $userId)
            ->first();


        if (!$cart) {
            // Handle the case where the cart is not found
            return redirect()->back()->with('error', 'Cart not found');
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.payment.success'),
                "cancel_url" => route('paypal.payment/cancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "GBP",
                        "value" => $cart->price
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('create.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function paymentCancel()
    {
        return redirect()
            ->route('paypal')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            /* If payment successful, create the booking */
            /* Create a new Ticket Booking */

            $userId = auth()->user()->id;

            $cart = Cart::where('userId', $userId)
                ->first();

            /* Create new Ticket */
            $ticket = new Ticket;
            $ticket->name = $cart->name;
            $ticket->userId = $cart->userId;
            $ticket->event_id = $cart->eventId;
            $ticket->title = $cart->title;
            $ticket->dj = $cart->dj;
            $ticket->date = $cart->date;
            $ticket->time = $cart->time;
            $ticket->price = $cart->price;
            $ticket->image = $cart->image;
            $ticket->paymentMethod = "PayPal";
            $ticket->paymentStatus = "Paid";
            $ticket->save();

            Cart::where('userId', $userId)->delete();


            return redirect('/tickets/myTickets')->with('success', 'Payment Successful');

            return redirect()
                ->route('paypal')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('paypal')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}
