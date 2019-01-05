<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use DB;
use App\User;
use Hash;
use Auth;
Use Redirect;
use Session;
use Helper;

// use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function index(){
      return view('register');
   	}
   	
   	public function store( Request $request ){
      $rules = [
          'name'        => 'required',
          'first_name'  => 'required',
          'last_name'   => 'required',
          'email'       => 'required|email',
          'psw'         => 'required|min:6',
          'repeatpsw'   => 'required|min:6|required_with:psw|same:psw',
      ];

      $customMessages = [
          'first_name.required' => 'First name field is required.',
          'last_name.required'  => 'Last name field is required.',
          'name.required'       => 'Display name field is required.',
          'email.required'      => 'Email field is required.',
          'email.email'         => 'Enter valied email address.',
          'psw.required'        => 'Password field is required.',
          'psw.min'             => 'Password must be 6 character.',
          'repeatpsw.required'  => 'Confirm Password field is required.',
          'repeatpsw.min'       => 'Confirm password must be 6 character.',
          'repeatpsw.same'       => 'The password and confirm password must match',
      ];

      
      $validator = Validator::make($request->all(), $rules, $customMessages);
      if ($validator->fails()) {
          // send back to the page with the input data and errors
         return Redirect::back()->withInput()->withErrors($validator);
      }

   		// check form field reuired
   		$this->validate($request, [
            'email' 	=> 'required|email',
            'psw' 		=> 'min:6|required_with:repeatpsw|same:repeatpsw',
        ]);
        // save data for new user
        $user = User::create(array(
		    'name' 				    => $request->get('name'),
        'user_type'       => 'subscriber',
        'first_name'      => $request->get('first_name'),
        'middle_name'     => $request->get('middle_name'),
		    'last_name' 		  => $request->get('last_name'),
		    'password' 			  => Hash::make($request->get('repeatpsw')),
		    'email'    			  => $request->get('email'),
		    'remember_token'  => str_random(10),
		));

        // auto login  
        $user_data = array(
        'email'      => $request->get('email'),
        'password'  => $request->get('psw'),
        'user_type' => 'subscriber',
        'is_active' => '1',
      );

   		if(Auth::attempt($user_data)) {
            return redirect('auth/successlogin');       
      }

   	}

   	public function edit($id){
      $user = User::find($id);
      if( Auth::user()->id == $id ){
        return view('edit-user', compact('user'));
      }else{
        if( Auth::user()->user_type != 'admin' ){
          Session::flash('error', "access denied!!!");
          return Redirect::back();
        }else{
          return view('admin/edit-user', compact('user'));
        }
      }
        // return view('edit-user', compact('user'));
    }

   	public function update(Request $request)
    { 
        // check form field reuired
      $errors = $this->validate($request, [
            'email'   => 'required|email',
            'psw'     => 'min:6|required_with:repeatpsw|same:repeatpsw',
        ]);

        // dd(request());
        // save data for new user
        if( request()->avatar->getClientOriginalExtension() ){
          $avatarName = $request->get('edit_id').'_avatar_'.time().'.'.request()->avatar->getClientOriginalExtension(); 
        }else{
           $avatarName = null;
        }
        $id = User::where('id',$request->get('edit_id'))->update(array(
            'name'              => $request->get('name'),
            'email'             => $request->get('email'),
            'avatar'            => $avatarName,
            'first_name'        => $request->get('first_name'),
            'middle_initial'    => $request->get('middle_initial'),
            'last_name'         => $request->get('last_name'),
            'dob'               => $request->get('dob'),
            'housenumber'       => $request->get('housenumber'),
            'addressline1'      => $request->get('addressline1'),
            'addressline2'      => $request->get('addressline2'),
            'zipcode'           => $request->get('zipcode'),
            'country'           => $request->get('country'),
        ));

        if ($request->hasFile('avatar')) {
          $img = $request->file('avatar');
           
          // Move file into store/public 
            $move = Storage::disk('profile')->put($avatarName, file_get_contents($img->getRealPath()));
        }else {
              return back()->withErrors('No file found');
        }
        if( $move ){
          DB::table('profiles')->insert(
              array(
                'user_id'        => $id,
                'filename'       => $avatarName,
                'title'          => $avatarName,
                'alt'            => $avatarName,
                'mime_type'      => $img->getClientMimeType(),
            )
          );
        }
   		/*if(Auth::attempt($user_data)) {
        }*/
        // return redirect('register/edit/'.$request->get('edit_id'));       
        // return redirect('auth/user/edit/'.$request->get('edit_id')); 
        
        return redirect()->back()->with('message', 'Record update successfully!!');
    }
    /*public function userlist(Request $request)
    { 
      $users = User::all();
      return view('admin/users',compact('users',$users));
    }
    public function deleteuser(Request $request, $id)
    { 
      $user = User::find($id);    
      $user->delete();
      Session::flash('success', "User deleted successfully!!!");
      return Redirect::back();
      // return Redirect::back()->with(['success', 'User deleted successfully!!!']);
      
    }*/
}
