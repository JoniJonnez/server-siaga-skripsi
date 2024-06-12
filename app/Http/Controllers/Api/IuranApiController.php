<?php

/* namespace App\Http\Controllers\Api;

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
*/

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\api\IuranPenggunaApiModel;
use App\Models\api\IuranApiModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IuranApiController extends Controller
{
        public function get_all(){
            $length = DB::table('iuran_penggunas')->count();
            $data = DB::table('iuran_penggunas')
            ->select('iuran_penggunas.id','user_id','komunitas_id','users.name','users.foto','metode_pembayaran','jumlah','keterangan','bukti_pembayaran','status_pembayaran','tanggapan_iuran','iuran_penggunas.created_at')
            ->join('users', 'users.id','=','iuran_penggunas.user_id')
            ->get();
            return response([
                    'status' 		=> '200',
                    'data'			=> $data,
                    'totalRecord'	=> $length
                ], 200);
	}

	public function by_id($id){
		$c_exist = IuranPenggunaApiModel::firstWhere('id', $id);
		if($c_exist) {
			$result = $c_exist->join('komunitas', 'komunitas.id','iuran_penggunas.komunitas_id')
			                	->join('users', 'users.id','=','iuran_penggunas.user_id')
			                    ->select('iuran_penggunas.*', 'komunitas.nama_komunitas', 'users.name')
								->where('iuran_penggunas.id', $id)
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
		$c_exist = IuranPenggunaApiModel::firstWhere('id', $id);
		if($c_exist) {
			$result = IuranPenggunaApiModel::destroy($id);
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

	public function insert(Request $request)
{
    $dt = new IuranPenggunaApiModel;
    $dt->user_id = $request->user_id;
    $dt->keterangan = $request->keterangan;

    if ($request->hasFile('bukti_pembayaran')) {
        $file = $request->file('bukti_pembayaran');
        $fileName = time().'_'.$file->getClientOriginalName();
        $dt->bukti_pembayaran = $file->storeAs('bukti_pembayaran', $fileName, 'public');
    }

    $result = $dt->save();
    if ($result) {
        return response([
            'status' => '200',
            'message' => 'Data has been saved',
            'data' => $dt
        ], 200);
    } else {
        return response([
            'status' => '500',
            'message' => 'Data could not be saved'
        ], 500);
    }
}

// public function get_all_iurans() {
//         $length = DB::table('iurans')->count();
//         $data = DB::table('iurans')
//         ->select(
//           'iurans.id',
//           'iurans.iuran_id',
//           'iurans.user_id',
//           'users.name as username',
//           'iurans.komunitas_id',
//           'iurans.metode_pembayaran',
//           'iurans.jumlah',
//           'iurans.keterangan',
//           'iurans.bukti_pembayaran',
//           'iurans.status_pembayaran',
//           'iurans.created_at'
//         )
//         ->join('users', 'users.id', '=', 'iurans.user_id')
//         ->get();
//         return response([
//             'status'    => '200',
//             'data'     => $data,
//             'totalRecord'  => $length
//           ], 200);
//       }
//     }


	public function get_all_iuranDetails(){
		$length = DB::table('iurans')->count();
		return response([
			 	'status' 		=> '200',
				'data'			=> IuranApiModel::all(),
				'totalRecord'	=> $length
			], 200);
	}
}
