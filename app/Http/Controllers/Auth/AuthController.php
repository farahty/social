<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laravel\Socialite\Facades\Socialite as Socialize;
use Illuminate\Http\Request;

class AuthController extends Controller
{


    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    protected $redirectTo = '/';


    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'api_token' => str_random(60),
        ]);
    }

    public function google(Request $request)
    {
        $request->session()->set('driver' , 'google');
        return Socialize::driver('google')->redirect();
    }
    public function facebook(Request $request)
    {
        $request->session()->set('driver' , 'facebook');
        return Socialize::driver('facebook')->redirect();
    }

    public function github(Request $request)
    {
        $request->session()->set('driver' , 'github');
        return Socialize::with('github')->redirect();
    }

    public function twitter(Request $request)
    {
        $request->session()->set('driver' , 'twitter');
        return Socialize::with('twitter')->redirect();
    }

    public function handleProviderCallback(Request $request)
    {
        $driver =$request->session()->get('driver');
        $user = $this->getSocialUser($driver);
        Auth::loginUsingId($user->id);
        if($request->ajax()){
            return compact('user');
        }
        return redirect('/home');
    }

    private function getSocialUser($social){
        $social_user = Socialize::driver($social)->user();
        $user = User::where('account_id' ,'=' , $social_user->getId())->first();
        if(! $user){
            $user_data = array(
                'account_id' =>$social_user->id,
                'account_type' => $social,
                'name' =>isset($social_user->name) ? $social_user->name : '' ,
                'email' =>isset($social_user->email) ? $social_user->email : '' ,
                'avatar' =>isset($social_user->avatar) ? $social_user->avatar : '' ,
                'api_token' => str_random(60),
            );
            $user = User::create($user_data);
        }
        return $user;
    }
}
