<?php 

use App\Models\Role;

function customDateFormat($date){

    return date('d-M-Y', strtotime($date));
}

function printName(){
    return "Pondit";
}


function roleName($id){

    $name = Role::where('id', $id)->first()->name;
    return $name;
    

}