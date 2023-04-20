<?php

namespace App\Http\Controllers;

use App\Models\humidity;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class humidityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $texto=trim($request->get('texto'));
        $humidity=DB::table('humiditie')
                ->select('id', 'porcentaje', 'location', 'created_at')
                ->where('porcentaje','LIKE','%'.$texto.'%')
                ->orWhere('location','LIKE','%'.$texto.'%')
                ->orderBy('created_at', 'asc')
                ->paginate(10);
        return view('humidity.index', compact('humidity', 'texto'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $humidity = humidity::all();
        return view('humidity.add',compact('humidity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $humidity = new humidity();
        $humidity->porcentaje = $request->post('porcentaje');
        $humidity->location = $request->post('location');
        $humidity->created_at = $request->post('created_at');
        $humidity->save();
        return redirect()->route("humidity.index")->with("success", "¡Tu Registro Fue Agregado con exito!");

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
        $humidity = humidity::findOrFail($id);
        return view('humidity.edit', compact('humidity'));
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
        $humidity = humidity::findOrFail($id);
        $humidity->porcentaje = $request->input('porcentaje');
        $humidity->location = $request->input('location');
        $humidity->created_at = $request->input('created_at');
        $humidity->save();
        return redirect()->route("humidity.index")->with("success", "¡Tu Registro Fue Editado con exito!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $humidit = humidity::find($id);
        $humidit->forceDelete();
        return redirect()->route("humidity.index")->with("success", "¡Tu Registro Fue Eliminado con exito!");
    }

    public function guardar(Request $request){
        $humidity = new humidity();
        $humidity->porcentaje = $request->humidity;
        $humidity->save();
    }
    

}
