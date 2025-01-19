<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Perjanjian Kinerja') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="flex justify-between items-end">
            <a href="{{ route('surat.create') }}" class="btn btn-neutral">Buat Surat</a>

            <form action="{{ route('surat.index') }}" method="GET">
                <input type="text" name="search" placeholder="Cari..." class="input input-bordered"
                    value="{{ request()->query('search') }}">
                <button type="submit" class="btn btn-neutral">Cari</button>
            </form>
        </div>
        <div class="mt-2">
            <table class="table mt-4 shadow-sm">
                <!-- head -->
                <thead>
                    <tr>
                        <th>
                            No
                        </th>
                        <th>Perjanjian Kinerja</th>
                        {{-- <th>Bulan</th> --}}
                        <th class="text-center">Dokumen</th>
                        <th class="text-center">Komponen</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </td>
                            <td>
                                <div class="flex items-center gap-3">
                                    <div>
                                        <div class="font-bold">{{ $item->pihakPertama }}</div>
                                        <div class="text-sm opacity-50">{{ $item->jabatanPihakPertama }}</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div>
                                        <div class="font-bold">{{ $item->pihakKedua }}</div>
                                        <div class="text-sm opacity-50">{{ $item->jabatanPihakKedua }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if ($item->status == 0)
                                    <a href="" class="text-center">Anda belum upload dokumen</a>
                                @elseif($item->status == 1)
                                    <a href="{{ route('surat.show', $item->id) }}" class="text-blue-700 underline">Lihat
                                        Dokumen</a>
                                @endif
                            </td>
                            <td>
                                <div class="flex flex-col ...">
                                    {{-- TOMBOL SASARAN STRATEGIS --}}
                                    <div class="dropdown dropdown-right">
                                        <div tabindex="0" role="button" class="btn btn-xs btn-block">Sasaran
                                            Strategis</div>
                                        <ul tabindex="0"
                                            class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                            <li><label for="my_modal_2_{{ $item->id }}"
                                                    class="">Tambah</label></li>
                                        </ul>
                                        <!-- Put this part before </body> tag -->
                                        <input type="checkbox" id="my_modal_2_{{ $item->id }}"
                                            class="modal-toggle" />
                                        <div class="modal" role="dialog">
                                            <div class="modal-box">
                                                <h3 class="text-lg font-bold">Sasaran Strategis</h3>
                                                <p class="py-4">Silahkan masukkan sasaran strategis surat perjanjian
                                                    kinerja!
                                                </p>
                                                <form action="{{ route('sasaran.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="idSurat" value="{{ $item->id }}">
                                                    {{-- <label class="form-control w-full">
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
                                                </label> --}}
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Kategori</span>
                                                        </div>
                                                        <select name="kategori" class="select select-bordered">
                                                            <option disabled selected>Pilih</option>
                                                            <option value="penerimaLayanan">Penerima Layanan /
                                                                Stakeholder
                                                            </option>
                                                            <option value="prosesBisnis">Proses Bisnis</option>
                                                            <option value="penguatanInternal">Penguatan Internal
                                                            </option>
                                                        </select>
                                                    </label>
                                                    <label class="form-control w-full mt-3">
                                                        <label class="form-control w-full">
                                                            <a class="btn btn-neutral"
                                                                onclick="addInputField2{{ $item->id }}()">
                                                                Tambah
                                                            </a>
                                                            <div id="inputFields2{{ $item->id }}" class="mb-2">
                                                                <div class="label">
                                                                    <span class="label-text">Sasaran Strategis</span>
                                                                </div>
                                                                @for ($i = 1; $i <= 1; $i++)
                                                                    <input type="text" name="sasaranStrategis[]"
                                                                        class="input input-bordered w-full mt-2">
                                                                @endfor
                                                            </div>
                                                        </label>
                                                        <script>
                                                            function addInputField2{{ $item->id }}() {
                                                                const inputFields = document.getElementById('inputFields2{{ $item->id }}');
                                                                const newInputField = document.createElement('input');
                                                                newInputField.setAttribute('type', 'text');
                                                                newInputField.setAttribute('placeholder', 'Type here');
                                                                newInputField.setAttribute('class', 'input input-bordered w-full mt-2');
                                                                newInputField.setAttribute('name', 'sasaranStrategis[]'); // Changed to use an array for multiple inputs
                                                                inputFields.appendChild(newInputField);
                                                            }
                                                        </script>
                                                        <div class="flex justify-end items-end gap-1">
                                                            <button type="submit"
                                                                class="btn btn-neutral">Simpan</button>
                                                            <label class="btn"
                                                                for="my_modal_2_{{ $item->id }}">Tutup</label>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dropdown dropdown-right dropdown-end">
                                        <div tabindex="0" role="button" class="btn btn-xs btn-block mt-1">Indikator
                                        </div>
                                        <ul tabindex="0"
                                            class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                            <li>
                                                <!-- You can open the modal using ID.showModal() method -->
                                                <button class=""
                                                    onclick="my_modal_4_{{ $item->id }}.showModal()">Tambah</button>
                                            </li>
                                        </ul>
                                        <dialog id="my_modal_4_{{ $item->id }}" class="modal">
                                            <div class="modal-box w-11/12 max-w-5xl">
                                                <h3 class="font-bold text-lg">Indikator!</h3>
                                                <p class="py-4">Silahkan masukkan indikator kinerja, satuan, dan
                                                    target!</p>
                                                <form action="{{ route('indikator.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="idSurat"
                                                        value="{{ $item->id }}">
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Kategori</span>
                                                        </div>
                                                        <select name="kategori" class="select select-bordered"
                                                            required>
                                                            <option disabled selected>Pilih</option>
                                                            <option value="penerimaLayanan">Penerima Layanan /
                                                                Stakeholder
                                                            </option>
                                                            <option value="prosesBisnis">Proses Bisnis</option>
                                                            <option value="penguatanInternal">Penguatan Internal
                                                            </option>
                                                        </select>
                                                    </label>
                                                    <label class="form-control w-full mb-3">
                                                        <div class="label">
                                                            <span class="label-text">Sasaran Strategis</span>
                                                        </div>
                                                        <select name="idSasaran" class="select select-bordered">
                                                            <option disabled selected>Pilih satu</option>
                                                            @foreach ($sasaran as $itemSasaran)
                                                                <option value="{{ $itemSasaran->id }}">
                                                                    {{ $itemSasaran->sasaranStrategis }}</option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                    <div class="flex justify-center items-center gap-2">
                                                        <div class="" id="inputFieldsIndikator" class="mb-2">
                                                            <div class="label">
                                                                <span class="label-text">Indikator Kinerja</span>
                                                            </div>
                                                            <input type="text" name="indikatorKinerja[]"
                                                                class="input input-bordered w-full mt-2">
                                                        </div>

                                                        <div id="inputFieldsSatuan" class="mb-2">
                                                            <div class="label">
                                                                <span class="label-text">Satuan</span>
                                                            </div>
                                                            <input type="text" name="satuan[]"
                                                                class="input input-bordered w-full mt-2">
                                                        </div>

                                                        <div id="inputFieldsTarget" class="mb-2">
                                                            <div class="label">
                                                                <span class="label-text">Target</span>
                                                            </div>
                                                            <input type="text" name="target[]"
                                                                class="input input-bordered w-full mt-2">
                                                        </div>
                                                    </div>
                                                    <script>
                                                        function addInputFields{{ $item->id }}() {
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
                                                    <button type="submit"
                                                        class="btn btn-block mb-1 btn-neutral">Simpan</button>
                                                    <a href="" class="btn btn-block"
                                                        for="my_modal_4_{{ $item->id }}">Batal</a>
                                                </form>
                                            </div>
                                        </dialog>
                                    </div>
                                </div>
                                {{-- TOMBOL INDIKATOR KINERJA / SATUAN / TARGET --}}
                            </td>
                            <td>
                                <div class="flex gap-1 justify-center items-center">
                                    <a href="{{ route('surat.edit', $item->id) }}" class="btn shadow-sm">Lihat</a>
                                    <!-- The button to open modal -->
                                    <label for="modal_20_{{ $item->id }}"
                                        class="btn bg-neutral text-white">Hapus</label>

                                    <!-- Put this part before </body> tag -->
                                    <input type="checkbox" id="modal_20_{{ $item->id }}" class="modal-toggle" />
                                    <div class="modal" role="dialog">
                                        <div class="modal-box">
                                            <h3 class="font-bold text-lg">Perhatian!!</h3>
                                            <p class="py-4">Apakah anda yakin ingin menghapus
                                                "{{ $item->pihakPertama }}"!</p>
                                            <div class="modal-action">
                                                <form action="{{ route('surat.destroy', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-neutral">Ya</button>
                                                </form>
                                                <label for="modal_20_{{ $item->id }}"
                                                    class="btn">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('print.edit', $item->id) }}"
                                        class="btn bg-red-700 text-white">PDF</a>

                                    @if ($item->status == 0)
                                        <button class="btn btn-success text-white"
                                            onclick="my_modal_3.showModal()">Upload
                                            File</button>
                                        <dialog id="my_modal_3" class="modal">
                                            <div class="modal-box">
                                                <form method="dialog">
                                                    <button
                                                        class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                                </form>
                                                <h3 class="text-lg font-bold">Upload perjanjian kinerja!</h3>
                                                <p class="py-4 text-red-700">Upload file dengan format .PDF!</p>
                                                <form action="{{ route('upload.kinerja') }}"
                                                    enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="idSurat"
                                                        value="{{ old('idSurat', $item->id) }}">
                                                    <input type="file" name="upload_file"
                                                        class="file-input file-input-bordered w-full mb-2" />
                                                    <button class="btn btn-block btn-neutral">Upload File</button>
                                                </form>
                                            </div>
                                        </dialog>
                                    @endif

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {{ $data->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
