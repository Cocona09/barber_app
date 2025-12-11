@extends('admin.layout')

@section('title', 'Bookings Management')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Bookings Management</h1>

        <div class="row mb-3 mt-3">
            <div class="col-xl col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div>Total Bookings</div>
                                <div class="h4">{{ $bookings->total() }}</div>
                            </div>
                            <i class="fas fa-calendar fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div>Pending</div>
                                <div class="h4">{{ \App\Models\Booking::where('status', 'pending')->count() }}</div>
                            </div>
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div>Confirmed</div>
                                <div class="h4">{{ \App\Models\Booking::where('status', 'confirmed')->count() }}</div>
                            </div>
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div>Completed</div>
                                <div class="h4">{{ \App\Models\Booking::where('status', 'completed')->count() }}</div>
                            </div>
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div>Cancelled</div>
                                <div class="h4">{{ \App\Models\Booking::where('status', 'cancelled')->count() }}</div>
                            </div>
                            <i class="fas fa-times-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="card mb-4">
            <div class="card-header fs-3">
                <i class="fas fa-filter me-1"></i>
                Filters
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('admin.bookings.index') }}">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="">All Status</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                        </div>
                        <div class="col-md-4 d-flex align-items-end mb-3">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search me-1"></i> Filter
                                </button>
                                <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-redo me-1"></i> Reset
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bookings Table -->
        <div class="card mb-4 ">
            <div class="card-header fs-3">
                <i class="fas fa-table me-1"></i>
                Bookings List
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="table-responsive" style="border-radius: 20px;">
                    <table class="table table-bordered table-hover">
                        <thead style="background: #3b5998">
                        <tr>
                            <th class="text-white">ID</th>
                            <th class="text-white">Customer</th>
                            <th class="text-white">Service</th>
                            <th class="text-white">Barber</th>
                            <th class="text-white">Date & Time</th>
                            <th class="text-white">Status</th>
                            <th class="text-white">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>
                                    <strong>{{ $booking->customer_name }}</strong><br>
                                    <small style="font-size: 13px">
                                        <i class="fas fa-phone fa-sm me-1"></i>{{ $booking->customer_phone }}<br>
                                        <i class="fas fa-envelope fa-sm me-1"></i>{{ $booking->customer_email }}
                                    </small>
                                </td>
                                <td>{{ $booking->service->name ?? 'N/A' }}</td>
                                <td>{{ $booking->barber->name ?? 'N/A' }}</td>
                                <td>
                                    {{ $booking->date }}<br>
                                    <small style="font-size: 13px">{{ $booking->time }}</small>
                                </td>
                                <td>
                                    @php
                                        $statusColors = [
                                            'pending' => 'warning',
                                            'confirmed' => 'success',
                                            'cancelled' => 'danger',
                                            'completed' => 'info'
                                        ];
                                    @endphp
                                    <span class="badge bg-{{ $statusColors[$booking->status] ?? 'secondary' }}">
                                        {{ strtoupper($booking->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-md">
                                        <a href="{{ route('admin.bookings.edit', $booking->id) }}"
                                           class="btn btn-primary ">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($bookings->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $bookings->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
