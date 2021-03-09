<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Db_test extends Controller
{
    function select()
    {
        //we can use raw to write the query manually;
       // $data2=DB::select(DB::raw('select * from admin'));
        $data3=DB::select(DB::raw('select * from admin'));

        // $data=DB::table('admin')->select()->get(); //we can get all data from the hole table by using this;
        // $data=DB::table('admin')->where('user_name','arnab_1')->where('id','!=',2)->get();
        //$data=DB::table('admin')->count();
        // $data=DB::table('admin')->max('id');
        // $data=DB::table('admin')->orderByDesc('id')->get();
        //  $data=DB::table('admin')->orderBy('id','desc')->get();
        // $data=DB::table('admin')->where('user_name','deba_1')->where('pass','124')->get();
        // foreach($data as $row){
        //     echo $row->name,$row->id;
        // }

        //  $data=DB::table('admin')->select('id')->get(); //if we need single attribute values then we can use this
        $data=DB::table('admin')->select(array('id','name'))->get(); //if we need multiple attribute values then we have to use array to get the values;

          foreach($data as $row){
            echo $row->name,$row->id;
        }
        echo "<pre>";
        print_r($data2);
    }
    function insert()
    {
        $sql=DB::table('admin')->insert(array('name'=>'Nalita','user_name'=>'nalita_1','pass'=>'12345'));
        if ($sql) {
            echo "data inserted";
        }else{
            echo "data not inserted";
        }
    }
    function update()
    {
        // $gender=array('english','bengali');
        // $gender_db=implode(',',$gender);
        $sql=DB::table('admin')->where('id','2')->update(array('name'=>'Arnab Banerjee','user_name'=>'arnab_1'));
        if ($sql) {
            echo "update success";
        }else{
            echo "failed";
        }
    }
    function delete()
    {
        $sql=DB::table('admin')->where('id','1')->delete();
    }
}
