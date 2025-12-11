@extends('admin.layout')

@section('title', 'Galleries')

@section('content')
    <h1>Galleries</h1>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary mb-3">Add New</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive" style="border-radius: 22px">
    <table class="table table-bordered table-hover">
        <thead style="background: #3b5998">
        <tr>
            <th class="text-white">Title</th>
            <th class="text-white">Before Image</th>
            <th class="text-white">After Image</th>
            <th class="text-white">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($galleries as $gallery)
            <tr>
                <td>{{ $gallery->title }}</td>
                <td>
                    <img src="{{ asset("$gallery->before_image") }}" height="80px" width="80px" style="border-radius:8px">
                </td>
                <td>
                    <img src="{{ asset("$gallery->after_image") }}" height="80px" width="80px" style="border-radius:8px">
                </td>
                <td>
                    <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="btn btn-info btn-primary">Edit</a>
                    <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" style="display:inline-block;">
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
