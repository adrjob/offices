<?php

namespace App\Http\Controllers;

use App\Models\VanuatuCash;
use Illuminate\Http\Request;
use App\Http\Resources\VanuatuCashResource;

use Carbon\Carbon;

class VanuatuCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $au = auth()->user();
        
        if($au->isVanuatu()|| $au->isAdmin()) {            
            return view('cash.vanuatu.index', ['dubai' => VanuatuCash::get()]);     
            $cas = VanuatuCash::get();            
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
            $dubaiInv = VanuatuCash::whereMonth('created_at', '=', $request->key)->paginate();
            return VanuatuCashResource::collection($dubaiInv);        
        } else {
            $now = Carbon::now();        
            $ok = 1 > 0 ? 5 : $now->month;
            $dubaiInv = VanuatuCash::whereMonth('created_at', '=', $now->month)->paginate();
            return VanuatuCashResource::collection($dubaiInv);        
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
            $path = request()->dubaiPath->store('vanuatu_cash', 'public');
            $attributes['dubaiPath'] = "$path";
        } else {
            $attributes['status'] = 1; 
        }        


        VanuatuCash::create($attributes);

        return redirect('cash/vanuatu')->withStatus('Invoice successfully created.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VanuatuCash  $vanuatuCash
     * @return \Illuminate\Http\Response
     */
    public function show(VanuatuCash $vanuatuCash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VanuatuCash  $vanuatuCash
     * @return \Illuminate\Http\Response
     */
    public function edit(VanuatuCash $vanuatuCash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VanuatuCash  $vanuatuCash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VanuatuCash $vanuatuCash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VanuatuCash  $vanuatuCash
     * @return \Illuminate\Http\Response
     */
    public function destroy(VanuatuCash $vanuatuCash, $id)
    {
        $dubai = VanuatuCash::findOrFail($id);
        if($dubai) {
        $dubai->delete(); 
        } else {
            return response()->json(error);
        }            
        return response()->json(null); 
    }
}
