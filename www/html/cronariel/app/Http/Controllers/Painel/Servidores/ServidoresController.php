<?php

namespace App\Http\Controllers\Painel\Servidores;



use App\Servidores;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServidoresController extends Controller
{

    public function index()
    {
        $servidores = $this->model->where('id', '!=', 0)->get();
        return view('Painel.Servidores.index', compact('title', 'servidores'));
    }


    public function create()
    {
        $user = Auth()->User();
        return view('Painel.Servidores.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ip'=>'required',
            'so'=>'required',
        ]);

        $servidor = new Servidores([
            'ip' => $request->get('ip'),
            'so' => $request->get('so'),
        ]);
        $servidor->save();
        return redirect('Painel/Servidores')->with('success', 'Servidor salvo!');
    }

}
