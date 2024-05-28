<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Buat Surat Perjanjian Kinerja') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div>
            <a href="{{route('surat.create')}}" class="btn btn-neutral">Buat Surat</a>
        </div>
        <div>
            <table class="table mt-4">
                <!-- head -->
                <thead class="bg-red-700 text-white">
                    <tr>
                        <th>
                            No
                        </th>
                        <th>Name</th>
                        <th>Job</th>
                        <th>Favorite Color</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img src="https://img.daisyui.com/tailwind-css-component-profile-2@56w.png"
                                            alt="Avatar Tailwind CSS Component" />
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">{{$item->pihakPertama}}</div>
                                    <div class="text-sm opacity-50">{{$item->jabatanPihakPertama}}</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img src="https://img.daisyui.com/tailwind-css-component-profile-2@56w.png"
                                            alt="Avatar Tailwind CSS Component" />
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">{{$item->pihakKedua}}</div>
                                    <div class="text-sm opacity-50">{{$item->jabatanPihakKedua}}</div>
                                </div>
                            </div </td>
                        <td>
                            Zemlak, Daniel and Leannon
                            <br />
                            <span class="badge badge-ghost badge-sm">Desktop Support Technician</span>
                        </td>
                        <td>
                            <div class="flex flex-col ...">
                                {{-- TOMBOL TUJUAN --}}
                                <div class="dropdown dropdown-right">
                                    <div tabindex="0" role="button" class="btn btn-xs m-1">Tujuan</div>
                                    <ul tabindex="0"
                                        class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                        <li><label for="my_modal_1_{{$item->id}}">Tambah</label></li>
                                        <li><a>Hapus</a></li>
                                    </ul>
                                    <!-- TUJUAN -->
                                    <input type="checkbox" id="my_modal_1_{{$item->id}}" class="modal-toggle" />
                                    <div class="modal" role="dialog">
                                        <div class="modal-box">
                                            <h3 class="font-bold text-lg">Masukkan Tujuan</h3>
                                            <p class="py-4">Silahkan memasukan tujuan surat perjanjian kinerja!</p>
                                            <form action="{{route('tujuan.store')}}" method="post">
                                                @csrf
                                                <div>
                                                    <input type="hidden" name="idSurat" value="{{$item->id}}">
                                                    <label class="form-control w-full">
                                                        <a class="btn btn-neutral" onclick="addInputField()">Tambah</a>
                                                        <div id="inputFields" class="mb-2">
                                                            <div class="label">
                                                                <span class="label-text">Tujuan</span>
                                                            </div>
                                                            @for ($i = 1; $i <= 1; $i++) <input type="text"
                                                                name="tujuan[]"
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
                                                </div>
                                                <div>
                                                    <div class="modal-action">
                                                        <button class="btn btn-neutral">Simpan</button>
                                                        <label for="my_modal_1_{{$item->id}}" class="btn">Batal</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- TOMBOL SASARAN STRATEGIS --}}
                                <div class="dropdown dropdown-right">
                                    <div tabindex="0" role="button" class="btn btn-xs">Sasaran Strategis</div>
                                    <ul tabindex="0"
                                        class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                        <li><label for="my_modal_2_{{$item->id}}" class="">Tambah</label></li>
                                        <li><a>Item 2</a></li>
                                    </ul>
                                    <!-- Put this part before </body> tag -->
                                    <input type="checkbox" id="my_modal_2_{{$item->id}}" class="modal-toggle" />
                                    <div class="modal" role="dialog">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">Sasaran Strategis</h3>
                                            <p class="py-4">Silahkan masukkan sasaran strategis surat perjanjian
                                                kinerja!
                                            </p>
                                            <form action="{{route('sasaran.store')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="idSurat" value="{{$item->id}}">
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Tujuan</span>
                                                    </div>
                                                    <select name="idTujuan" class="select select-bordered">
                                                        <option disabled selected>Pilih salah satu</option>
                                                        @foreach ($tujuan as $itemTujuan)
                                                        <option value="{{$itemTujuan->id}}">{{$itemTujuan->tujuan}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                                <label class="form-control w-full mt-3">
                                                    <label class="form-control w-full">
                                                        <a class="btn btn-neutral" onclick="addInputField2()">
                                                            Tambah
                                                        </a>
                                                        <div id="inputFields2" class="mb-2">
                                                            <div class="label">
                                                                <span class="label-text">Sasaran Strategis</span>
                                                            </div>
                                                            @for ($i = 1; $i <= 1; $i++) <input type="text"
                                                                name="sasaranStrategis[]"
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
                                                    <div class="flex justify-end items-end gap-1">
                                                        <button type="submit" class="btn btn-neutral">Simpan</button>
                                                        <label class="btn" for="my_modal_2_{{$item->id}}">Tutup</label>
                                                    </div>
                                                    {{-- <label class="modal-backdrop"
                                                        for="my_modal_2_{{$item->id}}">Tutup</label> --}}
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown dropdown-right dropdown-end">
                                    <div tabindex="0" role="button" class="btn btn-xs m-1">Indikator</div>
                                    <ul tabindex="0"
                                        class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                        <li>
                                            <!-- You can open the modal using ID.showModal() method -->
                                            <button class=""
                                                onclick="my_modal_4_{{$item->id}}.showModal()">Tambah</button>
                                        </li>
                                        <li><a>Item 2</a></li>
                                    </ul>
                                    <dialog id="my_modal_4_{{$item->id}}" class="modal">
                                        <div class="modal-box w-11/12 max-w-5xl">
                                            <h3 class="font-bold text-lg">Indikator!</h3>
                                            <p class="py-4">Silahkan masukkan indikator kinerja, satuan, dan target!</p>
                                            <form action="{{route('indikator.store')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="idSurat" value="{{$item->id}}">
                                                <label class="form-control w-full mb-3">
                                                    <div class="label">
                                                        <span class="label-text">Sasaran Strategis</span>
                                                    </div>
                                                    <select name="idSasaran" class="select select-bordered">
                                                        <option disabled selected>Pilih satu</option>
                                                        @foreach ($sasaran as $itemSasaran)
                                                        <option value="{{$itemSasaran->id}}">
                                                            {{$itemSasaran->sasaranStrategis}}</option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                                <a class="btn btn-neutral btn-block" onclick="addInputFields()">
                                                    Tambah
                                                </a>
                                                <div class="flex gap-2">
                                                    <div class="" id="inputFieldsIndikator" class="mb-2">
                                                        <div class="label">
                                                            <span class="label-text">Indikator Kinerja</span>
                                                        </div>
                                                        <input type="text" name="indikatorKinerja[]" class="input input-bordered w-full mt-2">
                                                    </div>

                                                    <div id="inputFieldsSatuan" class="mb-2">
                                                        <div class="label">
                                                            <span class="label-text">Satuan</span>
                                                        </div>
                                                        <input type="text" name="satuan[]" class="input input-bordered w-full mt-2">
                                                    </div>

                                                    <div id="inputFieldsTarget" class="mb-2">
                                                        <div class="label">
                                                            <span class="label-text">Target</span>
                                                        </div>
                                                        <input type="text" name="target[]" class="input input-bordered w-full mt-2">
                                                    </div>
                                                </div>
                                                <script>
                                                    function addInputFields() {
                                                        const inputFieldsIndikator = document.getElementById('inputFieldsIndikator');
                                                        const newInputFieldIndikator = document.createElement('input');
                                                        newInputFieldIndikator.setAttribute('type', 'text');
                                                        newInputFieldIndikator.setAttribute('placeholder', 'Type here');
                                                        newInputFieldIndikator.setAttribute('class', 'input input-bordered w-full mt-2');
                                                        newInputFieldIndikator.setAttribute('name', 'indikatorKinerja[]');
                                                        inputFieldsIndikator.appendChild(newInputFieldIndikator);

                                                        const inputFieldsSatuan = document.getElementById('inputFieldsSatuan');
                                                        const newInputFieldSatuan = document.createElement('input');
                                                        newInputFieldSatuan.setAttribute('type', 'text');
                                                        newInputFieldSatuan.setAttribute('placeholder', 'Type here');
                                                        newInputFieldSatuan.setAttribute('class', 'input input-bordered w-full mt-2');
                                                        newInputFieldSatuan.setAttribute('name', 'satuan[]');
                                                        inputFieldsSatuan.appendChild(newInputFieldSatuan);

                                                        const inputFieldsTarget = document.getElementById('inputFieldsTarget');
                                                        const newInputFieldTarget = document.createElement('input');
                                                        newInputFieldTarget.setAttribute('type', 'text');
                                                        newInputFieldTarget.setAttribute('placeholder', 'Type here');
                                                        newInputFieldTarget.setAttribute('class', 'input input-bordered w-full mt-2');
                                                        newInputFieldTarget.setAttribute('name', 'target[]');
                                                        inputFieldsTarget.appendChild(newInputFieldTarget);
                                                    }
                                                </script>
                                                <div class="flex gap-1 justify-end items-end">
                                                    <button type="submit" class="btn btn-neutral">Simpan</button>
                                                    <a href="" class="btn" for="my_modal_4_{{$item->id}}" >Batal</a>
                                                </div>
                                            </form>
                                        </div>
                                    </dialog>
                                </div>
                            </div>
                            {{-- TOMBOL INDIKATOR KINERJA / SATUAN / TARGET --}}
                        </td>
                        <td>
                            <div class="flex gap-1 justify-center items-center">
                                <!-- The button to open modal -->
                                <label for="modal_20_{{$item->id}}" class="btn bg-red-700 text-white">hapus</label>

                                <!-- Put this part before </body> tag -->
                                <input type="checkbox" id="modal_20_{{$item->id}}" class="modal-toggle" />
                                <div class="modal" role="dialog">
                                    <div class="modal-box">
                                        <h3 class="font-bold text-lg">Perhatian!!</h3>
                                        <p class="py-4">Apakah anda yakin ingin menghapus "{{$item->pihakPertama}}"!</p>
                                        <div class="modal-action">
                                            <form action="{{route('surat.destroy', $item->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-neutral">Ya</button>
                                            </form>
                                            <label for="modal_20_{{$item->id}}" class="btn">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('print.edit', $item->id)}}" class="btn">print</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>