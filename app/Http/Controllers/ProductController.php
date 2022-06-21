<?php

namespace App\Http\Controllers;

use Exception;
<<<<<<< HEAD
use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Database\QueryException;
use Intervention\Image\ImageManagerStatic as Image;
=======
use App\Models\Product;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ProductRequest;

>>>>>>> 911ae2c989d5f72db8e6b89ae2b1947e2209eef7

class ProductController extends Controller
{
    public function index(){


        if(request()->keyword){

            $products = Product::where('title','like', '%' . request()->keyword. '%' )->get();
            return view('backend.products.index', compact('products'));


        }else{
            $products = Product::all();
            return view('backend.products.index', compact('products'));
        }
    }

    public function create(){
        return view('backend.products.create');
    }


    public function store(ProductRequest $request){
       try{

        // request file image ache kina check korthe  hobe  

        $data = $request->except(['_token']);
        if($request->hasFile('image')) {
           
           $data['image'] = $this->uploadImage($request->image, $request->title);

        }
        Product::create($data);
        return redirect()->route('product.index')->withMessage('successful Created!');

       }catch(QueryException $e){
           return redirect()->route('product.create')->withErrors($e->getMessage());
       }
    }

    public function show($id){

       $product = Product::find($id);

       //$category = Category::where('id', $id)->first();

       return view('backend.products.show', compact('product'));

    }

    public function edit($id){

        $product = Product::find($id);
        //$category = Category::where('id', $id)->first();
        return view('backend.products.edit', compact('product'));

     }


     public function update(Request $request, $id){

    
        $data = $request->except(['_token']);
        

        if($request->hasFile('image')) {
           
            $product = Product::where('id', $id)->first();
            
            $this->unlink($product->image);

            $data['image'] = $this->uploadImage($request->image, $request->title);
 
        }

        Product::where('id', $id)->update($data);


        return redirect()->route('product.index')->withMessage('successful Updated!');


     }
<<<<<<< HEAD
     public function destroy($id)
     {
         $product = Product::find($id);
         $product->delete();
         return redirect()->route('product.index')->with('success', 'Category deleted!');    
    }

=======


     public function destroy($id)    
     {
         $product = Product::find($id);
         $product->delete();
         return redirect()->route('product.index')->with('success', 'Product deleted!');    
    }

    // soft delete  methods 

    public function trashList(){
        
        $products = Product::onlyTrashed()->get();
        return view('backend.products.trashlist', compact('products'));

    }

    public function restore($id){
       
        $category = Product::onlyTrashed()->where('id', $id)->first();
        $category->restore();
        return redirect()->back()->withMessage('successful restored !');
    }

    public function delete($id){
        
        $category = Product::onlyTrashed()->where('id', $id)->first();
        $category->forceDelete();
        return redirect()->route('category.trashlist')->withMessage('Deleted from Database !');    


    }




    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
>>>>>>> 911ae2c989d5f72db8e6b89ae2b1947e2209eef7


    // image upload  function 


    private function uploadImage($file, $title)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

        $file_name = $timestamp .'-'.$title. '.' . $file->getClientOriginalExtension();
        

        $pathToUpload = storage_path().'/app/public/products/';  // image  upload application save korbo

        if(!is_dir($pathToUpload)) {

            mkdir($pathToUpload, 0755, true);

        }

      Image::make($file)->resize(634,792)->save($pathToUpload.$file_name);

        return $file_name;
    }

    private function unlink($file)
    {
        $pathToUpload = storage_path().'/app/public/products/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }


    // soft delete  methods 

   

    public function restore($id){
       
        $product = Product::onlyTrashed()->where('id', $id)->first();
        $product->restore();
        return redirect()->back()->withMessage('successful restored !');
    }

    public function delete($id){
        
        $product = Product::onlyTrashed()->where('id', $id)->first();
        $product->forceDelete();
        return redirect()->route('product.trashlist')->withMessage('Deleted from Database !');    


    }

}
