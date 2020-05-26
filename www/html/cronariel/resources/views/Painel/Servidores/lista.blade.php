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
                            Servidores
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Painel.index')}}">Home</a></li>

                            @if(isset($urlAtual))
                                <li class="breadcrumb-item active">{{$urlAtual}}</li
                            @else
                                <li class="breadcrumb-item active">Servidores</li
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
                        <h3 class="card-title">Lista de servidores cadastrados</h3>

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
                                <th>ID</th>
                                <th>IP</th>
                                <th>Data de cadastro</th>
                                <th>Sistema Operacional</th>
                                <th>Configurações</th>
                            </tr>
                            </thead>

                            @foreach($servidores as $servidor)
                                <tbody>
                                <tr>
                                    <td>{{$servidor->id}}</td>
                                    <td>{{$servidor->ip}}</td>
                                    <td>{{ \Carbon\Carbon::parse($servidor->created_at)->diffForHumans() }}</td>
                                    <td>{{$servidor->so}}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning" style="
    padding-left: 8px;
    padding-right: 6px;
    padding-top: 3px; padding-bottom: 3px;"><i class="fa fa-edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" method="post" class="btn btn-danger" style="
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

        <a href="{{route ('Painel.Servidores.create')}}" type="button" class="btn btn-outline-success"
           style="margin-left: 19px;">Adicionar novo servidor </a>

    </div>
    @includeIf('Painel/Layout/footer')
</div>
@includeIf('Painel/Layout/javascript')
</body>
</html>


