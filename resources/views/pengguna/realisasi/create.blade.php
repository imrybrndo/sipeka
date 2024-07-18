<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Realisasi Anggaran') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <form action="{{route('realisasi.store')}}" method="post">
            @csrf
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Realisasi Fisik</span>
                </div>
                <input type="text" name="realisasiFisik" class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Triwulan I</span>
                </div>
                <input type="text" name="triwulan1" id="idrInput" placeholder="Rp." class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Triwulan II</span>
                </div>
                <input type="text" name="triwulan2" id="idrInput" placeholder="Rp." class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Triwulan III</span>
                </div>
                <input type="text" name="triwulan3" id="idrInput" placeholder="Rp." class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Triwulan IV</span>
                </div>
                <input type="text" id="idrInput" placeholder="Rp." name="triwulan4" class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Anggaran</span>
                </div>
                <input type="text" id="idrInput" placeholder="Rp." name="anggaran" class="input input-bordered w-full" />
            </label>

            <div class="mt-3">
                <button class="btn btn-block btn-neutral">Simpan</button>
                <a href="{{route('realisasi.index')}}" class="btn btn-block mt-2">Kembali</a>
            </div>
        </form>

        {{-- <script>
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
                    e.target.value = `${value}`;
                });
            });
        </script> --}}
    </div>
</x-app-layout>