<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Data Pegawai') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div>
            <div class="flex justify-between items-end">

                <a href="{{route('pegawai.create')}}" class="btn btn-neutral">Tambah Data</a>

                <form action="{{ route('pegawai.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Cari..." class="input input-bordered"
                        value="{{ request()->query('search') }}">
                    <button type="submit" class="btn btn-neutral">Cari</button>
                </form>
            </div>
        </div>
        <div>
            <div class="overflow-x-auto">
                <table class="table mt-3">
                    <!-- head -->
                    <thead class="">
                        <tr>
                            <th>
                                No
                            </th>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Pangkat/Golongan</th>
                            <th>Jabatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <th>
                                {{$no++}}
                            </th>
                            <td>
                                <div>
                                    <div class="font-bold">{{$item->nip}}</div>
                                </div>
                            </td>
                            <td>{{$item->namaPegawai}}</td>
                            <td>
                                {{$item->pangkatGolongan}}
                            </td>
                            <td>
                                {{$item->status}}
                            </td>
                            <th>
                                <div class="flex justify-center items-center gap-2">
                                    <button class="btn"
                                        onclick="my_modal_5{{$item->id}}.showModal()">Edit</button>
                                    <dialog id="my_modal_5{{$item->id}}" class="modal">
                                        <div class="modal-box w-11/12 max-w-5xl">
                                            <h3 class="font-bold text-lg">Edit Data Pegawai</h3>
                                            <p class="opacity-50">Silahkan masukan form dibawah ini sesuai dengan data
                                                pengguna!</p>
                                            <form action="{{ route('pegawai.update', $item->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group mb-2">
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">NIP</span>
                                                        </div>
                                                        <input name="nip" type="text" value="{{old('nip', $item->nip)}}"
                                                            class="input input-bordered w-full" />
                                                    </label>
                                                </div>

                                                <div class="form-group mb-2">
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Nama Pegawai</span>
                                                        </div>
                                                        <input name="namaPegawai" type="text"
                                                            value="{{old('namaPegawai', $item->namaPegawai)}}"
                                                            class="input input-bordered w-full" />
                                                    </label>
                                                </div>

                                                <div class="form-group mb-2">
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Pangkat/Golongan</span>
                                                        </div>
                                                        <select class="select select-bordered" name="pangkatGolongan">
                                                            <option disabled {{ old('pangkatGolongan', $item->pangkatGolongan) ? '' : 'selected' }}>Pilih satu</option>
                                                            <option value="Juru Muda, I/a" {{ old('pangkatGolongan', $item->pangkatGolongan) == 'Juru Muda, I/a' ? 'selected' : '' }}>Juru Muda, I/a</option>
                                                            <option value="Juru Muda, TKT, 1, I/b" {{ old('pangkatGolongan', $item->pangkatGolongan) == 'Juru Muda, TKT, 1, I/b' ? 'selected' : '' }}>Juru Muda, TKT, 1, I/b</option>
                                                            <option value="Juru, I/c" {{ old('pangkatGolongan', $item->pangkatGolongan) == 'Juru, I/c' ? 'selected' : '' }}>Juru, I/c</option>
                                                            <option value="Juru, TKT,1,I/d" {{ old('pangkatGolongan', $item->pangkatGolongan) == 'Juru, TKT,1,I/d' ? 'selected' : '' }}>Juru, TKT,1,I/d</option>
                                                            <option value="Pengatur Muda, II/a" {{ old('pangkatGolongan', $item->pangkatGolongan) == 'Pengatur Muda, II/a' ? 'selected' : '' }}>Pengatur Muda, II/a</option>
                                                            <option value="Pengatur Muda TKT, 1, II/b" {{ old('pangkatGolongan', $item->pangkatGolongan) == 'Pengatur Muda TKT, 1, II/b' ? 'selected' : '' }}>Pengatur Muda TKT, 1, II/b</option>
                                                            <option value="Pengatur, II/c" {{ old('pangkatGolongan', $item->pangkatGolongan) == 'Pengatur, II/c' ? 'selected' : '' }}>Pengatur, II/c</option>
                                                            <option value="Pengatur, TKT, 1, II/d" {{ old('pangkatGolongan', $item->pangkatGolongan) == 'Pengatur, TKT, 1, II/d' ? 'selected' : '' }}>Pengatur, TKT, 1, II/d</option>
                                                            <option value="Penata Muda, III/a" {{ old('pangkatGolongan', $item->pangkatGolongan) == 'Penata Muda, III/a' ? 'selected' : '' }}>Penata Muda, III/a</option>
                                                            <option value="Penata Muda TKT, 1, III/b" {{ old('pangkatGolongan', $item->pangkatGolongan) == 'Penata Muda TKT, 1, III/b' ? 'selected' : '' }}>Penata Muda TKT, 1, III/b</option>
                                                            <option value="Penata, III/c" {{ old('pangkatGolongan', $item->pangkatGolongan) == 'Penata, III/c' ? 'selected' : '' }}>Penata, III/c</option>
                                                            <option value="Penata, TKT, 1, III/d" {{ old('pangkatGolongan', $item->pangkatGolongan) == 'Penata, TKT, 1, III/d' ? 'selected' : '' }}>Penata, TKT, 1, III/d</option>
                                                            <option value="Pembina, IV/a" {{ old('pangkatGolongan', $item->pangkatGolongan) == 'Pembina, IV/a' ? 'selected' : '' }}>Pembina, IV/a</option>
                                                            <option value="Pembina TKT, 1, IV/b" {{ old('pangkatGolongan', $item->pangkatGolongan) == 'Pembina TKT, 1, IV/b' ? 'selected' : '' }}>Pembina TKT, 1, IV/b</option>
                                                            <option value="Pembina Muda, IV/c" {{ old('pangkatGolongan', $item->pangkatGolongan) == 'Pembina Muda, IV/c' ? 'selected' : '' }}>Pembina Muda, IV/c</option>
                                                            <option value="Pembina Madya, IV/d" {{ old('pangkatGolongan', $item->pangkatGolongan) == 'Pembina Madya, IV/d' ? 'selected' : '' }}>Pembina Madya, IV/d</option>
                                                            <option value="Pembina Utama, IV/e" {{ old('pangkatGolongan', $item->pangkatGolongan) == 'Pembina Utama, IV/e' ? 'selected' : '' }}>Pembina Utama, IV/e</option>
                                                        </select>
                                                    </label>
                                                </div>
                                                {{-- Jabatan --}}
                                                <div class="form-group">
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Jabatan</span>
                                                        </div>
                                                        <input name="jabatan" type="text"
                                                            value="{{old('jabatan', $item->jabatan)}}"
                                                            class="input input-bordered w-full" />
                                                    </label>
                                                </div>
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Status</span>
                                                    </div>
                                                    <select class="select select-bordered" name="status">
                                                        <option disabled {{old('status', $item->status) ? '' : 'selected'}}>Pilih</option>
                                                        <option value="SEKRETARIS DAERAH" {{old('status', $item->status) == 'SEKRETARIS DAERAH' ? 'selected' : '' }}>SEKRETARIS DAERAH</option>
                                                        <option value="KETUA SEKRETARIS DEWAN" {{old('status', $item->status) == 'KETUA SEKRETARIS DWAN' ? 'selected' : ''}}>KETUA SEKRETARIS DEWAN</option>
                                                        <option value="ASISTEN SEKRETARIS DAERAH" {{old('status', $item->status) == 'ASISTEN SEKRETARIS' ? 'selected' : ''}}>ASISTEN SEKRETARIS DAERAH</option>
                                                        <option value="KEPALA BADAN" {{old('status', $item->status) == 'KEPALA BADAN' ? 'selected' : ''}}>KEPALA BADAN</option>
                                                        <option value="KEPALA DINAS" {{old('status', $item->status) == 'KEPALA DINAS' ? 'selected' : ''}}>KEPALA DINAS</option>
                                                        <option value="CAMAT" {{old('status', $item->status) == 'CAMAT' ? 'selected' : ''}}>CAMAT</option>
                                                        <option value="KEPALA BAGIAN" {{old('status', $item->status) == 'KEPALA BAGIAN' ? 'selected' : ''}}>KEPALA BAGIAN</option>
                                                        <option value="KEPALA BIDANG" {{old('status', $item->status) == 'KEPALA BIDANG' ? 'selected' : ''}}>KEPALA BIDANG</option>
                                                        <option value="JABATAN FUNGSIONAL" {{old('status', $item->status) == 'JABATAN FUNGSIONAL' ? 'selected' : '' }}>JABATAN FUNGSIONAL</option>
                                                        <option value="KEPALA SEKSI" {{old('status', $item->status) == 'KEPALA SEKSI' ? : ''}}>KEPALA SEKSI</option>
                                                        <option value="JABATAN PELAKSANA" {{old('status', $item->status) == 'JABATAN PELAKSANA' ? : ''}}>JABATAN PELAKSANA</option>
                                                        <option value="INSPEKTUR PEMBANTU WILAYAH" {{old('status',$item->status) == 'INSPEKTUR PEMBANTU WILAYAH' ? : ''}}>INSPEKTUR PEMBANTU WILAYAH</option>
                                                        <option value="SEKRETARIS BADAN" {{old('status', $item->status) == 'SEKRETARIS BADAN' ? : ''}}>SEKRETARIS BADAN</option>
                                                        <option value="SEKRETARIS DINAS" {{old('status', $item->status) == 'SEKRETARIS DINAS' ? : ''}}>SEKRETARIS DINAS</option>
                                                        <option value="SEKRETARIS KECAMATAN" {{old('status', $item->status) == 'SEKRETARIS KECAMATAN' ? : ''}}>SEKRETARIS KECAMATAN</option>
                                                        <option value="LURAH" {{old('status', $item->status) == 'LURAH' ? : ''}}>LURAH</option>
                                                        <option value="KEPALA SEKOLAH" {{old('status', $item->status) == 'KEPALA SEKOLAH' ? : ''}}>KEPALA SEKOLAH</option>
                                                        <option value="SEKRETARIS INSPEKTORAT" {{old('status', $item->status == 'SEKRETARIS INSPEKTORAT' ? : '')}}>SEKRETARIS INSPEKTORAT</option>
                                                        <option value="SEKRETARIS SATUAN" {{old('status', $item->status) == 'SEKRETARIS SATUAN' ? : '' }}>SEKRETARIS SATUAN</option>
                                                    </select>
                                                </label>
                                                <div class="flex justify-start items-start gap-2">
                                                    <button class="btn btn-block btn-neutral mt-6">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </dialog>
                                    <!-- Open the modal using ID.showModal() method -->
                                    <button class="btn bg-red-700 text-white" onclick="my_modal_6{{$item->id}}.showModal()">Hapus</button>
                                    <dialog id="my_modal_6{{$item->id}}" class="modal modal-bottom sm:modal-middle">
                                        <div class="modal-box">
                                            <h3 class="font-bold text-lg">Perhatian!</h3>
                                            <p class="py-4">Apakah anda yakin ingin menghapus {{$item->nip}}-{{$item->namaPegawai}} ?</p>
                                            <div class="modal-action">
                                                <div class="flex gap-1">
                                                    <form action="{{route('pegawai.destroy', $item->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-neutral">Ya</button>
                                                    </form>
                                                    <form method="dialog">
                                                        <!-- if there is a button in form, it will close the modal -->
                                                        <button class="btn">Tidak</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </dialog>
                                </div>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2">
                    {{$data->appends(request()->input())->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</x-app-layout>