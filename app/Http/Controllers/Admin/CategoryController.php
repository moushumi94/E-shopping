<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? '';
        if($search != ''){
            
    
            $categories = Category::where('name','LIKE',"%$search%")->paginate(10);
        }else{
           
            $categories = Category::paginate(10);
        }
      //  $emps = Employee_Detail::get();
      //  $emps = Employee_Detail::paginate(2);
     
      $data = compact('categories','search');
        return view('admin.category.index')->with($data);
      //  $product = Product::all();
        //return view('admin.category.index');
       // $category = Category::all();
        //return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required|unique:categories,name',
            'description' => 'required',
             'image'      => 'required|file|',
        ]);

        $event = new Category;
        $event->name = $request->input('name');
        $event->description = $request->input('description');
       if($request->hasFile('image')){
          
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/product',$filename); 
            $event->image = $filename;
         }

           $event->save();
      

        return redirect('/categories')->with('status',"Categories Added Successfully");
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
        //return view('admin.category.add');
         $category = Category::find($id);
          return view('admin.category.edit')->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
           
            'description' => 'required',
            
           // 'image' => 'required|file|',
        ]);

        $event = Category::find($id);
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
        $event->description = $request->input('description');
        $event->update();
      

        return redirect('/categories')->with('status',"Categories Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $category = Category::destroy($id);
        return redirect(route('/categories'));
    }
}
