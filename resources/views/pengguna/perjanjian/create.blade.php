<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Buat Surat Perjanjian Kinerja') }}
            </h2>
        </div>
    </x-slot>

    <form action="{{route('kinerja.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Nama Pegawai</span>
                </div>
                <select name="namaPegawai" class="select select-bordered">
                    <option>Pilih pegawai</option>
                    @foreach ($data as $item)
                    <option value="{{$item->id}}">{{$item->namaPegawai}} -</option>
                    @endforeach
                </select>
            </label>
        </div>

        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-3">
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
        </div>

        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-3">
            <p class="bg-red-700 text-white text-center font-semibold">INDIKATOR TUJUAN</p>
            <label class="form-control w-full mt-3">
                <label class="form-control w-full">
                    <a class="btn btn-neutral max-w-xs" onclick="addInputField2()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah
                    </a>
                    <div id="inputFields2" class="mb-2">
                        <div class="label">
                            <span class="label-text">Indikator Tujuan</span>
                        </div>
                        @for ($i = 1; $i <= 1; $i++) <input type="text" name="indikatorTujuan[]"
                            class="input input-bordered w-full mt-2">
                            @endfor
                    </div>
                </label>
                <script>
                    function addInputField2() {
                        const inputFields = document.getElementById('inputFields2');
                        const newInputField = document.createElement('input');
                        newInputField.setAttribute('type', 'text');
                        newInputField.setAttribute('placeholder', 'Type here');
                        newInputField.setAttribute('class', 'input input-bordered w-full mt-2');
                        newInputField.setAttribute('name', 'indikatorTujuan[]'); // Changed to use an array for multiple inputs
                        inputFields.appendChild(newInputField);
                    }
                </script>
            </label>
        </div>

        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-3">
            <p class="bg-red-700 text-white text-center font-semibold">SASARAN STRATEGIS</p>
            <label class="form-control w-full mt-3">
                <label class="form-control w-full">
                    <a class="btn btn-neutral max-w-xs" onclick="addInputField3()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah
                    </a>
                    <div id="inputFields3" class="mb-2">
                        <div class="label">
                            <span class="label-text">Sasaran Strategis</span>
                        </div>
                        @for ($i = 1; $i <= 1; $i++) <input type="text" name="sasaranStrategis[]"
                            class="input input-bordered w-full mt-2">
                            @endfor
                    </div>
                </label>
                <script>
                    function addInputField3() {
                        const inputFields = document.getElementById('inputFields3');
                        const newInputField = document.createElement('input');
                        newInputField.setAttribute('type', 'text');
                        newInputField.setAttribute('placeholder', 'Type here');
                        newInputField.setAttribute('class', 'input input-bordered w-full mt-2');
                        newInputField.setAttribute('name', 'sasaranStrategis[]'); // Changed to use an array for multiple inputs
                        inputFields.appendChild(newInputField);
                    }
                </script>
            </label>
        </div>

        <div class="p-6 overflow-hidden bg-white rounded-md shadwo-md dark:bg-dark-eval-1 mt-3">
            <p class="bg-red-700 text-white text-center font-semibold">INDIKATOR KINERJA</p>
            <label class="form-control w-full mt-3">
                <label class="form-control w-full">
                    <a class="btn btn-neutral max-w-xs" onclick="addInputField4()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah
                    </a>
                    <div id="inputFields4" class="mb-2">
                        <div class="label">
                            <span class="label-text">Indikator Kinerja</span>
                        </div>
                        @for ($i = 1; $i <= 1; $i++) <input type="text" name="indikatorKinerja[]"
                            class="input input-bordered w-full mt-2">
                            @endfor
                    </div>
                </label>
                <script>
                    function addInputField4() {
                        const inputFields = document.getElementById('inputFields4');
                        const newInputField = document.createElement('input');
                        newInputField.setAttribute('type', 'text');
                        newInputField.setAttribute('placeholder', 'Type here');
                        newInputField.setAttribute('class', 'input input-bordered w-full mt-2');
                        newInputField.setAttribute('name', 'indikatorKinerja[]'); // Changed to use an array for multiple inputs
                        inputFields.appendChild(newInputField);
                    }
                </script>
            </label>
        </div>

        <div class="p-6 overflow-hidden bg-white rounded-md shadwo-md dark:bg-dark-eval-1 mt-3">
            <p class="bg-red-700 text-white text-center font-semibold">SATUAN</p>
            <label class="form-control w-full mt-3">
                <label class="form-control w-full">
                    <a class="btn btn-neutral max-w-xs" onclick="addInputField5()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah
                    </a>
                    <div id="inputFields5" class="mb-2">
                        <div class="label">
                            <span class="label-text">Satuan</span>
                        </div>
                        @for ($i = 1; $i <= 1; $i++) <input type="text" name="satuan[]"
                            class="input input-bordered w-full mt-2">
                            @endfor
                    </div>
                </label>
                <script>
                    function addInputField5() {
                        const inputFields = document.getElementById('inputFields5');
                        const newInputField = document.createElement('input');
                        newInputField.setAttribute('type', 'text');
                        newInputField.setAttribute('placeholder', 'Type here');
                        newInputField.setAttribute('class', 'input input-bordered w-full mt-2');
                        newInputField.setAttribute('name', 'satuan[]'); // Changed to use an array for multiple inputs
                        inputFields.appendChild(newInputField);
                    }
                </script>
            </label>
        </div>

        <div class="p-6 overflow-hidden bg-white rounded-md shadwo-md dark:bg-dark-eval-1 mt-3">
            <p class="bg-red-700 text-white text-center font-semibold">TARGET</p>
            <label class="form-control w-full mt-3">
                <label class="form-control w-full">
                    <a class="btn btn-neutral max-w-xs" onclick="addInputField6()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah
                    </a>
                    <div id="inputFields6" class="mb-2">
                        <div class="label">
                            <span class="label-text">Target</span>
                        </div>
                        @for ($i = 1; $i <= 1; $i++) <input type="text" name="target[]"
                            class="input input-bordered w-full mt-2">
                            @endfor
                    </div>
                </label>
                <script>
                    function addInputField6() {
                        const inputFields = document.getElementById('inputFields6');
                        const newInputField = document.createElement('input');
                        newInputField.setAttribute('type', 'text');
                        newInputField.setAttribute('placeholder', 'Type here');
                        newInputField.setAttribute('class', 'input input-bordered w-full mt-2');
                        newInputField.setAttribute('name', 'target[]'); // Changed to use an array for multiple inputs
                        inputFields.appendChild(newInputField);
                    }
                </script>
            </label>
        </div>
        <button class="btn btn-neutral btn-block mt-2">Buat Surat</button>
        <a href="" class="btn btn-block">Kembali</a>
    </form>
</x-app-layout>