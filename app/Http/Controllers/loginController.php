<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;


class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
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
    
   /* public function store()
   {
    if(auth()->attempt(request(['email', 'password'])) == false) {
        return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again',
            ]);

        } else {
            if(auth()->user()->role == 'admin') {
                return redirect()->route('admin.index');
            } else {
                return 'user';
            }
        }
    }  */

    public function store (Request $request){
        $email= $request->input('email');
        $pass= $request->input('password');
        $consulta= User::where ('email', '=', $email)
                        ->where('password', '=', $pass)
                        ->get();
        if(count($consulta)==0 or $consulta[0]->activo == '0'){
        alert()->error('Email y/o Contraseña Incorrecto');
        return view('auth.login');
        }
        else{
           $request->session()->put('session_id', $consulta[0]->id_usuario);
           $request->session()->put('session_nombre', $consulta[0]->nombre);
           $request->session()->put('session_tipo', $consulta[0]->nivel);
           $session_id = $request->session()->get('session_id');
           $session_nombre = $request->session()->get('session_nombre');
           $session_tipo = $request->session()->get('session_tipo');
           if($session_id == 1){      
        }
           else{ 
        alert()->success('Bienvenido Has Iniciado Secion');
               return redirect()->route('admin.index');
            }
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
