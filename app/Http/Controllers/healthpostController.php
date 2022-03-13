<?php

namespace App\Http\Controllers;

use App\Models\healthposts;
use App\Models\Member;
use App\Models\Health;
use DB;
use Illuminate\Http\Request;

class healthpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $healthpost = healthposts:: latest()->paginate(5);
        return view('healthpost.index', compact('healthpost')) ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $health = health::all();
        $member = member::all();

        $latestest= DB::table('members')->latest('id')->first();
        $latest= DB::table('healths')->latest('id')->first();

        return view('healthpost.create', compact('member', 'health', 'latest', 'latestest'))->with('i', (request()->input('page', 1) -1) * 5);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'healthpost_name' =>'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',

            'address' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'phone' => 'required||unique:healthposts|regex:/^[-0-9\+]+$/|min:10',
            'tin_number' => 'required|unique:healthposts|regex:/^([0-9\s\-\+\(\)]*)$/',


        ]);


        healthposts::create([
            'owner_id' => $request->owner_id,
            'healthcenter_id' => $request->healthcenter_id,
            'healthpost_name' => $request->healthpost_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'tin_number' => $request->tin_number,


        ]);


        return redirect()->route('membership.create')->with('success','healthcenter created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\healthpost  $healthpost
     * @return \Illuminate\Http\Response
     */
    public function show(healthpost $healthpost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\healthpost  $healthpost
     * @return \Illuminate\Http\Response
     */
    public function edit(healthpost $healthpost)
    {
        //
        return view('healthpost.edit',compact('healthpost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\healthpost  $healthpost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, healthpost $healthpost)
    {
        //
        $request->validate([
            'name' =>'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',

            'address' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'tin_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',



        ]);
        $healthpost->update($request->all());
        return redirect()->route('healthpost.index') -> with('success', 'healthpost updated successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\healthpost  $healthpost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $health = healthpost::find($id)->delete();
        return redirect()->route('healthpost.index') -> with('success', 'healthpost deleted successfully');

    }
}
