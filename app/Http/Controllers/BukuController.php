<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Buku;
use Illuminate\Http\Request;


class BukuController extends Controller
{
    public function getbuku(){
        $dt_buku=buku::get();
        return response()->json($dt_buku);
    }
    public function getid($id){
        $dt_buku=buku::where ('id','=',$id)->get();
        return response()-> json($dt_buku);
    }
    public function tambahbuku(Request $req){
        $validate = Validator::make($req->all(),[
            'judul_buku'=>'required',
            'jenis_buku'=>'required',
            'pengarang'=>'required'
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $create = buku::create([
            'judul_buku'=>$req->judul_buku,
            'jenis_buku'=>$req->jenis_buku,
            'pengarang'=>$req->pengarang,
        ]);
        if($create){
            return response()->json(['status'=>true, 'message'=>'Sukses menambah data buku.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Gagal menabah data buku']);
        }
    }
    
    public function updatebuku(Request $req,$id){
        $validate = Validator::make($req->all(),[
            'judul_buku'=>'required',
            'jenis_buku'=>'required',
            'pengarang'=>'required'
        ]);
        if($validate->fails()){
            return response()->json(($validate->errors()->toJson()));
        }
        $update = buku::where('id_buku',$id)->update([
            'judul_buku'=>$req->get('judul_buku'),
            'jenis_buku'=>$req->get('jenis_buku'),
            'pengarang'=>$req->get('pengarang'),
        ]);
        if($update){
            return response()->json(['status'=>true, 'message'=>'Sukses Merubah data buku.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Gagal Merubah data buku']);
        }
    }
    public function deletebuku($id){
        $delete = buku:: where('id_buku',$id)->delete();
        if($delete){
            return response()->json(['status'=>true, 'message'=>'Sukses Menghapus data buku.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Gagal Menghapus data buku']);
        }
    }

}
