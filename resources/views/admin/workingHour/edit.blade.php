@extends('admin.layout')

@section('title', 'Edit Working Hours')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Working Hours</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.workingHour.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </div>
                    <form action="{{ route('admin.workingHour.update') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Day</th>
                                        <th>Closed</th>
                                        <th>Opening Time</th>
                                        <th>Closing Time</th>
                                        <th>Hours</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($workingHours as $hour)
                                        <tr>
                                            <td class="text-capitalize font-weight-bold">{{ $hour->day }}</td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox"
                                                           name="working_hours[{{ $hour->id }}][is_closed]"
                                                           value="1"
                                                           class="form-check-input day-closed"
                                                           data-day="{{ $hour->id }}"
                                                        {{ $hour->is_closed ? 'checked' : '' }}>
                                                    <label class="form-check-label">Closed</label>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="time"
                                                       name="working_hours[{{ $hour->id }}][open_time]"
                                                       class="form-control open-time"
                                                       data-day="{{ $hour->id }}"
                                                       value="{{ $hour->open_time ? $hour->open_time->format('H:i') : '' }}"
                                                    {{ $hour->is_closed ? 'disabled' : '' }}>
                                            </td>
                                            <td>
                                                <input type="time"
                                                       name="working_hours[{{ $hour->id }}][close_time]"
                                                       class="form-control close-time"
                                                       data-day="{{ $hour->id }}"
                                                       value="{{ $hour->close_time ? $hour->close_time->format('H:i') : '' }}"
                                                    {{ $hour->is_closed ? 'disabled' : '' }}>
                                            </td>
                                            <td>
                                                @if($hour->is_closed)
                                                    <span class="text-muted">Closed</span>
                                                @else
                                                    <span class="hours-display" data-day="{{ $hour->id }}">
                                                    {{ $hour->open_time ? $hour->open_time->format('h:i A') : '--:--' }} -
                                                    {{ $hour->close_time ? $hour->close_time->format('h:i A') : '--:--' }}
                                                </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Working Hours
                            </button>
                            <a href="{{ route('admin.workingHour.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle time inputs based on closed checkbox
            document.querySelectorAll('.day-closed').forEach(checkbox => {
                const dayId = checkbox.dataset.day;
                const openTime = document.querySelector(`.open-time[data-day="${dayId}"]`);
                const closeTime = document.querySelector(`.close-time[data-day="${dayId}"]`);
                const hoursDisplay = document.querySelector(`.hours-display[data-day="${dayId}"]`);

                checkbox.addEventListener('change', function() {
                    const isClosed = this.checked;

                    openTime.disabled = isClosed;
                    closeTime.disabled = isClosed;

                    if (isClosed) {
                        openTime.value = '';
                        closeTime.value = '';
                        if (hoursDisplay) {
                            hoursDisplay.textContent = 'Closed';
                            hoursDisplay.classList.add('text-muted');
                        }
                    } else {
                        if (hoursDisplay) {
                            hoursDisplay.textContent = '--:-- - --:--';
                            hoursDisplay.classList.remove('text-muted');
                        }
                    }
                });
            });

            // Update hours display in real-time
            document.querySelectorAll('.open-time, .close-time').forEach(input => {
                input.addEventListener('change', function() {
                    const dayId = this.dataset.day;
                    const openTimeInput = document.querySelector(`.open-time[data-day="${dayId}"]`);
                    const closeTimeInput = document.querySelector(`.close-time[data-day="${dayId}"]`);
                    const hoursDisplay = document.querySelector(`.hours-display[data-day="${dayId}"]`);

                    if (openTimeInput && closeTimeInput && hoursDisplay) {
                        const openTime = openTimeInput.value;
                        const closeTime = closeTimeInput.value;

                        if (openTime && closeTime) {
                            const openFormatted = formatTime(openTime);
                            const closeFormatted = formatTime(closeTime);
                            hoursDisplay.textContent = `${openFormatted} - ${closeFormatted}`;
                            hoursDisplay.classList.remove('text-muted');
                        } else {
                            hoursDisplay.textContent = '--:-- - --:--';
                        }
                    }
                });
            });

            function formatTime(timeString) {
                const [hours, minutes] = timeString.split(':');
                const hour = parseInt(hours);
                const ampm = hour >= 12 ? 'PM' : 'AM';
                const formattedHour = hour % 12 || 12;
                return `${formattedHour}:${minutes} ${ampm}`;
            }
        });
    </script>
@endpush
