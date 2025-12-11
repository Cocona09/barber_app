@extends('admin.layout')

@section('title', 'Barbers')

@section('content')
    <h1>Team & Barbers</h1>
    <a href="{{ route('admin.barber.create') }}" class="btn btn-primary mb-3">Add New</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive" style="border-radius: 22px">
    <table class="table table-bordered table-hover">
        <thead style="background: #3b5998">
        <tr>
            <th class="text-white">Name</th>
            <th class="text-white">Specialty</th>
            <th class="text-white">Image</th>
            <th class="text-white">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($barbers as $barber)
            <tr>
                <td>{{ $barber->name }}</td>
                <td>{{ $barber->specialties }}</td>
                <td>
                    <img src="{{ asset("$barber->image") }}" height="70px" width="70px" style="border-radius:8px">
                </td>
                <td>
                    <a href="{{ route('admin.barber.edit', $barber->id) }}" class="btn btn-info btn-primary">Edit</a>
                    <form action="{{ route('admin.barber.destroy', $barber->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-primary" onclick="return confirm('Are you sure delete this?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
