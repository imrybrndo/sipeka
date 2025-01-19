<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Tambah Pegawai') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <form action="{{route('pegawai.store')}}" method="post">
            @csrf
            @method('POST')
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">NIP</span>
                </div>
                <input type="text" name="nip" class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Nama Pegawai</span>
                </div>
                <input type="text" name="namaPegawai" class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Pangkat/Golongan</span>
                </div>
                <select class="select select-bordered" name="pangkatGolongan">
                    <option disabled selected>Pilih satu</option>
                    <option value="Juru Muda, I/a">Juru Muda, I/a</option>
                    <option value="Juru Muda, TKT, 1, I/b">Juru Muda, TKT, 1, I/d</option>
                    <option value="Juru, I/c">Juru, I/c</option>
                    <option value="Juru, TKT,1,I/d">Juru, TKT,1,I/d</option>
                    <option value="Pengatur Muda, II/a">Pengatur Muda, II/a</option>
                    <option value="Pengatur Muda TKT, 1, II/b">Pengatur Muda TKT, 1, II/b</option>
                    <option value="Pengatur, II/c">Pengatur, II/c</option>
                    <option value="Pengatur, TKT, 1, II/d">Pengatur, TKT, 1, II/d</option>
                    <option value="Penata Muda, III/a">Penata Muda, III/a</option>
                    <option value="Penata Muda TKT, 1, III/b">Penata Muda TKT, 1, III/b</option>
                    <option value="Penata, III/c">Penata, III/c</option>
                    <option value="Penata, TKT, 1, III/d">Penata, TKT, 1, III/d</option>
                    <option value="Pembina, IV/a">Pembina, IV/a</option>
                    <option value="Pembina TKT, 1, IV/b">Pembina TKT, 1, IV/b</option>
                    <option value="Pembina Muda, IV/c">Pembina Muda, IV/c</option>
                    <option value="Pembina Madya, IV/d">Pembina Madya, IV/d</option>
                    <option value="Pembina Utama, IV/e">Pembina Utama, IV/e</option>
                </select>
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Jabatan</span>
                </div>
                <input type="text" name="jabatan" class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Status</span>
                </div>
                <select class="select select-bordered" name="status">
                    <option>Pilih</option>
                    <option value="SEKRETARIS DAERAH">SEKRETARIS DAERAH</option>
                    <option value="KETUA SEKRETARIS DEWAN">KETUA SEKRETARIS DEWAN</option>
                    <option value="ASISTEN SEKRETARIS DAERAH">ASISTEN SEKRETARIS DAERAH</option>
                    <option value="KEPALA BADAN">KEPALA BADAN</option>
                    <option value="KEPALA DINAS">KEPALA DINAS</option>
                    <option value="CAMAT">CAMAT</option>
                    <option value="KEPALA BAGIAN">KEPALA BAGIAN</option>
                    <option value="KEPALA BIDANG">KEPALA BIDANG</option>
                    <option value="JABATAN FUNGSIONAL">JABATAN FUNGSIONAL</option>
                    <option value="KEPALA SEKSI">KEPALA SEKSI</option>
                    <option value="JABATAN PELAKSANA">JABATAN PELAKSANA</option>
                    <option value="INSPEKTUR KOTA">INSPEKTUR KOTA</option>
                    <option value="INSPEKTUR PEMBANTU WILAYAH">INSPEKTUR PEMBANTU WILAYAH</option>
                    <option value="SEKRETARIS BADAN">SEKRETARIS BADAN</option>
                    <option value="SEKRETARIS DINAS">SEKRETARIS DINAS</option>
                    <option value="SEKRETARIS KECAMATAN">SEKRETARIS KECAMATAN</option>
                    <option value="LURAH">LURAH</option>
                    <option value="KEPALA SEKOLAH">KEPALA SEKOLAH</option>
                    <option value="SEKRETARIS INSPEKTORAT">SEKRETARIS INSPEKTORAT</option>
                    <option value="SEKRETARIS SATUAN">SEKRETARIS SATUAN</option>
                    
                </select>
            </label>

            <div class="flex gap-2 mt-2">
                <button type="submit" class="btn btn-neutral">Simpan</button>
                <a href="{{route('pegawai.index')}}" class="btn">Kembali</a>
            </div>
        </form>
    </div>
    @include('sweetalert::alert')
</x-app-layout>