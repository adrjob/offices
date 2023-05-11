<?php

namespace App\Http\Controllers;

use App\Models\EditInvoices;
use App\Models\Dubai;
use App\Models\DubaiCash;
use App\Models\Turkey;
use App\Models\IstanbulCash;
use App\Models\Vanuatu;
use App\Models\VanuatuCash;
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
        $country = request()->country;        
        if($country == 'dubai') {
            
            $data = Dubai::where('id', $request->id)->get();        
            return view('offices.dubai.edit', compact('display', 'data', 'country'));        

        } elseif($country == 'istanbul') {

            $data = Turkey::where('id', $request->id)->get();        
            return view('offices.turkey.edit', compact('display', 'data', 'country'));        
            
        } else {

            $data = Vanuatu::where('id', $request->id)->get();        
            return view('offices.vanuatu.edit', compact('display', 'data', 'country'));        
        }        
    }

    public function indexA(Request $request)
    {        
        $display = "block";            
        $country = request()->country;        
        if($country == 'dubai') {
            
            $data = DubaiCash::where('id', $request->id)->get();        
            return view('cash.dubai.edit', compact('display', 'data', 'country'));        

        } elseif($country == 'istanbul') {

            $data = IstanbulCash::where('id', $request->id)->get();        
            return view('cash.istanbul.edit', compact('display', 'data', 'country'));        
            
        } else {

            $data = VanuatuCash::where('id', $request->id)->get();        
            return view('cash.vanuatu.edit', compact('display', 'data', 'country'));        
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
        $country = $request->country;        
        $id = $request->my_id;       
        
        if($request->dubaiPath) {
            $path = request()->dubaiPath->store('dubai_invoices', 'public');
            if($country == 'dubai') {
                Dubai::where('id', $id)->update(
                    [
                        'description' => $request->input('description'),
                        'total'=>$request->input('total'),
                        'dubaiPath'=>$path, 
                        'status' => 0,
                    ]);
                    return redirect('office/dubai')->withStatus('Expense successfully updated.');                    
            } elseif($country == 'istanbul') {
                Turkey::where('id', $id)->update(
                    [
                        'description' => $request->input('description'),
                        'total'=>$request->input('total'),
                        'dubaiPath'=>$path, 
                        'status' => 0,
                    ]);
                    return redirect('office/turkey')->withStatus('Expense successfully updated.');
            } else {
                Vanuatu::where('id', $id)->update(
                    [
                        'description' => $request->input('description'),
                        'total'=>$request->input('total'),
                        'dubaiPath'=>$path, 
                        'status' => 0,
                    ]);
                    return redirect('office/vanuatu')->withStatus('Expense successfully updated.');
            }         
        } else {
            if($country == 'dubai') {
                Dubai::where('id', $id)->update(['description' => $request->input('description'),'total'=>$request->input('total')]);
                return redirect('office/dubai')->withStatus('Expense successfully updated.');
            } elseif($country == 'istanbul') {
                Turkey::where('id', $id)->update(['description' => $request->input('description'),'total'=>$request->input('total')]);
                return redirect('office/turkey')->withStatus('Expense successfully updated.');
            } else {
                Vanuatu::where('id', $id)->update(['description' => $request->input('description'),'total'=>$request->input('total')]);
                return redirect('office/vanuatu')->withStatus('Expense successfully updated.');
            }
        }      
                        
    }

    public function updateB(Request $request, EditInvoices $editInvoices)
    {
        $country = $request->country;        
        $id = $request->my_id;       
        
        if($request->dubaiPath) {
            $path = request()->dubaiPath->store('dubai_invoices', 'public');
            if($country == 'dubai') {
                DubaiCash::where('id', $id)->update(
                    [
                        'receive' => $request->input('receive'),
                        'spend'=>$request->input('spend'),
                        'dubaiPath'=>$path, 
                        'status' => 0,
                    ]);
                    return redirect('cash/dubai')->withStatus('Expense successfully updated.');
            } elseif($country == 'istanbul') {
                IstanbulCash::where('id', $id)->update(
                    [
                        'receive' => $request->input('receive'),
                        'spend'=>$request->input('spend'),
                        'dubaiPath'=>$path, 
                        'status' => 0,
                    ]);
                    return redirect('cash/istanbul')->withStatus('Expense successfully updated.');
            } else {
                VanuatuCash::where('id', $id)->update(
                    [
                        'receive' => $request->input('receive'),
                        'spend'=>$request->input('spend'),
                        'dubaiPath'=>$path, 
                        'status' => 0,
                    ]);
                    return redirect('cash/vanuatu')->withStatus('Expense successfully updated.');
            }         
        } else {
            if($country == 'dubai') {
                DubaiCash::where('id', $id)->update(['receive' => $request->input('receive'),'spend'=>$request->input('spend')]);
                return redirect('cash/dubai')->withStatus('Expense successfully updated.');
            } elseif($country == 'istanbul') {
                IstanbulCash::where('id', $id)->update(['receive' => $request->input('receive'),'spend'=>$request->input('spend')]);
                return redirect('cash/istanbul')->withStatus('Expense successfully updated.');
            } else {
                VanuatuCash::where('id', $id)->update(['receive' => $request->input('receive'),'spend'=>$request->input('spend')]);
                return redirect('cash/vanuatu')->withStatus('Expense successfully updated.');
            }
        }      
                
        return redirect()->back()->withStatus('Successfully updated.');
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
