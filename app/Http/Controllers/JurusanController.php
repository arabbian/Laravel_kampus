<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Jurusan;
use Illuminate\Http\Request;


class jurusanController extends Controller
{
    public function getjurusan(){
        $dt_jurusan=jurusan::get();
        return response()->json($dt_jurusan);
    }
    public function getid($id){
        $dt_jurusan=jurusan::where ('id','=',$id)->get();
        return response()-> json($dt_jurusan);
    }
    public function tambahjurusan(Request $req){
        $validate = Validator::make($req->all(),[
            'nama_jurusan'=>'required',
            
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $create = jurusan::create([
            'nama_jurusan'=>$req->nama_jurusan
        ]);
        if($create){
            return response()->json(['status'=>true, 'message'=>'Sukses menambah data jurusan.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Gagal menabah data jurusan']);
        }
    }
    
    public function updatejurusan(Request $req,$id){
        $validate = Validator::make($req->all(),[
            'nama_jurusan'=>'required',
            
        ]);
        if($validate->fails()){
            return response()->json(($validate->errors()->toJson()));
        }
        $update = jurusan::where('id_jurusan',$id)->update([
            'nama_jurusan'=>$req->get('nama_jurusan'),
            
        ]);
        if($update){
            return response()->json(['status'=>true, 'message'=>'Sukses Merubah data jurusan.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Gagal Merubah data jurusan']);
        }
    }
    public function deletejurusan($id){
        $delete = jurusan:: where('id_jurusan',$id)->delete();
        if($delete){
            return response()->json(['status'=>true, 'message'=>'Sukses Menghapus data jurusan.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Gagal Menghapus data jurusan']);
        }
    }

}
