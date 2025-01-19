<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('IKU') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div>
            <div class="flex gap-1">
                <button class="btn btn-neutral rounded-none" onclick="my_modal_4.showModal()">Tambah</button>
                <dialog id="my_modal_4" class="modal">
                    <div class="modal-box w-11/12 max-w-5xl">
                        <h3 class="text-lg font-bold">Indikator Kinerja Utama</h3>
                        <form action="{{ route('iku.store') }}" method="post">
                            @csrf
                            <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text">Sasaran Strategis</span>
                                </div>
                                <input type="text" name="sasaranStrategis" class="input input-bordered w-full" />
                            </label>
                            <button class="btn bg-red-700 text-white btn-block mt-2">Simpan</button>
                        </form>
                    </div>
                </dialog>

                <a href="{{ route('preview-iku', auth()->user()->id) }}" class="btn">Detail</a>

            </div>
        </div>
        <div>
            <div class="overflow-x-auto mt-3">
                <table class="table table-zebra">
                    <!-- head -->
                    <thead class="bg-red-700 text-white">
                        <tr>
                            <th>No</th>
                            <th>Sasaran Strategis</th>
                            <th>Komponen</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $item->sasaranStrategis }}</td>
                                <td>
                                    <div class="flex flex-col ...">
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
                                                    <form action="{{ route('indikator-iku') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="idSasaran"
                                                            value="{{ $item->id }}">
                                                        {{-- <div class="flex gap-2">
                                                            <div class="" id="inputFieldsIndikator"
                                                                class="mb-2">
                                                                <div class="label">
                                                                    <span class="label-text">Indikator</span>
                                                                </div>
                                                                <input type="text" name="indikatorRenstra[]"
                                                                    class="input input-bordered w-full mt-2">
                                                            </div>

                                                            <div id="inputFieldsSatuan" class="mb-2">
                                                                <div class="label">
                                                                    <span class="label-text">Kinerja</span>
                                                                </div>
                                                                <input type="number" name="kinerjaRenstra[]"
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
                                                        </script> --}}
                                                        <div class="" id="inputFieldsIndikator" class="mb-2">
                                                            <div class="label">
                                                                <span class="label-text">Indikator Kinerja</span>
                                                            </div>
                                                            <input type="text" name="indikatorKinerja"
                                                                class="input input-bordered w-full mt-2">
                                                        </div>
                                                        <div class="" id="inputFieldsIndikator" class="mb-2">
                                                            <div class="label">
                                                                <span class="label-text">Satuan</span>
                                                            </div>
                                                            <input type="text" name="satuan"
                                                                class="input input-bordered w-full mt-2">
                                                        </div>
                                                        <label class="form-control">
                                                            <div class="label">
                                                                <span class="label-text">Alasan</span>
                                                            </div>
                                                            <textarea name="alasan" class="textarea textarea-bordered h-24"></textarea>
                                                        </label>
                                                        <label class="form-control">
                                                            <div class="label">
                                                                <span class="label-text">Formulasi</span>
                                                            </div>
                                                            <textarea name="formulasi" class="textarea textarea-bordered h-24"></textarea>
                                                        </label>
                                                        <div class="mb-2" id="inputFieldsIndikator" class="mb-2">
                                                            <div class="label">
                                                                <span class="label-text">Sumber Data</span>
                                                            </div>
                                                            <input type="text" name="sumberData"
                                                                class="input input-bordered w-full mt-2">
                                                        </div>
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

                                        <form action="{{ route('delete-iku', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="idSasaran" value="{{ $item->id }}">
                                            <button class="btn btn-block bg-red-700 text-white">Hapus</button>
                                        </form>
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
