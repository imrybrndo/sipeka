<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Realisasi Anggaran') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="flex justify-between items-end">

            <div class="flex gap-1">
                <a href="{{ route('realisasi.create') }}" class="btn btn-neutral">Tambah Data</a>
                <form action="{{ route('rekap-realisasi.update', auth()->user()->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <button class="btn">Hitung Realisasi</button>
                </form>
            </div>

            <form action="{{ route('realisasi.index') }}" method="GET">
                <input type="text" name="search" placeholder="Cari..." class="input input-bordered"
                    value="{{ request()->query('search') }}">
                <button type="submit" class="btn btn-neutral">Cari</button>
            </form>
        </div>
        <div>
            <div class="overflow-x-auto mt-3">
                <table class="table">
                    <!-- head -->
                    <thead class="bg-red-700 text-white">
                        <tr>
                            <th>No</th>
                            <th>Realisasi Fisik</th>
                            <th>Triwulan I</th>
                            <th>Triwulan II</th>
                            <th>Triwulan III</th>
                            <th>Triwulan IV</th>
                            <th>Anggaran</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $item->realisasiFisik }}</td>
                                <td>
                                    @currency($item->triwulan1)
                                </td>
                                <td>
                                    @currency($item->triwulan2)
                                </td>
                                <td>
                                    @currency($item->triwulan3)
                                </td>
                                <td>
                                    @currency($item->triwulan4)
                                </td>
                                <td>
                                    @currency($item->anggaran)
                                </td>
                                <td>
                                    <div class="flex gap-2">
                                        <!-- Open the modal using ID.showModal() method -->
                                        <button class="btn btn-xs"
                                            onclick="my_modal_2{{ $item->id }}.showModal()">edit</button>
                                        <dialog id="my_modal_2{{ $item->id }}" class="modal">
                                            <div class="modal-box">
                                                <h3 class="font-bold text-lg">Edit Realisasi Anggaran</h3>
                                                <form action="{{ route('realisasi.update', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Realisasi Fisik</span>
                                                        </div>
                                                        <input type="text" name="realisasiFisik"
                                                            class="input input-bordered w-full"
                                                            value="{{ old('realisasiFisik', $item->realisasiFisik) }}" />
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Triwulan I</span>
                                                        </div>
                                                        <input type="text" name="triwulan1" id="idrInput"
                                                            placeholder="Rp." class="input input-bordered w-full"
                                                            value="{{ old('triwulan1', $item->triwulan1) }}" />
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Triwulan II</span>
                                                        </div>
                                                        <input type="text" name="triwulan2" id="idrInput"
                                                            placeholder="Rp." class="input input-bordered w-full"
                                                            value="{{ old('triwulan2', $item->triwulan2) }}" />
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Triwulan III</span>
                                                        </div>
                                                        <input type="text" name="triwulan3" id="idrInput"
                                                            placeholder="Rp." class="input input-bordered w-full"
                                                            value="{{ old('triwulan3', $item->triwulan3) }}" />
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Triwulan IV</span>
                                                        </div>
                                                        <input type="text" id="idrInput" placeholder="Rp."
                                                            name="triwulan4" class="input input-bordered w-full"
                                                            value="{{ old('triwulan4', $item->triwulan4) }}" />
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Anggaran</span>
                                                        </div>
                                                        <input type="text" id="idrInput" placeholder="Rp."
                                                            name="anggaran" class="input input-bordered w-full"
                                                            value="{{ old('anggaran', $item->anggaran) }}" />
                                                    </label>

                                                    <button type="submit"
                                                        class="btn btn-neutral btn-block mt-2">Update</button>
                                                    <a href="{{ route('realisasi.index') }}"
                                                        class="btn btn-block mt-1">Tidak</a>
                                                </form>
                                            </div>
                                        </dialog>

                                        <!-- Open the modal using ID.showModal() method -->
                                        <button class="btn btn-xs btn-neutral"
                                            onclick="my_modal_1{{ $item->id }}.showModal()">hapus</button>
                                        <dialog id="my_modal_1{{ $item->id }}" class="modal">
                                            <div class="modal-box">
                                                <h3 class="font-bold text-lg">Peringatan!</h3>
                                                <p class="py-4">Apakah anda yakin ingin menghapus data ini?</p>
                                                <div class="modal-action">
                                                    <div class="flex">
                                                        <form action="{{ route('realisasi.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-neutral">Ya</button>
                                                        </form>
                                                        <form method="dialog">
                                                            <!-- if there is a button in form, it will close the modal -->
                                                            <button class="btn">Tidak</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </dialog>
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
    </div>
</x-app-layout>
