<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Tambah Indikator') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <form action="{{route('indikator.store')}}" method="post">
            @csrf
            @method('POST')
            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Nama Indikator</span>
                </div>
                <input type="text" name="namaIndikator" class="input input-bordered w-full " />
            </label>

            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Satuan Indikator</span>
                </div>
                <input type="text" name="satuanIndikator" class="input input-bordered w-full " />
            </label>

            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Sifat Indikator</span>
                </div>
                <select name="sifatIndikator" class="select select-bordered">
                    <option disabled selected>Pilih Satu</option>
                    <option value="Positif">Positif</option>
                    <option value="Negatif">Negatif</option>
                </select>
            </label>

            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Tipe Indikator</span>
                </div>
                <select name="tipeIndikator" class="select select-bordered">
                    <option disabled selected>Pilih Satu</option>
                    <option value="Positif">Masukan</option>
                    <option value="Negatif">Keluaran</option>
                </select>
            </label>

            <div class="flex gap-1 mt-3">
                <button type="submit" class="btn btn-neutral">Simpan</button>
                <a href="{{route('indikator.index')}}" class="btn">Kembali</a>
            </div>
        </form>
    </div>
</x-app-layout>