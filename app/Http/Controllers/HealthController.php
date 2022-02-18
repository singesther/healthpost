<?php

namespace App\Http\Controllers;

use App\Models\Health;
use Illuminate\Http\Request;

class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $health = health:: latest()->paginate(5);
        return view('health.index', compact('health')) ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $health = health:: latest()->paginate(5);
        return view('health.create', compact('health'));
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

            'health_center_name' =>'required|unique:healths|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'address' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'phone' => 'required|unique:healths|regex:/^[-0-9\+]+$/|min:10',

        ]);
        Health::create($request->all());
        return redirect()->route('healthpost.create')->with('success','Healthcenter created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\health  $health
     * @return \Illuminate\Http\Response
     */
    public function show(health $health)
    {
        //
        return view('Healthpost.show',compact('health'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function edit(health $health)
    {
        //
        return view('Health.edit',compact('health'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, health $health)
    {
        //
        $request->validate([
            'health_center_name' =>'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'address' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',

        ]);

            $health->update($request->all());

            return redirect()->route('health.index') -> with('success', 'healthcenter updated successfully');   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function destroy(health $health)
    {
        //
        $health->delete();
        return redirect()->route('health.index')->with('success', 'healthcenter deleted successfully');
    }

    public function health_create(Request $request, $id)

        {

            $healthcenter = health::pluck('health_center_name');



            return redirect()->route('health.create', compact('id', 'healthcenter'));

        }
}
