<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 9;
        $categories= ProductCategory::all();
        if (request()->category) 
        {
            $products = Product::with('categories')->whereHas('categories',function($query){
                $query->where('slug',request()->category);
            });
            $categoryName = optional($categories->where('slug',request()->category)->first())->category_name;
          
        }
        else 
        {    
            $products =  Product::where('featured',true)->Random()->take(6);
            $categoryName = 'Featured';
        }

        if (request()->sort=='low_high') 
        {
            $products = $products->OrderBy('price')->paginate($pagination);
        }
        else 
        {
            $products = $products->OrderBy('price','desc')->paginate($pagination);
        }
        
        return view('products.shop',[
            'products'  =>$products,
            'categories'=>$categories,
            'categoryName'=>$categoryName,
        ]);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where(['slug'=>$slug])->firstOrFail();

        return view('products.product',[
            'product'=>$product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
