<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;  //Invocamos el archivo ya preparado que consulta la tabla de usuarios

class UserController extends Controller
{
    public function index(){
        //Consulta datos
        $users = User::latest()->get();
        //Pasar los datos a la vista mediante un array
        return view('users.index', [
            'users' => $users 
        ]);
    }

    public function store( Request $request){
        //Crear un usuario con los datos siguientes
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        //retornar a la vista anterior con el siguiente metodo
        return back();
    }
    //Recibimos un usuario  User=archivo que consulta las tabla $user=ID del usuario 
    public function destroy(User $user){
        //Eliminamos
        $user->delete();
        //regresamos a la vista anterior
        return back();
    }
}
