<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\installments;
use App\Models\Membership;
use App\Models\healthposts;
use Illuminate\Http\Request;

class InstallmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $health = healthposts::all();
        $installments = installments:: all();
        $paid_mems = array();
        foreach ($health as $value) {
           $id = $value->id;
           $membership_idd =  membership::where('healthpost_id',$id)->value('id');
            $amountsum =  installments::where('membership_id',$membership_idd)->sum('amount');
            $total_amount =  membership::where('healthpost_id',$id)->value('total_price');

            $status = 0;

            if ($amountsum >= $total_amount) {
                //Fully paid
                $status = 2;
                membership::where('id',$membership_idd)->update(['status'=>$status]);
            }else{
                membership::where('id',$membership_idd)->update(['status'=>$status]);
            }

           $mem_status =  membership::where('healthpost_id',$id)->value('status');
           if ($mem_status == 2) {
               //Membership closed
               //Append its ID into a new array
               $paid_mems[] = $id;
           }
        }
        return view('installments.index', compact('installments', 'health', 'paid_mems')) ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $membership = membership::all();
        $installments = installments::all();
        $health = healthposts::all();
        return view('installments.create', compact('installments', 'membership',  'health')) ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $installments = installments::get();
// fetching rem inst, && rem amt tt inst && tt amt
// checking if rem inst != 0, rem amt != 0

    $today_date = date("Y-m-d H:i:s");//currrent date-time 2022-01-30 22:31 PM

    $request->validate([
        'pay_date' => 'required',
        'amount' => 'required',
    ]);

    installments::create([
        'healthpost_id' => $request->healthpost_id,
        'membership_id' => $request->membership_id,
        'amount' => $request->amount,
        'pay_date' => $today_date,
    ]);
        $data1 = 1;
        $data2 = 2;

    //return redirect()->route('installments.create')->withTitle('Laravel Magic method.');

    return view(installments.create, compact('data1','data2'));
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\installments  $installments
     * @return \Illuminate\Http\Response
     */
    public function show(installments $installments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\installments  $installments
     * @return \Illuminate\Http\Response
     */
    public function edit(installments $installments)
    {
        //
        return view('installments.edit', compact('installments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\installments  $installments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, installments $installments)
    {
        //
        $request->validate([
            'no_of_installment' =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:10',

            'start_date' => 'required',
            'end_date' => 'required',
            'total_price' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:10',

        ]);
        $installments->update($request->all());
        return redirect()->route('membership.index') -> with('success', 'membership updatd successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\installments  $installments
     * @return \Illuminate\Http\Response
     */
    public function destroy(installments $installments)
    {
        //
        $installments->delete();
        return redirect()->route('installments.index')->with('success', 'Installments deleted successfully');
    }

    public function healthpost($healthpost_id)
    {

        $today_date = date("Y-m-d H:i:s");  //currrent date-time 2022-01-30 22:31 PM

        //$healthpost_id = $healthpost_id; //This Health post id is empty

        $total_installments =  membership::where('healthpost_id',$healthpost_id)->value('no_of_installment');

        $total_amount =  membership::where('healthpost_id',$healthpost_id)->value('total_price');

        $message = "Installment Created Successfully";

        //Now we need to capture the healthpost id from memberships, Check its "Normal ID" and that will be the membership ID of installments.
        // Here we go


        $membership_idd =  membership::where('healthpost_id',$healthpost_id)->value('id');
        $amountsum =  installments::where('membership_id',$membership_idd)->sum('amount');
        $countpaid =  installments::where('membership_id',$membership_idd)->groupBy('membership_id')->selectRaw('count(*) as countpaid')->value('countpaid');
        $all_payments = installments::where('membership_id',$membership_idd)->get();

        $status = 0;

        if ($amountsum >= $total_amount) {
            //Fully paid
            $status = 2;
            membership::where('id',$membership_idd)->update(['status'=>$status]);
        }else{
            membership::where('id',$membership_idd)->update(['status'=>$status]);
        }

        $installments = [
            'message'  => $message,
            'membership_id' => $membership_idd,
            'all_payments' => $all_payments,
            'mem_status' => $status,
            'healthpost_id' => $healthpost_id,
            'total_installments'   => $total_installments, //These variables are returning nothing
            'total_amount' => $total_amount,
            'paid_amount' => $amountsum,
            'paid_installments' => $countpaid
        ];
       return view('installments.create', ['article' => $installments]);
    }

    public function insert_new(Request $request, $membership_id){
        $amount = $request->amount;
        $membership_id = $membership_id;
        $healthpost_id = $request->healthpost_id;

        $pay_date = date("Y-m-d H:i:s");

        // installments::create([
        //     'membership_id' => $membership_id,
        //     'healthpost_id' => $healthpost_id,
        //     'amount' =>  $amount,
        //     'pay_date' => $pay_date,
        // ]);

        $total_amount =  membership::where('healthpost_id',$healthpost_id)->value('total_price');
        $amountsum =  installments::where('membership_id',$membership_id)->sum('amount');

        $m = $amountsum + $amount;

        $remaining_insts = installments::where('membership_id',$membership_id)->where('amount', 0)->get()->toArray();
        $status = 0;
    if (count($remaining_insts) < 2) {
        //This is the final installment left
        //Check if (total membership amount) equals (total paid + $request->amount), If not return an error.

        if($m < $total_amount) {
            //There is some money left
            //Return error message
            $minID = installments::where('membership_id',$membership_id)->where('amount', 0)->min('id');
            installments::where('id', $minID)->update(['amount'=> $amount, 'pay_date'=> $pay_date]);

            //Set membership status to 3
            Membership::where('id',$membership_id)->update(['status'=>3]);
        }else{
        //We can proceed
        //Register payment, then close the membership [Set status to paid]
        $minID = installments::where('membership_id',$membership_id)->where('amount', 0)->min('id');
        installments::where('id', $minID)->update(['amount'=> $amount, 'pay_date'=> $pay_date]);

        //Set membership status to 2
        Membership::where('id',$membership_id)->update(['status'=>2]);

        }
    }else{
        $status = 1;

        ///Select and Get ID to Update
        $minID = installments::where('membership_id',$membership_id)->where('amount', 0)->min('id');
        installments::where('id', $minID)->update(['amount'=> $amount, 'pay_date'=> $pay_date]);
        Membership::where('id',$membership_id)->update(['status'=>$status]);
        }
        return redirect()->route('installments_index');

    }

}
