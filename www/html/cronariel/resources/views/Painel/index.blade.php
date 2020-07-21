@extends ("Painel.Layout.index")

@section("content")

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            @inject('usuarios','App\User')
                            <h3>{{$usuarios->count()}}</h3>
                            <p>Usuários</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{route('Painel.Usuarios.index')}}" class="small-box-footer">Administrar <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">

                            @inject('alertas','App\Alerta')
                            <h3>{{$alertas->count()}}</h3>
                            <p>Alertas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <a href="{{route('Painel.Alertas.index')}}" class="small-box-footer">Verificar <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            @inject('servidores','App\Servidores')
                            <h3>{{$servidores->count()}}</h3>
                            <p>Servidores</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-server"></i>
                        </div>
                        <a href="{{route('servidores.index')}}" class="small-box-footer">Visualizar<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
