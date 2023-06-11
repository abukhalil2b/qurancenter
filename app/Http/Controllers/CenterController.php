<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\User;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $centers = Center::all();

        return view('admin.center.index',compact('centers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['title'=>'required']);

        Center::create(['title'=>$request->title]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Center $center)
    {
        
        return view('admin.center.show',compact('center'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Center $center)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Center $center)
    {
        $request->validate(['title'=>'required']);
        
        $center->update(['title'=>$request->title]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Center $center)
    {
        //
    }
}
