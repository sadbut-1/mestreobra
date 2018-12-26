<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrestadorFoto;
use Illuminate\Support\Facades\Storage;

class PrestadorFotoController extends Controller
{
    private $prestadorFoto;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PrestadorFoto $prestadorFoto)
    {
        $this->prestadorFoto = $prestadorFoto;
    }


    public function store(Request $request)
    {
        $data = $request->except('_token');
        $id = $request->get('prestador_id');
        if($this->prestadorFoto->where('prestador_id',$id)->count() < 8) {
            $data['foto'] = $request->file('file')->store('prestadores/portifolio/' . $id, 'public');
            return $this->prestadorFoto->create($data);
        }
        return ['erro' => 'Você alcançou o limite de fotos.'];
    }

    public function show($id)
    {
        return $this->prestadorFoto->find($id);
    }

    public function update(Request $request, $id)
    {
        $this->prestadorFoto->where('id',$id)->update($request->except('_token'));
        return redirect('/prestador/perfil');
    }

    public function destroy($id)
    {
        $foto = $this->prestadorFoto->find($id);
        Storage::delete($foto->foto);
        $foto->delete();

        return redirect('/prestador/perfil');
    }

}
