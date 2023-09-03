<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index() //obtiene todo los registro de nuestra tabla
    {
        return Cliente::all(); //all accede a todo los registro de la tabla
    }

    public function store(Request $request) //Este recibe la información y guarda en nuestra tabla db
    {
        //dd($request->all()); //esto le da un estilo al retorno
        $request->validate([ //esto hace que se haga de manera requira los datos, que sean validados
            'nombre' => 'required',
            'tipo' => 'required',
            'habilidad' => 'required',
            'poder' => 'required'
        ]);
        $cliente = new Cliente;
        $cliente -> nombre = $request->nombre;
        $cliente -> tipo = $request->tipo;
        $cliente -> habilidad = $request->habilidad;
        $cliente -> poder = $request->poder;
        $cliente->save(); //guarda los datos

        return $cliente;
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente) //Nos permite mostrar la información de un solo cliente
    {
        return $cliente;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente) //actualiza la información de los db
    {
        $request->validate([ //esto hace que se haga de manera requira los datos, que sean validados
            'nombre' => 'required',
            'tipo' => 'required',
            'habilidad' => 'required',
            'poder' => 'required'
        ]);
        $cliente -> nombre = $request->nombre;
        $cliente -> tipo = $request->tipo;
        $cliente -> habilidad = $request->habilidad;
        $cliente -> poder = $request->poder;
        $cliente->update(); //actualiza los datos

        return $cliente;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)// esto elimina un registro
    {
        $cliente = Cliente::find($id);
        if (is_null($cliente)) {
            return response()->json('El regitro ya ha sido eliminado', 404);
        }
        $cliente->delete();
        return response()->noContent();
    }
}
