<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{
    public function getmahasiswa(){
        $dt_mahasiswa=mahasiswa::get();
        return response()->json($dt_mahasiswa);
    }
    public function getid($id){
        $dt_mahasiswa=Mahasiswa::where ('id','=',$id)->get();
        return response()-> json($dt_mahasiswa);
    }
    public function tambahmahasiswa(Request $req){
        $validate = Validator::make($req->all(),[
            'nama'=>'required',
            'alamat'=>'required',
            'jenis_kelamin'=>'required',
            'id_jurusan'=>'required'
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $create = Mahasiswa::create([
            'nama'=>$req->nama,
            'alamat'=>$req->alamat,
            'jenis_kelamin'=>$req->jenis_kelamin,
            'id_jurusan'=>$req->id_jurusan
        ]);
        if($create){
            return response()->json(['status'=>true, 'message'=>'Sukses menambah data mahasiswa.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Gagal menabah data mahasiswa']);
        }
    }

    public function updatemahasiswa(Request $req,$id){
        $validate = Validator::make($req->all(),[
            'nama'=>'required',
            'alamat'=>'required',
            'jenis_kelamin'=>'required',
            'id_jurusan'=>'required'
        ]);
        if($validate->fails()){
            return response()->json(($validate->errors()->toJson()));
        }
        $update = mahasiswa::where('id',$id)->update([
            'nama'=>$req->get('nama'),
            'alamat'=>$req->get('alamat'),
            'jenis_kelamin'=>$req->get('jenis_kelamin'),
            'id_jurusan'=>$req->get('id_jurusan'),
        ]);
        if($update){
            return response()->json(['status'=>true, 'message'=>'Sukses Merubah data mahasiswa.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Gagal Merubah data mahasiswa']);
        }
    }
    public function deletemahasiswa($id){
        $delete = mahasiswa:: where('id',$id)->delete();
        if($delete){
            return response()->json(['status'=>true, 'message'=>'Sukses Menghapus data mahasiswa.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Gagal Menghapus data mahasiswa']);
        }
    }

}
