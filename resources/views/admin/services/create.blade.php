@extends('admin.layout')
@section('title', 'Services')

@section('content')
<h2>Add New Service</h2>

<form action="{{ route('admin.services.store') }}" method="POST"  enctype="multipart/form-data">
    @csrf

    <label class="mt-2">Name</label>
    <input type="text" name="name" class="form-control w-50" required>

    <label class="mt-3">Description</label>
    <textarea name="description" class="form-control w-50" required></textarea>

    <label class="mt-3">Price</label>
    <input type="number" step="0.01" name="price" class="form-control w-50" required>

    <label class="mt-3">Duration (minutes)</label>
    <input type="number" name="duration" class="form-control w-50" required>

    <label for="image" class="mt-3">Upload Image</label>
    <input
        type="file"
        name="image"
        class="form-control w-50"
    />

    <button class="btn btn-primary mt-3">Save</button>
</form>
@endsection
