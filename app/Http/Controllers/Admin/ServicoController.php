<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Servico;
use App\Models\Categoria;
use App\Http\Controllers\Controller;

class ServicoController extends Controller
{
    private $servico;
    private $categoria;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Servico $servico, Categoria $categoria)
    {
        $this->servico = $servico;
        $this->categoria = $categoria;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicos = $this->servico->orderBy('ordem','DESC')->get();
        return view('admin.cadastros.servico.index', compact('servicos'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['categoria_id'] = 1;
        $this->servico->create($data);
        return redirect('/admin/servico');
    }

    public function edit($id)
    {
        return $this->servico->find($id);
    }

    public function update(Request $request,$id)
    {
        $this->servico->where('id',$id)->update($request->except(['_token']));
        return redirect('/admin/servico');
    }

    public function destroy($id)
    {
        $this->servico->destroy($id);
        return redirect('/admin/servico');
    }

}
