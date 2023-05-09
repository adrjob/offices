<?php

namespace App\Http\Controllers;

use App\Models\DubaiCash;
use App\Http\Resources\DubaiCashResource;
use Illuminate\Http\Request;

use Carbon\Carbon;

class DubaiCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $au = auth()->user();
        
        if($au->isDubai()|| $au->isAdmin()) {
            $now = Carbon::now();            
            $users = DubaiCash::whereMonth('created_at', '=', $now->month)->get();        
            $total = $users->sum('total');                
            // return view('offices.dubai.index', ['dubai' => Dubai::whereMonth('created_at', '=', $now->month)->get(), 'total' => $total]);     
            return view('cash.dubai.index', ['dubai' => DubaiCash::get(), 'total' => $total]);     
        }
        abort(403);

        // $au = auth()->user();
        
        // if($au->isDubai()|| $au->isAdmin()) {            
        //     return view('cash.dubai.index', ['dubai' => DubaiCash::get()]);     
        //     $cas = DubaiCash::get();            
        // }
        // abort(403);        
    }

    /**  
     * Display a json Dubai Invoices data
     * 
     * @return \Illuminate\Http\Response
    */
    public function indexApi(Request $request)
    {                
        // $ok = 1 < 0 ? 5 : 0;
        if($request->key != NULL)
        {
            $dubaiInv = DubaiCash::whereMonth('created_at', '=', $request->key)->paginate();
            return DubaiCashResource::collection($dubaiInv);        
        } else {
            $now = Carbon::now();        
            $ok = 1 > 0 ? 5 : $now->month;
            $dubaiInv = DubaiCash::whereMonth('created_at', '=', $now->month)->paginate();
            return DubaiCashResource::collection($dubaiInv);        
        }        
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

    public function store(Request $request)
    {        
        $attributes = request()->validate([            
            'description' => 'required|',            
            'receive' => 'required|',  
            'user_id' => 'required|',  
        ]);
        // $name = request()->dubaiPath;                
        if(request()->dubaiPath) {
            $attributes['status'] = 0;
            $path = request()->dubaiPath->store('dubai_cash', 'public');
            $attributes['dubaiPath'] = "$path";
        } else {
            $attributes['status'] = 1; 
        }        


        DubaiCash::create($attributes);

        return redirect('cash/dubai')->withStatus('Invoice successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DubaiCash  $dubaiCash
     * @return \Illuminate\Http\Response
     */
    public function show(DubaiCash $dubaiCash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DubaiCash  $dubaiCash
     * @return \Illuminate\Http\Response
     */
    public function edit(DubaiCash $dubaiCash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DubaiCash  $dubaiCash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DubaiCash $dubaiCash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DubaiCash  $dubaiCash
     * @return \Illuminate\Http\Response
     */
    public function destroy(DubaiCash $dubaiCash)
    {
        //
    }
}
