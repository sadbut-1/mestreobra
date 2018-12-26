<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Prestador;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;

class PrestadorController extends Controller
{
    private $prestador;
    private $categoria;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Prestador $prestador,
                                Categoria $categoria,
                                Pedido $pedido)
    {
        $this->prestador = $prestador;
        $this->categoria = $categoria;
        $this->pedido = $pedido;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestador = $this->prestador->where('usuario_id',Auth::user()->id)->first();

        return view('user.perfil.perfil', compact('prestador'));
    }

    public function show($id)
    {
        $prestador = $this->prestador->find($id);
        return view('public.empresa',compact('prestador'));
    }

    public function edit($id)
    {
        return $this->prestador->find($id);
    }

    public function update(Request $request,$id)
    {
        $data = $request->except('_token');
        if($request->hasFile('foto')){
            $data['foto'] = $request->file('foto')->store('prestadores','public');
        }
        $this->prestador->where('id',$id)->update($data);

        return redirect('/prestador/perfil');
    }

    public function servicosRealizados($id)
    {
        return $this->prestador->with('pedido','pedido.avaliacao')->find($id);
    }

}
