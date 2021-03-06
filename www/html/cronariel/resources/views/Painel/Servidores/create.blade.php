<!DOCTYPE html>
<html>
@includeIf('Painel/Layout/head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @includeIf('Painel/Layout/header')
    @includeIf('Painel/Layout/sidebar_lateral')
    <div class="content-wrapper">
        <div class="content-header"
        >
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            Novo Servidor
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Painel.index')}}">Home</a></li>

                            @if(isset($urlAtual))
                                <li class="breadcrumb-item active">{{$urlAtual}}</li
                            @else
                                <li class="breadcrumb-item active">Novo Servidor</li
                            @endif
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Cadastro</h3>
                            </div>


                            <form role="form" id="novoServidor" method="post" action="{{ route('servidores.store') }}">
                                @csrf
                                <div class="card-body">


                                    <div class="form-group">

                                        <label for="ip">IP</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                                            </div>
                                            <input type="text" name="ip" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
                                        </div>


                                    </div>


                                    <div class="form-group">
                                        <label>Sistema Operacional</label>
                                        <select type="text" for="so" name="so" class="form-control">
                                            <option>Ubuntu</option>
                                            <option>RHEL</option>
                                            <option>SUSE</option>
                                            <option>Debian</option>
                                            <option>CentOS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    @includeIf('Painel/Layout/footer')
</div>
@includeIf('Painel/Layout/javascript')
</body>
</html>


