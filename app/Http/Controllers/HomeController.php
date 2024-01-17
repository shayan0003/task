<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request , Category $category = null)
    {

        //category selection
        if ($category) {
            $productModel = $category->products();
        }
        else{
            $productModel = new Product();
        }

        
        //get categories
        $categories = Category::where('status' , 1)->whereNull('parent_id')->get();


        //set sort for filtering
        switch ($request->sort) {
            case '1':
                $column = "price";
                $direction = "DESC";
                break;
            case '2':
                $column = "price";
                $direction = "ASC";
                break;

            default:
                $column = "created_at";
                $direction = "DESC";
                break;
        }
        if ($request->search) {
            $query = $productModel->where('name', 'LIKE', '%' . $request->search . '%')->where('status', 1)->orderBy($column, $direction);
        } else {

            $query = $productModel->where('status', 1)->orderBy($column, $direction);
        }

        $products = $request->max_price && $request->min_price ? $query->whereBetween('price', [$request->min_price, $request->max_price]) :
            $query->when($request->min_price, function ($query) use ($request) {
                $query->where('price', '>=', $request->min_price)->Paginate(4);
            })->when($request->max_price, function ($query) use ($request) {
                $query->where('price', '<=', $request->max_price)->Paginate(4);
            })->when(!($request->min_price && $request->max_price), function ($query) {
                $query->Paginate(4);
            });
            
        $products = $products->Paginate(4);
        return view('main.products', compact('products' , 'categories'));
    }

}
