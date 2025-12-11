<?php

use App\Http\Controllers\BarberController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\WorkingHourController;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceController;

Route::get('/api/services', [ServiceController::class, 'getServicesData']);
Route::get('/api/prices', [PriceController::class, 'getPricesData']);
Route::get('/api/barbers', [BarberController::class, 'getBarbersData']);
Route::get('/api/workingHours', [WorkingHourController::class, 'getWorkingHours']);
Route::get('/api/galleries', [GalleryController::class, 'getGalleriesData']);

Route::post('/api/bookings', function (Request $request) {
    try {
        // Validate
        $validated = $request->validate([
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'required|email',
            'service_id' => 'required|exists:services,id',
            'barber_id' => 'required|exists:barbers,id',
            'date' => 'required|date',
            'time' => 'required',
            'notes' => 'nullable|string'
        ]);

        // Add status
        $validated['status'] = 'pending';

        // Check time slot
        $existing = Booking::where('date', $validated['date'])
            ->where('time', $validated['time'])
            ->where('barber_id', $validated['barber_id'])
            ->where('status', '!=', 'cancelled')
            ->first();

        if ($existing) {
            return response()->json([
                'success' => false,
                'message' => 'Time slot taken'
            ], 409);
        }

        // Create
        $booking = Booking::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Booking created',
            'id' => $booking->id
        ], 201);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validation error',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Server error: ' . $e->getMessage()
        ], 500);
    }
})->withoutMiddleware(['web']);


Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'admin'])
            ->name('dashboard');

        Route::prefix('services')->name('services.')->group(function () {
            Route::get('/', [ServiceController::class, 'index'])->name('index');
            Route::get('/create', [ServiceController::class, 'create'])->name('create');
            Route::post('/', [ServiceController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [ServiceController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ServiceController::class, 'update'])->name('update');
            Route::delete('/{id}', [ServiceController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('pricing')->name('pricing.')->group(function () {
            Route::get('/', [PriceController::class, 'index'])->name('index');
            Route::get('/create', [PriceController::class, 'create'])->name('create');
            Route::post('/', [PriceController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [PriceController::class, 'edit'])->name('edit');
            Route::put('/{id}', [PriceController::class, 'update'])->name('update');
            Route::delete('/{id}', [PriceController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('barber')->name('barber.')->group(function () {
            Route::get('/', [BarberController::class, 'index'])->name('index');
            Route::get('/create', [BarberController::class, 'create'])->name('create');
            Route::post('/', [BarberController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [BarberController::class, 'edit'])->name('edit');
            Route::put('/{id}', [BarberController::class, 'update'])->name('update');
            Route::delete('/{id}', [BarberController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('workingHour')->name('workingHour.')->group(function () {
            Route::get('/', [WorkingHourController::class, 'index'])->name('index');
            Route::get('/edit', [WorkingHourController::class, 'edit'])->name('edit');
            Route::post('/update', [WorkingHourController::class, 'update'])->name('update');
        });

        Route::prefix('gallery')->name('gallery.')->group(function () {
            Route::get('/', [GalleryController::class, 'index'])->name('index');
            Route::get('/create', [GalleryController::class, 'create'])->name('create');
            Route::post('/', [GalleryController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [GalleryController::class, 'edit'])->name('edit');
            Route::put('/{id}', [GalleryController::class, 'update'])->name('update');
            Route::delete('/{id}', [GalleryController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('bookings')->name('bookings.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\BookingController::class, 'index'])->name('index');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\BookingController::class, 'edit'])->name('edit');
            Route::put('/{id}', [App\Http\Controllers\Admin\BookingController::class, 'update'])->name('update');
        });
    });

Route::get('/{any}', function () {
    return view('index');
})->where('any', '.*');
