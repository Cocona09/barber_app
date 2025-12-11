@extends('admin.layout')
@section('title', 'Galleries')

@section('content')
    <h2>Edit Gallery</h2>

    <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label class="mt-2">Title</label>
        <input type="text" name="title" class="form-control w-50"
               value="{{ old('name', $gallery->title )}}" required>

        <label for="before_image" class="mt-3">Upload Before Image</label>
        <input
            type="file"
            name="before_image"
            class="form-control w-50 mt-2"
        />
        @if ($gallery->before_image)
            <img src="{{ asset($gallery->before_image) }}" alt="Current Image" width="80" height="80" class="mt-3">
        @endif

        <label for="after_image" class="d-flex justify-content-start mt-3">Upload After Image</label>
        <input
            type="file"
            name="after_image"
            class="form-control w-50 mt-2"
        />
        @if ($gallery->after_image)
            <img src="{{ asset($gallery->after_image) }}" alt="Current Image" width="80" height="80" class="mt-3">
        @endif

        <button class="btn btn-primary mt-3 ms-1">Update</button>
    </form>
@endsection
