<?php

namespace App\Http\Controllers\Painel\Jobs;

use App\Alerta;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Job;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {

        $id = $_GET['id'];
        $jobs = Job::all()->where('server_id', $id);

        return view('Painel.jobs.index', ['jobs' => $jobs]);
    }


    public function create()
    {

        $user = Auth()->User();
        return view('Painel.jobs.create', compact('user'));

    }


    public function store(Request $request)
    {
        $url = $_SERVER['HTTP_REFERER'];
        $id = explode('/', $url);
        $server_id = $id[8];

        $request->validate([
            'minuto' => 'required',
            'hora' => 'required',
            'dia_mes' => 'required',
            'mes' => 'required',
            'dia_semana' => 'required',
            'comando' => 'required'
        ]);
        $job = new Job([
            'server_id' => $server_id,
            'minuto' => $request->get('minuto'),
            'hora' => $request->get('hora'),
            'dia_mes' => $request->get('dia_mes'),
            'mes' => $request->get('mes'),
            'dia_semana' => $request->get('dia_semana'),
            'comando' => $request->get('comando'),
        ]);

        $job->save();

        $descricao = $job->minuto . ' ' . $job->hora . ' ' . $job->dia_mes . ' ' . $job->mes . ' ' . $job->dia_semana . ' ' . $job->comando;

        $server_ip = DB::select('SELECT ip FROM servidores WHERE id = ' . $server_id);
        $server_ip = $server_ip[0]->ip;

        $alerta = new Alerta([
            'acao' => 'Novo Job Adicionado',
            'descricao' => $descricao,
            'ip_server' => $server_ip,
        ]);
        $alerta->save();


        return redirect('Painel/Servidores');

    }


    public function edit($id)
    {
        $job = Job::find($id);
        return view('Painel.jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'minuto' => 'required',
            'hora' => 'required',
            'dia_mes' => 'required',
            'mes' => 'required',
            'dia_semana' => 'required',
            'comando' => 'required'
        ]);
        $job = Job::find($id);
        $job->minuto = $request->get('minuto');
        $job->hora = $request->get('hora');
        $job->dia_mes = $request->get('dia_mes');
        $job->mes = $request->get('mes');
        $job->dia_semana = $request->get('dia_semana');
        $job->comando = $request->get('comando');

        $job->save();

        $url = $_SERVER['HTTP_REFERER'];
        $server_ip = explode('/', $url);
        $server_ip = $server_ip[8];


        $server_ip = DB::select('SELECT server_id FROM jobs WHERE id = ' . $server_ip);
        $server_ip = $server_ip[0]->server_id;
        $server_ip = DB::select('SELECT ip FROM servidores WHERE id = ' . $server_ip);
        $server_ip = $server_ip[0]->ip;

        $descricao = $job->minuto . ' ' . $job->hora . ' ' . $job->dia_mes . ' ' . $job->mes . ' ' . $job->dia_semana . ' ' . $job->comando;

        $alerta = new Alerta([
            'acao' => 'Job Editado',
            'descricao' => $descricao,
            'ip_server' => $server_ip,
        ]);
        $alerta->save();

        return redirect('Painel/Servidores');
    }

    public function destroy($id)
    {
        $url = $_SERVER['HTTP_REFERER'];
        $server_ip = explode('/', $url);
        $server_ip = explode('=', $server_ip[6]);
        $server_ip = $server_ip[1];
        $ip = DB::select('SELECT ip FROM servidores WHERE id = ' . $server_ip);
        $server_ip = $ip[0]->ip;

        $descricao = DB::select('SELECT * FROM jobs WHERE id = ' . $id);
        $descricao = $descricao[0]->minuto.' '.$descricao[0]->hora.' '.$descricao[0]->dia_mes.' '.$descricao[0]->mes.' '.$descricao[0]->dia_semana.' '.$descricao[0]->comando;

        $alerta = new Alerta([
            'acao' => 'Job Excluído',
            'descricao' => $descricao,
            'ip_server' => $server_ip,
        ]);
        $alerta->save();

        $jobs = Job::where('id', $id)->delete();
        return redirect('/Painel/Servidores');
    }
}
