<?php

namespace App\Http\Controllers;

use App\Models\IstanbulCash;
use Illuminate\Http\Request;
use App\Http\Resources\IstanbulCashResource;

use Carbon\Carbon;

class IstanbulCashController extends Controller
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
            // $ok = 1 > 0 ? 5 : $now->month;          
            return view('cash.istanbul.index', ['dubai' => IstanbulCash::get(), 'getMonth' => $now->month]);     
            $cas = IstanbulCash::get();            
        }
        abort(403);        
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
            $dubaiInv = IstanbulCash::whereMonth('created_at', '=', $request->key)->paginate();
            return IstanbulCashResource::collection($dubaiInv);        
        } else {
            $now = Carbon::now();        
            $ok = 1 > 0 ? 5 : $now->month;
            $dubaiInv = IstanbulCash::whereMonth('created_at', '=', $now->month)->paginate();
            return IstanbulCashResource::collection($dubaiInv);        
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
            $path = request()->dubaiPath->store('istanbul_cash', 'public');
            $attributes['dubaiPath'] = "$path";
        } else {
            $attributes['status'] = 1; 
        }        


        IstanbulCash::create($attributes);

        return redirect('cash/istanbul')->withStatus('Invoice successfully created.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IstanbulCash  $istanbulCash
     * @return \Illuminate\Http\Response
     */
    public function show(IstanbulCash $istanbulCash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IstanbulCash  $istanbulCash
     * @return \Illuminate\Http\Response
     */
    public function edit(IstanbulCash $istanbulCash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IstanbulCash  $istanbulCash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IstanbulCash $istanbulCash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IstanbulCash  $istanbulCash
     * @return \Illuminate\Http\Response
     */
    public function destroy(IstanbulCash $istanbulCash, $id)
    {
        $dubai = IstanbulCash::findOrFail($id);
        if($dubai) {
        $dubai->delete(); 
        } else {
            return response()->json(error);
        }            
        return response()->json(null); 
    }
}
