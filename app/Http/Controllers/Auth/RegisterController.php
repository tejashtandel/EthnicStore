<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'lastname'=>['required','string','max:255'],
            'firstname'=>['required','string','max:255'],
            'mobilenumber'=>['required','integer'],
            'gender'=>['required'],
            'houseno'=>['required','integer'],
            'street'=>['required','string','max:255'],
            'landmark'=>['required','string','max:255'],
            'city'=>['required','string','max:255'],
            'state'=>['required','string','max:255'],
            'pincode'=>['required','integer'],


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

       


        $emails = ['name' => $data['name'], 'data' => 'Welcome   ' . $data['name']];
        $users = $data['email'];

        Mail::send('welcomeMail', $emails, function ($messeges) use ($users) {
            $messeges->to($users);
            $messeges->subject('Welcome');
        });
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'mobile_no' => $data['mobilenumber'],
            'gender' => $data['gender'],
            'house' => $data['houseno'],
            'street' => $data['street'],
            'landmark' => $data['landmark'],
            'state' => $data['state'],
            'city' => $data['city'],
            'postcode' => $data['pincode'],   
        ]);
    }
}
