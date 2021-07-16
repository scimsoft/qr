<?php

namespace App\Http\Controllers;

use App\Models\QRRedirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use function use_soap_error_handler;

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
        if(Auth::user()->isAdmin()){

            $qrredirects = QRRedirect::latest()->orderBy('soureURL')->paginate(50);
        }else {
            $qrredirects = QRRedirect::where('user_id', Auth::user()->id)->latest()->paginate(50);
        }
        return view('qrredirect.index', compact('qrredirects'))
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
        $user=auth()->user();
        return view('qrredirect.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'soureURL' => 'required',
            'destinyURL' => 'required',
            'active' => 'required',
            'user_id' => 'required'
        ]);

        $qrlink = QRRedirect::create($request->all());
        $qrlink->destinyurl = auth()->user()->baseurl . $qrlink->destinyurl;

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
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'soureURL' => 'required',
            'destinyURL' => 'required',
            'active' => 'required',
            'user_id' => 'required'
        ]);
        //dd($request->all());
        $qRRedirect = QRRedirect::find($id);
        $qRRedirect->soureURL = $request->soureURL;

        $qRRedirect->destinyURL = auth()->user()->baseurl .$request->destinyURL;
        $qRRedirect->active = $request->active;
        $qRRedirect->user_id = $request->user_id;

        $qRRedirect->save();

        return redirect()->route('qrredirect.index')
            ->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QRRedirect  $qRRedirect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $requets,QRRedirect $qRRedirect)
    {
        //

        QRRedirect::find($requets->id)->delete();

        return redirect()->route('qrredirect.index')
            ->with('success', 'Project deleted successfully');
    }
}
