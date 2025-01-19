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
                    LEVEL 1
                </div>
                <div class="collapse-content">
                    <?php
                    if (!empty($tujuanCascading)) {?>
                    <form action="{{ route('tujuan_cascading.store') }}" method="POST">
                        @csrf
                        {{-- <a class="btn btn-xs mt-3" onclick="addInputField()">
                            Tambah
                        </a> --}}
                        <label class="form-control w-full">
                            <label class="form-control">
                                <div id="inputFields">
                                    <div class="label">
                                        <span class="label-text">LEVEL 1</span>
                                    </div>
                                    @for ($i = 1; $i <= 1; $i++)
                                        <input type="text" name="tujuan[]" class="input input-bordered w-full mt-2">
                                    @endfor
                                </div>
                            </label>
                        </label>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">INDIKATOR</span>
                            </div>
                            <input type="text" name="indikator" class="input input-bordered w-full">
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">CROSS CUT</span>
                            </div>
                            <select class="select select-bordered" name="crosscut">
                                <option value="NULL">Tidak Ada</option>
                                @foreach ($crossCut as $cc)
                                    <option value="{{ $cc->name }}">{{ $cc->name }}</option>
                                @endforeach
                            </select>
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
                        <div class="flex justify-end items-end mt-2">
                            <button class="btn btn-neutral btn-block text-white mb-3">Simpan</button>
                        </div>
                    </form>
                    <?php } ?>


                </div>
            </div>

            <div class="collapse collapse-arrow join-item border border-base-300">
                <input type="radio" name="my-accordion-4" />
                <div class="collapse-title text-xl font-semibold bg-red-700 text-white">
                    LEVEL 2
                </div>
                <div class="collapse-content">
                    <form action="{{ route('sasaran_cascading.store') }}" method="post">
                        @csrf
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Pilih Level 1</span>
                            </div>
                            <select class="select select-bordered" name="tujuan">
                                <option disabled selected>Pilih Level 1</option>
                                @foreach ($tujuanCascading as $itemTujuan)
                                    <option value="{{ $itemTujuan->key }}">{{ $itemTujuan->name }}</option>
                                @endforeach
                            </select>
                        </label>

                        {{-- <a class="btn btn-xs mt-3" onclick="addInputField2()">
                            Tambah
                        </a> --}}
                        <label class="form-control w-full">
                            <label class="form-control">
                                <div id="inputFields2">
                                    <div class="label">
                                        <span class="label-text mb-0">Level 2</span>
                                    </div>
                                    @for ($i = 1; $i <= 1; $i++)
                                        <input type="text" name="sasaranStrategis[]"
                                            class="input input-bordered w-full mt-2">
                                    @endfor
                                </div>
                            </label>
                            <label class="form-control">
                                <div class="label">
                                    <span class="label-text">INDIKATOR</span>
                                </div>
                                <input type="text" name="indikator" class="input input-bordered w-full">
                            </label>
                            <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text">CROSS CUT</span>
                                </div>
                                <select class="select select-bordered" name="crosscut">
                                    <option value="NULL">Tidak Ada</option>
                                    @foreach ($crossCut as $cc)
                                        <option value="{{ $cc->name }}">{{ $cc->name }}</option>
                                    @endforeach
                                </select>
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
                            <button class="btn btn-neutral btn-block text-white mb-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="collapse collapse-arrow join-item border border-base-300">
                <input type="radio" name="my-accordion-4" />
                <div class="collapse-title text-xl font-semibold bg-red-700 text-white">
                    LEVEL 3
                </div>
                <div class="collapse-content">
                    <form action="{{ route('sasaran_program.store') }}" method="post">
                        @csrf
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Level 2</span>
                            </div>
                            <select name="sasaranStrategis" class="select select-bordered">
                                <option disabled selected>Pilih Level 2</option>
                                @foreach ($strategis as $itemStrategis)
                                    <option value="{{ $itemStrategis->key }}">{{ $itemStrategis->name }}</option>
                                @endforeach
                            </select>
                        </label>

                        {{-- <a class="btn btn-xs mt-3" onclick="addInputField3()">
                            Tambah
                        </a> --}}
                        <label class="form-control w-full">
                            <label class="form-control">
                                <div id="inputFields3">
                                    <div class="label">
                                        <span class="label-text mb-0">Level 3</span>
                                    </div>
                                    @for ($i = 1; $i <= 1; $i++)
                                        <input type="text" name="sasaranProgram[]"
                                            class="input input-bordered w-full mt-2">
                                    @endfor
                                </div>
                            </label>
                            <label class="form-control">
                                <div class="label">
                                    <span class="label-text">INDIKATOR</span>
                                </div>
                                <input type="text" name="indikator" class="input input-bordered w-full">
                            </label>
                            <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text">CROSS CUT</span>
                                </div>
                                <select class="select select-bordered" name="crosscut">
                                    <option value="NULL">Tidak Ada</option>
                                    @foreach ($crossCut as $cc)
                                        <option value="{{ $cc->name }}">{{ $cc->name }}</option>
                                    @endforeach
                                </select>
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
                            <button class="btn btn-block btn-neutral text-white mb-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="collapse collapse-arrow join-item border border-base-300">
                <input type="radio" name="my-accordion-4" />
                <div class="collapse-title text-xl font-semibold bg-red-700 text-white">
                    LEVEL 4
                </div>
                <div class="collapse-content">
                    <form action="{{ route('sasaran_kegiatan.store') }}" method="post">
                        @csrf
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Level 3</span>
                            </div>
                            <select name="sasaranProgram" class="select select-bordered">
                                <option disabled selected>Pilih Level 3</option>
                                @foreach ($program as $itemProgram)
                                    <option value="{{ $itemProgram->key }}">{{ $itemProgram->name }}</option>
                                @endforeach
                            </select>
                        </label>

                        {{-- <a class="btn btn-xs mt-3" onclick="addInputField4()">
                            Tambah
                        </a> --}}
                        <label class="form-control w-full">
                            <label class="form-control">
                                <div id="inputFields4">
                                    <div class="label">
                                        <span class="label-text mb-0">Level 4</span>
                                    </div>
                                    @for ($i = 1; $i <= 1; $i++)
                                        <input type="text" name="sasaranKegiatan[]"
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
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">INDIKATOR</span>
                            </div>
                            <input type="text" name="indikator" class="input input-bordered w-full">
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">CROSS CUT</span>
                            </div>
                            <select class="select select-bordered" name="crosscut">
                                <option value="NULL">Tidak Ada</option>
                                @foreach ($crossCut as $cc)
                                    <option value="{{ $cc->name }}">{{ $cc->name }}</option>
                                @endforeach
                            </select>
                        </label>
                        <div class="flex justify-end mt-3">
                            <button class="btn btn-block btn-neutral text-white">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="collapse collapse-arrow join-item border border-base-300">
                <input type="radio" name="my-accordion-4" />
                <div class="collapse-title text-xl font-semibold bg-red-700 text-white">
                    LEVEL 5
                </div>
                <div class="collapse-content">
                    <form action="{{ route('sasaran_lima.store') }}" method="post">
                        @csrf
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Pilih Level 4</span>
                            </div>
                            <select name="sasaranKegiatan" class="select select-bordered">
                                <option disabled selected>Pilih Level 4</option>
                                @foreach ($kegiatan as $itemKegiatan)
                                    <option value="{{ $itemKegiatan->key }}">{{ $itemKegiatan->name }}</option>
                                @endforeach
                            </select>
                        </label>

                        {{-- <a class="btn btn-xs mt-3" onclick="addInputField4()">
                            Tambah
                        </a> --}}
                        <label class="form-control w-full">
                            <label class="form-control">
                                <div id="inputFields5">
                                    <div class="label">
                                        <span class="label-text mb-0">Level 5</span>
                                    </div>
                                    @for ($i = 1; $i <= 1; $i++)
                                        <input type="text" name="sasaranLima[]"
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
                                    newInputField.setAttribute('name', 'sasaranLima[]'); // Changed to use an array for multiple inputs
                                    inputFields.appendChild(newInputField);
                                }
                            </script>
                        </label>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">INDIKATOR</span>
                            </div>
                            <input type="text" name="indikator" class="input input-bordered w-full">
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">CROSS CUT</span>
                            </div>
                            <select class="select select-bordered" name="crosscut">
                                <option>Tidak Ada</option>
                                @foreach ($crossCut as $cc)
                                    <option value="{{ $cc->name }}">{{ $cc->name }}</option>
                                @endforeach
                            </select>
                        </label>
                        <div class="flex justify-end mt-3">
                            <button class="btn btn-block btn-neutral text-white">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-2 mb-1">
        <form action="{{ route('hapus_cascading.destroy', $id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-block bg-red-700 hover:bg-red-800 text-white mt-4">Hapus</button>
            <a href="{{route('pohon.index')}}" class="btn btn-block mt-1 mb-1">Kembali</a>
        </form>
    </div>

</x-app-layout>
