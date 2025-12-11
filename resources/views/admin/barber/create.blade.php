@extends('admin.layout')
@section('title', 'Services')

@section('content')
    <h2>Add New Barber</h2>

    <form action="{{ route('admin.barber.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="mt-2">Name</label>
        <input type="text" name="name" class="form-control w-50" required>

        <label class="mt-3">Specialty</label>
        <input type="text" name="specialties" class="form-control w-50" required>

        <label for="image" class="mt-3">Upload Image</label>
        <input
            type="file"
            name="image"
            class="form-control w-50"
        />

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
@endsection
