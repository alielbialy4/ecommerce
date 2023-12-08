<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Section;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    use UploadImageTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('image')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = Section::all();
        return view('admin.products.add', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'section_id' => $request->section_id,
            'discount' => $request->discount,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $this->storeImage($image, 'products', $product->id);
        }
        return redirect()->route('product.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Product::where('id' , $request->id)->delete();
        Alert::success('تمت العملية بنجاح', 'تم حذف المنتج بنجاح');
        return redirect()->route('product.index');
        
        
    }
}
