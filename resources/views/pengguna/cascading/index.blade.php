<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Pohon Kinerja') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="join join-vertical w-full">
            <div class="collapse collapse-arrow join-item border border-base-300">
                <input type="radio" name="my-accordion-4" checked="checked" />
                <div class="collapse-title text-xl font-semibold bg-red-700 text-white">
                    Tujuan
                </div>
                <div class="collapse-content">
                    <form action="{{route('tujuan_cascading.store')}}" method="POST">
                        @csrf
                        {{-- <a class="btn btn-xs mt-3" onclick="addInputField()">
                            Tambah
                        </a> --}}
                        <label class="form-control w-full">
                            <label class="form-control">
                                <div id="inputFields">
                                    <div class="label">
                                        <span class="label-text mb-0">Tujuan</span>
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
                        <div class="flex justify-end items-end mt-2">
                            <button class="btn btn-success btn-block text-white mb-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="collapse collapse-arrow join-item border border-base-300">
                <input type="radio" name="my-accordion-4" />
                <div class="collapse-title text-xl font-semibold bg-red-700 text-white">
                    Sasaran Strategis
                </div>
                <div class="collapse-content">
                    <form action="{{route('sasaran_cascading.store')}}" method="post">
                        @csrf
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Tujuan</span>
                            </div>
                            <select class="select select-bordered" name="tujuan">
                                <option disabled selected>Pilih Tujuan</option>
                                @foreach ($tujuanCascading as $itemTujuan)
                                <option value="{{$itemTujuan->key}}">{{$itemTujuan->name}}</option>
                                @endforeach
                            </select>
                        </label>

                        <a class="btn btn-xs mt-3" onclick="addInputField2()">
                            Tambah
                        </a>
                        <label class="form-control w-full">
                            <label class="form-control">
                                <div id="inputFields2">
                                    <div class="label">
                                        <span class="label-text mb-0">Sasaran Strategis</span>
                                    </div>
                                    @for ($i = 1; $i <= 1; $i++) <input type="text" name="sasaranStrategis[]"
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
                                    newInputField.setAttribute('name', 'sasaranStrategis[]'); // Changed to use an array for multiple inputs
                                    inputFields.appendChild(newInputField);
                                }
                            </script>
                        </label>
                        <div class="flex justify-end mt-3">
                            <button class="btn btn-success btn-block text-white mb-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="collapse collapse-arrow join-item border border-base-300">
                <input type="radio" name="my-accordion-4" />
                <div class="collapse-title text-xl font-semibold bg-red-700 text-white">
                    Sasaran Program
                </div>
                <div class="collapse-content">
                    <form action="{{route('sasaran_program.store')}}" method="post">
                        @csrf
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Sasaran Strategis</span>
                            </div>
                            <select name="sasaranStrategis" class="select select-bordered">
                                <option disabled selected>Pilih Sasaran</option>
                                @foreach ($strategis as $itemStrategis)
                                <option value="{{$itemStrategis->key}}">{{$itemStrategis->name}}</option>
                                @endforeach
                            </select>
                        </label>

                        <a class="btn btn-xs mt-3" onclick="addInputField3()">
                            Tambah
                        </a>
                        <label class="form-control w-full">
                            <label class="form-control">
                                <div id="inputFields3">
                                    <div class="label">
                                        <span class="label-text mb-0">Sasaran Program</span>
                                    </div>
                                    @for ($i = 1; $i <= 1; $i++) <input type="text" name="sasaranProgram[]"
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
                                    newInputField.setAttribute('name', 'sasaranProgram[]'); // Changed to use an array for multiple inputs
                                    inputFields.appendChild(newInputField);
                                }
                            </script>
                        </label>
                        <div class="flex justify-end mt-3">
                            <button class="btn btn-block btn-success text-white mb-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="collapse collapse-arrow join-item border border-base-300">
                <input type="radio" name="my-accordion-4" />
                <div class="collapse-title text-xl font-semibold bg-red-700 text-white">
                    Sasaran Kegiatan
                </div>
                <div class="collapse-content">
                    <form action="{{route('sasaran_kegiatan.store')}}" method="post">
                        @csrf
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Sasaran Program</span>
                            </div>
                            <select name="sasaranProgram" class="select select-bordered">
                                <option disabled selected>Pilih Sasaran</option>
                                @foreach ($program as $itemProgram)
                                <option value="{{$itemProgram->key}}">{{$itemProgram->name}}</option>
                                @endforeach
                            </select>
                        </label>

                        <a class="btn btn-xs mt-3" onclick="addInputField4()">
                            Tambah
                        </a>
                        <label class="form-control w-full">
                            <label class="form-control">
                                <div id="inputFields4">
                                    <div class="label">
                                        <span class="label-text mb-0">Sasaran Kegiatan</span>
                                    </div>
                                    @for ($i = 1; $i <= 1; $i++) <input type="text" name="sasaranKegiatan[]"
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
                                    newInputField.setAttribute('name', 'sasaranKegiatan[]'); // Changed to use an array for multiple inputs
                                    inputFields.appendChild(newInputField);
                                }
                            </script>
                        </label>
                        <div class="flex justify-end mt-3">
                            <button class="btn btn-block btn-success text-white">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-4">
        {{-- DATA TUJUAN --}}
        <section>
            <p class="text-center mb-2 font-semibold">TUJUAN</p>
            <table class="table">
                <thead class=" bg-gray-300">
                    <tr>
                        <th>No</th>
                        <th class="text-center">Tujuan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tujuanCascading as $itemTujuan)
                    <tr>
                        <td>+</td>
                        <td>{{$itemTujuan->name}}</td>
                        <td>
                            <div class="flex justify-center items-center gap-2">
                                <button class="btn">edit</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-4">
        {{-- DATA SASARAN STRATEGIS --}}
        <section>
            <p class="text-center mb-2 font-semibold">SASARAN STRATEGIS</p>
            <table class="table">
                <thead class=" bg-gray-300">
                    <tr>
                        <th>No</th>
                        <th class="text-center">Tujuan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($strategis as $itemStrategis)
                    <tr>
                        <td>+</td>
                        <td>{{$itemStrategis->name}}</td>
                        <td>
                            <div class="flex justify-center items-center gap-2">
                                <button class="btn">edit</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-4">
        {{-- DATA PROGRAM --}}
        <section>
            <p class="text-center mb-2 font-semibold">SASARAN PROGRAM</p>
            <table class="table">
                <thead class=" bg-gray-300">
                    <tr>
                        <th>No</th>
                        <th class="text-center">Tujuan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($program as $itemProgram)
                    <tr>
                        <td>+</td>
                        <td>{{$itemProgram->name}}</td>
                        <td>
                            <div class="flex justify-center items-center gap-2">
                                <button class="btn">edit</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-4">
        {{-- DATA KEGIATAN --}}
        <section>
            <p class="text-center mb-2 font-semibold">SASARAN KEGIATAN</p>
            <table class="table">
                <thead class=" bg-gray-300">
                    <tr>
                        <th>No</th>
                        <th class="text-center">Tujuan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kegiatan as $itemKegiatans)
                    <tr>
                        <td>+</td>
                        <td>{{$itemKegiatans->name}}</td>
                        <td>
                            <div class="flex justify-center items-center gap-2">
                                <button class="btn">edit</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

    <form action="">
        <button class="btn btn-block bg-red-700 text-white mt-4 mb-4">Hapus Semua</button>
    </form>

</x-app-layout>