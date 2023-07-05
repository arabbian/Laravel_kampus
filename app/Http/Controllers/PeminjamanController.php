<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Peminjaman;
use Carbon\Carbon as CarbonCarbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use illuminate\Support\carbon;


class PeminjamanController extends Controller
{
    public function getpeminjaman(Request $req,$id){
        $data_peminjaman = Peminjaman::
        join('mahasiswa','mahasiswa.id','=','peminjaman.id')
        ->join('jurusan','jurusan.id_jurusan','=','peminjaman.id_jurusan')
        ->join('buku','buku.id_buku','=','peminjaman.id_buku')
        ->orderBy('id_peminjaman','desc')
        ->get();
        return Response()->json($data_peminjaman);
    }
  
    public function createpeminjaman (Request $req)
    {
        $validator = Validator::make($req->all(),[
            'id'=>'required',
            'id_jurusan'=>'required',
            'id_buku'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors()->toJson());
        }
        $tenggat = carbon::now()->addDays(4);
        $save = peminjaman::create([
            'id' =>$req->get('id'),
            'id_buku' =>$req->get('id_buku'),
            'id_jurusan' =>$req->get('id_jurusan'),
            'tgl_peminjam' =>date('Y-m-d H:i:s'),
            'tenggat' =>$tenggat,
            'status' => 'Dipinjam',
        ]);
        if($save){
            return Response()->json(['status'=>true,'message' => 'Sukses Menambah Peminjaman']);
        } else {
            return Response()->json(['status'=>false,'message' => 'Gagal Menambah Peminjaman']);
        }
    }

    public function ubahpeminjaman(Request $req,$id)
    {
        $validator = Validator::make($req->all(),[
            'id'=>'required',
            'id_jurusan'=>'required',
            'id_buku'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors()->toJson());
        }
        $ubah = peminjaman::where('id_peminjaman',$id)->update([
            'id' => $req->get('id'),
            'id_buku' => $req->get('id_buku'),
            'id_jurusan' => $req->get('id_jurusan'),
        ]);
        if($ubah){
            return Response()->json(['status'=>true,'message' => 'Sukses Mengubah Peminjaman']);
        } else {
            return Response()->json(['status'=>false,'message' => 'Gagal Mengubah Peminjaman']);
        }
    }
    public function hapuspeminjaman($id){
        $hapus=Peminjaman::where('id_peminjaman',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>true,'message' => 'Sukses Menghapus Peminjaman']);
        } else {
            return Response()->json(['status'=>false,'message' => 'Gagal Menghapus Peminjaman']);
        }
    }
    public function pengembalian($id){
        $tgl_kembali = Carbon::now();
        $hapus = Peminjaman::where('id_peminjaman',"=",$id)->update([
            'status'=>'Kembali',
            'tgl_kembali'=>$tgl_kembali,
        ]);
        if($hapus){
            return Response()->json(['status'=>true,'message' => 'Sukses Mengembalikan Peminjaman']);
        } else {
            return Response()->json(['status'=>false,'message' => 'Gagal Mengembalikan Peminjaman']);
        }
    }

}
