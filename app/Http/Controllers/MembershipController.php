<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\healthpost;
use App\Models\Health;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $membership = membership:: all();
        $health = healthpost::get();


        return view('membership.index', compact('membership', 'health')) ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $membership = membership:: all();
        $health = healthpost:: all();
        return view('membership.create', compact('membership', 'health'))->with('i', (request()->input('page', 1) -1) * 5);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $membership = membership::get();

    $request->validate([
        'no_of_installment' =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:4',

        'start_date' => 'required',
        'end_date' => 'required',
        'total_price' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:6',




    ]);


    membership::create([

        'healthpost_id' => $request->healthpost_id,
        'no_of_installment' => $request->no_of_installment,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'total_price' => $request->total_price,



    ]);


    return redirect()->route('installments.index')->with('success','membership created successfully.');

}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        //
        return view('membership.show', compacct('membership'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        //
        return view('membership.edit', compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $membership)
    {
        //
        $request->validate([
            'no_of_installment' =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:10',

            'start_date' => 'required',
            'end_date' => 'required',
            'total_price' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:10',

        ]);
        $membership->update($request->all());
        return redirect()->route('membership.index') -> with('success', 'membership updatd successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        //
        $membership->delete();
        return redirect()->route('membership.index')->with('success', 'membership deleted successfully');
    }
}
