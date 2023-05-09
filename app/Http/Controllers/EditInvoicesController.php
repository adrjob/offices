<?php

namespace App\Http\Controllers;

use App\Models\EditInvoices;
use App\Models\Dubai;
use Illuminate\Http\Request;


class EditInvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $display = "block";        
        $data = Dubai::where('id', $request->id)->get();
        // var_dump($data);
        // exit();
        return view('offices.dubai.edit', compact('display', 'data'));        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EditInvoices  $editInvoices
     * @return \Illuminate\Http\Response
     */
    public function show(EditInvoices $editInvoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EditInvoices  $editInvoices
     * @return \Illuminate\Http\Response
     */
    public function edit(EditInvoices $editInvoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EditInvoices  $editInvoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EditInvoices $editInvoices)
    {
        $id = $request->my_id;       
        
        if($request->dubaiPath) {
            $path = request()->dubaiPath->store('dubai_invoices', 'public');
            Dubai::where('id', $id)
            ->update(
                    [
                        'description' => $request->input('description'),
                        'total'=>$request->input('total'),
                        'dubaiPath'=>$path
                    ]
                );
        } else {
            $Dubai::where('id', $id)
            ->update(
                    [
                        'description' => $request->input('description'),
                        'total'=>$request->input('total')                        
                    ]
                );
        }      
                
        return redirect()->back()->withStatus('Invoice successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EditInvoices  $editInvoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(EditInvoices $editInvoices)
    {
        //
    }
}
