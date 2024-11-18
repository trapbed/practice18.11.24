<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPSTORM_META\type;

class AuthController extends Controller
{
    //
    public function registration(Request $request){
        // dd($request);
        $request->validate([
            'login'=>'required|min:6',
            'password'=>'required|min:6',
            'full_name'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);
        // dd( $request->full_name);

        $check_user = User::where('login', $request->login)->exists();
        if($check_user != false){
            return redirect()->route('reg_show')->withErrors('mess', 'Такой пользователь существует!');
        }
        else{
            $user = User::create([
                'login'=> $request->login,
                'password'=> $request->password,
                'full_name'=> $request->full_name,
                'phone'=> $request->phone,
                'email'=> $request->email,
                'role'=> 'user',
            ]);
            
            Auth::login($user);

            return redirect()->route('index');
        }
        // if(){

        // }
    }

    public function auth(Request $request){
        $check_user = User::where('login', $request->login)->exists();
        // dd($check_user);
        if($check_user == true){
            $user = User::where('login', $request->login)->first();
            
            // dd(Hash::check($request->password, $user->password));
            if($request->password == $user->password){
                $user = User::where('login', $request->login)->first();
                // foreach($user as $u){
                    $id = $user->id;
                // }
                // dd($id);
                Auth::login($user);
                return redirect()->route('index');
                // dd('true');
            }
            else{
                return redirect()->route('index')->withErrors('mess', 'Пароль неверный!');
            }
        }
        else{
            return redirect()->route('index')->withErrors('mess', 'Такого пользвателя нет!');
        }
        
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
