<?php

namespace App\Http\Controllers;

use App\Models\CoachFinal;
use App\Models\University;
use Illuminate\Http\Request;
use DataTables;

class CoachController extends Controller
{
    public function manageCoaches(Request $request){
        $universities = University::get();

        if($request->ajax()){
            $coaches = CoachFinal::with('university')->get();
            return DataTables::of($coaches)
                ->addIndexColumn()
                ->addColumn('name', function($coach){
                    return $coach->name;
                })
                ->addColumn('email', function($coach){
                    return $coach->email;
                })
                ->addColumn('university', function($coach){
                    return $coach->university->name;
                })
                ->addColumn('action', function($coach){
                    $btns = '
                    <a href="javascript:void(0)" data-id="'.$coach->id.'" class="delete"><i class="fa fa-trash"></i></a>
                    ';
                    return $btns;
                })
                ->rawColumns(['name','email', 'university', 'action'])
                ->make(true);

        }
        return view('admin.coaches.manage', compact("universities"));
    }

    public function storeCoach(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:coaches_final,email',
            'university' => 'required',
        ],[
            'name.required' => "Name is required",
            'email.required' => "Email is required",
            'university.required' => "University is required",
        ]);

        try{
            $coach = new CoachFinal();
            $coach->university_id = $request->university;
            $coach->name = $request->name;
            $coach->email = $request->email;
            if($coach->save()){
                return redirect()->back()->with(['success' => 'Coach added successfully']);
            }
        }catch(\Exception $e){
            return redirect()->back()->with(['error' => 'Something went wrong']);
        }
    }

    public function deleteCoach(Request $request){
        try{
            $coach = CoachFinal::where('id', $request->id)->delete();
            return response()->json(["success" => true, "msg" => "University Deleted Successfully"]);
        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Something Went wrong"]);
        }
    }


    public function coachList(Request $request){
        if($request->ajax()){
            $coaches = CoachFinal::with('university')->get();
            return DataTables::of($coaches)
                ->addIndexColumn()
                ->addColumn('name', function($coach){
                    return $coach->name;
                })
                ->addColumn('email', function($coach){
                    return $coach->email;
                })
                ->addColumn('university', function($coach){
                    return $coach->university->name;
                })
                ->rawColumns(['name','email', 'university'])
                ->make(true);

        }
        return view('student_backend.coaches.list');
    }
}
