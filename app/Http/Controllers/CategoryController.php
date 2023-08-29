<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function form(){
    return view('category.form');
  }

  public function store(Request $request){
    $validated=$request->validate([
        'title'=>'required',
    ]);


    $data=new category();
    $data->title=$request->title;
    $data->save();
    return redirect()->route('category.table')->with('msg','Data has been submit successfully');
}
public function table(){
    $data=category::paginate(4);
    return view('category.table', compact('data'));
}

public function edit($id){
    $data=category::find($id);
    return view('category.edit',compact('data'));
}

public function update(Request $request,$id){
    $validated=$request->validate([
        'title'=>'required',
    ]);

    $data=category::find($id);
    $data->title=$request->title;
    $data->save();
    return redirect()->route('category.table')->with('msg','Data has been update successfully');
}
public function delete($id){
    $data=category::find($id);
    $data->delete($id);
    return redirect()->route('category.table')->with('msg','Data has been delete successfully');;

}
}
