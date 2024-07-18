<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Buat Surat Perjanjian Kinerja') }}
            </h2>
        </div>
    </x-slot>
    <form action="{{route('surat.store')}}" method="post">
        @csrf
        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">PIHAK PERTAMA</span>
                </div>
                <select name="pihakPertama" class="select select-bordered">
                    <option>Pilih pegawai</option>
                    @foreach ($data as $item)
                    <option value="{{$item->namaPegawai}}">{{$item->namaPegawai}} -</option>
                    @endforeach
                </select>
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">JABATAN PIHAK PERTAMA</span>
                </div>
                <input name="jabatanPihakPertama" type="text"
                    class="input input-bordered w-full" />
            </label>


            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">PIHAK KEDUA</span>
                </div>
                <select name="pihakKedua" class="select select-bordered">
                    <option>Pilih pegawai</option>
                    @foreach ($data as $item)
                    <option value="{{$item->namaPegawai}}">{{$item->namaPegawai}} -</option>
                    @endforeach
                </select>
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">JABATAN PIHAK KEDUA</span>
                </div>
                <input name="jabatanPihakKedua" type="text"
                    class="input input-bordered w-full" />
            </label>
        </div>

        {{-- <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-3">
            <p class="bg-red-700 text-white text-center font-semibold">TUJUAN</p>
            <label class="form-control w-full mt-3">
                <label class="form-control w-full">
                    <a class="btn btn-neutral max-w-xs" onclick="addInputField()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah
                    </a>
                    <div id="inputFields" class="mb-2">
                        <div class="label">
                            <span class="label-text">Tujuan</span>
                        </div>
                        @for ($i = 1; $i <= 1; $i++) <input type="text" name="tujuan[]"
                            class="input input-bordered w-full mt-2">
                            @endfor
                    </div>
                </label>
                <script>
                    function addInputField() {
                        const inputFields = document.getElementById('inputFields');
                        const newInputField = document.createElement('input');
                        newInputField.setAttribute('type', 'text');
                        newInputField.setAttribute('placeholder', 'Type here');
                        newInputField.setAttribute('class', 'input input-bordered w-full mt-2');
                        newInputField.setAttribute('name', 'tujuan[]'); // Changed to use an array for multiple inputs
                        inputFields.appendChild(newInputField);
                    }
                </script>
            </label>
        </div> --}}

        <button type="submit" class="btn btn-neutral btn-block mt-2">Buat Surat</button>
        <a href="{{route('surat.index')}}" class="btn btn-block">Kembali</a>
    </form>
</x-app-layout>