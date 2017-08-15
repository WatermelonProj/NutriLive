@extends('layouts.app')

@section('links')
    @include('imports.select2_links')
@endsection

@section('content')

    {{--Seção de erros--}}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{--Cabeçalho--}}
    <div class="row">
        <div class="col-lg-12">
            <h1>Alimento</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Cadastro
                        <small>Insira as informações conforme solicitadas</small>
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>

                    {{--Form--}}
                    {!! Form::open(['route'=>'alimentos.store', 'class'=>'form-horizontal form-label-left',
                    'id'=> 'cadastro-form', 'data-parsley-validate', 'files' => 'true' ]) !!}
                    <div class="form-group item">
                        {!! Form::label('descricaoAlimento', 'Alimento', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('descricaoAlimento', null, ['class'=>'form-control col-md-7 col-xs-12',
                             'data-parsley-required', 'data-parsley-required-message' => "Preencha este campo" ]) !!}
                        </div>
                    </div>
                    <div class="form-group ">
                        {!! Form::label('idGPiramide', 'Grupo Piramide', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('idGPiramide', \App\Models\Grupo\GrupoPiramide::pluck('descricaoGP', 'idGPiramide'), null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group ">
                        {!! Form::label('idGAlimentar', 'Grupo', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('idGAlimentar', \App\Models\Grupo\GrupoAlimentar::pluck('descricaoGA', 'idGAlimentar'), null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('idTACO', 'ID TACO', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}--}}
                        {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                            {{--{!! Form::text('idTACO', null, ['class'=>'form-control', 'data-parsley-type'=>"number",--}}
{{--                             'data-parsley-type-message' => "Preencha com um valor númerico", 'data-parsley-required', 'data-parsley-required-message' => "Preencha este campo"]) !!}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-group">
                        {!! Form::label('nutrientes', 'Nutrientes', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('nutrientes[]', $nutrientes, null,
                            ['id'=>'nutrienteSelect', 'class'=>'form-control select2_multiple', 'multiple'=>true, 'multiple'=>'multiple']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('medidas_caseiras', 'Medidas Caseiras', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('medidas_caseiras[]', \App\Models\Medida\TipoMedidaCaseira::pluck('nomeTMC', 'idTMCaseira'), null,
                            ['id'=>'medidaCaseiraSelect', 'class'=>'form-control select2_multiple', 'multiple'=>true, 'multiple'=>'multiple']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('image', 'Imagem do Alimento', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {!! Form::file('image', ['class' => 'btn btn-primary', 'accept' => 'image/*']) !!}
                        </div>
                    </div>

                    {{--Nutrientes--}}
                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>
                    <h2>Nutrientes
                        <small>Insira as quantidades</small>
                    </h2>
                    <div id="ntr">
                        <div id="ntr-alert" class="alert alert-warning alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                            </button>
                            <strong>Atenção!</strong> Você ainda não inseriu nenhum Nutriente ao alimento.
                        </div>
                    </div>


                    {{--Medidas Caseiras--}}
                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>
                    <h2>Medidas Caseiras
                        <small>Insira as quantidades</small>
                    </h2>
                    <div id="mdcase">
                        <div id="ntr">
                            <div id="md-alert" class="alert alert-warning alert-dismissible fade in " role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span>
                                </button>
                                <strong>Atenção!</strong> Você ainda não inseriu nenhuma medida caseira.
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>

                    {!! Form::submit('Cadastrar', ['class'=>'btn btn-primary pull-right']) !!}
                    <a href="{{ route('alimentos') }}" class="btn btn-danger pull-right">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{--@include('imports.validator_script')--}}
    @include('imports.select2_script')
    @include('imports.parsley_script')

    <script>
        var $eventSelect = $('#nutrienteSelect');
        $eventSelect.on('select2:unselect', function(e) {
            $("#Nutriente-"+ e.params.data.id).remove();
        })
        $eventSelect.on('select2:select', function(e) {
            if ($('#ntr-alert').length === 1)
                $('#ntr').empty();

            $('#ntr').append(
                "<div id=Nutriente-"+ e.params.data.id +" class='form-group col-md-6 col-sm-6 col-xs-12'>" +
                "<label for='alimento' class='control-label col-md-3 col-sm-3 col-xs-12'>" + e.params.data.text + "</label>" +
                "<div class='col-md-4 col-sm-4 col-xs-12'>" +
                "<input name=Ntr-" + e.params.data.id + " type='number' class='form-control', step='0.01', data-parsley='number'" +
                "data-parsley-type-message='Preencha com um valor numérico', " +
                "data-parsley-required='data-parsley-required', data-parsley-required-message='Preencha este Campo!'>" +
                "</div>" +
                "</div>"
            );
        })

        var $medidaSelect = $('#medidaCaseiraSelect');
        $medidaSelect.on('select2:unselect', function(e) {
            $("#Medida-"+ e.params.data.id).remove();
        })
        $medidaSelect.on('select2:select', function(e) {
            if ($('#md-alert').length === 1)
                $('#mdcase').empty();

            $('#mdcase').append(
                "<div id=Medida-"+ e.params.data.id +" class='form-group col-md-6 col-sm-6 col-xs-12'>" +
                "<label for='alimento' class='control-label col-md-3 col-sm-3 col-xs-12'>" + e.params.data.text + "</label>" +
                "<div class='col-md-4 col-sm-4 col-xs-12'>" +
                "<input name=Alm-" + e.params.data.id + " type='number' class='form-control', step='0.01', data-parsley='number'" +
                "data-parsley-type-message='Preencha com um valor numérico', " +
                "data-parsley-required='data-parsley-required', data-parsley-required-message='Preencha este Campo!'>" +
                "</div>" +
                "<label for='alimento' class='control-label col-md-1 col-sm-3 col-xs-12 pull-left'>g</label>" +
                "</div>"
            );
        })
    </script>
@endsection