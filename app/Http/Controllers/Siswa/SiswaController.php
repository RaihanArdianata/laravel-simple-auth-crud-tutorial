<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    function __construct()
    {
        $this->siswa = new Siswa;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->siswa->select_all();

        return view('siswa', ['siswa' => $response]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $response = $this->siswa->create($request);

        return view('siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = $this->siswa->findById($id);
        $siswaAll = $this->siswa->select_all();

        return view('siswa', ['siswaById' => $response, 'siswa' => $siswaAll]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            // dd($request);
            //code...
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $responseUser = $this->siswa->updateUser([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ], $id);

            $response = $this->siswa->updateSiswa([
                'nama' => $request->name,
                'alamat' => $request->jurusan ? $request->jurusan : "",
                'kelas' => $request->kelas ? $request->kelas : "",
                'jurusan' => $request->jurusan ? $request->jurusan : "",
                'nis' => $request->nis ? $request->nis : "",
                'nama_ortu' => $request->nama_ortu ? $request->nama_ortu : "",
                'alamat_ortu' => $request->alamat_ortu ? $request->alamat_ortu : "",
                'telepon_ortu' => $request->telepon_ortu ? $request->telepon_ortu : "",
                'pekerjaan_ortu' => $request->pekerjaan_ortu ? $request->pekerjaan_ortu : "",
                'foto' => $request->foto ? $request->foto : "",
                'status' => $request->status ? $request->status : "",
            ], $id);

            DB::commit();
            return redirect('siswa');
            
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            // return redirect(RouteServiceProvider::HOME);
            throw $th;
        }
    }
}
