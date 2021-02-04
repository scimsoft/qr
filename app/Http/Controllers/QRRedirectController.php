<?php

namespace App\Http\Controllers;

use App\Models\QRRedirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class QRRedirectController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $qrredirect = QRRedirect::latest()->paginate(50);

        return view('qrredirect.index', compact('qrredirect'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('qrredirect.create');
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
            'soureURL' => 'required',
            'destinyURL' => 'required',
            'active' => 'required',
            'user_id' => 'required'
        ]);

        QRRedirect::create($request->all());

        return redirect()->route('qrredirect.index')
            ->with('success', 'qrredirect created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QRRedirect  $qRRedirect
     * @return \Illuminate\Http\Response
     */
    public function show(QRRedirect $qrredirect)
    {
        //
        return view('qrredirect.show', compact('qrredirect'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QRRedirect  $qRRedirect
     * @return \Illuminate\Http\Response
     */
    public function edit(QRRedirect $qrredirect)
    {
        //
        return view('qrredirect.edit', compact('qrredirect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QRRedirect  $qRRedirect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QRRedirect $qRRedirect)
    {
        //
//        $request->validate([
//            'soureURL' => 'required',
//            'destinyURL' => 'required',
//            'active' => 'required',
//            'user_id' => 'required'
//        ]);
       
        $ret=$qRRedirect->update($request->all());
       // dd($ret);
dd($request->all());

        return redirect()->route('qrredirect.index')
            ->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QRRedirect  $qRRedirect
     * @return \Illuminate\Http\Response
     */
    public function destroy(QRRedirect $qRRedirect)
    {
        //
        $qRRedirect->delete();

        return redirect()->route('qrredirect.index')
            ->with('success', 'Project deleted successfully');
    }
}
