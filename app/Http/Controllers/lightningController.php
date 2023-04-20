<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\lightning;

use Illuminate\Support\Facades\DB;

class lightningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $texto=trim($request->get('texto'));
        $lightning=DB::table('lightning')
                ->select('id', 'tuxes', 'location', 'created_at')
                ->where('tuxes','LIKE','%'.$texto.'%')
                ->orWhere('location','LIKE','%'.$texto.'%')
                ->orderBy('created_at', 'asc')
                ->paginate(10);
        return view('lightning.index', compact('lightning', 'texto'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lightning = lightning::all();
        return view('lightning.add',compact('lightning'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lightning = new lightning();
        $lightning->tuxes = $request->post('tuxes');
        $lightning->location = $request->post('location');
        $lightning->created_at = $request->post('created_at');
        $lightning->save();
        return redirect()->route("lightning.index")->with("success", "¡Tu Registro Fue Agregado con exito!");
        
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
        $lightning = lightning::findOrFail($id);
        return view('lightning.edit', compact('lightning'));
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
        $lightning = lightning::findOrFail($id);
        $lightning->tuxes = $request->input('tuxes');
        $lightning->location = $request->input('location');
        $lightning->created_at = $request->input('created_at');
        $lightning->save();
        return redirect()->route("lightning.index")->with("success", "¡Tu Registro Fue Editado con exito!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lightnin = lightning::find($id);
        $lightnin->forceDelete();
        return redirect()->route("lightning.index")->with("success", "¡Tu Registro Fue Eliminado con exito!");
        
    }

    public function guardar(Request $request){
        $lightning = new lightning();
        $lightning->tuxes = $request->lightning;
        $lightning->save();
    }

}
