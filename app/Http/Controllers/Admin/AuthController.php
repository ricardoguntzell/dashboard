<?php

namespace Dashboard\Http\Controllers\Admin;

use Dashboard\Support\Chart;
use Dashboard\User;
use Illuminate\Http\Request;
use Dashboard\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.home');
        }

        return view('admin.index');
    }

    public function home()
    {
        $chart = new Chart;
        $usersByState = new User;

        $usersByState = $usersByState->scopeUsersByState();

        return view('admin.dashboard', [
            'chart' => $chart,
            'usersByState' => $usersByState
        ]);
    }

    public function login(Request $request)
    {
        if (in_array('', $request->only('email', 'password'))) {
            $json['message'] = $this->message->error("Ooops, Informe todos os dados para efetuar o login")->render();
            return response()->json($json);
        }

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $json['message'] = $this->message->error("Ooops, Informe um e-mail válido")->render();
            return response()->json($json);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (!Auth::attempt($credentials)) {
            $json['message'] = $this->message->error("Ooops, Usuário e senha não conferem!")->render();
            return response()->json($json);
        }

        $this->authenticated($request->getClientIp());

        $json['redirect'] = route('admin.home');
        return response()->json($json);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    private function authenticated(string $ip)
    {
        $user = User::where('id', Auth::user()->id);
        $user->update([
            'last_login_at' => date('Y-m-d H:i:s'),
            'last_login_ip' => $ip
        ]);
    }
}
