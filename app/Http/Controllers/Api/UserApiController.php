<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\api\UserApiModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
	public function get_all(){
		$length = DB::table('rumahs')->count();
		return response([
			 	'status' 		=> '200',
				'data'			=> UserApiModel::all(),
				'totalRecord'	=> $length
			], 200);
	}

	public function delete($id){
		$c_exist = UserApiModel::firstWhere('id', $id);
		if($c_exist) {
			$result = UserApiModel::destroy($id);
			if($result){
				return response([
					'status' 	=> '200',
				   'messages' 	=> 'Data has been deleted'
			   ], 200);
			}else{
				return response([
					'status' 	=> '404',
				   'messages' 	=> 'Data has not been deleted'
			   ], 400);
			}
		}
		else {
			return response([
				 	'status' 	=> '404',
					'messages' 	=> 'Data not found'
				], 404);
		}
	}

    public function login(Request $request){ 
        $cek = DB::table('users')
                    ->where('email', $request->email)
                    // ->where('password', $request->password)
                    ->get();
            foreach ($cek as $data) {
                if(Hash::check($request->password, $data->password)){
                    return response([
                       'message' 		=> 'success', 
                       'data'			=> $cek,
                       'totalRecord'	=> $cek->count()
                   ], 200);
                }
            } 
		return response([
			 	'message' 		=> 'failed',
				'data'			=> '',
				'totalRecord'	=> 0
			], 200);
    }

	public function register(Request $request){
		$dt = new UserApiModel;
		$dt->role 				= $request->role;
		$dt->name 				= $request->fullname;
		$dt->email 				= $request->email;
		$dt->phone 				= $request->phone;
		$dt->password 			= Hash::make($request->password);

		$cek_user = UserApiModel::where('email', $request->email)->orWhere('phone', $request->phone)->exists();;
		if($cek_user){
			return response([
				'status' 	=> '400',
			   'messages' 	=> 'Phone and Email already exist'
		   ], 400);
		}else{
			$result = $dt->save();
			if($result){
				return response([
						'status' 	=> '200',
						'messages' 	=> 'Data has been saved',
						'data'		=> $dt
					], 200);
			}
			else{
				return response([
						'status' 	=> '404',
						'messages' 	=> 'Data has not been saved'
					], 404);
			}
		}
	}

	public function pengaturan(Request $request, $id){
		$c_exist = UserApiModel::firstWhere('id', $id);
		if($c_exist){
			$cek_user_email = UserApiModel::where('email', $request->email)->exists();
			if($cek_user_email){
				return response([
					'status' 	=> '400',
					'messages' 	=> 'Email already exist'
				], 400);
			}
			else{ 
				$dt = UserApiModel::find($id); 
				$dt->email 		= $request->email;
				$dt->password 	= Hash::make($request->password);
				$result = $dt->save();
				if($result){
					return response([
						'status' 	=> '200',
						'messages' 	=> 'Data has been updated',
						'data'		=> $dt
						], 200);
				}else{
					return response([
						'status' 	=> '400',
						'messages' 	=> 'Data has not been updated'
						], 400);
				}
			}
		}
		else {
			return response([
				 	'status' 	=> '404',
					'messages' 	=> 'Data not found'
				], 404);
		}
	}

}
