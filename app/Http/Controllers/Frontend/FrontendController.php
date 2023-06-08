<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
      //  return view('admin.product.index', compact('product'));
        return view('frontend.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
    public function allProducts($name){

        if(Category::where('name', $name)->exists()){
       $category = Category::where('name', $name)->first();
       $products = Product::where('category_id', $category->id)->get();
        return view('frontend.product.index',compact('category','products'));
         } else {
        return redirect('/')->with('status','name doesnt exist');
         }
    }
   

    public function singleProducts($cate_name,$prod_name){

        if(Category::where('name', $cate_name)->exists()){

            if(Product::where('name', $prod_name)->exists()){

      
       $products = Product::where('name', $prod_name)->first();
        return view('frontend.product.view',compact('products'));

        

         } else {
             return redirect('/')->with('status','link broken');
               }
        }else {
            return redirect('/')->with('status','no such category found');
         }
    }


     public function cloth(){
       
       
        $cloths = Product::where('category_id','1')->get();
        return view('frontend.cloth', compact('cloths'));
    }

    public function bag(){
       
       // $category = Category::where('name','Cloth')->get();
        $bags = Product::where('category_id','2')->get();
        return view('frontend.bag', compact('bags'));
    }
   
}
