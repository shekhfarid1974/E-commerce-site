<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ColorController extends Controller
{
    
    public function index(){
        // database data ene index page  a patabe 

        $colors = Color::all();
       
        return view('backend.colors.index', compact('colors'));
    }

    public function create(){
        // create  view korabe 

        return view('backend.colors.create');
    }

    public function edit($id){
        // create  view korabe 

       $color  = Color::findOrFail($id);
    
      return view('backend.colors.edit', compact('color'));
    }


    public function store(Request $request){
        // data gulu form nibe database store korbe  

       // form data collect ---- request pataichi 

       // database store  kora 

       Color::create([
           'name' => $request->name,
       ]);

       return redirect()->route('color.index')->withMessage('Color Insert HOICHE');

    }

    public function update(Request $request, $id){

       //  form update data collect korbe  
       // id dore update kore dibe database 

       Color::where('id', $id)->update([

            'name' => $request->name,

       ]);

       return redirect()->route('color.index')->withMessage('Color Update HOICHE');


    }


   
}
