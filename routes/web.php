<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RendezvousController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EventController;

// Routes publiques
Route::get('/', function () { return view('vitrine.index'); })->name('acceuil');
Route::get('/acceuil', function () { return view('vitrine.index'); })->name('acceuil');
Route::get('/training', function () { return view('vitrine.training'); })->name('training');
Route::get('/boxe-ama', function () { return view('vitrine.training-details-ama'); })->name('boxe-ama');
Route::get('/boxe-pro', function () { return view('vitrine.training-details-pro'); })->name('boxe-pro');
Route::get('/boxe-edu', function () { return view('vitrine.training-details-edu'); })->name('boxe-edu');
Route::get('/about', function () { return view('vitrine.about'); })->name('about');
Route::get('/historique', function () { return view('vitrine.histoire'); })->name('historique');
Route::get('/activite', function () { return view('vitrine.activite'); })->name('activite');
Route::get('/bureau', function () { return view('vitrine.bureau'); })->name('bureau');
Route::get('/faq', function () { return view('vitrine.faq'); })->name('faq');
// routes/web.php
Route::get('/gallerie', [GalleryController::class, 'showInVitrine'])->name('gallerie');

Route::get('/temoignage', function () { return view('vitrine.temoignage'); })->name('temoignage'); 
Route::get('/master', function () { return view('vitrine.master'); })->name('formateur');
Route::get('/blog', function () { return view('vitrine.blog'); })->name('blog');
Route::get('/event', function () { return view('vitrine.event'); })->name('event');
Route::get('/partenaire', function () { return view('vitrine.partenaire'); })->name('partenaire');

Route::get('/admin/evenement', function () { return view('admin.calendrier'); })->name('calendrier');

// contact
Route::get('/contact', function () { return view('vitrine.contact'); })->name('contact'); 
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// rendez-vous

Route::get('/apply', function () { return view('vitrine.apply'); })->name('apply');
Route::post('/apply', [RendezvousController::class, 'store'])->name('rendezvous.store');


// Auth routes
Auth::routes();

// Route protégée pour l'accueil de l'utilisateur authentifié
Route::get('/admin', [HomeController::class, 'index'])->name('');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/contact', [DashboardController::class, 'showContacts'])->name('admin.contact');

    Route::get('admin/galleries', [GalleryController::class, 'index'])->name('admin.galleries.index');
    Route::get('admin/galleries/create', [GalleryController::class, 'create'])->name('admin.galleries.create');
    Route::post('admin/galleries', [GalleryController::class, 'store'])->name('admin.galleries.store');
    Route::get('admin/galleries/{id}', [GalleryController::class, 'show'])->name('admin.galleries.show');
    Route::get('admin/galleries/{gallery}/edit', [GalleryController::class, 'edit'])->name('admin.galleries.edit');
    Route::put('admin/galleries/{gallery}', [GalleryController::class, 'update'])->name('admin.galleries.update');
    Route::delete('admin/galleries/{gallery}', [GalleryController::class, 'destroy'])->name('admin.galleries.destroy');
    
    Route::get('/admin/events', [EventController::class, 'index'])->name('admin.events.index');
    Route::get('/admin/events/create', [EventController::class, 'create'])->name('admin.events.create');
    Route::post('/admin/events', [EventController::class, 'store'])->name('admin.events.store');
    Route::get('/admin/events/{event}', [EventController::class, 'show'])->name('admin.events.show');
    Route::get('/admin/events/{event}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
    Route::put('/admin/events/{event}', [EventController::class, 'update'])->name('admin.events.update');
    Route::delete('/admin/events/{event}', [EventController::class, 'destroy'])->name('admin.events.destroy');

});
