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

    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'stripe-plan' => 'required',
            'price' => 'required|numeric',
        ]);

        $plan->update($request->all());

        return redirect()->route('manage-plan.index')
            ->with('success', 'Plan updated successfully');
    }

    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();

        return redirect()->route('manage-plan.index')
            ->with('success', 'Plan deleted successfully');
    }
}
