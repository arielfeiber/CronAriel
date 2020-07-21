<!DOCTYPE html>
<html>
@includeIf('Painel/Layout/head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @includeIf('Painel/Layout/header')
    @includeIf('Painel/Layout/sidebar_lateral')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">


                        @if(session()->get('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif


                        <h1 class="m-0 text-dark">
                            Jobs
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Painel.index')}}">Home</a></li>

                            @if(isset($urlAtual))
                                <li class="breadcrumb-item active">{{$urlAtual}}</li
                            @else
                                <li class="breadcrumb-item active">Jobs</li
                            @endif
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="row" style="
    padding-left: 20px;
    padding-right: 20px;
">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de jobs</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                       placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 600px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>Minuto</th>
                                <th>Hora</th>
                                <th>Dia</th>
                                <th>Mês</th>
                                <th>Dia da Semana</th>
                                <th>Comando</th>
                                <th>Próxima Execução</th>
                                <th>Configurações</th>
                            </tr>
                            </thead>
                            @foreach($jobs as $job)
                            <tbody>
                            <tr>
                                <td>{{$job->minuto}}</td>
                                <td>{{$job->hora}}</td>
                                <td>{{$job->dia_mes}}</td>
                                <td>{{$job->mes}}</td>
                                <td>{{$job->dia_semana}}</td>
                                <td>{{$job->comando}}</td>
                                <td>{{$job->tempoRestante()}}</td>
                                <td>
                                    <a href="{{ route('jobs.edit', ['id' => $job->id]) }}" class="btn btn-warning" style="
    padding-left: 8px;
    padding-right: 6px;
    padding-top: 3px; padding-bottom: 3px;"><i class="fa fa-edit"></i></a>
                                    @csrf
                                    @method("delete")
                                    <a href="{{ route('jobs.destroy', ['id' => $job->id]) }}" method="post" class="btn btn-danger"
                                       style="
    padding-left: 8px;
    padding-right: 6px;
    padding-top: 3px;
    padding-bottom: 3px;
"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <a href="{{ route('jobs.create', ['server_id' => $job->server_id]) }}" type="button" class="btn btn-outline-success"
           style="margin-left: 19px;">Novo job </a>

    </div>
    @includeIf('Painel/Layout/footer')
</div>
@includeIf('Painel/Layout/javascript')
</body>
</html>


