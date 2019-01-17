<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use App\Country;
use App\State;
use App\City;
Use Redirect;
use DB;
class CountryStateCityController extends Controller
{
	 // Show country form
    public function index()
    {
        return view('master/country');
    }

     // Save country
    public function store(Request $request)
    {
    	$rules = [
          'name'   	  => 'required | unique:countries',
          // 'sortname'  => 'required | unique:countries',
      	];

      	$customMessages = [
          'name.required'      	=> 'Country name field is required.',
          'name.unique'      	=> 'Country name should be unique.',
          // 'sortname.required'  	=> 'Country sort name field is required.',
          // 'sortname.unique'     => 'Country sort name should be unique.',
      	];
      
      	$validator = Validator::make($request->all(), $rules, $customMessages);
      	if ($validator->fails()) {
          // send back to the page with the input data and errors
          return redirect()->back()->withInput()->withErrors($validator);
      	}

	  	$data 		= $request->all();
		$country 	= Country::create($data);
		$country->save();
		if($country){
        	return redirect()->back()->with('success', 'Record has been added successfully!');
		}
    }

    // Show state form with country list
    public function state()
    {
    	$countries = Country::all();
    	$countries = $countries->toArray();	
        return view('master/state', compact('countries'));
    }

     // Save state with country id
    public function storestate(Request $request)
    {
    	$rules = [
          'name'   	 	=> 'required',
          'country_id'  => 'required',
      	];

      	$customMessages = [
          'name.required'      	=> 'State name field is required.',
          'country_id.required' => 'Country name field is required.',
      	];
      
      	$validator = Validator::make($request->all(), $rules, $customMessages);
      	if ($validator->fails()) {
          // send back to the page with the input data and errors
          return redirect()->back()->withInput()->withErrors($validator);
      	}

	  	$data 		= $request->all();
		$state 		= State::create($data);
		$state->save();
		if($state){
        	return redirect()->back()->with('success', 'Record has been added successfully!');
		}
    }

    // Show city form
    public function city( $id=false )
    {

    	$list = City::with(['state','country'])->paginate(2);
    	if(count($list)){
    		$list = $list->toArray();
    	}else{
    		$list = false;
    	}
    	$countries = Country::all();
    	$countries = $countries->toArray();	

    	$states = State::all();
    	$states = $states->toArray();	

    	$city = City::find($id);
    	$city = $city ? $city->toArray() : '';

        return view('master/city', compact('countries', 'states', 'list', 'city'));
    }

    // Save city
    public function storecity(Request $request, $id=false )
    {

    	$rules = [
          'name'   	 	=> 'required',
          'country_id'  => 'required',
      	];

      	$customMessages = [
          'name.required'      	=> 'State name field is required.',
          'country_id.required' => 'Country name field is required.',
      	];
      
      	$validator = Validator::make($request->all(), $rules, $customMessages);
      	if ($validator->fails()) {
          // send back to the page with the input data and errors
          return redirect()->back()->withInput()->withErrors($validator);
      	}
  		$city = City::findOrNew($id);
	    $city->fill($request->all());
	    $city->save();
      	if( $id ){
      		return redirect('auth/admin/city')->with('success', 'Record has been updated successfully!');
      	}else{
      		return redirect()->back()->with('success', 'Record has been added successfully!');
      	}
	    
    }

    // Get all state based on country id using ajax call
    public function getStateList(Request $request)
    {
        $states = State::where('country_id',$request->country_id)->pluck('name','id');
        return response()->json($states);
    }

    // Delete city
    public function deletecity($id)
    {
        $city 	= City::find($id);
		$city 	= $city->delete();
		return redirect('delete.city')->with('success', 'Record has been deleted successfully!');
    }
}
