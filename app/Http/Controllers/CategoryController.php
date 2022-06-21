<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\CategoriesExport;
use App\Http\Requests\CategoryRequest;
use Illuminate\Database\QueryException;
use Intervention\Image\ImageManagerStatic as Image;
use Maatwebsite\Excel\Facades\Excel;


class CategoryController extends Controller
{
    public function index(){


        if(request()->keyword){

            $categories = Category::where('title','like', '%' . request()->keyword. '%' )->get();
            return view('backend.categories.index', compact('categories'));


        }else{
            $categories = Category::all();
            return view('backend.categories.index', compact('categories'));
        }
    }

    public function create(){

        $this->authorize('create-category');

        return view('backend.categories.create');
    }


    public function store(CategoryRequest $request){
       try{

        // request file image ache kina check korthe  hobe  

        $data = $request->except(['_token']);
        if($request->hasFile('image')) {
           
           $data['image'] = $this->uploadImage($request->image, $request->title);

        }
        Category::create($data);
        return redirect()->route('category.index')->withMessage('successful Created!');

       }catch(QueryException $e){
           return redirect()->route('category.create')->withErrors($e->getMessage());
       }
    }

    public function show($id){

       $category = Category::find($id);

       //$category = Category::where('id', $id)->first();

       return view('backend.categories.show', compact('category'));

    }

    public function edit($id){

        $category = Category::find($id);
        //$category = Category::where('id', $id)->first();
        return view('backend.categories.edit', compact('category'));

     }


     public function update(Request $request, $id){

    
        $data = $request->except(['_token']);
        

        if($request->hasFile('image')) {
           
            $category = Category::where('id', $id)->first();
            
            $this->unlink($category->image);

            $data['image'] = $this->uploadImage($request->image, $request->title);
 
        }

        Category::where('id', $id)->update($data);


        return redirect()->route('category.index')->withMessage('successful Updated!');


     }
     public function destroy($id)
     {
         $category = Category::find($id);
         $category->delete();
         return redirect()->route('category.index')->with('success', 'Category deleted!');    
    }



    // image upload  function 


    private function uploadImage($file, $title)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

        $file_name = $timestamp .'-'.$title. '.' . $file->getClientOriginalExtension();
        

        $pathToUpload = storage_path().'/app/public/categories/';  // image  upload application save korbo

        if(!is_dir($pathToUpload)) {

            mkdir($pathToUpload, 0755, true);

        }

      Image::make($file)->resize(634,792)->save($pathToUpload.$file_name);

        return $file_name;
    }

    private function unlink($file)
    {
        $pathToUpload = storage_path().'/app/public/categories/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }


    // soft delete  methods 

    public function trashList(){
        
        $categories = Category::onlyTrashed()->get();
        return view('backend.categories.trashlist', compact('categories'));

    }

    public function restore($id){
       
        $category = Category::onlyTrashed()->where('id', $id)->first();
        $category->restore();
        return redirect()->back()->withMessage('successful restored !');
    }

    public function delete($id){
        
        $category = Category::onlyTrashed()->where('id', $id)->first();
        $category->forceDelete();
        return redirect()->route('category.trashlist')->withMessage('Deleted from Database !');    


    }

    //excel methods

    public function export() 
    {
        return Excel::download(new CategoriesExport, 'categories.xlsx');
    }

}
