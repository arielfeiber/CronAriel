<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PainelController extends Controller
{

    public $request;
    public $usuarios;


    public function __construct(Request $request, User $usuarios)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->usuarios = $usuarios;

    }

    public function index()
    {
        $user = Auth()->User();
        return view('Painel.index', compact('user'));
    }

    public function viewUsuarios()
    {
        $user = Auth()->User();
        $uri = $this->request->route()->uri();
        $exploder = explode('/', $uri);
        $uriAtual = $exploder[1];

        $usuarios = $this->usuarios->all();

        return view('Painel.Usuarios.index', compact('user', 'uriAtual', 'usuarios'));
    }

    public function viewAlertas()
    {
        $alertas = DB::select('select * from alertas');
        return view('Painel.Alertas.index', ['alertas' => $alertas]);
    }



}
