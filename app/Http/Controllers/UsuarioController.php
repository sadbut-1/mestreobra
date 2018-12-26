<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UsuarioController extends Controller
{
    use AuthenticatesUsers;

    private $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function password(Request $request)
    {
        $user = $this->user->find(Auth::user()->id);
        if (Hash::check($request->get('old_password'), $user->password )) {
            $user->password = Hash::make($request->get('new_password'));
            $user->save();
            return redirect('/prestador/perfil')->with('message', 'Senha alterada com sucesso!')
                                                ->with('color','success');
        }
        return redirect('/prestador/perfil')->with('message', 'Senha antiga incorreta.')
            ->with('color','danger');
    }

    public function login($hash,$id)
    {
        $user = $this->user->find($id);
        if ($user->hash == $hash) {
            Auth::loginUsingId($id);
            return redirect('/client/home');
        }
    }

}
