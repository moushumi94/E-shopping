<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
        $search = $request['search'] ?? '';
        if($search != ''){
            
    
            $products = Product::where('name','LIKE',"%$search%")->Orwhere('price','LIKE',"%$search%")->paginate(10);
        }else{
           
            $products = Product::paginate(10);
        }
      //  $emps = Employee_Detail::get();
      //  $emps = Employee_Detail::paginate(2);
     
      $data = compact('products','search');
        return view('admin.product.index')->with($data);
      //  $product = Product::all();
       // return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $categories = Category::all();
        return view('admin.product.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required|file|',
        ]);

        $event = new Product;
        $event->name = $request->input('name');
        $event->price = $request->input('price');
        $event->category_id = $request->input('category_id');
        $event->description = $request->input('description');
       if($request->hasFile('image')){
          
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/product',$filename); 
            $event->image = $filename;
         }

           $event->save();
      

        return redirect('/products')->with('status',"Product Added Successfully");
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
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
          
          return view('admin.product.edit')->with(compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
           // 'image' => 'required|file|',
        ]);

        $event = Product::find($id);
        if($request->hasFile('image')){
          
            $path= 'assets/product/'. $event->image;
              if(File::exists($path)){
                File::delete($path);
              }
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('assets/product',$filename); 
                $event->image = $filename;
             }
        $event->name = $request->input('name');
        $event->price = $request->input('price');
        $event->category_id = $request->input('category_id');
        $event->description = $request->input('description');
        $event->update();
      

        return redirect('/dashboard')->with('status',"Product Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
