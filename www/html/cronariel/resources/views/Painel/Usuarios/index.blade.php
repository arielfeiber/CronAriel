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
                            Usuários
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Painel.index')}}">Home</a></li>

                            @if(isset($urlAtual))
                                <li class="breadcrumb-item active">{{$urlAtual}}</li
                            @else
                                <li class="breadcrumb-item active">Usuários</li
                            @endif
                        </ol>
                    </div>
                </div>
            </div>
        </div>




        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Usuários</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Data de Criação</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->id}}</td>
                                    <td>{{$usuario->name}}</td>
                                    <td>{{$usuario->email}}</td>
                                    <td>{{$usuario->created_at->diffForHumans()}}</td>
                                    <td><a href="{{ route('usuarios.edit', ['id' => $usuario->id]) }}" class="btn btn-warning" style="
    padding-left: 8px;
    padding-right: 6px;
    padding-top: 3px; padding-bottom: 3px;"><i class="fa fa-edit"></i></a>
                                        @csrf
                                        @method("delete")
                                        <a href="{{ route('usuarios.destroy', ['id' => $usuario->id]) }}" method="post" class="btn btn-danger"
                                           style="
    padding-left: 8px;
    padding-right: 6px;
    padding-top: 3px;
    padding-bottom: 3px;
"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                @endforeach


                                </tbody>

                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Data de Criação</th>
                                    <th>Ações</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->





        <a href="{{route ('Painel.Usuarios.create')}}" type="button" class="btn btn-outline-success"
           style="margin-left: 19px;">Novo Usuário </a>

    </div>
    @includeIf('Painel/Layout/footer')
</div>
@includeIf('Painel/Layout/javascript')
</body>
</html>


