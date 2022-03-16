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
        $today_date = date("Y-m-d H:i:s");
        $total_installments =  membership::where('healthpost_id',$healthpost_id)->value('no_of_installment');
        $healthpost_name =  healthposts::where('id',$healthpost_id)->value('healthpost_name');
        $total_amount =  membership::where('healthpost_id',$healthpost_id)->value('total_price');
        $message = "Installment Created Successfully";
        $membership_idd =  membership::where('healthpost_id',$healthpost_id)->value('id');
        $amountsum =  installments::where('membership_id',$membership_idd)->where('paid',1)->sum('amount');
        $countpaid =  installments::where('membership_id',$membership_idd)->where('paid',1)->groupBy('membership_id')->selectRaw('count(*) as countpaid')->value('countpaid');
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
            'healthpost_name' => $healthpost_name,
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
        $total_amount =  membership::where('healthpost_id',$healthpost_id)->value('total_price');
        $amountsum =  installments::where('membership_id',$membership_id)->sum('amount');
        $m = $amountsum + $amount;
        $remaining_insts = installments::where('membership_id',$membership_id)->where('amount', 0)->get()->toArray();
        $status = 0;
    if (count($remaining_insts) < 2) {
        if($m < $total_amount) {
            $minID = installments::where('membership_id',$membership_id)->where('amount', 0)->min('id');
            installments::where('id', $minID)->update(['amount'=> $amount, 'pay_date'=> $pay_date]);
            Membership::where('id',$membership_id)->update(['status'=>3]);
        }else{
        $minID = installments::where('membership_id',$membership_id)->where('amount', 0)->min('id');
        installments::where('id', $minID)->update(['amount'=> $amount, 'pay_date'=> $pay_date]);
        Membership::where('id',$membership_id)->update(['status'=>2]);

        }
    }else{
        $status = 1;
        $minID = installments::where('membership_id',$membership_id)->where('amount', 0)->min('id');
        installments::where('id', $minID)->update(['amount'=> $amount, 'pay_date'=> $pay_date]);
        Membership::where('id',$membership_id)->update(['status'=>$status]);
        }
        return redirect()->route('installments_index');

    }

    public function update_new(Request $request, $membership_id){
        $mem_id = $membership_id;
        $tmp = explode('_', $mem_id);
        $membership_id = $tmp[0];
        $nofinsts = $tmp[1];
        $count12 = count($request->all());
        $data = $request->except('_token');
        $data_number = count($data) / 2;
        $result = installments::where('membership_id',$membership_id)->where('amount', 0)->orderBy('id','ASC')->get()->toArray();
        $loop = 1;
        $loopp = 1;
        foreach($result as $r){
            $current_ID = $r['id'];
                if (--$count12 <= 0) {
                    break;
                }
                $amount = "amount".$loop;
                $pdate = "field".$loop;
                installments::where('id',$current_ID)->update(['amount' => $data[$amount], 'pay_date' => $data[$pdate]]);
            $loop++;
        }
        return redirect()->route('installments_index');
    }
}
