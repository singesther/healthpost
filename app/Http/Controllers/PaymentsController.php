<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\Plans;
use App\Models\Health;
use App\Models\Member;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payments = Payments::latest()->paginate(10);


        return view('payments.index',compact('payments',))
            ->with('i', (request()->input('page', 1) - 1) * 5);



    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $member = member::all();
        $Plans = Plans::all();
        $health = health::all();
        return view('payments.create',compact('Plans', 'health', 'member'));




      }
      public function fetchMember(Request $request)
    {
        $data['members'] = Member::where("plans_id", $request->plans_id)->get(["fullname", "id"]);
        return response()->json($data);
    }

    public function fetchHealth(Request $request)
    {
        $data['members'] = Member::where("healthpost_id", $request->healthpost_id)->get(["health_center", "id"]);
        return response()->json($data);
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
        $payments =Payments::get();
        $request->validate([
            'fullname' => 'required',
            'membership_plan' => 'required',
            'amount' => 'required',
            'healthpost_name' => 'required',
            'health_center' => 'required',
        ]);
        Payments::create([
            'fullname' => $request->fullname,
            'plans_id' => $request->membership_plan,
            'amount' => $request->amount,
            'healthpost_id' => $request->healthpost_name,
            'health_center' => $request->health_center,
        ]);




        return redirect()->route('payments.index')
                        ->with('success','Payment created successfully.');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function show(Payments $payments)
    {
        //
        return view('payments.show',compact('payments'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function edit(Payments $payments)
    {
        //
        return view('payments.edit',compact('payments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $payments=payments::find($id)->delete();
        return redirect()->route('payments.index')->with('success', 'payment deleted successfully');

    }
}
