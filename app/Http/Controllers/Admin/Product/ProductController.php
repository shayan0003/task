<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductRequest;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->Paginate(6);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Product $product)
    {
        $inputs = $request->all();

        $file = $inputs['image'];
        $name = $file->getClientOriginalName();
        $file->move(public_path("uploades/images/products/"), $name);

        $inputs['image'] = Product::PATH . $name;

        $product->create($inputs);
        return redirect()->route('admin.product.products.index')->with('swal-success', 'محصول جدید شما با موفقیت ایجاد شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit', compact('product' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        // dd($request);
        // dd($inputs);
        $inputs = $request->all();

        if ($request->hasFile('image')) {

            
            $file = $inputs['image'];
            $name = $file->getClientOriginalName();
            $file->move(public_path("uploades/images/products/"), $name);

            $inputs['image'] = Product::PATH . $name;
            $product->update($inputs);
            return redirect()->route('admin.product.products.index')->with('swal-success', 'محصول شما با موفقیت ویرایش شد');

        }

        $product->update($inputs);
        return redirect()->route('admin.product.products.index')->with('swal-success', 'محصول شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $result = $product->delete();
        return redirect()->route('admin.product.products.index')->with('swal-success', 'محصول شما با موفقیت حذف شد ');
    }


    public function status(Product $product)
    {
        $product->status = $product->status == 0 ? 1 : 0;
        $result = $product->save();

        if ($result) {
            if ($product->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
