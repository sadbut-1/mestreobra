<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;


class ClienteController extends Controller
{
    private $cliente;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Cliente $cliente)
    {
        $this->middleware('client');
        $this->cliente = $cliente;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = $this->cliente->find($id);

        return view('client.perfil', compact('cliente'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['usuario_id'] = Auth::user()->id;
        $this->cliente->create($data);

        return redirect('/client/home');
    }

    public function update(Request $request, $id)
    {
        $this->cliente->where('id',$id)->update($request->except('_token'));

        return redirect('/client/perfil/'.$id);
    }

}
