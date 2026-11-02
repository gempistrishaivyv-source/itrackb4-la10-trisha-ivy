


@extends('layouts.app')

@section('title', 'Shoe Collection')

@section('content')
<h2>Shoe List</h2>

<p>
    <a href="{{ route('shoes.create') }}" class="btn btn-primary">
        Add Shoe
    </a>
</p>

<p>Category: {{ $category }} | Brand: {{ $brand }}</p>

<p>
    <strong>Number of Queries: {{ $queryCount }}</strong>
</p>

<h5>Filter by Category</h5>

@if ($brand === 'all')
    <a href="{{ route('shoes.index') }}">All Categories</a>
    <a href="{{ route('shoes.index', ['category'=>'Sneakers']) }}">Sneakers</a>
    <a href="{{ route('shoes.index', ['category'=>'Casual']) }}">Casual</a>
    <a href="{{ route('shoes.index', ['category'=>'Running']) }}">Running</a>
@else
    <a href="{{ route('shoes.index', ['brand'=>$brand]) }}">All Categories</a>
    <a href="{{ route('shoes.index', ['category'=>'Sneakers','brand'=>$brand]) }}">Sneakers</a>
    <a href="{{ route('shoes.index', ['category'=>'Casual','brand'=>$brand]) }}">Casual</a>
    <a href="{{ route('shoes.index', ['category'=>'Running','brand'=>$brand]) }}">Running</a>
@endif

<h5>Filter by Brand</h5>

@if ($category === 'all')
    <a href="{{ route('shoes.index') }}">All Brands</a>
    <a href="{{ route('shoes.index', ['brand'=>'Nike']) }}">Nike</a>
    <a href="{{ route('shoes.index', ['brand'=>'Converse']) }}">Converse</a>
    <a href="{{ route('shoes.index', ['brand'=>'Puma']) }}">Puma</a>
    <a href="{{ route('shoes.index', ['brand'=>'Vans']) }}">Vans</a>
    <a href="{{ route('shoes.index', ['brand'=>'ASICS']) }}">ASICS</a>
    <a href="{{ route('shoes.index', ['brand'=>'New Balance']) }}">New Balance</a>
@else
    <a href="{{ route('shoes.index', ['category'=>$category]) }}">All Brands</a>
    <a href="{{ route('shoes.index', ['category'=>$category,'brand'=>'Nike']) }}">Nike</a>
    <a href="{{ route('shoes.index', ['category'=>$category,'brand'=>'Converse']) }}">Converse</a>
    <a href="{{ route('shoes.index', ['category'=>$category,'brand'=>'Puma']) }}">Puma</a>
    <a href="{{ route('shoes.index', ['category'=>$category,'brand'=>'Vans']) }}">Vans</a>
    <a href="{{ route('shoes.index', ['category'=>$category,'brand'=>'ASICS']) }}">ASICS</a>
    <a href="{{ route('shoes.index', ['category'=>$category,'brand'=>'New Balance']) }}">New Balance</a>
@endif

<p>
    <a href="{{ route('shoes.index') }}">Clear Both Filters</a>
</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>ID</th>
            <th>Shoe</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Price</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($shoes as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->id }}</td>
                <td>
                    <a href="{{ route('shoes.show', $item->id) }}">
                        {{ $item->name }}
                    </a>
                </td>
                <td>{{ $item->brand }}</td>
                <td>{{ $item->category->name }}</td>
                <td>
                    ₱{{ $item->price }}

                    @if ($item->price >= 8000)
                        <span class="badge bg-primary">Premium</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">
                    No shoes are available in the collection.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
