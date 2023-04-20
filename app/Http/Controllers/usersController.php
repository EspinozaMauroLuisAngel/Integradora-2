<?php

namespace App\Http\Controllers;

use App\Models\user;

use PDF;

use Illuminate\Http\Request;

use App\Http\Requests\UpdateImageRequest;

use Illuminate\Support\Facades\DB;


class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $users=DB::table('user')
                ->select('id', 'foto', 'name', 'lastname', 'date', 'email', 'password',  'role', 'created_at')
                ->where('name','LIKE','%'.$texto.'%')
                ->orWhere('lastname','LIKE','%'.$texto.'%')
                ->orderBy('password', 'asc')
                ->paginate(10);
        return view('users.index', compact('users', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = user::all();
        return view('users.add',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new user();
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $destinationpath = 'img/';
            $filename = time(). '-' . $file->getClientOriginalName();
            $uploadSucces = $request->file('foto')->move($destinationpath, $filename);
            $users->foto = $destinationpath . $filename;  
        }
        $users->name = $request->post('name');
        $users->lastname = $request->post('lastname');
        $users->date = $request->post('date');
        $users->email = $request->post('email');
        $users->password = $request->post('password');
        $users->role = $request->post('role');
        $users->save();
        return redirect()->route("users.index")->with("success", "¡Tu Registro Fue Agregado con exito!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = user::findOrFail($id);
        return view('users.edit', compact('users'));
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
        $users = user::find($id);
        $users->name = $request->input('name');
        $users->lastname = $request->input('lastname');
        $users->date = $request->input('date');
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        $users->role = $request->input('role');
        $users->save();
        return redirect()->route("users.index")->with("success", "¡Tu Registro Fue Editado con exito!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::find($id);
        $user->forceDelete();
        return redirect()->route("users.index")->with("success", "¡Tu Registro Fue Eliminado con exito!");
    }
        
}
