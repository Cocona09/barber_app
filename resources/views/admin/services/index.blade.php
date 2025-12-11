@extends('admin.layout')

@section('title', 'Services')

@section('content')
    <h1>Services</h1>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary mb-3">Add New</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive" style="border-radius: 22px">
    <table class="table table-bordered table-hover">
        <thead style="background: #3b5998">
        <tr>
            <th class="text-white">Name</th>
            <th class="text-white">Description</th>
            <th class="text-white">Price</th>
            <th class="text-white">Duration</th>
            <th class="text-white">Image</th>
            <th class="text-white">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
            <tr>
                <td>{{ $service->name }}</td>
                <td>{{ $service->description }}</td>
                <td>{{ $service->price }}</td>
                <td>{{ $service->duration }} min</td>
                <td>
                    <img src="{{ asset("$service->image") }}" height="50px" width="50px" style="border-radius:8px">
                </td>
                <td>
                    <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-info btn-primary">Edit</a>
                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-primary" onclick="return confirm('Are you sure delete this service?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
