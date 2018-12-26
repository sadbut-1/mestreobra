<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\TipoServico;
use App\Models\Servico;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    private $categoria;
    private $tipoServico;
    private $servico;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Categoria $categoria, TipoServico $tipoServico, Servico $servico)
    {
        $this->middleware('auth');
        $this->categoria = $categoria;
        $this->tipoServico = $tipoServico;
        $this->servico = $servico;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = $this->categoria->orderBy('id','DESC')->get();
        $tipos = $this->tipoServico->all();
        $servicos = $this->servico->orderBy('ordem','DESC')->get();
        return view('admin.cadastros.categoria.index', compact('categorias','tipos','servicos'));
    }

    public function create()
    {
        return view('admin.service-category.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['tipo_servico_id'] = 1;
        $this->categoria->create($data);
        return redirect('/admin/categoria');
    }

    public function edit($id)
    {
        return $this->categoria->find($id);
    }

    public function update(Request $request,$id)
    {
        $this->categoria->where('id',$id)->update($request->except(['_token']));
        return redirect('/admin/categoria');
    }

    public function destroy($id)
    {
        $category = $this->serviceCategory->find($id);
//        if(count($category->services) > 0) {
//            return redirect('/admin/service_categories');
//        }
        $category->active = 0;
        $category->save();
        return redirect('/admin/service_categories');
    }

    public function addServico($categoria,$servico)
    {
        $this->categoria->find($categoria)->servicos()->attach($servico);
        return $this->servico->find($servico);
    }

    public function rmServico($categoria,$servico)
    {
        $this->categoria->find($categoria)->servicos()->detach($servico);
        return redirect('/admin/categoria');
    }

}
