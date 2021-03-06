@extends('layouts.collectiveForms')

@section('page_title', 'Receita')

@section('form_links')
    @include('imports.icheck_links')
@endsection

@section('form_section')
    {!! Form::open(['route'=>'receitas.store', 'class'=>'form-horizontal form-label-left', 'id'=> 'cadastro-form',
     'data-parsley-validate', 'files' => 'true']) !!}

    <div class="form-group item">
        {!! Form::label('nomeReceita', 'Nome da Receita', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::text('nomeReceita', null, ['class'=>'form-control col-md-7 col-xs-12',
             'data-parsley-required', 'data-parsley-required-message' => "Preencha este campo" ]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('alimentos', 'Alimentos', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::select('alimentos[]', $alimentos, null,
            [ 'id'=>'mselect' ,'class'=>'form-control select2_multiple', 'multiple'=>true, 'multiple'=>'multiple',
            'data-parsley-required', 'data-parsley-required-message' => "Insira ao menos um alimento para a receita"]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('preparoReceita', 'Preparo', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::textarea('preparoReceita', null, ['class' => 'resizable_textarea form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('ativoReceita', 'Receita Ativa?', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="checkbox">
                <input name="ativoReceita" type="checkbox" class="flat" checked>
            </div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('image', 'Imagem da Receita', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-9 col-sm-9 col-xs-12">
            {!! Form::file('image', ['class' => 'btn btn-primary', 'accept' => 'image/*']) !!}
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="clearfix"></div>

    <h2>Porções
        <small>Insira as quantidades e o tipo da porção</small>
    </h2>

    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        {!! Form::label('tipoPorcao', 'Tipo de Porção', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::select('tipoPorcao', $tiposPorcao::pluck('nome', 'idTipoPorcao'), null,
            [ 'id'=>'mselect' ,'class'=>'form-control',
            'data-parsley-required', 'data-parsley-required-message' => "Insira ao menos um alimento para a receita"]) !!}
        </div>
    </div>

    <div class="clearfix"></div>

    @foreach($faixas as $faixa)
        <div class="form-group col-md-6 col-sm-6 col-xs-12">
            {!! Form::label('faixa-'.$faixa->idFEtaria, $faixa->descricaoFaixa, ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            <div class="col-md-4 col-sm-4 col-xs-12">
                {!! Form::number('faixa-'.$faixa->idFEtaria, 0, ['class'=>'form-control col-md-7 col-xs-12',
             'data-parsley-required', 'data-parsley-required-message' => "Preencha este campo", 'min' => '0' ]) !!}
            </div>
        </div>
    @endforeach

    <div class="clearfix"></div>
    <div class="ln_solid"></div>

    <h2>Alimentos
        <small>Insira as quantidades</small>
    </h2>

    <div id="alm">
        <div id="alm-alert" class="alert alert-warning alert-dismissible fade in " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span>
            </button>
            <strong>Atenção!</strong> Você ainda não inseriu nenhum Alimento.
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="ln_solid"></div>
    {!! Form::submit('Cadastrar', ['class'=>'btn btn-primary pull-right']) !!}
    <a href="{{ route('receitas') }}" class="btn btn-danger pull-right">Cancelar</a>
    {!! Form::close() !!}
@endsection

@section('form_scripts')
    <script>
        var $eventSelect = $('#mselect');
        $eventSelect.on('select2:unselect', function(e) {
            $('#'+e.params.data.id).parent().parent().remove();
        })
        $eventSelect.on('select2:select', function(e) {
            if ($('#alm-alert').length === 1)
                $('#alm').empty();

            $('#alm').append(
                "<div class='form-group col-md-6 col-sm-6 col-xs-12'>" +
                "<label for='alimento' class='control-label col-md-3 col-sm-3 col-xs-12'>" + e.params.data.text + "</label>" +
                "<div class='col-md-4 col-sm-4 col-xs-12'>" +
                "<input name="+e.params.data.id+" id="+e.params.data.id+" type='number' class='form-control'," +
                " step='0.01', data-parsley='number'" + "data-parsley-type-message='Preencha com um valor numérico', " +
                "data-parsley-required='data-parsley-required', data-parsley-required-message='Preencha este Campo!'>" +
                "</div>" +
                "<label for='alimento' class='control-label col-md-1 col-sm-3 col-xs-12 pull-left'>g</label>" +
                "</div>"
            );
        });
    </script>
    @include('imports.resizeable_script')
    @include('imports.icheck_scripts')
@endsection