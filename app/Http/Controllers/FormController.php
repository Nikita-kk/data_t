<?php

namespace App\Http\Controllers;



use App\Models\form;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class FormController extends Controller
{
    public function form(){
        // $data=form::all();
        return view('form',);
    }

    public function getform(Request $request)
    {
        if ($request->ajax()) {
            $data = form::get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('edit',$row->id).'" class="edit btn btn-success btn-sm">Edit</a> <a href="'.route('delete',$row->id).'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function edit($id){
        $edit=form::find($id);
        return view('edit',compact('edit'));
    }

    public function update(Request $request,$id){
        $data=form::find($id);
        $data->name=$request->name;
        $data->save();
        // dd($data);
        return redirect()->route('form');
        // dd($request);

    }
    public function delete($id){
        $delete=form::find($id);
        $delete->delete();
        return redirect()->route('form');
    }


}
