<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use App\User;
use Hash;
Use Redirect;
use Session;
use DB;
use File;
/*use DB;
use Auth;
use validator;
use Helper;*/

class AdminController extends Controller
{
    public function index()
    {
      return view('admin/index');
    }

    public function adminLogin(Request $request){
      $rules = [
          'email'     => 'required',
          'psw'       => 'required',
      ];

      $customMessages = [
          'email.required'      => 'Email field is required.',
          'psw.required'        => 'Password field is required.',
      ];

      $user_data = array(
        'email'      => $request->get('email'),
        'password'  => $request->get('psw'),
        'user_type' => 'admin',
        'is_active' => '1',
      );
      $validator = Validator::make($request->all(), $rules, $customMessages);
      if ($validator->fails()) {
          // send back to the page with the input data and errors
          return Redirect::to('auth/siteAdmin')->withInput()->withErrors($validator);
      }

      if(Auth::attempt($user_data)) {
            return redirect('auth/admin');
        }else{
          return Redirect::to('auth/siteAdmin')->with('error', 'Your username/password combination was incorrect')->withInput();
        }
    }
    public function dashboard()
    {
      // File::allFiles(public_path());
      return view('admin/dashboard');
    }

    public function adduser(){
        return view('admin/add-user');
    }

    public function saveuser( Request $request ){
        // check form field reuired
      // dd($request);
      $rules = [
          'name'      => 'required',
          'email'     => 'required|email',
          'user_type' => 'required',
          'status'    => 'required',
          'psw'       => 'required|min:6',
          'repsw'     => 'required|min:6|same:psw',
      ];

      $customMessages = [
          // 'required' => 'The :attribute field is required.'
          'name.required'       => 'Name field is required.',
          'email.required'      => 'Email field is required.',
          'user_type.required'  => 'Please select user type',
          'status.required'     => 'Please select status.',
          'psw.required'        => 'Password field is required.',
          'repsw.required'      => 'Re-password field is required.',
          'psw.min'             => 'Password minimum 6 characters long.',
          'repsw.min'           => 'Re-password minimum 6 characters long.',
          'repsw.same'          => 'Password Confirmation should match the Password',
      ];

      
       $validator = Validator::make($request->all(), $rules, $customMessages);
       if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('auth/admin/adduser')->withInput()->withErrors($validator);
        }

      if ($request->hasFile('avatar')) {
        $photo = $request->file('avatar');
        $avatarName = time().'.'.$photo->getClientOriginalExtension(); 
   
        $destinationPath = public_path('/admin/avatars/thumb');
        $thumb_img = Image::make($photo->getRealPath())->resize(150, 150);
        $thumb_img->save($destinationPath.'/'.$avatarName,80);
                    
        $destinationPath = public_path('/admin/avatars/original');
        $photo->move($destinationPath, $avatarName);
      }else{
        $avatarName = null;
      }
      $user = User::create(array(
  		    'name' 				    => $request->get('name'),
          'email'           => $request->get('email'),
          'user_type'       => $request->get('user_type'),
          'first_name'      => $request->get('first_name'),
          'middle_name'     => $request->get('middle_name'),
          'last_name'       => $request->get('last_name'),
          'work_number'     => $request->get('work_number'),
          'mobile_number'   => $request->get('mobile_number'),
          'fax_number'      => $request->get('fax_number'),
          'avatar'          => $avatarName,
          'dob'             => $request->get('dob'),
          'housenumber'     => $request->get('housenumber'),
          'addressline1'    => $request->get('addressline1'),
          'addressline2'    => $request->get('addressline2'),
          'zipcode'         => $request->get('zipcode'),
          'state'           => $request->get('state'),
          'city'            => $request->get('city'),
          'country'         => $request->get('country'),
          'is_active'       => $request->get('status'),
          'remember_token'  => str_random(10),
  		    'password' 			  => Hash::make($request->get('repsw')),
  		));
      if ($request->hasFile('avatar')) {
        DB::table('profiles')->insert(
              array(
                'user_id'        => $user->id,
                'filename'       => $avatarName,
                'title'          => $avatarName,
                'alt'            => $avatarName,
                'mime_type'      => $photo->getClientMimeType(),
            )
          );
      }
   		if( $user ) {
        Session::flash('success', 'User added successfully!!!');
        return Redirect::back();
      }

   	}

    public function userlist(Request $request)
    { 
      $users = User::all();
      return view('admin/users',compact('users',$users));
    }

    public function isactive(Request $request)
    { 
      $id     = $request->input('id');
      $action = $request->input('action');
      $status = $request->input('status');
      if( $action === 'change_user_status'){
        $result = User::where('id', $id)->update(['is_active' => $status]);
      }
      return response()->json($result);
    }
    
    /**
    * Show edit user blade 
    */
    
    public function edituser($id){
   		$user = User::find($id);
      return view('admin/edit-user', compact('user'));
   	}

    /**
    * Update edit user details
    */
      public function updateuser( Request $request ){
        // check form field reuired
      // dd($request);
      $rules = [
          'name'      => 'required',
          'email'     => 'required|email',
          'user_type' => 'required',
          'status'    => 'required',
      ];

      $customMessages = [
          // 'required' => 'The :attribute field is required.'
          'name.required'       => 'Name field is required.',
          'email.required'      => 'Email field is required.',
          'user_type.required'  => 'Please select user type',
          'status.required'     => 'Please select status.',
      ];

      
       $validator = Validator::make($request->all(), $rules, $customMessages);
       if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('auth/admin/user/edit/'.$id)->withInput()->withErrors($validator);
        }

      // Get avatar from database 
      $avatar = User::where('id', $request->get('edit_id'))->first()->avatar;
      if ($request->hasFile('avatar')) {
        $photo = $request->file('avatar');
        $avatarName = time().'.'.$photo->getClientOriginalExtension(); 
   
        $destinationPath = public_path('/admin/avatars/thumb');
        $thumb_img = Image::make($photo->getRealPath())->resize(150, 150);
        $thumb_img->save($destinationPath.'/'.$avatarName,80);
                    
        $destinationPath = public_path('/admin/avatars/original');
        $photo->move($destinationPath, $avatarName);
          if(!empty($avatar)){
            if(file_exists(public_path('/admin/avatars/thumb/'.$avatar))){
              unlink(public_path('/admin/avatars/thumb/'.$avatar));
              unlink(public_path('/admin/avatars/original/'.$avatar));
            }else{
              dd('File does not exists.');
            }
            
          }

      }else{
          $avatarName = $avatar;
      }
      $id = User::where('id',$request->get('edit_id'))->update(array(
          'name'            => $request->get('name'),
          'email'           => $request->get('email'),
          'user_type'       => $request->get('user_type'),
          'first_name'      => $request->get('first_name'),
          'middle_name'     => $request->get('middle_name'),
          'last_name'       => $request->get('last_name'),
          'work_number'     => $request->get('work_number'),
          'mobile_number'   => $request->get('mobile_number'),
          'fax_number'      => $request->get('fax_number'),
          'avatar'          => $avatarName,
          'dob'             => $request->get('dob'),
          'housenumber'     => $request->get('housenumber'),
          'addressline1'    => $request->get('addressline1'),
          'addressline2'    => $request->get('addressline2'),
          'zipcode'         => $request->get('zipcode'),
          'state'           => $request->get('state'),
          'city'            => $request->get('city'),
          'country'         => $request->get('country'),
          'is_active'       => $request->get('status'),
          'remember_token'  => str_random(10),
          'password'        => Hash::make($request->get('repsw')),
      ));
      if ($request->hasFile('avatar')) {
        DB::table('profiles')->insert(
              array(
                'user_id'        => $id,
                'filename'       => $avatarName,
                'title'          => $avatarName,
                'alt'            => $avatarName,
                'mime_type'      => $photo->getClientMimeType(),
            )
          );
      }
      if( $id ) {
        Session::flash('success', 'User added successfully!!!');
        return Redirect::back();
      }

    }

    /**
    * Show change password blade 
    */    
    public function profile(){
        return view('admin/profile');
    }

    /**
    * Check old password from datbase & save new password
    */
   
    public function changepassword(Request $request)
    {
      $user = Auth::user();
     
      $rules = [
          'current_password'          => 'required',
          'password'                  => 'required|min:6',
          'password_confirmation'     => 'required|min:6|same:password',
      ];

      $customMessages = [
          'current_password.required'       => 'Current Password field is required.',
          'password.required'               => 'Password field is required.',
          'password_confirmation.required'  => 'Confirmation password field is required.',
          'password.min'                    => 'Password minimum 6 characters long.',
          'password_confirmation.min'       => 'Confirmation password minimum 6 characters long.',
          'password_confirmation.same'      => 'Password Confirmation should match the Password',
      ];
      
       $validator = Validator::make($request->all(), $rules, $customMessages);
       if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('auth/admin/passwordreset')->withInput()->withErrors($validator);
        }
        if(Hash::check($request->get('current_password'), $user->password)){
          $user->password = Hash::make($request->get('password_confirmation'));
          $user->save();
          return redirect()->back()->with('success', 'Your new password is now set!');
        }else{
          return redirect()->back()->with('error', 'something went wrong');
        }
    }  

    /**
    * Delete user from user list blade (View) 
    */  
    public function deleteuser(Request $request, $id)
    { 
      $user = User::find($id);    
      $user->delete();
      Session::flash('success', "User deleted successfully!!!");
      return Redirect::back();
      // return Redirect::back()->with(['success', 'User deleted successfully!!!']);
      
    }
}
