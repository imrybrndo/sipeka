<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Renstra') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="flex gap-1">
            <button class="btn btn-neutral rounded-none" onclick="my_modal_4.showModal()">Tambah</button>
            <dialog id="my_modal_4" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Renstra</h3>
                    <form action="{{ route('renstra.store') }}" method="post">
                        @csrf
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Tujuan</span>
                            </div>
                            <input type="text" name="tujuanRenstra" class="input input-bordered w-full" />
                        </label>
                        <button class="btn bg-red-700 text-white mt-2 btn-block hover:bg-red-700">Simpan</button>
                    </form>
                </div>
            </dialog>
            <a href="{{ route('preview-renstra', auth()->user()->id) }}" class="btn">Detail</a>
            {{-- <button class="btn bg-red-700 hover:bg-red-800 text-white">Export PDF</button> --}}
        </div>
        <div class="mt-4">
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead class="bg-red-700 text-white">
                        <tr>
                            <th>No</th>
                            <th>Tujuan</th>
                            <th>Komponen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $item->tujuan }}</td>
                                <td>
                                    <div class="flex flex-col ...">
                                        {{-- TOMBOL SASARAN STRATEGIS --}}
                                        <div class="dropdown dropdown-right">
                                            <div tabindex="0" role="button" class="btn btn-xs btn-block">Sasaran
                                            </div>
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
                                                    <h3 class="text-lg font-bold">Sasaran</h3>
                                                    <p class="py-4">Silahkan masukkan sasaran dari tujuan!
                                                    </p>
                                                    <form action="{{ route('sasaran-renstra.store') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="idRenstra"
                                                            value="{{ $item->id }}">
                                                        <label class="form-control w-full mt-3">
                                                            <label class="form-control w-full">
                                                                <a class="btn btn-neutral"
                                                                    onclick="addInputField2{{ $item->id }}()">
                                                                    Tambah
                                                                </a>
                                                                <div id="inputFields2{{ $item->id }}"
                                                                    class="mb-2">
                                                                    <div class="label">
                                                                        <span class="label-text">Sasaran</span>
                                                                    </div>
                                                                    @for ($i = 1; $i <= 1; $i++)
                                                                        <input type="text" name="sasaran[]"
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
                                                                    newInputField.setAttribute('name', 'sasaran[]'); // Changed to use an array for multiple inputs
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
                                            <div tabindex="0" role="button" class="btn btn-xs btn-block mt-1">
                                                Indikator
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
                                                    <p class="py-4">Silahkan masukkan Indikator, Kinerja, Keuangan!
                                                    </p>
                                                    <form action="{{ route('indikator-sasaran.store') }}"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" name="idRenstra"
                                                            value="{{ $item->id }}">
                                                        <label class="form-control w-full mb-3">
                                                            <div class="label">
                                                                <span class="label-text">Sasaran Renstra</span>
                                                            </div>
                                                            <select name="idSasaran" class="select select-bordered">
                                                                <option disabled selected>Pilih satu</option>
                                                                @foreach ($sasaranRenstra as $itemSasaran)
                                                                    <option value="{{ $itemSasaran->id }}">
                                                                        {{ $itemSasaran->sasaran }}</option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                        <div class="flex gap-2">
                                                            <div class="" id="inputFieldsIndikator"
                                                                class="mb-2">
                                                                <div class="label">
                                                                    <span class="label-text">Indikator</span>
                                                                </div>
                                                                <input type="number" step="0.01"
                                                                    name="indikatorRenstra[]"
                                                                    class="input input-bordered w-full mt-2">
                                                            </div>

                                                            <div id="inputFieldsSatuan" class="mb-2">
                                                                <div class="label">
                                                                    <span class="label-text">Kinerja</span>
                                                                </div>
                                                                <input type="number" step="0.01"
                                                                    name="kinerjaRenstra[]"
                                                                    class="input input-bordered w-full mt-2">
                                                            </div>

                                                            <div id="inputFieldsTarget" class="mb-2">
                                                                <div class="label">
                                                                    <span class="label-text">Keuangan</span>
                                                                </div>
                                                                <input type="number" name="keuanganRenstra[]"
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
                                                                newInputFieldIndikator.setAttribute('name', 'indikatorRenstra[]');
                                                                inputFieldsIndikator.appendChild(newInputFieldIndikator);

                                                                const inputFieldsSatuan = document.getElementById('inputFieldsSatuan');
                                                                const newInputFieldSatuan = document.createElement('input');
                                                                newInputFieldSatuan.setAttribute('type', 'text');
                                                                newInputFieldSatuan.setAttribute('placeholder', 'Type here');
                                                                newInputFieldSatuan.setAttribute('class', 'input input-bordered w-full mt-2');
                                                                newInputFieldSatuan.setAttribute('name', 'kinerjaRenstra[]');
                                                                inputFieldsSatuan.appendChild(newInputFieldSatuan);

                                                                const inputFieldsTarget = document.getElementById('inputFieldsTarget');
                                                                const newInputFieldTarget = document.createElement('input');
                                                                newInputFieldTarget.setAttribute('type', 'text');
                                                                newInputFieldTarget.setAttribute('placeholder', 'Type here');
                                                                newInputFieldTarget.setAttribute('class', 'input input-bordered w-full mt-2');
                                                                newInputFieldTarget.setAttribute('name', 'keuanganRenstra[]');
                                                                inputFieldsTarget.appendChild(newInputFieldTarget);
                                                            }
                                                        </script>
                                                        <div class="flex gap-1 justify-end items-end">
                                                            <button type="submit"
                                                                class="btn btn-neutral">Simpan</button>
                                                            <a href="" class="btn"
                                                                for="my_modal_4_{{ $item->id }}">Batal</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </dialog>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center gap-1">

                                        <button class="btn"
                                            onclick="my_modals1{{ $item->id }}.showModal()">Edit</button>
                                        <dialog id="my_modals1{{ $item->id }}" class="modal">
                                            <div class="modal-box">
                                                <h3 class="text-lg font-bold">Perhatian!</h3>
                                                <p class="py-4">Apakah kamu yakin ingin menghapus data ini?</p>
                                                <div class="modal-action">
                                                    <div class="flex">
                                                        <form action="{{ route('renstra-delete', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="idSasaran"
                                                                value="{{ $item->id }}">
                                                            <button class="btn btn-neutral">hapus</button>
                                                        </form>
                                                    </div>
                                                    <form method="dialog">
                                                        <!-- if there is a button in form, it will close the modal -->
                                                        <button class="btn">Close</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </dialog>

                                        <button class="btn bg-red-700 text-white"
                                            onclick="my_modals{{ $item->id }}.showModal()">Hapus</button>
                                        <dialog id="my_modals{{ $item->id }}" class="modal">
                                            <div class="modal-box">
                                                <h3 class="text-lg font-bold">Perhatian!</h3>
                                                <p class="py-4">Apakah kamu yakin ingin menghapus data ini?</p>
                                                <div class="modal-action">
                                                    <div class="flex">
                                                        <form action="{{ route('renstra-delete', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="idSasaran"
                                                                value="{{ $item->id }}">
                                                            <button class="btn btn-neutral">hapus</button>
                                                        </form>
                                                    </div>
                                                    <form method="dialog">
                                                        <!-- if there is a button in form, it will close the modal -->
                                                        <button class="btn">Close</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </dialog>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
