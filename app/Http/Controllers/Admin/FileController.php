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
class FileController extends Controller
{
   
    public function index()
    {
        return view('admin/gallery');
    }
   
    public function uploadImages(request $request)
    {
        // dd($request);
        $imgName = $request->file->getClientOriginalName();
        request()->file->move(public_path('images'), $imgName);
        return response()->json(['uploaded' => '/images/'.$imgName]);
    }
}