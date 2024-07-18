<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Cascading') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <p class="mb-4 text-2xl font-semibold">TUJUAN</p>
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead class="bg-red-700 text-white">
                    <tr>
                        <th></th>
                        <th>Tujuan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tujuan as $item)
                        <tr>
                            <th>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </th>
                            <td>{{ $item->name }}</td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <button class="btn"
                                        onclick="my_modal_4{{ $item->key }}.showModal()">Edit</button>
                                    <dialog id="my_modal_4{{ $item->key }}" class="modal">
                                        <div class="modal-box w-11/12 max-w-5xl">
                                            <h3 class="font-bold text-lg">Ubah Data!</h3>
                                            <form action="{{ route('cascading_detail.update', $item->key) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="kategori" value="tujuan">
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Tujuan</span>
                                                    </div>
                                                    <input type="text" name="tujuan"
                                                        class="input input-bordered w-full"
                                                        value="{{ old('tujuan', $item->name) }}" />
                                                </label>
                                                <button class="btn btn-neutral btn-block mt-3 mb-1">Simpan</button>
                                                <a href="{{ route('cascading_detail.index') }}"
                                                    class="btn btn-block">Kembali</a>
                                            </form>
                                        </div>
                                    </dialog>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <p>Belum ada data</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-4">
        <p class="mb-4 text-2xl font-semibold">SASARAN STRATEGIS</p>
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead class="bg-red-700 text-white">
                    <tr>
                        <th></th>
                        <th>Sasaran Strategis</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sasaran as $itemSasaran)
                        <tr>
                            <th>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </th>
                            <td>{{ $itemSasaran->name }}</td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <button class="btn"
                                        onclick="my_modal_4{{ $itemSasaran->key }}.showModal()">Edit</button>
                                    <dialog id="my_modal_4{{ $itemSasaran->key }}" class="modal">
                                        <div class="modal-box w-11/12 max-w-5xl">
                                            <h3 class="font-bold text-lg">Ubah Data!</h3>
                                            <form action="{{ route('cascading_detail.update', $itemSasaran->key) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="kategori" value="sasaran">
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Sasaran Strategis</span>
                                                    </div>
                                                    <input type="text" name="sasaran"
                                                        class="input input-bordered w-full"
                                                        value="{{ old('sasaran', $itemSasaran->name) }}" />
                                                </label>
                                                <button class="btn btn-neutral btn-block mt-3 mb-1">Simpan</button>
                                                <a href="{{ route('cascading_detail.index') }}"
                                                    class="btn btn-block">Kembali</a>
                                            </form>
                                        </div>
                                    </dialog>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <p>Belum ada data</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-4">
        <p class="mb-4 text-2xl font-semibold">SASARAN PROGRAM</p>
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead class="bg-red-700 text-white">
                    <tr>
                        <th></th>
                        <th>Sasaran Program</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($program as $itemProgram)
                        <tr>
                            <th>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </th>
                            <td>{{ $itemProgram->name }}</td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <button class="btn"
                                        onclick="my_modal_4{{ $itemProgram->key }}.showModal()">Edit</button>
                                    <dialog id="my_modal_4{{ $itemProgram->key }}" class="modal">
                                        <div class="modal-box w-11/12 max-w-5xl">
                                            <h3 class="font-bold text-lg">Ubah Data!</h3>
                                            <form action="{{ route('cascading_detail.update', $itemProgram->key) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="kategori" value="program">
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Sasaran Program</span>
                                                    </div>
                                                    <input type="text" name="program"
                                                        class="input input-bordered w-full"
                                                        value="{{ old('program', $itemProgram->name) }}" />
                                                </label>
                                                <button class="btn btn-neutral btn-block mt-3 mb-1">Simpan</button>
                                                <a href="{{ route('cascading_detail.index') }}"
                                                    class="btn btn-block">Kembali</a>
                                            </form>
                                        </div>
                                    </dialog>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <p>Belum ada data</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-4">
        <p class="mb-4 text-2xl font-semibold">SASARAN KEGIATAN</p>
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead class="bg-red-700 text-white">
                    <tr>
                        <th></th>
                        <th>Sasaran Kegiatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kegiatan as $itemKegiatan)
                        <tr>
                            <th>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </th>
                            <td>{{ $itemKegiatan->name }}</td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <button class="btn"
                                        onclick="my_modal_4{{ $itemKegiatan->key }}.showModal()">Edit</button>
                                    <dialog id="my_modal_4{{ $itemKegiatan->key }}" class="modal">
                                        <div class="modal-box w-11/12 max-w-5xl">
                                            <h3 class="font-bold text-lg">Ubah Data!</h3>
                                            <form action="{{ route('cascading_detail.update', $itemKegiatan->key) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="kategori" value="kegiatan">
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Sasaran Program</span>
                                                    </div>
                                                    <input type="text" name="kegiatan"
                                                        class="input input-bordered w-full"
                                                        value="{{ old('program', $itemKegiatan->name) }}" />
                                                </label>
                                                <button class="btn btn-neutral btn-block mt-3 mb-1">Simpan</button>
                                                <a href="{{ route('cascading_detail.index') }}"
                                                    class="btn btn-block">Kembali</a>
                                            </form>
                                        </div>
                                    </dialog>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <p>Belum ada data</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
