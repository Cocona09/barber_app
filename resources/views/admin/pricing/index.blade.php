@extends('admin.layout')

@section('title', 'Services')

@section('content')
    <h1>Pricing & Plan</h1>
    <a href="{{ route('admin.pricing.create') }}" class="btn btn-primary mb-3">Add New</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive" style="border-radius: 22px">
    <table class="table table-bordered table-hover">
        <thead style="background: #3b5998">
        <tr>
            <th class="text-white">Name</th>
            <th class="text-white">Price</th>
            <th class="text-white">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($prices as $price)
            <tr>
                <td>{{ $price->name }}</td>
                <td>{{ $price->price }}</td>
                <td>
                    <a href="{{ route('admin.pricing.edit', $price->id) }}" class="btn btn-info btn-primary">Edit</a>
                    <form action="{{ route('admin.pricing.destroy', $price->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-primary" onclick="return confirm('Are you sure delete this?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
