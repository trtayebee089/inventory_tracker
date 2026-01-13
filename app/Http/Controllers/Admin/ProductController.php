<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)->get();
        $products = Product::all();
        return view('admin.pages.products.index', compact('categories', 'products'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        return view('admin.pages.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name'          => 'required|string|max:255',
                'category_id'   => 'required|exists:categories,id',
                'price'         => 'required|numeric|min:0',
                'cost'          => 'nullable|numeric|min:0',
                'description'   => 'nullable|string',
            ]);

            if($validator->fails()){
                Log::error('Product creation validation failed', ['errors' => $validator->errors()]);
                return redirect()->back()->withErrors($validator)->withInput();
            }

            Log::info('Creating new product', ['data' => $request->all()]);

            $product = new Product();
            $product->name = $request->input('name');
            $product->slug = Str::slug($request->input('name'));
            $product->category_id = $request->input('category_id');
            $product->price = $request->input('price');
            $product->cost = $request->input('cost');
            $product->description = $request->input('description');
            $product->save();

            Log::info('Product created successfully', ['product_id' => $product->id]);

            return redirect()->route('admin.products.index')->with([
                'message' => 'Product created successfully',
                'alert-type' => 'success'
            ]);
        } catch(Exception $e){
            return redirect()->back()->with([
                'message' => 'Error occurred while creating product: ' . $e->getMessage(),
                'alert-type' => 'error'
            ]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
