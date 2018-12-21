<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
//namespace routes;
use App\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
   	public function index(){
         return view('userlogin');
   	}
   	
   	public function checkauth(Request $request){
   		// dd($request);
   		$this->validate($request, [
   			'email' 	=> 'required|email',
   			'psw' 	=> 'required|'
   		]);

   		$user_data = array(
   			'email' 	   => $request->get('email'),
            'password'  => $request->get('psw'),
   			'is_active' => '1',
   		);

   		if(Auth::attempt($user_data)) {
            // return redirect('auth/successlogin');       
            // return redirect('/');
            
            if(Auth::check() && Auth::user()->user_type === 'subscriber'){
              return redirect('auth/dashboard');       
            }else if(Auth::check() && Auth::user()->user_type === 'admin'){
               return redirect('auth/admin');
            }else{
               return redirect('auth/login');
            }       
         }

        return back()->with('error','Wrong login details'); 
   	}

   	public function successlogin(){
         return view('userdashboard');
      }

      /*public function admin(){
         return view('admin/dashboard');
   	}*/

   	public function logout(){
         Auth::logout();
         return redirect('auth/login');
   	}
}