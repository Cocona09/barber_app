@extends('admin.layout')

@section('title', 'Working Hours')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Working Hours</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.workingHour.edit') }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Edit Working Hours
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="border-radius: 22px">
                            <table class="table table-bordered table-hover">
                                <thead style="background: #3b5998">
                                <tr>
                                    <th class="text-white">Day</th>
                                    <th class="text-white">Status</th>
                                    <th class="text-white">Opening Time</th>
                                    <th class="text-white">Closing Time</th>
                                    <th class="text-white">Hours</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($workingHours as $hour)
                                    <tr>
                                        <td class="text-capitalize">{{ $hour->day }}</td>
                                        <td>
                                            @if($hour->is_closed)
                                                <span class="badge badge-danger">Closed</span>
                                            @else
                                                <span class="badge badge-success">Open</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$hour->is_closed && $hour->open_time)
                                                {{ $hour->open_time->format('h:i A') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$hour->is_closed && $hour->close_time)
                                                {{ $hour->close_time->format('h:i A') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($hour->is_closed)
                                                Closed
                                            @else
                                                {{ $hour->open_time->format('h:i A') }} - {{ $hour->close_time->format('h:i A') }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
