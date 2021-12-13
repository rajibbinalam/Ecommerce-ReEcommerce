<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    public function index(){
        //return view('admin.categories');
        $categories = Category::paginate(5);
        return view('admin.categories', compact('categories'));
    }

    public function addCategory(Request $request){

        $request->validate([
            'name'=> 'string|max:255',
        ]);
        Category::insert([
            'name'=>$request->has('name')? $request->get('name'):'',
        ]);
        return back()->with('success','Data Added Success!');
    }

    public function deleteCategory($id){
        $delete = Category::find($id)->first();
        $delete->delete();
        return back()->with('success',''.$delete->name.' Data Deleted!');
    }
    

}
