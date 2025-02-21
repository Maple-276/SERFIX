<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/main';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'about_me' => ['required', 'string'],
            'things_about_me' => ['required', 'string'],
            'personal_info' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'languages' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);
    }

    /**
     * Create a new user instance along with the user profile after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            // Guardar la imagen si fue cargada y asignarla a la tabla User
            $imagePath = null;
            if (isset($data['image'])) {
                $imagePath = $data['image']->store('images', 'public');
            }

            // Crear el usuario con la imagen guardada en la tabla User
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'image' => $imagePath, // La ruta de la imagen se almacena en la tabla User
            ]);

            // Crear el perfil del usuario sin la imagen, ya que está en la tabla User
            UserProfile::create([
                'user_id' => $user->id,
                'about_me' => $data['about_me'],
                'things_about_me' => $data['things_about_me'],
                'personal_info' => $data['personal_info'],
                'phone' => $data['phone'],
                'languages' => $data['languages'],
            ]);

            return $user;
        });
    }
} 
