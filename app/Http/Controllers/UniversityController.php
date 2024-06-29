<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use DataTables;


class UniversityController extends Controller
{
    public function manageUniversity(Request $request){
        if($request->ajax()){
            $universities = University::get();
            return DataTables::of($universities)
                ->addIndexColumn()
                ->addColumn('name', function($university){
                    return $university->name;
                })
                ->addColumn('action', function($university){
                    $btns = '
                    <a href="javascript:void(0)" data-id="'.$university->id.'" class="delete"><i class="fa fa-trash"></i></a>
                    ';
                    return $btns;
                })
                ->rawColumns(['name', 'action'])
                ->make(true);

        }
    // update icon 
        // <a href="javascript:void(0)" data-id="'.$university->id.'" class="edit"><i class="fa fa-edit"></i></a>
        return view("admin.universities.manage");
    }

    public function storeUniversity(Request $request){
        $request->validate([
            'university_name' => 'required'
        ],[
            'university_name.required' => "University Name is required",
        ]);
        try{
            $universityName = $request->university_name;
            $university = new University();
            $university->name = $universityName;
            if($university->save()){
                return redirect()->back()->with(["success" => "University Added Successfully"]);
            }
        }catch(\Exception $e){
            return redirect()->back()->with(["error" => "Some error occurred"]);
        }
    }

    public function deleteUniversity(Request $request){
        try{
            $uni_id = $request->id;
            $university = University::where('id', $uni_id)->delete();
            return response()->json(["success" => true, "msg" => "University Deleted Successfully"]);
        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Something Went wrong"]);
        }
       
    }
}
