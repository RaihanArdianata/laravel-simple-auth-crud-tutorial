<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    function __construct()
    {
        $this->siswa = new Siswa;
    }
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // dd($request);
            //code...
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $response = $this->siswa->create([
                'nama' => $request->name,
                'alamat' => $request->jurusan ? $request->jurusan : "",
                'kelas' => $request->kelas? $request->kelas : "",
                'jurusan' => $request->jurusan? $request->jurusan : "",
                'nis' => $request->nis? $request->nis : "",
                'nama_ortu' => $request->nama_ortu? $request->nama_ortu : "",
                'alamat_ortu' => $request->alamat_ortu? $request->alamat_ortu : "",
                'telepon_ortu' => $request->telepon_ortu? $request->telepon_ortu : "",
                'pekerjaan_ortu' => $request->pekerjaan_ortu? $request->pekerjaan_ortu : "",
                'foto' => $request->foto? $request->foto : "",
                'status' => $request->status? $request->status : "",
                'user_id' => $user->id,
            ]);

            DB::commit();
            if($request->siswa_baru){
                return redirect('siswa');
            }
            event(new Registered($user));

            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            // return redirect(RouteServiceProvider::HOME);
            throw $th;
        }
    }

    public function destroy($id){
        DB::beginTransaction();
        try {
            //code...
            $user = User::where('id',$id)->delete();
            DB::commit();
            return redirect(RouteServiceProvider::HOME);
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            // return redirect(RouteServiceProvider::HOME);
            throw $th;
        }
    }
}
