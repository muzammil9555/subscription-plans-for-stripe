<?php

namespace Muzammil9555\SubscriptionPlansForStripe\Controllers;

use App\Http\Controllers\Controller;
use Muzammil9555\SubscriptionPlansForStripe\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    
    public function index()
    {
        return view('admin.plan.index')->with([
            'pageTitle' => 'Plan',
            'plans' => Plan::with('features')->get()
        ]);
    }

    public function create()
    {
        return view('admin.plan.create')->with([
            'pageTitle' => 'Plan'
        ]);
    }

    public function store(Request $request)
    {
        $plan = Plan::create($request->only(['name', 'price', 'description', 'periodicity_type', 'stripe_price_plan_id']));

        foreach ($request->features as $feature) {
            $plan->features()->create($feature);
        }

        return redirect()->route('admin.plan.index');
    }

    public function show(Plan $plan)
    {
        return view('admin.plan.show')->with([
            'pageTitle' => 'Plan',
            'plan' => $plan,

        ]);
    }

    public function edit(Plan $plan)
    {
        return view('admin.plan.edit')->with([
            'pageTitle' => 'Plan',
            'plan' => $plan,

        ]);
    }

    public function update(Request $request, Plan $plan)
    {
        $plan->update($request->only(['name', 'price', 'description', 'periodicity_type', 'stripe_price_plan_id']));

        $plan->features()->delete();

        foreach ($request->features as $feature) {
            $plan->features()->create($feature);
        }

        return redirect()->route('admin.plan.index');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('admin.plan.index');
    }
}
