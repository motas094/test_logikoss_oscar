<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = User::paginate(5);

        return view('usuarios.index', compact('usuarios'));
    }

    public function create(){
        return view('usuarios.nuevoUsuario');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'username' => 'required|unique:users|max:255',
            'avatar' => 'nullable|image|mimes:pngmax:2048',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $usuario = new User();
        $usuario->fill($request->all());
        if($request->avatar != null){
            $request->avatar->storeAs('avatars', $request->username.'.png');
        }
        $usuario->password = bcrypt($request->password);
        $usuario->save();

        return Redirect::route('usuario.inicio');
    }

    public function edit($id){
        try{
            $usuario = User::findOrFail($id);
            return view('usuarios.actualizarUsuario', compact('usuario'));
        }catch (\Exception $e){
            return Redirect::route('usuario.inicio');
        }
    }

    public function update(Request $request){
        $request->validate([
            'id' => 'required|integer|exists:users',
            'name' => 'required|string|max:255',
            'email' => [
                'required', 'max:255',
                Rule::unique('users')->ignore($request->id),
            ],
            'username' => [
                'required', 'max:255',
                Rule::unique('users')->ignore($request->id),
            ],
            'avatar' => 'nullable|image|mimes:pngmax:2048',
            'password' => 'nullable|confirmed',
            'password_confirmation' => 'nullable',
        ]);
        try{
            $usuario = User::findOrFail($request->id);
            $usuario->fill($request->all());
            if($request->avatar != null){
                $request->avatar->storeAs('avatars', $request->username.'.png');
            }
            $usuario->password = bcrypt($request->password);
            $usuario->save();

            return Redirect::route('usuario.inicio');
        }catch (\Exception $e){
            return Redirect::route('usuario.inicio');
        }
    }

    public function destroy($id){
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return Redirect::route('usuario.inicio');
    }
}
