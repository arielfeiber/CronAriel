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
                            Editar Servidor
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Painel.index')}}">Home</a></li>

                            @if(isset($urlAtual))
                                <li class="breadcrumb-item active">{{$urlAtual}}</li
                            @else
                                <li class="breadcrumb-item active">Editar Servidor</li
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
                                <h3 class="card-title">Editar dados</h3>
                            </div>


                            <form role="form" id="novoServidor" method="post" action="{{ route('servidores.update', ['id' => $servidor->id]) }}">
                                @method('PATCH')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="ip">IP</label>
                                        <input type="text" name="ip" value={{ $servidor->ip }} class="form-control" placeholder="IP">
                                    </div>
                                    <div class="form-group">
                                        <label>Sistema Operacional</label>
                                        <select type="text" for="so" name="so" value={{ $servidor->so }} class="form-control">
                                            <option>Ubuntu</option>
                                            <option>Mint</option>
                                            <option>Debian</option>
                                            <option>Fedora</option>
                                            <option>OpenSuse</option>
                                            <option>Red Hat Enterprise Linux</option>
                                            <option>CentOS</option>
                                            <option>Arch Linux</option>
                                            <option>Gentoo</option>
                                            <option>Mageia</option>
                                            <option>Backtrack / Kali Linux</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
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


