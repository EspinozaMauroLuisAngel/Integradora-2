<?php

namespace App\Http\Controllers;

use App\Models\temperature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class temperatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $temperature=DB::table('temperature')
                ->select('id', 'grados', 'location', 'created_at')
                ->where('grados','LIKE','%'.$texto.'%')
                ->orWhere('location','LIKE','%'.$texto.'%')
                ->orderBy('created_at', 'asc')
                ->paginate(10);
        return view('temperature.index', compact('temperature', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $temperature = temperature::all();
        return view('temperature.add',compact('temperature'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $temperature = new temperature();
        $temperature->grados = $request->post('grados');
        $temperature->location = $request->post('location');
        $temperature->created_at = $request->post('created_at');
        $temperature->save();
        return redirect()->route("temperature.index")->with("success", "¡Tu Registro Fue Agregado con exito!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $temperature = temperature::findOrFail($id);
        return view('temperature.edit', compact('temperature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $temperature = temperature::findOrFail($id);
        $temperature->grados = $request->input('grados');
        $temperature->location = $request->input('location');
        $temperature->created_at = $request->input('created_at');
        $temperature->save();
        return redirect()->route("temperature.index")->with("success", "¡Tu Registro Fue Editado con exito!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $temperatur = temperature::find($id);
        $temperatur->forceDelete();
        return redirect()->route("temperature.index")->with("success", "¡Tu Registro Fue Eliminado con exito!");

    }
     
    public function guardar(Request $request){
        $temperature = new temperature();
        $temperature->grados = $request->temperature;
        $temperature->save();
    }

}
