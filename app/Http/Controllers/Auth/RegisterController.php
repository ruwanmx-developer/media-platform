<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'confirmed'],
            'address' => ['required', 'string',],
            'mobile' => ['required', 'string', 'min:10', 'max:10'],
            'district' => ['required', 'string'],
            'description' => ['required', 'string'],
            'role' => ['required', 'string'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }

    protected function create(array $data)
    {
        $file = $data['image'];
        $name = Str::before($data['email'], '@');
        $newFileName = time() . $name . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/uploads/profile', $newFileName);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'mobile' => $data['mobile'],
            'district' => $data['district'],
            'description' => $data['description'],
            'image' => $newFileName,
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
