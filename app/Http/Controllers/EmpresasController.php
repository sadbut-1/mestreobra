<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Prestador;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EmpresasController extends Controller
{
    private $prestador;
    private $categoria;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Prestador $prestador, Categoria $categoria)
    {
        $this->prestador = $prestador;
        $this->categoria = $categoria;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $prestadores = $this->prestador->whereHas('categorias',function($query) use($id){
            $query->where('slug',$id);
        })->orderBy('nome')->get();

        $categorias = $this->categoria->all();

        if(!$prestadores->isEmpty()) {
            return view('public.empresas', compact('prestadores','id','categorias'));
        }
        return view('public.semresultado',compact('id','categorias'));
    }

    public function getFotos($id)
    {
        $prestador = $this->prestador->find($id);
        return $prestador->fotos;
    }

    public function busca(Request $request)
    {
        $categorias = $this->categoria->all();
        $prestadores = $this->prestador->where('nome','LIKE','%'.$request->get('busca').'%')->get();

        if(!$prestadores->isEmpty()) {
            return view('public.empresas', compact('prestadores','categorias'));
        }
        return view('public.semresultado',compact('id','categorias'));
    }

}
