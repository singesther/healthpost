<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Plans;
use App\Models\Health;
use App\Models\Installments;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
// get all comments of a post


        $member = member:: all();
        return view('member.index', compact('member')) ->with('i', (request()->input('page', 1) - 1) * 5);
    }


            // get all comments of a post

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $health = health::all();

        $Plans = Plans::all();



        return view('member.create', compact('Plans','health'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //	plans_id		fname	phone	email	password	district	sector
        	// status	membership_plan	health_center	healthpost_name	created_at	updated_at
        $member = Member::get();
        $request->validate([

            'fullname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'phone' => 'required||unique:members|regex:/^[-0-9\+]+$/|min:10',
            'email' => 'required|email|unique:members',
            'address' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',


           ]);







        // $membership  = Plans::select('name','detail')->where('id', $request->membership_plan)->get();

        // Member::create($request->all());

        Member::create([

            'healthpost_id' => $request->healthpost_name,
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,

        ]);


        return redirect()->route('health.create')->with('success','owner created successfully.');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
        return view('member.show',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
        return view('member.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',


        ]);

        $member->update($request->all());

        return redirect()->route('member.index') -> with('success', 'owner updated successfully');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $member=member::find($id)->delete();
        return redirect()->route('member.index')->with('success', 'owner deleted successfully');
    }





}
