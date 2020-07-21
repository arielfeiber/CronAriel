<?php

namespace App\Http\Controllers\Painel\Usuarios;


use App\Servidores;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $usuarios = User::all();
        return view('Painel.Usuarios.index', ['usuarios' => $usuarios]);


        //$title = 'Painel de usuários';
        //$usuarios = $this->model->where('id', '!=', 0)->get();
        //return view('Painel.Usuarios.index', compact('title', 'usuarios'));
    }


    public function create()
    {
        $user = Auth()->User();
        return view('Painel.Usuarios.create', compact('user'));

    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request['password']),
        ]);
        $user->save();
        return redirect('Painel/Usuarios');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $usuario = User::find($id);
        return view('Painel.Usuarios.edit', compact('usuario'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $usuario = User::find($id);
        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->password = Hash::make($request['password']);
        $usuario->save();
        return redirect('Painel/Usuarios');
    }


    public function destroy($id)
    {

        $usuarios = User::where('id', $id)->delete();
        return redirect('Painel/Usuarios');
    }
}
