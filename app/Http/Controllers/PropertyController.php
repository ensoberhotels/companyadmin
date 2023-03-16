<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse; 

use DB;
use Mail;
use PHPMailer\PHPMailer;
use Storage;
use View;
use App\Admin;
// use App\Vender;
// use App\Hotel;
// use App\Operator;
// use App\HotelGallery;
// use App\HotelAmenity;
// use App\Amenity;
// use App\RoomCategory;
// use App\HotelSeasonRate;
// use App\PaidAmenity;
// use App\HotelGroupSeasonRate;
// use App\Lead;
// use App\Quotation;
// use App\Sale;
// use App\Contacts;
// use App\AdminRequest;
// use App\AssignContacts;
// use App\BulkEmailSendReport;
// use App\BulkEmailSend;
use App\EmailTemplat;
use App\EmailCampaign;
use App\EmailList;
use App\SMTPEmail;
use App\RoomBookedDetails;
use App\WebsiteEnquiry;
use App\ModuleMaster;
use App\MenuMaster;
use App\CompanyMaster;
use App\Property;
use PDF;
use Validator;
use Illuminate\Support\Facades\Session;

class PropertyController extends Controller
{
	

	public function index(){
		$user=session()->get('admin');
		$property=Property::where('comp_admin_id',$user['id'][0])->orderBy('id','DESC')->get();
		return view('property.index',compact('property'));
	}
	// public function log_Admin(){
	// 	if (session()->exists('comp_ad')) {
	// 		dd($log_admin);
	// 	}
	// }
	public function create(){
		// $company=CompanyMaster::get();
		// $module=ModuleMaster::get();
		return view('property.create');	
	}
	//save property function
	public function save(Request $request){
		//dd($request->all());
		\DB::beginTransaction();
		try{
			$validator = \Validator::make($request->all(), [ 
            	'logo'=>'required',
            	'property_name'=>'required',
            	'password'=>'required',
            	'name'=>'required',
            ]);
            if ($validator->fails()) { 
                return response()->json(['status' => 0, 'msg' => 'Error: '.$validator->errors()->first(), 'data' => '']);
            }
            $user=session()->get('admin');
            $no_prop=CompanyMaster::where('email',$user['user'][0])->first();
            $user_prop=Property::where('comp_admin_id',$user['id'][0])->get();
            if(@count($user_prop) == $no_prop->no_of_user){
            	return response()->json(['status' => 0, 'msg' => 'You add only one record!', 'data' => '']);
            }else{
            	if($request->file('logo')){
	             	$name = time().'_'.$request->file('logo')->getClientOriginalName();   
	             	//dd($name);   
	                $destinationPath = public_path('/asset/property_logo');
	                $request->file('logo')->move($destinationPath, $name);
	            }
				$post=[
	            	'user'	=>	$request->name,
	            	'password'		=>	$request->password,
	            	'property_image'	=> 	(isset($name) ? $name : ''),
	            	'property_name'	=>	$request->property_name,
	            	'user_type'=>'A',
	            	'comp_admin_id'=>$user['id'][0],
	            ];
			    $save=Property::insert($post);
	            if($save){
	            	\DB::commit();
	            	//dd($save);
	            	return response()->json(['status' => 1, 'msg' => 'Added Successfully', 'data' => '']);
	            }else{
	            	\DB::rollback();
	            	return response()->json(['status' => 0, 'msg' => 'Data not save!', 'data' => '']);
	            }
            }
            
		}catch(Exception $e){
			\DB::rollback();
            return response()->json(['status' => 0, 'msg' => $e->getMessage(), 'data' => '']);
		}
	}
	public function edit($id){
		$record=Property::where('id',$id)->first();
		return view('property.update',compact('record'));
	}
	public function update(Request $request){
		//dd($request->all());
		\DB::beginTransaction();
		try{
            $validator = \Validator::make($request->all(), [ 
            	// 'logo'=>'required',
            	'property_name'=>'required',
            	'password'=>'required',
            	'name'=>'required',
            ]);
            if ($validator->fails()) { 
                return response()->json(['status' => 0, 'msg' => 'Error: '.$validator->errors()->first(), 'data' => '']);
            }
            $user=session()->get('admin');
            // $count=CompanyMaster::where('')
            if($request->file('logo')){
             	$name = time().'_'.$request->file('logo')->getClientOriginalName();   
             	//dd($name);   
                $destinationPath = public_path('/asset/property_logo');
                $request->file('logo')->move($destinationPath, $name);
            }else{
            	$prop=Property::where('id',$request->id)->first();
            	$name = $prop->property_image;

            }
			$post=[
            	'user'	=>	$request->name,
            	'password'		=>	$request->password,
            	'property_image'	=> 	(isset($name) ? $name : ''),
            	'property_name'	=>	$request->property_name,
            	'comp_admin_id'=>$user['id'][0],
            ];
		    $save=Property::where('id',$request->id)->update($post);
            if($save){
            	\DB::commit();
            	//dd($save);
            	return response()->json(['status' => 1, 'msg' => 'Update Successfully', 'data' => '']);
            }else{
            	\DB::rollback();
            	return response()->json(['status' => 0, 'msg' => 'Data not save!', 'data' => '']);
            }
            
		}catch(Exception $e){
			\DB::rollback();
            return response()->json(['status' => 0, 'msg' => $e->getMessage(), 'data' => '']);
		}
	}
	public function delete(Request $request){
		$del=ModuleMaster::where('id',$request->id)->delete();
		if($del){
			return response()->json(['status' => 1, 'msg' => 'Data Delete Successfully!', 'data' => '']);
		}else{
			return response()->json(['status' => 0, 'msg' => 'Something Went Wrong!', 'data' => '']);
		}
	}
}