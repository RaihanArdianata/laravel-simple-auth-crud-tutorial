<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Siswa extends Model
{
    use HasFactory;

    public function select_all()
    {
    	$response = DB::table('siswa')->select('*')
        ->join('users','users.id','=','siswa.user_id')
        ->get();

    	return $response->toArray();
    }

    public function findById($id)
    {
    	$response = DB::table('siswa')->select('*')
        ->join('users','users.id','=','siswa.user_id')
        ->where('users.id', $id)
        ->get()[0];

    	return $response;
    }

    public function create($data){
        // dd($data);
        $response = DB::table('siswa')->insert([
            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            'kelas' => $data['kelas'],
            'jurusan' => $data['jurusan'],
            'nis' => $data['nis'],
            'nama_ortu' => $data['nama_ortu'],
            'alamat_ortu' => $data['alamat_ortu'],
            'telepon_ortu' => $data['telepon_ortu'],
            'pekerjaan_ortu' => $data['pekerjaan_ortu'],
            'foto' => $data['foto'],
            'status' => $data['status'],
            'user_id' => $data['user_id'],
        ]);

        return $response;
    }

    public function updateSiswa($data, $user_id){
        // dd($data);
        $response = DB::table('siswa')->where('user_id',$user_id)->update([
            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            'kelas' => $data['kelas'],
            'jurusan' => $data['jurusan'],
            'nis' => $data['nis'],
            'nama_ortu' => $data['nama_ortu'],
            'alamat_ortu' => $data['alamat_ortu'],
            'telepon_ortu' => $data['telepon_ortu'],
            'pekerjaan_ortu' => $data['pekerjaan_ortu'],
            'foto' => $data['foto'],
            'status' => $data['status'],
        ]);

        return $response;
    }

    public function updateUser($data, $user_id){
        // dd($data);
        $response = DB::table('users')->where('id',$user_id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        return $response;
    }

}
