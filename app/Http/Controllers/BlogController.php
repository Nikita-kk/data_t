<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Yajra\DataTables\DataTables;
use App\Models\Blog;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Http\Request;

class BlogController extends Controller
{
  public function form(){
    $category=Category::get(['id','title']);
    // $cat=Category::all();
    return view('blog.form',compact('category'));
  }

  public function store(Request $request){

    $validated=$request->validate([
        'title'=>'required',
        'description'=>'required',
        'image'=>'required',
    ]);

    $data=new Blog();
    $data->title=$request->title;
    $data->description=$request->description;
    if($request->hasFile('image'))
    {
        $file=$request->image;
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('uploads',$filename);
        $data->image=$filename;
    }
    $data->status=$request->status;

    $data->save();
    return redirect()->route('blog.table')->with('msg','Data has been submit successfully');;
  }

  public  function table(){
    $data=Blog::paginate(4);
    // $blog=Blog::with('category')->get();
    // dd($blog);
    return view('blog.table',compact('data'));

}
 public function edit($id){
    $data=Blog::find($id);
    return view('blog.edit',compact('data'));
 }

 public function update(Request $request,$id){
    $validated=$request->validate([
        'title'=>'required',
        'description'=>'required',
        'image'=>'required',
    ]);
    $data=Blog::find($id);
    $data->title=$request->title;
    $data->description=$request->description;
    if($request->hasFile('image'))

    {
        $file=$request->image;
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('uploads',$filename);
        $data->image=$filename;
    }
    $data->status=$request->status;

    $data->save();
    return redirect()->route('blog.table')->with('msg','Data has been update successfully');;
  }
   public function delete($id){
    $data=Blog::find($id);
    $data->delete($id);
    return redirect()->route('blog.table')->with('msg','Data has been delete successfully');;

   }



//    for  blog   datatable

public function gettable(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::get();
            $blog=Blog::with('category')->get();
            return Datatables::of($data,$blog)

                ->addIndexColumn()
                ->addColumn('title', function($row){
                    return $row->category->title;
                })
                ->addColumn('status', function ($row) {
                     if ($row->status == '1') {
                      $statusBtn = '<button class="btn btn-success btn-sm">Active</button>';
                     } else {
                      $statusBtn = '<button class="btn btn-danger btn-sm">Inactive</button>';
                     }
                    return $statusBtn;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('edit',$row->id).'" class="edit btn btn-success btn-sm">Edit</a> <a href="'.route('delete',$row->id).'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })

                ->rawColumns(['action','title','status']
                )
                ->make(true);
        }
    }

}


