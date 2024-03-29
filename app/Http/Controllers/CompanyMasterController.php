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
use App\CompanyMaster;
use PDF;
use Validator;
use Illuminate\Support\Facades\Session;

class CompanyMasterController extends Controller
{
	public function index(){
		$company=CompanyMaster::orderBy('id','DESC')->paginate(10);
		//dd($company);
		return view('companymaster.index',compact('company'));
	}
	public function create(){
		return view('companymaster.create');	
	}
	public function save(Request $request){
		//dd($request->all());
		\DB::beginTransaction();
		try{
			$validator = \Validator::make($request->all(), [ 
            	'company_name'=>'required',
            	'company_gstin'=>'required',
            	'company_type'=>'required',
            	'company_mobile'=>'required',
            	'company_email'=>'required',
            ]);
            if ($validator->fails()) { 
                return response()->json(['status' => 0, 'msg' => 'Error: '.$validator->errors()->first(), 'data' => '']);
            }
             if($request->file('company_logo')){
             	$name = time().'_'.$request->file('company_logo')->getClientOriginalName();   
             	//dd($name);   
                $destinationPath = public_path('/asset/company_logo');
                $request->file('company_logo')->move($destinationPath, $name);
             }
            $post=[
            	'company_name'	=>	$request->company_name,
            	'gstin'			=>	$request->company_gstin,
            	'company_type'	=>	$request->company_type,
            	'mobile'		=>	$request->company_mobile,
            	'email'			=>	$request->company_email,
            	'website'		=>	$request->company_web,
            	'description'	=>	$request->company_desc,
            	'logo'			=>	(isset($name) ? $name : ''),
            	'address'		=>	$request->company_add
            ];
            //dd($post);
            $save=CompanyMaster::insert($post);

            if($save){
            	\DB::commit();
            	//dd($save);
            	return response()->json(['status' => 1, 'msg' => 'Added Successfully', 'data' => '']);
            }else{
            	\DB::rollback();
            	return response()->json(['status' => 0, 'msg' => 'Data not save!', 'data' => '']);
            }
            
		}catch(Exception $e){
			\DB::rollback();
            return response()->json(['status' => 0, 'msg' => $e->getMessage(), 'data' => '']);
		}
	}
	public function edit(){
		$user=session()->get('admin');
		// dd($user['user'][0]);
		$record=CompanyMaster::where('email',$user['user'][0])->first();
		return view('companymaster.update',compact('record'));	
	}
	public function update(Request $request){
		// dd($request->all());
		\DB::beginTransaction();
		try{
			$validator = \Validator::make($request->all(), [ 
            	'company_name'=>'required',
            	// 'company_type'=>'required',
            	'company_web'=>'required',
            	'company_mobile'=>'required',
            	'company_email'=>'required',
            	'company_gstin'=>'required',
            	'company_add'=>'required',
            	'company_desc'=>'required',
            ]);
            if ($validator->fails()) { 
                return response()->json(['status' => 0, 'msg' => 'Error: '.$validator->errors()->first(), 'data' => '']);
            }
             if($request->file('company_logo')){
             	$name = time().'_'.$request->file('company_logo')->getClientOriginalName();   
             	//dd($name);   
                $destinationPath = public_path('/asset/company_logo');
                $request->file('company_logo')->move($destinationPath, $name);
             }else{
             	$record=CompanyMaster::where('id',$request->id)->first();
             	$name =$record->logo;
             }
            $post=[
            	'company_name'	=>	$request->company_name,
            	'gstin'			=>	$request->company_gstin,
            	// 'company_type'	=>	$request->company_type,
            	'mobile'		=>	$request->company_mobile,
            	'email'			=>	$request->company_email,
            	'website'		=>	$request->company_web,
            	'description'	=>	$request->company_desc,
            	'c_logo'			=>	(isset($name) ? $name : ''),
            	'address'		=>	$request->company_add
            ];
            //dd($post);
            $save=CompanyMaster::where('id',$request->id)->update($post);

            if($save){
            	\DB::commit();
            	//dd($save);
            	return response()->json(['status' => 1, 'msg' => 'Updated Successfully', 'data' => '']);
            }else{
            	\DB::rollback();
            	return response()->json(['status' => 0, 'msg' => 'Data not update!', 'data' => '']);
            }
            
		}catch(Exception $e){
			\DB::rollback();
            return response()->json(['status' => 0, 'msg' => $e->getMessage(), 'data' => '']);
		}
	}
	public function delete(Request $request){
		$del=CompanyMaster::where('id',$request->id)->delete();
		if($del){
			return response()->json(['status' => 1, 'msg' => 'Data Delete Successfully!', 'data' => '']);
		}else{
			return response()->json(['status' => 0, 'msg' => 'Something Went Wrong!', 'data' => '']);
		}
	}
}