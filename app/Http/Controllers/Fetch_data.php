<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud_model;

class Fetch_data extends Controller
{
    function fetch_all()
    {
        // return Crud_model::all();
        // return Crud_model::find(2);
        //   Crud_model::where('user_name','sayan_1')->get();
        return Crud_model::where('id','2')->update(array('name'=>'debasish_2'));
    }
}
