<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\api\IuranPenggunaApiModel;
use App\Models\api\IuranTipeApiModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IuranApiController extends Controller
{
	public function get_all(){
		$length = DB::table('iuran_penggunas')->count();
        $data = DB::table('iuran_penggunas')
        ->select('iuran_penggunas.id','user_id','users.iuran_jumlah','iuran_id','keterangan','bukti_pembayaran','users.name','users.foto','iurans.metode_pembayaran','iurans.no_rekening','iurans.pemilik_rekening','iuran_penggunas.created_at')
        ->join('users', 'users.id','=','iuran_penggunas.user_id')
        ->join('iurans', 'iurans.id','=','iuran_penggunas.iuran_id')
        ->get();
		return response([
			 	'status' 		=> '200',
				'data'			=> $data,
				'totalRecord'	=> $length
			], 200);
	}

    public function get_tipe(){
		$length = DB::table('iurans')->count();
		return response([
			 	'status' 		=> '200',
				'data'			=> IuranTipeApiModel::all(),
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
      // Validate incoming request
      $request->validate([
        'user_id' => 'required|exists:users,id',
        'iuran_id' => 'required|exists:iurans,id',
        'keterangan' => 'required|string',
        'bukti_pembayaran' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      // Create a new IuranPenggunaApiModel instance
      $dt = new IuranPenggunaApiModel;

      // Assign the incoming request data to the model
      $dt->user_id = $request->user_id;
      $dt->iuran_id = $request->iuran_id;
      $dt->keterangan = $request->keterangan;

      // Handle file upload
      if ($request->hasFile('bukti_pembayaran')) {
        $file = $request->file('bukti_pembayaran');
        $fileName = time().'_'.$file->getClientOriginalName();
        $filePath = $file->storeAs('bukti_pembayaran', $fileName, 'public');
        $dt->bukti_pembayaran = $filePath;
      }

      // Save the model
      $result = $dt->save();

      // Return appropriate response
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

// 	public function insert(Request $request)
// {
//     $dt = new IuranPenggunaApiModel;
//     $dt->user_id = $request->user_id;
//     $dt->keterangan = $request->keterangan;

//     if ($request->hasFile('bukti_pembayaran')) {
//         $file = $request->file('bukti_pembayaran');
//         $fileName = time().'_'.$file->getClientOriginalName();
//         $dt->bukti_pembayaran = $file->storeAs('bukti_pembayaran', $fileName, 'public');
//     }

//     $result = $dt->save();
//     if ($result) {
//         return response([
//             'status' => '200',
//             'message' => 'Data has been saved',
//             'data' => $dt
//         ], 200);
//     } else {
//         return response([
//             'status' => '500',
//             'message' => 'Data could not be saved'
//         ], 500);
//     }
// }

}
