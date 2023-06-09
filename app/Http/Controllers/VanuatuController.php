<?php

namespace App\Http\Controllers;

use App\Models\Vanuatu;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Resources\VanuatuResource;

class VanuatuController extends Controller
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
            $now = Carbon::now();
            $users = Vanuatu::whereMonth('created_at', '=', $now->month)->get();        
            $total = $users->sum('total');                 
            return view('offices.vanuatu.index', ['dubai' => Vanuatu::get(), 'total' => $total, 'month' => $now->month]);                 
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
            $dubaiInv = Vanuatu::whereMonth('created_at', '=', $request->key)->paginate();
            return VanuatuResource::collection($dubaiInv);        
        } else {
            $now = Carbon::now();        
            $ok = 1 > 0 ? 5 : $now->month;
            $dubaiInv = Vanuatu::whereMonth('created_at', '=', $now->month)->paginate();
            return VanuatuResource::collection($dubaiInv);        
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
            // 'dubaiPath' => 'required|',  
            'total' => 'required|'          
        ]);
        
        if(request()->dubaiPath) {
            $attributes['status'] = 0;
            $path = request()->dubaiPath->store('vanuatu_invoices', 'public');
            $attributes['dubaiPath'] = "$path";
        } else {
            $attributes['status'] = 1; 
        }                


        Vanuatu::create($attributes);

        return redirect('office/vanuatu')->withStatus('Invoice successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vanuatu  $vanuatu
     * @return \Illuminate\Http\Response
     */
    public function show(Vanuatu $vanuatu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vanuatu  $vanuatu
     * @return \Illuminate\Http\Response
     */
    public function edit(Vanuatu $vanuatu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vanuatu  $vanuatu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vanuatu $vanuatu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vanuatu  $vanuatu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vanuatu $vanuatu, $id)
    {
        $dubai = Vanuatu::findOrFail($id);
        if($dubai) {
        $dubai->delete(); 
        } else {
            return response()->json(error);
        }            
        return response()->json(null); 
    }
}
