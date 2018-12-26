<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Prestador;
use Illuminate\Support\Facades\Hash;
use App\Mail\NovoUsuario;
use Illuminate\Support\Facades\Mail;

class UsuarioController extends Controller
{
    private $user;
    private $prestador;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user, Prestador $prestador)
    {
        $this->user = $user;
        $this->prestador = $prestador;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = $this->user->all();
        $prestadores = $this->prestador->all();

        return view('admin.usuario.index', compact('usuarios','prestadores'));
    }

    public function create(Request $request)
    {
        $pass = str_random(6);
        $user = $this->user->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role' => $request->get('role'),
            'password' => Hash::make($pass)
        ]);
        Mail::to($user->email)->send(new NovoUsuario($user, $pass));
        if($request->get('empresa_id')) {
            $this->prestador->where('id',$request->get('empresa_id'))->update(['usuario_id' => $user->id]);
        }
        return redirect('/admin/usuario');
    }

    public function store(Request $request)
    {
        $this->user->create($request->all());
        return redirect('/admin/servico');
    }

    public function edit($id)
    {
        return $this->user->with('empresa')->find($id);
    }

    public function update(Request $request,$id)
    {
        $this->user->where('id',$id)->update($request->except(['_token','empresa_id']));
        if($request->get('empresa_id')) {
            $prestador = $this->prestador->where('usuario_id',$id)->first();
            if($prestador){
                $prestador->usuario_id = null;
                $prestador->save();
            }
            $this->prestador->where('id',$request->get('empresa_id'))->update(['usuario_id' => $id]);
        }
        return redirect('/admin/usuario');
    }

    public function destroy($id)
    {
        $this->destroy->destroy($id);
        return redirect('/admin/usuario');
    }

}
