@extends('admin.layout')
@section('title', 'Galleries')

@section('content')
    <h2>Add New Gallery</h2>

    <form action="{{ route('admin.gallery.store') }}" method="POST"  enctype="multipart/form-data">
        @csrf

        <label class="mt-2">Title</label>
        <input type="text" name="title" class="form-control w-50" required>

        <label for="before_image" class="mt-3">Upload Before Image</label>
        <input
            type="file"
            name="before_image"
            class="form-control w-50"
        />

        <label for="after_image" class="mt-3">Upload After Image</label>
        <input
            type="file"
            name="after_image"
            class="form-control w-50"
        />

        <button class="btn btn-primary mt-3">Save</button>
    </form>
@endsection
