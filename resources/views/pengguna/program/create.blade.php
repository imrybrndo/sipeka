<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Tambah Program') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <form action="{{route('program.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Nama Program</span>
                </div>
                <input type="text" name="namaProgram" class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Anggaran TRIWULAN I</span>
                </div>
                <input type="text" id="idrInput" name="triwulan1" class="input input-bordered w-full"
                    placeholder="Rp" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Target TRIWULAN II</span>
                </div>
                <input type="text" id="idrInput" name="triwulan2" class="input input-bordered w-full"
                    placeholder="Rp" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Target TRIWULAN III</span>
                </div>
                <input type="text" id="idrInput" name="triwulan3" class="input input-bordered w-full"
                    placeholder="Rp" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Target TRIWULAN IV</span>
                </div>
                <input type="text" id="idrInput" name="triwulan4" class="input input-bordered w-full"
                    placeholder="Rp" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Target Anggaran</span>
                </div>
                <input type="text" id="idrInput" name="targetAnggaran" class="input input-bordered w-full"
                    placeholder="Rp" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Anggaran</span>
                </div>
                <input type="text" id="idrInput" name="anggaran" class="input input-bordered w-full" placeholder="Rp" />
            </label>
            <button type="submit" class="btn btn-block btn-neutral mt-3 mb-2">Simpan</button>
            <a class="btn btn-block" href="{{route('program.index')}}">Kembali</a>
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