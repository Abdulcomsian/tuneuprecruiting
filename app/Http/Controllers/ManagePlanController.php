<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class ManagePlanController extends Controller
{
    public function index()
    {
        $plans = Plan::latest()->get();
        return view("admin.plans.index", compact('plans'));
    }
}
