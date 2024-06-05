<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\api\LaporanApiModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LaporanApiController extends Controller
{
	public function get_all(){
		$length = DB::table('keuangans')->count();
		return response([
			 	'status' 		=> '200',
				'data'			=> LaporanApiModel::all(),
				'totalRecord'	=> $length
			], 200);
	}

	public function by_id($id){ 
		$c_exist = LaporanApiModel::firstWhere('id', $id);
		if($c_exist) {
			$result = $c_exist->join('komunitas', 'komunitas.id','informasis.komunitas_id')
								->join('users', 'users.id','informasis.user_id')
								->select('informasis.*', 'komunitas.nama_komunitas', 'users.name')
								->where('informasis.id', $id)
								->get(); 
				return response([
					'status' 	=> '200',
					'data'		=> $result,
				   'messages' 	=> 'Data found'
			   ], 200);
			
		}
		else {
			return response([
					'status' 		=> '404',
					'messages' 	=> 'Data not found',
					'totalRecord'	=> '0'
				], 200);
		}
	}

	public function delete($id){
		$c_exist = LaporanApiModel::firstWhere('id', $id);
		if($c_exist) {
			$result = LaporanApiModel::destroy($id);
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

	// public function insert(Request $request){
	// 	$dt = new LaporanApiModel;
	// 	$dt->role 				= $request->role;
	// 	$dt->name 				= $request->fullname;
	// 	$dt->email 				= $request->email;
	// 	$dt->phone 				= $request->phone;
	// 	$dt->password 			= Hash::make($request->password);

	// 	$result = $dt->save();
	// 	if($result){
	// 		return response([
	// 			 	'status' 	=> '200',
	// 				'messages' 	=> 'Data has been saved',
	// 				'data'		=> $dt
	// 			], 200);
	// 	}
	// 	else{
	// 		return response([
	// 			 	'status' 	=> '404',
	// 				'messages' 	=> 'Data has not been saved'
	// 			], 404);
	// 	}
	// }

}
