<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\api\IuranApiModel;
use App\Models\api\IuranPenggunaApiModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IuranApiController extends Controller
{
	public function get_all(){
		$length = DB::table('iurans')->count();
		return response([
			 	'status' 		=> '200',
				'data'			=> IuranApiModel::all(),
				'totalRecord'	=> $length
			], 200);
	}

	public function by_id($id){
		$c_exist = IuranApiModel::firstWhere('id', $id);
		if($c_exist) {
			$result = $c_exist->join('komunitas', 'komunitas.id','informasis.komunitas_id')
								->select('iurans.*', 'komunitas.nama_komunitas')
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
		$c_exist = IuranApiModel::firstWhere('id', $id);
		if($c_exist) {
			$result = IuranApiModel::destroy($id);
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

	public function insert(Request $request){
		// $request->validate([
        //     'iuran_id' => 'required',
        //     'metode_pembayaran' => 'required',
        //     'jumlah' => 'required',
        //     'keterangan' => 'required',
        //     'bukti_pembayaran' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048'
        // ]);

		$dt = new IuranPenggunaApiModel;
		$dt->iuran_id 				= $request->iuran_id;
		$dt->user_id 				= $request->user_id;
		$dt->komunitas_id 			= $request->komunitas_id;
		$dt->metode_pembayaran 		= $request->metode;
		$dt->jumlah 				= $request->jumlah;

		if ($request->hasFile('bukti_pembayaran')) {
			$file = $request->file('bukti_pembayaran');
			$fileName = time().'_'.$file->getClientOriginalName();
			$dt->bukti_pembayaran = $file->storeAs('bukti_pembayaran', $fileName, 'public');
		}

		$dt->keterangan				= $request->keterangan;
		$dt->status_pembayaran		= $request->status_pembayaran;
		$dt->tanggapan_iuran		= $request->tanggapan_iuran;

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
