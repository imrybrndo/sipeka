<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Tambah Kinerja') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <form action="{{route('kegiatan.store')}}" method="post">
            @csrf
            @method('POST')
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Nama Program</span>
                </div>
                <select name="namaProgram" class="select select-bordered">
                    <option disabled selected>Pilih Program</option>
                    @foreach ($data as $item)
                    <option value="{{$item->id}}">{{$item->namaProgram}}</option>
                    @endforeach
                </select>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Nama Kegiatan</span>
                </div>
                <input type="text" name="namaKegiatan" class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Kode Kegiatan</span>
                </div>
                <input type="text" name="kodeKegiatan" class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Target Kegiatan</span>
                </div>
                <input type="text" name="targetKegiatan" class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Anggaran</span>
                </div>
                <input type="text" id="idrInput" name="anggaran" class="input input-bordered w-full" placeholder="Rp" />
            </label>
            <div class="flex gap-1 mt-2">
                <button type="submit" class="btn btn-neutral">Simpan</button>
                <a href="{{route('kegiatan.index')}}" class="btn">Kembali</a>
            </div>
        </form>
    </div>
    <script>
        document.querySelectorAll('input[id="idrInput"]').forEach(input => {
            input.addEventListener('input', function (e) {
                let value = e.target.value;
                value = value.replace(/\D/g, '');
                value = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(value);
                value = value.replace(/^Rp\s?|(,00)/g, '');
                e.target.value = `Rp ${value}`;
            });
        });
    </script>
</x-app-layout>