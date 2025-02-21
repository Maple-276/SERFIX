<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Redirección después del login exitoso.
     *
     * @var string
     */
    protected $redirectTo = '/welcome';

    /**
     * Crea una nueva instancia del controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Muestra el formulario de login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Maneja la solicitud de inicio de sesión.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validación de los datos de entrada
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Credenciales para intentar la autenticación
        $credentials = $request->only('email', 'password');

        // Verificación de autenticación
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenera la sesión por seguridad
            return redirect()->intended($this->redirectTo)
                ->with('success', 'Inicio de sesión exitoso.');
        }

        // Si falla la autenticación
        return redirect()->back()
            ->withErrors(['email' => 'Las credenciales no son válidas.'])
            ->withInput();
    }

    /**
     * Cierra la sesión del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Sesión cerrada exitosamente.');
    }
}
