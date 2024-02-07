<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DJController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\FavouriteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/* User routes */

Route::get("/users", [UserController::class, 'index'])->name('users.index');
Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
Route::get("/users/{id}/edit", [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put("/users/{id}", [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Event Routes */
Route::get("/events", [EventController::class, 'index'])->name('events.index');
Route::get("/events/create", [EventController::class, 'create'])->name('events.create')->middleware('auth');
Route::post("/events/store", [EventController::class, 'store'])->name('events.store')->middleware('auth');

Route::get("/events/{id}/edit", [EventController::class, 'edit'])->name('events.edit')->middleware('auth');
Route::put("/events/{id}", [EventController::class, 'update'])->name('events.update')->middleware('auth');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy')->middleware('auth');

Route::get("/events/show/{id}", [EventController::class, 'show'])->name('events.show')->middleware('auth');
Route::get("/events/join/{id}", [EventController::class, 'join'])->name('events.join')->middleware('auth');
Route::get('/events/eventDoor', function () {
    return view('eventDoor');
})->name('eventDoor');


/* DJ Routes */
Route::get("/djs", [DjController::class, 'index'])->name('djs.index');
Route::get("/djs/create", [DjController::class, 'create'])->name('djs.create')->middleware('auth');
Route::post("/djs/store", [DjController::class, 'store'])->name('djs.store')->middleware('auth');

Route::get("/djs/{id}/edit", [DjController::class, 'edit'])->name('djs.edit')->middleware('auth');
Route::put("/djs/{id}", [DjController::class, 'update'])->name('djs.update')->middleware('auth');
Route::delete('/djs/{id}', [DjController::class, 'destroy'])->name('djs.destroy')->middleware('auth');

Route::get("/djs/show/{id}", [DjController::class, 'show'])->name('djs.show')->middleware('auth');

/* Contact Routes */
Route::get("/contacts", [ContactController::class, 'index'])->name('contacts.index');
Route::get("/contacts/create", [ContactController::class, 'create'])->name('contacts.create')->middleware('auth');
Route::post("/contacts/store", [ContactController::class, 'store'])->name('contacts.store')->middleware('auth');
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy')->middleware('auth');

Route::get("/contacts/show/{id}", [ContactController::class, 'show'])->name('contacts.show')->middleware('auth');

/* Admin Routes */
Route::get("/admins", [AdminController::class, 'home'])->name('admins.home');

/* Stripe Routes */
Route::get("/tickets/stripe", [StripeController::class, 'stripe'])->name('tickets.stripe')->middleware('auth');
Route::post("stripe", [StripeController::class, 'stripePost'])->name('stripe.post')->middleware('auth');

/* PayPal Routes */
Route::get('paypal', [PayPalController::class, 'index'])->name('paypal');
Route::get('/tickets/paypal', [PayPalController::class, 'payment'])->name('tickets.paypal');
Route::get('paypal/payment/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.payment.success');
Route::get('paypal/payment/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.payment/cancel');

/* Cart routes */
Route::post("/add_to_cart", [TicketController::class, 'addToCart'])->name('addToCart')->middleware('auth');
Route::get("/tickets/viewCart", [TicketController::class, 'viewCart'])->middleware('auth')->name("viewCart");
Route::put("/update_cart/{id}", [TicketController::class, 'updateCart'])->name('cart.update')->middleware('auth');
Route::delete("/removeCart/{id}", [TicketController::class, 'removeCart'])->name('delete.cart')->middleware('auth');

/* Ticket Routes */
Route::get("/tickets", [TicketController::class, 'index']);
Route::get("/tickets/create", [TicketController::class, 'create'])->name('tickets.create')->middleware('auth');
Route::get("/tickets/myTickets", [TicketController::class, 'myTickets'])->name('myTickets')->middleware('auth');

Route::post("/tickets/store", [TicketController::class, 'store'])->name('tickets.store')->middleware('auth');
Route::delete('/tickets/{id}', [TicketController::class, 'destroy'])->name('tickets.destroy')->middleware('auth');

Route::get("/tickets/show/{id}", [TicketController::class, 'show'])->name('tickets.show')->middleware('auth');
Route::get("/tickets/review", [TicketController::class, 'review'])->name('tickets.review')->middleware('auth');
Route::get("/tickets/payment", [TicketController::class, 'payment'])->name('tickets.payment')->middleware('auth');
Route::get("/tickets/paymentComplete", [TicketController::class, 'paymentComplete'])->name('tickets.paymentComplete')->middleware('auth');

/* Favourite Routes */
Route::get("/favourites", [FavouriteController::class, 'index'])->name('favourites.index')->middleware('auth');
Route::post('/djs/{id}/favourite', [FavouriteController::class, 'addToFavourites'])->name('djs.favourite');
Route::delete('/djs/{id}/unfavourite', [FavouriteController::class, 'removeFromFavourites'])->name('djs.unfavourite');

/* Follow Routes */
Route::get("/follows", [FollowController::class, 'index'])->name('follows.index')->middleware('auth');
Route::post('/events/{id}/follow', [FollowController::class, 'addToFollows'])->name('events.follow');
Route::delete('/events/{id}/unfollow', [FollowController::class, 'removeFromFollows'])->name('events.unfollow');
