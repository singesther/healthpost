<?php

namespace App\Http\Controllers;

use App\Models\Plans;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Plans = Plans:: latest()->paginate(5);
        return view('plan.index', compact('Plans')) ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' =>'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'detail' => 'required',
            'amount' => 'required',
            

        ]);
        Plans::create($request->all());
        return redirect()->route('plan.index')->with('success','member createed successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plans  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plans $plan)
    {
        //
        return view('plan.show',compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plans $plan)
    {
        //
        return view('plan.edit',compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plans  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plans $plan)
    {
        //
       

                        $request->validate([
                            'name' =>'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
                            'detail' => 'required|max:255',
                            'amount' => 'required',
                           
                        ]);
                    
                            $plan->update($request->all());
                    
                            return redirect()->route('plan.index') -> with('success', 'membership updated successfully');   
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plans  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plans $plan)
    {
        //
        $plan->delete();
        return redirect()->route('plan.index')->with('success', 'member deleted successfully');
    }
}