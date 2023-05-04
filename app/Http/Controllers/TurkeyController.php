<?php

namespace App\Http\Controllers;

use App\Models\Turkey;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TurkeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $au = auth()->user();

        if($au->isTurkey()|| $au->isAdmin()) {
            $now = Carbon::now();
            $users = Turkey::whereMonth('created_at', '=', $now->month)->get();        
            $total = $users->sum('total');               
            return view('offices.turkey.index', ['dubai' => Turkey::get(), 'total' => $total]);     
        }        
        abort(403);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'description' => 'required|',
            'user_id' =>'required|',            
            'dubaiPath' => 'required|', 
            'total' => 'required|'                     
        ]);
        // $name = request()->dubaiPath;        
        $path = request()->dubaiPath->store('turkey_invoices', 'public');
        $attributes['dubaiPath'] = "$path";


        Turkey::create($attributes);

        return redirect('office/turkey')->withStatus('Invoice successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turkey  $turkey
     * @return \Illuminate\Http\Response
     */
    public function show(Turkey $turkey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Turkey  $turkey
     * @return \Illuminate\Http\Response
     */
    public function edit(Turkey $turkey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Turkey  $turkey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turkey $turkey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turkey  $turkey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turkey $turkey)
    {
        //
    }
}
