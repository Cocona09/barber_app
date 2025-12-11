@extends('admin.layout')
@section('title', 'Services')

@section('content')
    <h2>Add New Pricing & Plan</h2>

    <form action="{{ route('admin.pricing.store') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <label class="mt-2">Name</label>
        <input type="text" name="name" class="form-control w-50" required>

        <label class="mt-3">Price</label>
        <input type="number" step="0.01" name="price" class="form-control w-50" required>

        <button class="btn btn-primary mt-3">Save</button>
    </form>
@endsection
