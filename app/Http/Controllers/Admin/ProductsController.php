<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'min_price' => 'nullable|numeric|min:0',
        'max_price' => 'nullable|numeric|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    // Handle file upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }

    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'min_price' => $request->min_price,
        'max_price' => $request->max_price,
        'image' => $imagePath,
    ]);

    return redirect()->route('admin.products.index')
                     ->with('success', 'Product created successfully!');
}


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'min_price' => 'nullable|numeric',
        'max_price' => 'nullable|numeric',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $filename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/img'), $filename);
        $data['image'] = $filename;
    }

    $product->update($data);

    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
}

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && file_exists(public_path('assets/img/' . $product->image))) {
            unlink(public_path('assets/img/' . $product->image));
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
}
