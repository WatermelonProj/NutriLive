@extends('layouts.app')

@section('links')
    @include('imports.pnotify_links')
@endsection

@section('content')
    <div class="row">
        <div class="title_left">
            <h3>{{ $alimento->descricaoAlimento }}</h3>
            <a href="{{ route('alimentos') }}">
                <i class="fa fa-arrow-left"></i>
                <button class="btn btn-link">Retornar aos Alimentos</button>
            </a>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            {{--Informações Nutricionais--}}
            <div class="col-md-4 col-sm-8 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Nutrientes</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            {{--ENERGIA fornecida pelo alimento--}}
                            <div class="panel">
                                <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse"
                                   data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                                   aria-controls="collapseOne">
                                    <h4 class="panel-title">Energia</h4>
                                </a>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div style="text-align: center;">
                                            <span class="">
                                                <i class="fa fa-flash fa-2x"></i> ENERGIA
                                                = {{$nutrienteAlimento[0]['qtde']}} KCAL
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Macronutrientes--}}
                            <div class="panel">
                                <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse"
                                   data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                   aria-controls="collapseTwo">
                                    <h4 class="panel-title">Macronutrientes</h4>
                                </a>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Nutriente</th>
                                                <th>Quantidade</th>
                                                <th>Unidade</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                @if($nutrienteAlimento->where('idNutriente', 3)->first())
                                                    <td>{{$nutrientes->find(3)->nomeNutriente}}</td>
                                                    <td>{{$nutrienteAlimento->where('idNutriente', 3)->first()->qtde }}</td>
                                                    <td>{{$unidade->find($nutrientes->find(3)->unidadeNutriente)->nomeUnidade}}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($nutrienteAlimento->where('idNutriente', 4)->first())
                                                    <td>{{$nutrientes->find(4)->nomeNutriente}}</td>
                                                    <td>{{$nutrienteAlimento->where('idNutriente', 4)->first()->qtde }}</td>
                                                    <td>{{$unidade->find($nutrientes->find(4)->unidadeNutriente)->nomeUnidade}}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($nutrienteAlimento->where('idNutriente', 6)->first())
                                                    <td>{{$nutrientes->find(6)->nomeNutriente}}</td>
                                                    <td>{{$nutrienteAlimento->where('idNutriente', 6)->first()->qtde }}</td>
                                                    <td>{{$unidade->find($nutrientes->find(6)->unidadeNutriente)->nomeUnidade}}</td>
                                                @endif
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{--Micronutrientes--}}
                            <div class="panel">
                                <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse"
                                   data-parent="#accordion" href="#collapseThree" aria-expanded="false"
                                   aria-controls="collapseThree">
                                    <h4 class="panel-title">Micronutrientes - Minerais</h4>
                                </a>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Nutriente</th>
                                                <th>Quantidade</th>
                                                <th>Unidade</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @for($i = 9; $i <= 17; $i++)
                                                @if($nutrienteAlimento->where('idNutriente', $i)->first())
                                                    <tr>
                                                        <td>{{ $nutrientes->find($i)->nomeNutriente}}</td>
                                                        <td>{{ $nutrienteAlimento->where('idNutriente', $i)->first()->qtde }}</td>
                                                        <td>{{ $unidade->find($nutrientes->find($i)->unidadeNutriente)->nomeUnidade}}</td>
                                                    </tr>
                                                @endif
                                            @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{--Macronutrientes--}}
                            <div class="panel">
                                <a class="panel-heading collapsed" role="tab" id="headingFour" data-toggle="collapse"
                                   data-parent="#accordion" href="#collapseFour" aria-expanded="false"
                                   aria-controls="collapseFour">
                                    <h4 class="panel-title">Micronutrientes - Vitaminas</h4>
                                </a>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingFour">
                                    <div class="panel-body">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Nutriente</th>
                                                <th>Quantidade</th>
                                                <th>Unidade</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @for($i = 18; $i <= 25; $i++)
                                                @if($nutrienteAlimento->where('idNutriente', $i)->first())
                                                    <tr>
                                                        <td>{{ $nutrientes->find($i)->nomeNutriente}}</td>
                                                        <td>{{ $nutrienteAlimento->where('idNutriente', $i)->first()->qtde }}
                                                        </td>
                                                        <td>{{ $unidade->find($nutrientes->find($i)->unidadeNutriente)->nomeUnidade}}</td>
                                                    </tr>
                                                @endif
                                            @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{--Medidas Caseiras--}}
                            @if(sizeof($medidasCaseiras) > 0)
                                <div class="panel">
                                <a class="panel-heading collapsed" role="tab" id="headingFive" data-toggle="collapse"
                                   data-parent="#accordion" href="#collapseFive" aria-expanded="false"
                                   aria-controls="collapseFive">
                                    <h4 class="panel-title">Medidas Caseiras</h4>
                                </a>
                                <div id="collapseFive" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingFive">
                                    <div class="panel-body">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Tipo de Medida</th>
                                                <th>Quantidade</th>
                                                <th>Unidade</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($medidasCaseiras as $medida)
                                                    <tr>
                                                        <td>{{ $medida->tipoMedidaCaseira->nomeTMC }}</td>
                                                        <td>{{ $medida->qtde }}</td>
                                                        <td>{{ $medida->unidadeMedida->siglaUnidade }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                    </div>

                </div>
            </div>

            {{--Grafo de Pizza--}}
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Composição</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="graph_donut" style="width:100%; height:300px;"></div>
                    </div>
                </div>
            </div>

            {{--rodar o artisan storage:link--}}
            {{--Imagem do alimento--}}
            @if(File::exists("storage/alimentos/{$alimento->idAlimento}.png") xor
                    File::exists("storage/alimentos/{$alimento->idAlimento}.jpg"))
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Alimento</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content2">
                            @if(File::exists("storage/alimentos/{$alimento->idAlimento}.png"))
                                <img src="{{ asset("storage/alimentos/{$alimento->idAlimento}.png") }}"
                                     class="img-rounded"
                                     alt="alimento" style="width:100%; height:100%;">
                            @else
                                <img src="{{ asset("storage/alimentos/{$alimento->idAlimento}.jpg") }}"
                                     class="img-rounded"
                                     alt="alimento" style="width:100%; height:100%;">
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>

@endsection

@section('scripts')
    @include('imports.datatables_script')
    @include('imports.morris_graphs')
    @include('imports.pnotify_script')

    <script>

        function chart() {
            Morris.Donut({
                element: 'graph_donut',
                data: {!! grafoComposicao($alimento->nutrienteAlimento) !!},
                colors: shuffle(['#26B99A', '#34495E', '#ACADAC', '#3498DB', '#ff4852', '#78ff58', '#3a55cc']),
                formatter: function (y) {
                    return y + "%";
                },
                resize: true
            });
        }

        chart();

    </script>

    <script>
        $(document).ready(function () {
            new PNotify({
                title: 'Legenda',
                text:
                '100g - Os dados de nutrientes são baseados em 100g do alimentos<br>' +
                'NA - Nutriente não existente no alimento<br>' +
                'Tr - Quantidade muito baixa do nutriente(Insignificante para os cálculos',
                type: 'info',
                hide: false,
                styling: 'bootstrap3'
            })
        });
    </script>

@endsection