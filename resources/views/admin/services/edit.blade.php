@extends('admin.layout')
@section('title', 'Services')

@section('content')
<h2>Edit Service</h2>

<form action="{{ route('admin.services.update', $service->id) }}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label class="mt-2">Name</label>
    <input type="text" name="name" class="form-control w-50"
           value="{{ old('name', $service->name )}}" required>

    <label class="mt-3">Description</label>
    <textarea name="description" class="form-control w-50" required>{{ old('description', $service->description) }}</textarea>

    <label class="mt-3">Price</label>
    <input type="number" step="0.01" name="price" class="form-control w-50"
           value="{{ old('price', $service->price )}}" required>

    <label class="mt-3">Duration (minutes)</label>
    <input type="number" name="duration" class="form-control w-50"
           value="{{ old('duration', $service->duration ) }}" required>

    <label for="image" class="mt-3">Upload Image</label>
    <input
        type="file"
        name="image"
        class="form-control w-50"
    />
    @if ($service->image)
        <img src="{{ asset($service->image) }}" alt="Current Image" width="80" height="80" class="mt-3">
    @endif

    <button class="btn btn-primary mt-3">Update</button>
</form>
@endsection
