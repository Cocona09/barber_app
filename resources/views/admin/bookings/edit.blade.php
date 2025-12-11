@extends('admin.layout')

@section('title', 'Edit Booking')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Booking #{{ $booking->id }}</h1>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Update Booking Status
            </div>
            <div class="card-body">
                <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Booking Info -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6>Customer Information</h6>
                                    <p><strong>Name:</strong> {{ $booking->customer_name }}</p>
                                    <p><strong>Phone:</strong> {{ $booking->customer_phone }}</p>
                                    <p><strong>Email:</strong> {{ $booking->customer_email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6>Appointment Details</h6>
                                    <p><strong>Service:</strong> {{ $booking->service->name ?? 'N/A' }}</p>
                                    <p><strong>Barber:</strong> {{ $booking->barber->name ?? 'N/A' }}</p>
                                    <p><strong>Date:</strong> {{ $booking->date }}</p>
                                    <p><strong>Time:</strong> {{ $booking->time }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Status Update -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Booking Status</label>
                        <select name="status" class="form-select" required>
                            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        <div class="form-text">
                            • <strong>Pending:</strong> New booking awaiting confirmation<br>
                            • <strong>Confirmed:</strong> Booking is confirmed<br>
                            • <strong>Cancelled:</strong> Customer or admin cancelled<br>
                            • <strong>Completed:</strong> Service has been completed
                        </div>
                    </div>

                    <!-- Notes -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Admin Notes (Optional)</label>
                        <textarea name="notes" class="form-control" rows="4"
                                  placeholder="Add any admin notes here...">{{ old('notes', $booking->notes) }}</textarea>
                        <div class="form-text">These notes are for internal use only.</div>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Back to List
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Update Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
