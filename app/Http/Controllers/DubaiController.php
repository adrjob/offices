<?php

namespace App\Http\Controllers;

use App\Models\Dubai;
use App\Http\Resources\DubaiResource;
use Illuminate\Http\Request;

use Carbon\Carbon;


class DubaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $au = auth()->user();
        
        if($au->isDubai()|| $au->isAdmin()) {
            $now = Carbon::now();            
            $users = Dubai::whereMonth('created_at', '=', $now->month)->get();        
            $total = $users->sum('total');                
            // return view('offices.dubai.index', ['dubai' => Dubai::whereMonth('created_at', '=', $now->month)->get(), 'total' => $total]);     
            return view('offices.dubai.index', ['dubai' => Dubai::get(), 'total' => $total]);     
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
            $dubaiInv = Dubai::whereMonth('created_at', '=', $request->key)->paginate();
            return DubaiResource::collection($dubaiInv);        
        } else {
            $now = Carbon::now();        
            $ok = 1 > 0 ? 5 : $now->month;
            $dubaiInv = Dubai::whereMonth('created_at', '=', $now->month)->paginate();
            return DubaiResource::collection($dubaiInv);        
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
            'dubaiPath' => 'required|',  
            'total' => 'required|'          
        ]);
        // $name = request()->dubaiPath;        
        $path = request()->dubaiPath->store('dubai_invoices', 'public');
        $attributes['dubaiPath'] = "$path";


        Dubai::create($attributes);

        return redirect('office/dubai')->withStatus('Invoice successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dubai  $dubai
     * @return \Illuminate\Http\Response
     */
    public function show(Dubai $dubai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dubai  $dubai
     * @return \Illuminate\Http\Response
     */
    public function edit(Dubai $dubai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dubai  $dubai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dubai $dubai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dubai  $dubai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dubai $dubai)
    {
        //
    }
}
