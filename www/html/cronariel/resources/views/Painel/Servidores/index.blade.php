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
                            Centralização de Servidores
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Painel.index')}}">Home</a></li>

                            @if(isset($urlAtual))
                                <li class="breadcrumb-item active">{{$urlAtual}}</li
                            @else
                                <li class="breadcrumb-item active">Centralização de Servidores</li
                            @endif
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    @foreach($servidores as $servidor)

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fab fa-linux"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Sistema Operacional <small>{{$servidor->so}}</small></span>
                                <span class="info-box-number">IP <small>{{$servidor->ip}}</small></span>
                                <a href="{{ route('jobs.index', ['id' => $servidor->id]) }}" class="small-box-footer">Acessar jobs <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    @endforeach


                    <!-- /.col -->
                </div>
                <!-- /.row -->


            </div><!--/. container-fluid -->
        </section>


    </div>
    @includeIf('Painel/Layout/footer')
</div>
@includeIf('Painel/Layout/javascript')
</body>
</html>


