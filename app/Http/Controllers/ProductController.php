<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Storage;
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
            $propsOfImg = $this->storeImage($image, 'products', $product->id);
            Image::create([
                'name' => $propsOfImg['imageName'],
                'product_id' => $product->id,
                'path' => $propsOfImg['imagePath'],
            ]);
        }


        // dd($product->image->path);
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
    public function edit($id)
    {
        $product = Product::findOrFail($id)->first();
        $sections = Section::all();

        if ($product) {
            return view('admin.products.edit', compact(['product', 'sections']));
        }
    }

    public function editProduct(Request $request)
    {
        $product = Product::findOrFail($request->id);
        if ($product) {
            $product->update([
                'name'         => $request->name,
                'description'  => $request->description,
                'quantity'     => $request->quantity,
                'price'        => $request->price,
                'section_id'   => $request->section_id,
            ]);
        }

        if ($request->hasFile('image')) {

            // delete old image
            $image_path = $product->image->path;
            $image = Image::where('product_id', $request->id)->delete();

            if (Storage::exists('products/' . $image_path)) {
                Storage::delete('products/' . $image_path);
            }

            // add new image to product
            $image = $request->file('image');
            $propsOfImg = $this->storeImage($image, 'products', $product->id);
            Image::create([
                'name' => $propsOfImg['imageName'],
                'product_id' => $product->id,
                'path' => $propsOfImg['imagePath'],
            ]);
        }


        Alert::success('تمت العملية بنجاح', 'تم تعديل المنتج بنجاح');
        return redirect()->route('product.index');
    }

    /**
     * Update the specified resource in storage.
     */

    public function DepositView()
    {
        $products = Product::all();
        return view('admin.products.deposit', compact('products'));
    }
    public function DepositOfProducts(Request $request)
    {
        $request->validate([
            'value' => 'required|integer|max:20000|min:0|',
            'product_id' => 'required|exists:products,id'
        ]);
        $product = Product::findOrFail($request->product_id);
        $product->update([
            'quantity' => $request->value + $product->quantity,
        ]);
        Alert::success('تمت العملية بنجاح', "تم  بنجاح عملية الإيداع الي المنتج . $product->name");
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Product::where('id', $request->id)->delete();
        Alert::success('تمت العملية بنجاح', 'تم حذف المنتج بنجاح');
        return redirect()->route('product.index');
    }
}
