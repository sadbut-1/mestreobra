<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\TipoServico;
use App\Http\Controllers\Controller;

class TipoServicoController extends Controller
{
    private $categoria;
    private $tipoServico;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Categoria $categoria, TipoServico $tipoServico)
    {
        $this->middleware('auth');
        $this->categoria = $categoria;
        $this->tipoServico = $tipoServico;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = $this->categoria->orderBy('id','DESC')->get();
        $tipos = $this->tipoServico->orderBy('id','DESC')->get();
        return view('admin.cadastros.tipo-servico.index', compact('categorias','tipos'));
    }

    public function create()
    {
        return view('admin.service-category.create');
    }

    public function store(Request $request)
    {
        $this->tipoServico->create($request->all());
        return redirect('/admin/tipo-servico');
    }

    public function edit($id)
    {
        return $this->tipoServico->find($id);
    }

    public function update(Request $request,$id)
    {
        $this->tipoServico->where('id',$id)->update($request->except(['_token']));
        return redirect('/admin/tipo-servico');
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

    public function addCategory($tipoId,$categoriaId)
    {
        $this->tipoServico->find($tipoId)->categorias()->attach($categoriaId);
        return $this->categoria->find($categoriaId);
    }

    public function rmCategory($tipoId,$categoriaId)
    {
        $this->tipoServico->find($tipoId)->categorias()->detach($categoriaId);
        return redirect('/admin/tipo-servico');
    }

}
