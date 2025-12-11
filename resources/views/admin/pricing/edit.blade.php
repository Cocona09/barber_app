@extends('admin.layout')
@section('title', 'Services')

@section('content')
    <h2>Edit Pricing & Plan</h2>

    <form action="{{ route('admin.pricing.update', $price->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label class="mt-2">Name</label>
        <input type="text" name="name" class="form-control w-50"
               value="{{ $price->name }}" required>

        <label class="mt-3">Price</label>
        <input type="number" step="0.01" name="price" class="form-control w-50"
               value="{{ $price->price }}" required>

        <button class="btn btn-primary mt-3">Update</button>
    </form>
@endsection
