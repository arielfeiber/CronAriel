<?php

namespace App\Http\Controllers\Painel\Servidores;

use App\Job;
use App\Servidores;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ServidoresController extends Controller
{

    protected $model;

    public function __construct(Servidores $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $servidores = Servidores::all();
        //   $servidores = DB::select('select * from servidores');
        return view('Painel.Servidores.index', ['servidores' => $servidores]);
    }

    public function viewServidores()
    {
        $servidores = DB::select('select * from servidores');
        return view('Painel.Servidores.lista', ['servidores' => $servidores]);
    }

    public function create()
    {
        $user = Auth()->User();
        return view('Painel.Servidores.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ip' => 'required',
            'so' => 'required'
        ]);
        $servidor = new Servidores([
            'ip' => $request->get('ip'),
            'so' => $request->get('so'),
        ]);
        $servidor->save();
        $id = $servidor->id;
        $this->salvarCron($request->get('ip'), $id);

        return redirect('Painel/Servidores/lista');
    }

    public function salvarCron($ip, $id)
    {
        $connection = ssh2_connect($ip, 22);
        ssh2_auth_password($connection, 'cronariel', '1234567890');

        //  Execute um comando que provavelmente irá gravar no stderr
        $stream = ssh2_exec($connection, "crontab -l");
        $errorStream = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);

        //Ativar bloqueio para ambos os fluxos
        stream_set_blocking($errorStream, true);
        stream_set_blocking($stream, true);

        $jobs = stream_get_contents($stream);
        $lines = explode("\n", trim($jobs));
        foreach ($lines as $line) {
            $array = explode(" ", $line);
            $job = new Job;
            $job->server_id = $id;
            $job->minuto = $array[0];
            $job->hora = $array[1];
            $job->dia_mes = $array[2];
            $job->mes = $array[3];
            $job->dia_semana = $array[4];
            $job->comando = implode(" ", array_slice($array, 5));
            $job->save();
        }
    }

    public function edit($id)
    {
        $servidor = Servidores::find($id);
        return view('Painel.Servidores.edit', compact('servidor'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ip' => 'required',
            'so' => 'required'
        ]);
        $servidor = Servidores::find($id);
        $servidor->ip = $request->get('ip');
        $servidor->so = $request->get('so');
        $servidor->save();
        return redirect('Painel/Servidores/lista');
    }

    public function destroy($id)
    {
        $servidores = Servidores::where('id', $id)->delete();
        return redirect('Painel/Servidores/lista');
    }

}
