<?php

namespace App\Http\Controllers;

use App\Models\fan;
use App\Http\Requests\StorefanRequest;
use App\Http\Requests\UpdatefanRequest;
use Illuminate\Http\Request;


class FanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fan = fan::all();
        return view('fan.index', compact('fan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fan = fan::all();
        return view('fan.add',compact('fan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorefanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorefanRequest $request)
    {
        $fan = new fan();
        $fan->created_at = $request->post('created_at');
        $fan->updated_at = $request->post('updated_at');
        $fan->save();
        return redirect()->route("fan.index")->with("success", "¡Tu Registro Fue Agregado con exito!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fan  $fan
     * @return \Illuminate\Http\Response
     */
    public function show(fan $fan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fan  $fan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fan = fan::findOrFail($id);
        return view('fan.edit', compact('fan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefanRequest  $request
     * @param  \App\Models\fan  $fan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fan = fan::findOrFail($id);
        $fan->created_at = $request->input('created_at');
        $fan->updated_at = $request->input('updated_at');
        $fan->save();
        return redirect()->route("fan.index")->with("success", "¡Tu Registro Fue Editado con exito!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fan  $fan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fa = fan::find($id);
        $fa->forceDelete();
        return redirect()->route("fan.index")->with("success", "¡Tu Registro Fue Eliminado con exito!");
    }

    public function guardar(Request $request){
        $fan = new fan();
        $fan->created_at = $request->fan;
        $fan->updated_at = $request->fan;
        $fan->save();
    }

    
}
