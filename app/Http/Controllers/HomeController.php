<?php

namespace App\Http\Controllers;

use App\Models\Alimento\Alimento;
use App\Models\Cardapio\Cardapio;
use App\Models\Receita\Receita;
use App\Models\Refeicao\Refeicao;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalAlimentos = Alimento::all()->count();
        $totalReceitas = Receita::all()->count();
        $totalRefeicoes = Refeicao::all()->count();

        $hoje = Carbon::now();
        $cardapiosAgendados = Cardapio::whereDay('dataUtilizacao', '>=', $hoje->day)
            ->whereMonth('dataUtilizacao', '=', $hoje->month)->count();

        return view('home', compact('totalAlimentos', 'totalReceitas', 'totalRefeicoes',
            'cardapiosAgendados'));
    }
}
