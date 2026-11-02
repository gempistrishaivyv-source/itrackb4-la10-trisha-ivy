<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoeController extends Controller
{
   
public function index(Request $request)
{
    DB::flushQueryLog();
    DB::enableQueryLog();

    $category = $request->query('category', 'all');
    $brand = $request->query('brand', 'all');

    $query = Shoe::with('category');

    if ($category !== 'all') {
        $query->whereHas('category', function ($q) use ($category) {
            $q->where('name', $category);
        });
    }

    if ($brand !== 'all') {
        $query->where('brand', $brand);
    }

    $shoes = $query->get();

    $queryCount = count(DB::getQueryLog());

    return view('shoes.index', compact(
        'shoes',
        'category',
        'brand',
        'queryCount'
    ));
}


    public function create()
{
    $categories = Category::all();

    return view('shoes.create', compact('categories'));
}

    public function store(Request $request)
    {
        $data = $request->validate([
    'name' => 'required|max:255',
    'brand' => 'required|in:Nike,Converse,Puma,Vans,ASICS,New Balance',
    'category_id' => 'required|exists:categories,id',
    'price' => 'required|numeric|min:1'
]);

        Shoe::create($data);

        return redirect()->route('shoes.index')
            ->with('success', 'Shoe added successfully.');
    }

    public function show(string $id)
    {
        $shoe = Shoe::findOrFail($id);

        return view('shoes.show', ['item' => $shoe]);
    }

    public function featured()
    {
        $item = Shoe::findOrFail(3);

        return view('shoes.featured', ['item' => $item]);
    }
}