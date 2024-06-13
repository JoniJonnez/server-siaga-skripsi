<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\api\PengaduanApiModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PengaduanApiController extends Controller
    {
    public function get_all(){
    $length = DB::table('pengaduans')->count();
    $data = DB::table('pengaduans')
    ->select('pengaduans.id','user_id','komunitas_id','users.name','users.foto','lokasi_kejadian', 'waktu_kejadian','penyebab_kejadian','status_pengaduan','tanggapan_pengaduan','judul_pengaduan','pengaduan_image','isi_pengaduan','pengaduans.created_at','pengaduans.updated_at')
    ->join('users', 'users.id','=','pengaduans.user_id')
    ->get();
    return response([
             'status' 		=> '200',
            'data'			=> $data,
            'totalRecord'	=> $length
        ], 200);
}

public function by_id($id){
    $c_exist = PengaduanApiModel::firstWhere('id', $id);
     if($c_exist) {
     $result = $c_exist->join('komunitas', 'komunitas.id','pengaduans.komunitas_id')
     ->join('users', 'users.id','pengaduans.user_id')
     ->select('pengaduans.*', 'komunitas.nama_komunitas', 'users.name')
     ->where('pengaduans.id', $id)
     ->get();
       return response([
      'status' => '200',
      'data'=> $result,
      'messages' => 'Data found'
   ], 200);

 }
    else {
     return response([
     'status' => '404',
      'messages' => 'Data not found',
       'totalRecord'=> '0'
         ], 200);
    }
}

 public function delete($id){
    $c_exist = PengaduanApiModel::firstWhere('id', $id);
    if($c_exist) {
      $result = PengaduanApiModel::destroy($id);
    if($result){
      return response([
       'status' => '200',
        'messages' => 'Data has been deleted'
         ], 200);
}
    else{
       return response([
        'status' => '404',
         'messages' => 'Data has not been deleted'
   ], 400);
  }
}
    else {
       return response([
        'status' => '404',
         'messages' => 'Data not found'
    ], 404);
   }
}

public function insert(Request $request)
{
    $dt = new PengaduanApiModel;
    $dt->user_id = $request->user_id;
    $dt->judul_pengaduan = $request->judul_pengaduan;
    $dt->isi_pengaduan = $request->isi_pengaduan;

    if ($request->hasFile('pengaduan_image')) {
        $file = $request->file('pengaduan_image');
        $fileName = time().'_'.$file->getClientOriginalName();
        $dt->pengaduan_image = $file->storeAs('pengaduan_image', $fileName, 'public');
        // $dt->file = $dt->pengaduan_image;
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

}
