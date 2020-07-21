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
                            Novo Job
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Painel.index')}}">Home</a></li>

                            @if(isset($urlAtual))
                                <li class="breadcrumb-item active">{{$urlAtual}}</li
                            @else
                                <li class="breadcrumb-item active">Novo Job</li
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


                            <form class="form-horizontal" method="post" action="{{ route('jobs.update', ['id' => $job->id]) }}">
                                @method('PATCH')
                                                                @csrf
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="minuto" class="col-sm-2 col-form-label">Minuto</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="minuto" name="minuto" value={{ $job->minuto }}>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="hora" class="col-sm-2 col-form-label">Hora</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="hora" name="hora" value={{ $job->hora }}>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="dia_mes" class="col-sm-2 col-form-label">Dia</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="dia_mes" name="dia_mes" value={{ $job->dia_mes }}>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="mes" class="col-sm-2 col-form-label">Mês</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="mes" name="mes" value={{ $job->mes }}>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="dia_semana" class="col-sm-2 col-form-label">Dia da Semana</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="dia_semana" name="dia_semana" value={{ $job->dia_semana }}>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="comando" class="col-sm-2 col-form-label">Comando</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="comando" name="comando" value={{ $job->comando }}>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Sugestões</label>
                                        <select class="form-control" name="sugestao" id="sugestao">
                                            <option>Escolha uma opção</option>
                                            <option data-valor1="*" data-valor2="*" data-valor3="*" data-valor4="*" data-valor5="*">Executar job a cada minuto</option>
                                            <option data-valor1="*/2" data-valor2="*" data-valor3="*" data-valor4="*" data-valor5="*">Executar job a cada 2 minutos</option>
                                            <option data-valor1="*/15" data-valor2="*" data-valor3="*" data-valor4="*" data-valor5="*">Executar job a cada 15 minutos</option>
                                            <option data-valor1="30" data-valor2="*" data-valor3="*" data-valor4="*" data-valor5="*">Executar job a cada 30 minutos</option>
                                            <option data-valor1="0" data-valor2="*" data-valor3="*" data-valor4="*" data-valor5="*">Executar job a cada hora</option>
                                            <option data-valor1="0" data-valor2="0" data-valor3="*" data-valor4="*" data-valor5="*">Executar job todas meia-noite</option>
                                            <option data-valor1="0" data-valor2="2" data-valor3="*" data-valor4="*" data-valor5="*">Executar job às 2 da manhã todos os dias</option>
                                            <option data-valor1="0" data-valor2="0" data-valor3="1" data-valor4="*" data-valor5="*">Executar job no primeiro dia do mês</option>
                                            <option data-valor1="0" data-valor2="0" data-valor3="15" data-valor4="*" data-valor5="*">Executar job a cada 15 dias do mês</option>
                                            <option data-valor1="0" data-valor2="0" data-valor3="0" data-valor4="12" data-valor5="*">Executar job no dia primeiro de dezembro a meia-noite</option>
                                            <option data-valor1="0" data-valor2="0" data-valor3="1" data-valor4="*/2" data-valor5="*">Executar job  a meia-noite no primeiro dia do mês a cada 2 meses</option>
                                            <option data-valor1="0" data-valor2="0" data-valor3="*" data-valor4="*" data-valor5="6">Executar job no sábado à meia-noite</option>
                                            <option data-valor1="0" data-valor2="0" data-valor3="*" data-valor4="*" data-valor5="0">Executar job no domingo à meia-noite</option>
                                            <option data-valor1="0" data-valor2="0" data-valor3="*" data-valor4="*" data-valor5="1-5">Executar job à meia-noite todos os dias da semana, de segunda a sexta-feira</option>
                                            <option data-valor1="0" data-valor2="0" data-valor3="1" data-valor4="*/6" data-valor5="*">Executar job à meia-noite no primeiro dia do mês a cada 6 meses</option>
                                            <option data-valor1="0" data-valor2="0" data-valor3="1" data-valor4="*/3" data-valor5="*">Executar job à meia-noite no primeiro dia do mês a cada 3 meses</option>
                                            <option data-valor1="0" data-valor2="0" data-valor3="*" data-valor4="*" data-valor5="6,0">Executar job à meia-noite no sábado e no domingo</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Atualizar Job</button>

                                </div>
                                <!-- /.card-footer -->
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


