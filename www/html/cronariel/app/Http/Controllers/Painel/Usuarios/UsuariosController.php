<?php

namespace App\Http\Controllers\Painel\Usuarios;


use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuariosController extends Controller
{

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $title = 'Painel de usuários';
        $usuarios = $this->model->where('id', '!=', 0)->get();
        return view('Painel.Usuarios.index', compact('title', 'usuarios'));
    }


    public function create()
    {
       $user = Auth()->User();
        return view('Painel.Usuarios.create', compact('user'));
       // return view('Painel.Usuarios.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);
        $user->save();
        return redirect('Painel/Usuarios')->with('success', 'Usuário salvo!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('usuarios.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        $user = User::find($id);
        $user->name =  $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->save();

        return redirect('Painel/Usuarios')->with('success', 'Usuário atualizado!');
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('Painel.Usuarios.index')->with('success', 'Usuário excluído!');
    }
}
