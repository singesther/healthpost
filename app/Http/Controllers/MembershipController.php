<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\installments;
use App\Models\healthposts;
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
        $healthpost = healthposts::get();


        return view('membership.index', compact('membership', 'healthpost',)) ->with('i', (request()->input('page', 1) - 1) * 5);
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
        $healthpost = healthposts:: all();
        return view('membership.create', compact('membership', 'healthpost'))->with('i', (request()->input('page', 1) -1) * 5);
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

        'total_price' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:7',
    ]);


    $mem = membership::create([
        'healthpost_id' => $request->healthpost_id,
        'no_of_installment' => $request->no_of_installment,
        'total_price' => $request->total_price,
    ]);
    $lastID = $mem->id;

    //Here, we have to initialize same number of rown in installments table


    //The first step ni ugukora loop, to ensure that the same number of rows will be created.
    $i = 0;
    date_default_timezone_set("Africa/Kigali");
    $today_date = date("Y-m-d");
    $first_inst = date("Y-m-d", strtotime("+30 days")); //Ubwo nizindi Insts zose nuku
    // $next_inst = date("Y-m-d", strtotime("+30 days", strtotime($prev_inst)));

    while ($i < $request->no_of_installment) {
        //Now we can create the row

        if ($i == 0) {
            //First inst
            $due_date = $first_inst;
           // Membership::where('id',$lastID)->update(['start_date'=>$today_date]);
        } else {
            $due_date = date("Y-m-d", strtotime("+30 days", strtotime($due_date)));
        }
        //dd($first_inst);

        $inst = installments::create([
            'membership_id' => $lastID,
            'healthpost_id' => $request->healthpost_id,
            'amount' => 0,
            'due_date' => $due_date,
            'pay_date' => NULL
        ]);


        $i++;

    }
    //Membership::where('id',$lastID)->update(['end_date'=>$due_date]);
    $nof_insts = $lastID . "_" .$request->no_of_installment;

    // return redirect('/dates_create/'.$nof_insts.'/');
    return redirect('/dates_create')->with('nof',$nof_insts);

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
        return view('membership.show', compact('membership'));
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

    public function dates_create($nof_insts){
        //Do whatever
        dd($nof_insts);

      //  return view('membership.inst');
    }
}
