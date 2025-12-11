@extends('admin.layout')
@section('title', 'barbers')

@section('content')
    <h2>Edit Barber</h2>

    <form action="{{ route('admin.barber.update', $barber->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label class="mt-2">Name</label>
        <input type="text" name="name" class="form-control w-50"
               value="{{ old('name', $barber->name) }}" required>

        <label class="mt-3">Specialty</label>
        <input name="specialties" class="form-control w-50" value="{{ old('specialties', $barber->specialties) }}" required >

        <label for="image" class="mt-3">Upload Image</label>
        <input
            type="file"
            name="image"
            class="form-control w-50"
        />
        @if ($barber->image)
            <img src="{{ asset($barber->image) }}" alt="Current Image" width="110" height="100" class="mt-3">
        @endif

        <button class="btn btn-primary mt-3">Update</button>
    </form>
@endsection
