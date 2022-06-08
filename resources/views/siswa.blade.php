<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<x-app-layout>
    @php
    $count = 1
    @endphp
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (isset($siswaById))
                    <!-- form-update -->
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="/siswa-update/{{$siswaById->user_id}}" method="POST">
                            {{ csrf_field() }}
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3 mt-4">
                                            <label for="first-name" class="block text-sm font-medium text-gray-700">Nama</label>
                                            <input value="{{$siswaById->name}}" required type="text" name="name" id="first-name" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 mt-4">
                                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                            <input value="{{$siswaById->email}}" required type="email" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-label for="password" :value="__('Password Baru')" />
                                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mt-4">
                                            <x-label for="password_confirmation" :value="__('Confirm Password Baru')" />

                                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                                        </div>
                                        <!-- <div class="col-span-6 sm:col-span-3 mt-4">
                                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                            <input required type="text" name="password" id="password" autocomplete="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div> -->

                                        <div class="col-span-6 sm:col-span-3 mt-4">
                                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                            <input value="{{$siswaById->alamat}}" type="text" name="alamat" id="alamat" autocomplete="alamat" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                                            <input value="{{$siswaById->kelas}}" type="text" name="kelas" id="kelas" autocomplete="kelas" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 mt-4">
                                            <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                                            <select id="jurusan" name="jurusan" autocomplete="jurusan" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="RPL" {{( $siswaById->jurusan == "RPL") ? 'selected' : '' }}>RPL</option>
                                                <option value="TKJ" {{( $siswaById->jurusan == "TKJ") ? 'selected' : '' }}>TKJ</option>
                                                <option value="TJA" {{( $siswaById->jurusan == "TJA") ? 'selected' : '' }}>TJA</option>
                                            </select>
                                        </div>

                                        <div class="col-span-6">
                                            <label for="nis" class="block text-sm font-medium text-gray-700">NIS</label>
                                            <input value="{{$siswaById->nis}}" type="text" name="nis" id="nis" autocomplete="nis" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                            <label for="nama_ortu" class="block text-sm font-medium text-gray-700">Nama Ortu</label>
                                            <input value="{{$siswaById->nama_ortu}}" type="text" name="nama_ortu" id="nama_ortu" autocomplete="nama_ortu" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 mt-4 lg:col-span-2">
                                            <label for="alamat_ortu" class="block text-sm font-medium text-gray-700">Alamat Ortu</label>
                                            <input value="{{$siswaById->alamat_ortu}}" type="text" name="alamat_ortu" id="alamat_ortu" autocomplete="alamat_ortu" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 mt-4 lg:col-span-2">
                                            <label for=telepon_ortu" class="block text-sm font-medium text-gray-700">Telepon Ortu</label>
                                            <input value="{{$siswaById->telepon_ortu}}" type="text" name="telepon_ortu" id=telepon_ortu" autocomplete="telepon_ortu" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 mt-4 lg:col-span-2">
                                            <label for="pekerjaan_ortu" class="block text-sm font-medium text-gray-700">Pekerjaan Ortu</label>
                                            <input value="{{$siswaById->pekerjaan_ortu}}" type="text" name="pekerjaan_ortu" id="pekerjaan_ortu" autocomplete="pekerjaan_ortu" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 mt-4">
                                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                            <select id="status" name="status" autocomplete="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="pelajar" {{( $siswaById->status == "pelajar") ? 'selected' : '' }}>Bersekolah</option>
                                                <option value="lulus" {{( $siswaById->status == "lulus") ? 'selected' : '' }}>Lulus</option>
                                                <option value="lainnya" {{( $siswaById->status == "lainnya") ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-5 py-3 bg-gray-50 text-right sm:px-6" style="margin-top: 20px; margin-bottom: 20px; display: flex; justify-content: end;">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border shadow-sm text-sm font-medium rounded-md text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                                    <a href="/siswa" type="submit" class="ml-4 inline-flex justify-center py-2 px-4 border shadow-sm text-sm font-medium rounded-md text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end form-update -->
                    @else
                    <!-- form-create -->
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="/siswa-create" method="POST">
                            {{ csrf_field() }}
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <input id="siswa-baru" class="block mt-1 w-full" type="text" name="siswa_baru" style="display: none;" value="true" />
                                        <div class="col-span-6 sm:col-span-3 mt-4">
                                            <label for="first-name" class="block text-sm font-medium text-gray-700">Nama</label>
                                            <input required type="text" name="name" id="first-name" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 mt-4">
                                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                            <input required type="email" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-label for="password" :value="__('Password')" />

                                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mt-4">
                                            <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                                        </div>
                                        <!-- <div class="col-span-6 sm:col-span-3 mt-4">
                                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                            <input required type="text" name="password" id="password" autocomplete="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div> -->

                                        <div class="col-span-6 sm:col-span-3 mt-4">
                                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                            <input type="text" name="alamat" id="alamat" autocomplete="alamat" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                                            <input type="text" name="kelas" id="kelas" autocomplete="kelas" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 mt-4">
                                            <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                                            <select id="jurusan" name="jurusan" autocomplete="jurusan" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="RPL">RPL</option>
                                                <option value="TKJ">TKJ</option>
                                                <option value="TJA">TJA</option>
                                            </select>
                                        </div>

                                        <div class="col-span-6">
                                            <label for="nis" class="block text-sm font-medium text-gray-700">NIS</label>
                                            <input type="text" name="nis" id="nis" autocomplete="nis" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                            <label for="nama_ortu" class="block text-sm font-medium text-gray-700">Nama Ortu</label>
                                            <input type="text" name="nama_ortu" id="nama_ortu" autocomplete="nama_ortu" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 mt-4 lg:col-span-2">
                                            <label for="alamat_ortu" class="block text-sm font-medium text-gray-700">Alamat Ortu</label>
                                            <input type="text" name="alamat_ortu" id="alamat_ortu" autocomplete="alamat_ortu" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 mt-4 lg:col-span-2">
                                            <label for=telepon_ortu" class="block text-sm font-medium text-gray-700">Telepon Ortu</label>
                                            <input type="text" name="telepon_ortu" id=telepon_ortu" autocomplete="telepon_ortu" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 mt-4 lg:col-span-2">
                                            <label for="pekerjaan_ortu" class="block text-sm font-medium text-gray-700">Pekerjaan Ortu</label>
                                            <input type="text" name="pekerjaan_ortu" id="pekerjaan_ortu" autocomplete="pekerjaan_ortu" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 mt-4">
                                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                            <select id="status" name="status" autocomplete="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="pelajar">Bersekolah</option>
                                                <option value="lulus">Lulus</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-5 py-3 bg-gray-50 text-right sm:px-6" style="margin-top: 20px; margin-bottom: 20px; display: flex; justify-content: end;">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border shadow-sm text-sm font-medium rounded-md text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end form-create -->
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="table-fixed border-collapse border border-slate-500" border="1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>NIS</th>
                                <th>Nama Ortu</th>
                                <th>Alamat Ortu</th>
                                <th>Telepon Ortu</th>
                                <th>Pekerjaan Ortu</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($siswa as $s)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $s->nama }}</td>
                                <td>{{ $s->email }}</td>
                                <td>{{ $s->alamat }}</td>
                                <td>{{ $s->kelas }}</td>
                                <td>{{ $s->jurusan }}</td>
                                <td>{{ $s->nis }}</td>
                                <td>{{ $s->nama_ortu }}</td>
                                <td>{{ $s->alamat_ortu }}</td>
                                <td>{{ $s->telepon_ortu }}</td>
                                <td>{{ $s->pekerjaan_ortu }}</td>
                                <td>{{ $s->foto }}</td>
                                <td>{{ $s->status }}</td>
                                <td>
                                    <a href="/siswa-by-id/{{ $s->id }}">Edit</a>
                                    |
                                    <a href="/siswa-delete/{{ $s->user_id }}">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>