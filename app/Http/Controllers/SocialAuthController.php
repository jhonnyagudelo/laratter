<?php

namespace App\Http\Controllers;
use App\User;
use App\SocialProfile;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class SocialAuthController extends Controller
{
    
    public function github(){
        
        return Socialite::driver('github')->redirect();
        
    }



    public function callback()
    {
        $githubUser = Socialite::driver('github')->user();
        // dd($githubUser);
        /*     Mejora de Rendimiento      */
        $existing = User::whereIn('users.id', function($query) use($githubUser) {
            $query->from('social_profiles')
                    ->select('social_profiles.user_id')
                    ->where('social_profiles.social_id', $githubUser->id);
        })->first();
        //Si existe envia al home
        if ($existing !== null) {
            auth()->login($existing);

            return redirect('/');
        }

        //Sino manda a registrar el usuario
        session()->flash('githubUser', $githubUser);

        return view('users.github', [
            'githubUser' => $githubUser,
        ]);
    }


    public function register(Request $request){
        $data = session('githubUser');
        $username = $request->input('username');

        $githubUser = User::create([
            'name' => $data->name,
            'email'=> $data->email,
            'avatar'=> $data->avatar,
            'username' => $username,
            'password' => '',
        ]);

        $profile = socialProfile::create([
             'social_id' => $data->id,
             'user_id' => $githubUser->id,
        ]);

            auth()->login($githubUser); //para logear un usuario que se acaba de crear
            return redirect('/');
    }

}
