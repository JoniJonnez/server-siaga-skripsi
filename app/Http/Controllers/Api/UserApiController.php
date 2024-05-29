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

	// public function update(Request $request, $id){
	// 	$c_exist = UserApiModel::firstWhere('id', $id);
	// 	if($c_exist){
	// 		$dt = UserApiModel::find($id);
	// 		// same DB				same with postman
	// 		$dt->user_id 		= $request->user_id;
	// 		$dt->komunitas_id 	= $request->komunitas_id;
	// 		$dt->jalan 			= $request->jalan;
	// 		$dt->rt 			= $request->rt;
	// 		$dt->rw 			= $request->rw;
	// 		$dt->blok 			= $request->blok;
	// 		$dt->kode_rumah		= $request->kode_rumah;
	// 		$dt->status_hunian	= $request->status_hunian;
	// 		$dt->bulan_huni		= $request->bulan_huni;
	// 		$dt->tahun_huni 	= $request->tahun_huni;
	// 		$dt->status_komunitas= $request->status_komunitas;
	// 		$result = $dt->save();
	// 		if($result){
	// 			return response([
	// 				'status' 	=> '200',
	// 			   'messages' 	=> 'Data has been updated',
	// 			   'data'		=> $dt
	// 		   ], 200);
	// 		}else{
	// 			return response([
	// 				'status' 	=> '404',
	// 			   'messages' 	=> 'Data has not been updated'
	// 		   ], 400);
	// 		}
	// 	}
	// 	else {
	// 		return response([
	// 			 	'status' 	=> '404',
	// 				'messages' 	=> 'Data not found'
	// 			], 404);
	// 	}
	// }

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

    // $2a$12$xOvpL/p2x4ch3T.GAL62PO0Kgg5M6QkfvQkHYOpcWbI6GqflQXqjO admin
    // $2y$10$NfeHCHSx9MRwsorqPd0txuwOGqR43QOAlJDxMMPBip6Eo7lxItqbm origin

    // $2y$10$sgrnGSyxARXUx9f2xPH5VuAKduYeAAF0PlobOJZ5qttMn1Xf1GZDK


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
