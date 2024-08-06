<?php

namespace App\Http\Controllers;

use App\Models\CoachFinal;
use App\Models\University;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class CoachController extends Controller
{
    public function manageCoaches(Request $request)
    {
        $universities = University::get();

        if ($request->ajax()) {
            $coaches = CoachFinal::with('university')->get();
            return DataTables::of($coaches)
                ->addIndexColumn()
                ->addColumn('university', function ($coach) {
                    return $coach->university ? $coach->university->name : 'N/A';
                })
                ->addColumn('division', function ($coach) {
                    return $coach->division ?? '';
                })
                ->addColumn('name', function ($coach) {
                    return $coach->name;
                })
                ->addColumn('email', function ($coach) {
                    return $coach->email;
                })

                ->addColumn('action', function ($coach) {
                    $btns = '
                        <a href="javascript:void(0)" data-id="' . $coach->id . '" class="edit"><i class="fa fa-edit"></i></a>
                        <a href="javascript:void(0)" data-id="' . $coach->id . '" class="delete"><i class="fa fa-trash"></i></a>
                    ';
                    return $btns;
                })
                ->rawColumns(['university', 'division', 'name', 'email', 'action'])
                ->make(true);
        }
        return view('admin.coaches.manage', compact("universities"));
    }

    public function storeCoach(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:coaches_final,email',
            'university' => 'required',
        ], [
            'name.required' => "Name is required",
            'email.required' => "Email is required",
            'university.required' => "University is required",
        ]);

        DB::beginTransaction();

        try {
            $coach = new CoachFinal();
            $coach->name = $request->name;
            $coach->division = $request->division;
            $coach->email = $request->email;
            $coach->save();
            if ($coach) {
                $saveUniversity = new University();
                $saveUniversity->coach_id = $coach->id;
                $saveUniversity->name = $request->university;
                $saveUniversity->save();
            }
            DB::commit();

            return redirect()->back()->with(['success' => 'Coach added successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }

    public function deleteCoach(Request $request)
    {
        try {
            University::where('coach_id', $request->id)->delete();
            CoachFinal::where('id', $request->id)->delete();

            return response()->json(["success" => true, "msg" => "University Deleted Successfully"]);
        } catch (\Exception $e) {
            return response()->json(["success" => false, "msg" => "Something Went wrong"]);
        }
    }

    public function editCoach(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:coaches_final,id',
        ]);

        // Find the coach by ID
        $coach = CoachFinal::find($validated['id']);
        $coach->load('university');
        if ($coach) {
            return response()->json([
                'success' => true,
                'data' => $coach,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'Coach not found!',
            ], 404);
        }
    }

    public function updateCoach(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:coaches_final,id',
            'name' => 'required',
            'email' => 'required|email|unique:coaches_final,email,' . $request->id,
            'university' => 'required',
        ], [
            'id.required' => "ID is required",
            'id.exists' => "Coach not found",
            'name.required' => "Name is required",
            'email.required' => "Email is required",
            'university.required' => "University is required",
        ]);

        DB::beginTransaction();

        try {
            $coach = CoachFinal::findOrFail($request->id);
            $coach->name = $request->name;
            $coach->division = $request->division;
            $coach->email = $request->email;
            $coach->save();

            $university = University::where('coach_id', $coach->id)->first();
            if ($university) {
                $university->name = $request->university;
                $university->save();
            } else {
                $saveUniversity = new University();
                $saveUniversity->coach_id = $coach->id;
                $saveUniversity->name = $request->university;
                $saveUniversity->save();
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'msg' => 'Coach updated successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' => 'Something went wrong: ' . $e->getMessage()
            ]);
        }
    }


    public function coachList(Request $request)
    {
        if ($request->ajax()) {
            $query = CoachFinal::query();

            if ($request->has('university_id')) {
                $university = University::findOrFail($request->university_id);
                $universityName = $university->name;

                $query->whereHas('university', function ($query) use ($universityName) {
                    $query->where('name', $universityName);
                });
            }

            $coaches = $query->with('university')->get();

            return DataTables::of($coaches)
                ->addIndexColumn()
                ->addColumn('university', function ($coach) {
                    return $coach->university ? $coach->university->name : 'N/A';
                })
                ->addColumn('division', function ($coach) {
                    return $coach->division ?? '';
                })
                ->addColumn('name', function ($coach) {
                    return $coach->name;
                })
                ->addColumn('email', function ($coach) {
                    return $coach->email;
                })

                ->rawColumns(['university', 'division', 'name', 'email'])
                ->make(true);
        }

        return view('student_backend.coaches.list');
    }


    public function universitiesList()
    {
        $universities = University::select('id', 'name')
            ->groupBy('name')
            ->orderBy('name')
            ->get();
        return response()->json(['status' => true, 'data' => $universities]);
    }
}
