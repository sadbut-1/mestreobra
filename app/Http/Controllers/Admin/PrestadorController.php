<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Prestador;
use App\Http\Controllers\Controller;
use App\Models\Servico;
use App\Models\TipoServico;
use GuzzleHttp\Client;

class PrestadorController extends Controller
{
    private $prestador;
    private $categoria;
    private $servico;
    private $tipoServico;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Prestador $prestador,
                                Categoria $categoria,
                                Servico $servico,
                                TipoServico $tipoServico
    )
    {
        $this->middleware('auth');
        $this->prestador = $prestador;
        $this->categoria = $categoria;
        $this->servico = $servico;
        $this->tipoServico = $tipoServico;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestadores = $this->prestador->orderBy('id','DESC')->paginate(12);
        $categorias = $this->categoria->all();
        $tipos = $this->tipoServico->all();
        return view('admin.cadastros.prestador.index', compact('prestadores','categorias', 'tipos'));
    }

    public function buscaCategoria(Request $request)
    {
        $prestadores = $this->prestador->whereHas('categorias',function($query) use($request){
            $query->where('nome','LIKE','%'.$request->get('nome').'%');
        })->orderBy('id','DESC')->paginate();
        $categorias = $this->categoria->all();
        $tipos = $this->tipoServico->all();
        return view('admin.cadastros.prestador.index', compact('prestadores','categorias', 'tipos'));
    }

    public function busca(Request $request)
    {
        $prestadores = $this->prestador->where('nome','LIKE','%'.$request->get('nome').'%')
            ->orderBy('id','DESC')->paginate();
        $categorias = $this->categoria->all();
        $tipos = $this->tipoServico->all();
        return view('admin.cadastros.prestador.index', compact('prestadores','categorias', 'tipos'));
    }

    public function show($id)
    {
        return $this->prestador->find($id);
    }

    public function create()
    {
        return view('admin.service-category.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('prestadores', 'public');
        } else {
            $data['foto'] = 'prestadores/ea56eea4c1dceb4216ce9d5d108dcdb0.png';
        }
        $this->prestador->create($data);

        return redirect('/admin/prestador');
    }

    public function addCategory($prestadorId,$categoriaId)
    {
        $prestador = $this->prestador->find($prestadorId);
        $prestador->categorias()->attach($categoriaId);
        return $this->categoria->find($categoriaId);
    }

    public function addTipoServico($prestadorId,$tipoId)
    {
        $prestador = $this->prestador->find($prestadorId);
        $prestador->tipos()->attach($tipoId);
        return $this->tipoServico->find($tipoId);
    }


    public function deleteCategory($prestadorId,$categoriaId)
    {
        $prestador = $this->prestador->find($prestadorId);
        $prestador->categorias()->detach($categoriaId);
        return redirect('/admin/prestador');
    }

    public function deleteTipoServico($prestadorId,$tipoId)
    {
        $prestador = $this->prestador->find($prestadorId);
        $prestador->tipos()->detach($tipoId);
        return redirect('/admin/prestador');
    }

    public function addService($servId,$prestadorId)
    {
        $prestador = $this->prestador->find($prestadorId);
        $prestador->servicos()->attach($servId);
        return $this->servico->find($servId);
    }

    public function rmService($servId,$prestadorId)
    {
        $prestador = $this->prestador->find($prestadorId);
        $prestador->servicos()->detach($servId);
        return $this->servico->find($servId);
    }

    public function edit($id)
    {
        return $this->prestador->find($id);
    }

    public function update(Request $request,$id)
    {
        $data = $request->except(['_token']);
        if($request->hasFile('foto')){
            $data['foto'] = $request->file('foto')->store('prestadores','public');
        }
        $this->prestador->where('id',$id)->update($data);
        return redirect('/admin/prestador');
    }

    public function destroy($id)
    {
        $this->prestador->where('id',$id)->update(['ativo' => 0]);
        return redirect('/admin/prestador');
    }

    public function reactive($id)
    {
        $this->prestador->where('id',$id)->update(['ativo' => 1]);
        return redirect('/admin/prestador');
    }

    public function listPrestadores()
    {
        return $this->prestador->all();
    }

    public function getServicesByCategory($presId,$catId)
    {
        return $this->prestador->find($presId)->servicos()->where('categoria_id',$catId)->get();
    }

    public function ativaCobranca($id)
    {
        $this->prestador->where('id',$id)->update(['cobranca_ativa' => 1]);
        return redirect()->back();
    }

    public function telaSMS()
    {
        return view('admin.sms');
    }

    public function sendSMS(Request $request)
    {
        $prestadores = $this->prestador->whereNotNull('cnpj')->whereNotNull('fone')->get();
        $data = $request->all();
        $clientSMS = new Client();
        $troca = array('(', ')', '-', ' ');
        foreach ($prestadores as $prestador) {
            $cel = str_replace($troca, '', $prestador->fone);
            $mobile = "55" . $cel;
            $msg = URLEncode($data['message']);

            $response = $clientSMS->post('http://system.human.com.br/GatewayIntegration/msgSms.do?dispatch=send&account=especie&code=WopKlBBI5U&to=' . $mobile . '&from=MestreObra&msg=' . $msg);

            return $response->getStatusCode();
        }
    }

}
