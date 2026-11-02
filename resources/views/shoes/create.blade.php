
@extends('layouts.app')

@section('title', 'Add Shoe')

@section('content')

    <h2>Add Shoe</h2>

    <form method="POST" action="{{ route('shoes.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name">Shoe Name</label>
            <input type="text" name="name" id="name"
                class="form-control" value="{{ old('name') }}">

            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="brand">Brand</label>

            <select name="brand" id="brand" class="form-control">
                <option value="">Select Brand</option>
                <option value="Nike" @selected(old('brand') === 'Nike')>Nike</option>
                <option value="Converse" @selected(old('brand') === 'Converse')>Converse</option>
                <option value="Puma" @selected(old('brand') === 'Puma')>Puma</option>
                <option value="Vans" @selected(old('brand') === 'Vans')>Vans</option>
                <option value="ASICS" @selected(old('brand') === 'ASICS')>ASICS</option>
                <option value="New Balance" @selected(old('brand') === 'New Balance')>New Balance</option>
            </select>

            @error('brand')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id">Category</label>

            <select name="category_id" id="category_id" class="form-control">
                <option value="">Select Category</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price">Price</label>
            <input type="number" name="price" id="price"
                class="form-control" value="{{ old('price') }}">

            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Add Shoe
        </button>

        <a href="{{ route('shoes.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </form>

@endsection
