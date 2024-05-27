<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\api\RumahApiModel;
use Illuminate\Support\Facades\DB;

class RumahApiController extends Controller
{
	public function get_all(){
		$length = DB::table('rumahs')->count();
		return response([
			 	'status' 		=> '200',
				'data'			=> RumahApiModel::all(),
				'totalRecord'	=> $length
			], 200);
	}

	public function insert(Request $request){
		$dt = new RumahApiModel;
		$dt->user_id 		= $request->user_id;
		$dt->komunitas_id 	= $request->komunitas_id;
		$dt->jalan 			= $request->jalan;
		$dt->rt 			= $request->rt;
		$dt->rw 			= $request->rw;
		$dt->blok 			= $request->blok;
		$dt->kode_rumah		= $request->kode_rumah;
		$dt->status_hunian	= $request->status_hunian;
		$dt->bulan_huni		= $request->bulan_huni;
		$dt->tahun_huni 	= $request->tahun_huni;
		$dt->status_komunitas= $request->status_komunitas;

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

	public function update(Request $request, $id){
		$c_exist = RumahApiModel::firstWhere('id', $id);
		if($c_exist){
			$dt = RumahApiModel::find($id);
			// same DB				same with postman
			$dt->user_id 		= $request->user_id;
			$dt->komunitas_id 	= $request->komunitas_id;
			$dt->jalan 			= $request->jalan;
			$dt->rt 			= $request->rt;
			$dt->rw 			= $request->rw;
			$dt->blok 			= $request->blok;
			$dt->kode_rumah		= $request->kode_rumah;
			$dt->status_hunian	= $request->status_hunian;
			$dt->bulan_huni		= $request->bulan_huni;
			$dt->tahun_huni 	= $request->tahun_huni;
			$dt->status_komunitas= $request->status_komunitas;
			$result = $dt->save();
			if($result){
				return response([
					'status' 	=> '200',
				   'messages' 	=> 'Data has been updated',
				   'data'		=> $dt
			   ], 200);
			}else{
				return response([
					'status' 	=> '404',
				   'messages' 	=> 'Data has not been updated'
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

	public function delete($id){
		$c_exist = RumahApiModel::firstWhere('id', $id);
		if($c_exist) {
			$result = RumahApiModel::destroy($id);
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

}
