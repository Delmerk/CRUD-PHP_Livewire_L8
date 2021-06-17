<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['usuarios']=Usuario::paginate(5);
        return view('usuario.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuario.create');
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
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'Documento'=>'required|string|max:20',
            'Codigo'=>'required|string|max:20',
            'Nacimiento'=>'required|date'
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Apellidos.required'=>'Los Apellidos son requeridos',
            'Nacimiento.required'=>'La fecha de Nacimiento es requerida'
        ];

        $this->validate($request, $campos, $mensaje,);



        $datosUsuario=request()->except('_token');

        Usuario::insert($datosUsuario);
        return redirect('usuario')->with('mensaje', 'Usuario creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario=Usuario::findOrFail($id);
        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'Documento'=>'required|string|max:20',
            'Codigo'=>'required|string|max:20',
            'Nacimiento'=>'required|date'
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Apellido.required'=>'Los Apellidos son requeridos',
            'Nacimiento.required'=>'La fecha de Nacimiento es requerida'
        ];

        $this->validate($request, $campos, $mensaje,);


        $datosUsuario=request()->except('_token','_method');
            
            $usuario=Usuario::findOrFail($id);
        
        Usuario::where('id','=',$id)->update($datosUsuario);

        $usuario=Usuario::findOrFail($id);
        return view('usuario.edit', compact('usuario'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $usuario=Usuario::findOrFail($id);
            Usuario::destroy($id);
        return redirect('usuario')->with('mensaje', 'Usuario eliminado correctamente');

    }
}
