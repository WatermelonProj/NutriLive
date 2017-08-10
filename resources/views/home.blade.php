@extends('layouts.app')

@section('content')

    <div class="row top_tiles">
        <a href="{{ route('alimentos') }}">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-apple"></i></div>
                    <div class="count">{{ $totalAlimentos }}</div>
                    <h3>Alimentos</h3>
                    <p>Verificar Alimentos disponíveis da tabela TACO.</p>
                </div>
            </div>
        </a>
        <a href="{{ route('receitas') }}">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-cutlery"></i></div>
                    <div class="count">{{ $totalReceitas }}</div>
                    <h3>Receitas</h3>
                    <p>Verificar Receitas disponíveis ou cadastre novas!</p>
                </div>
            </div>
        </a>
        <a href="{{ route('refeicao') }}">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-spoon"></i></div>
                    <div class="count">{{ $totalRefeicoes }}</div>
                    <h3>Refeições</h3>
                    <p>Verificar Refeições disponíveis ou cadastre novas!</p>
                </div>
            </div>
        </a>
        <a href="{{ route('cardapio') }}">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-calendar-check-o"></i></div>
                    <div class="count">{{ $cardapiosAgendados }}</div>
                    <h3>Cardápios</h3>
                    <p>Verifique os cardápios agendados para este mês!</p>
                </div>
            </div>
        </a>
    </div>

@endsection