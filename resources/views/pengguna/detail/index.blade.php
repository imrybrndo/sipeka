<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Cascading') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <p class="mb-4 text-2xl font-semibold">LEVEL 1</p>
        <div class="overflow-x-auto shadow-md rounded-md">
            <table class="table">
                <!-- head -->
                <thead class="bg-neutral text-white">
                    <tr>
                        <th></th>
                        <th>Level 1</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tujuan as $item)
                        <tr>
                            <th>
                                {{ $no1++ }}
                            </th>
                            <td>{{ $item->name }}</td>
                            <td>
                                <div class="flex gap-1 justify-center items-center">
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
                                                        <span class="label-text">Level 1</span>
                                                    </div>
                                                    <input type="text" name="tujuan"
                                                        class="input input-bordered w-full"
                                                        value="{{ old('tujuan', $item->name) }}" />
                                                </label>
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Indikator</span>
                                                    </div>
                                                    <input type="text" name="indikator"
                                                        class="input input-bordered w-full"
                                                        value="{{ old('indikator', $item->indikator) }}" />
                                                </label>
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Crosscut</span>
                                                    </div>
                                                    <select class="select select-bordered" name="croscut">
                                                        <option disabled selected>Pilih Salah Satu</option>
                                                        @foreach ($skpd as $itemSkpd)
                                                            <option value="{{ $itemSkpd->name }}">{{ $itemSkpd->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                                <button class="btn btn-neutral btn-block mt-3 mb-1">Simpan</button>
                                                <a href="{{ route('cascading_detail.index') }}"
                                                    class="btn btn-block">Kembali</a>
                                            </form>
                                        </div>
                                    </dialog>
                                    <form action="{{ route('cascading_detail.destroy', $item->key) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="level" value="1">
                                        <button class="btn bg-red-700 text-white">Hapus</button>
                                    </form>
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
        <p class="mb-4 text-2xl font-semibold">LEVEL 2</p>
        <div class="overflow-x-auto shadow-md rounded-md">
            <table class="table">
                <!-- head -->
                <thead class="bg-neutral text-white">
                    <tr>
                        <th>No</th>
                        <th>Level 2</th>
                        <th>Parent</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sasaran as $itemSasaran)
                        @foreach ($tujuan as $item)
                            <tr>
                                <th>
                                    {{ $no2++ }}
                                </th>
                                <td>{{ $itemSasaran->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="flex gap-1 justify-center items-center">
                                        <button class="btn"
                                            onclick="my_modal_4{{ $itemSasaran->key }}.showModal()">Edit</button>
                                        <dialog id="my_modal_4{{ $itemSasaran->key }}" class="modal">
                                            <div class="modal-box w-11/12 max-w-5xl">
                                                <h3 class="font-bold text-lg">Ubah Data!</h3>
                                                <form
                                                    action="{{ route('cascading_detail.update', $itemSasaran->key) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="kategori" value="sasaran">
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Level 2</span>
                                                        </div>
                                                        <input type="text" name="sasaran"
                                                            class="input input-bordered w-full"
                                                            value="{{ old('sasaran', $itemSasaran->name) }}" />
                                                    </label>
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Indikator</span>
                                                        </div>
                                                        <input type="text" name="indikator"
                                                            class="input input-bordered w-full"
                                                            value="{{ old('indikator', $item->indikator) }}" />
                                                    </label>
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Crosscut</span>
                                                        </div>
                                                        <select class="select select-bordered" name="croscut">
                                                            <option disabled selected>Pilih Salah Satu</option>
                                                            @foreach ($skpd as $item)
                                                                <option value="{{ $item->name }}">
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                    <button class="btn btn-neutral btn-block mt-3 mb-1">Simpan</button>
                                                    <a href="{{ route('cascading_detail.index') }}"
                                                        class="btn btn-block">Kembali</a>
                                                </form>
                                            </div>
                                        </dialog>

                                        <form action="{{ route('cascading_detail.destroy', $itemSasaran->key) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="level" value="2">
                                            <button class="btn bg-red-700 text-white">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
        <p class="mb-4 text-2xl font-semibold">LEVEL 3</p>
        <div class="overflow-x-auto rounded-md shadow-md">
            <table class="table">
                <!-- head -->
                <thead class="bg-neutral text-white">
                    <tr>
                        <th>No</th>
                        <th>Level 3</th>
                        <th>Parent</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_program as $itemProgram)
                        <tr>
                            <th>
                                {{ $no3++ }}
                            </th>
                            <td>{{ $itemProgram->name }}</td>
                            <td>{{ $itemProgram->sasaranStrategis->name }}</td>
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
                                                        <span class="label-text">Level 3</span>
                                                    </div>
                                                    <input type="text" name="program"
                                                        class="input input-bordered w-full"
                                                        value="{{ old('program', $itemProgram->name) }}" />
                                                </label>
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Indikator</span>
                                                    </div>
                                                    <input type="text" name="indikator"
                                                        class="input input-bordered w-full"
                                                        value="{{ old('indikator', $item->indikator) }}" />
                                                </label>
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Crosscut</span>
                                                    </div>
                                                    <select class="select select-bordered" name="croscut">
                                                        <option disabled selected>Pilih Salah Satu</option>
                                                        @foreach ($skpd as $item)
                                                            <option value="{{ $item->name }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                                <button class="btn btn-neutral btn-block mt-3 mb-1">Simpan</button>
                                                <a href="{{ route('cascading_detail.index') }}"
                                                    class="btn btn-block">Kembali</a>
                                            </form>
                                        </div>
                                    </dialog>
                                    <form action="{{ route('cascading_detail.destroy', $itemProgram->key) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="level" value="3">
                                        <button class="btn bg-red-700 text-white">Hapus</button>
                                    </form>
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
        <p class="mb-4 text-2xl font-semibold">LEVEL 4</p>
        <div class="overflow-x-auto shadow-md rounded-md">
            <table class="table">
                <!-- head -->
                <thead class="bg-neutral text-white">
                    <tr>
                        <th>No</th>
                        <th>Level 4</th>
                        <th>Parent</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_kegiatan as $itemKegiatan)
                        <tr>
                            <th>
                                {{ $no4++ }}
                            </th>
                            <td>{{ $itemKegiatan->name }}</td>
                            <td>{{ $itemKegiatan->sasaranProgram->name }}</td>
                            <td>
                                <div class="flex gap-1 justify-center items-center">
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
                                                        <span class="label-text">Level 4</span>
                                                    </div>
                                                    <input type="text" name="kegiatan"
                                                        class="input input-bordered w-full"
                                                        value="{{ old('program', $itemKegiatan->name) }}" />
                                                </label>
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Indikator</span>
                                                    </div>
                                                    <input type="text" name="indikator"
                                                        class="input input-bordered w-full"
                                                        value="{{ old('indikator', $item->indikator) }}" />
                                                </label>
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Crosscut</span>
                                                    </div>
                                                    <select class="select select-bordered" name="croscut">
                                                        <option disabled selected>Pilih Salah Satu</option>
                                                        @foreach ($skpd as $item)
                                                            <option value="{{ $item->name }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                                <button class="btn btn-neutral btn-block mt-3 mb-1">Simpan</button>
                                                <a href="{{ route('cascading_detail.index') }}"
                                                    class="btn btn-block">Kembali</a>
                                            </form>
                                        </div>
                                    </dialog>
                                    <form action="{{ route('cascading_detail.destroy', $itemKegiatan->key) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="level" value="4">
                                        <button class="btn bg-red-700 text-white">Hapus</button>
                                    </form>
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
        <p class="mb-4 text-2xl font-semibold">LEVEL 5</p>
        <div class="overflow-x-auto shadow-md rounded-md">
            <table class="table">
                <!-- head -->
                <thead class="bg-neutral text-white">
                    <tr>
                        <th>No</th>
                        <th>Level 5</th>
                        <th>Parent</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_lima as $itemLima)
                        <tr>
                            <th>
                                {{ $no5++ }}
                            </th>
                            <td>{{ $itemLima->name }}</td>
                            <td>{{ $itemLima->sasaranKegiatan->name }}</td>
                            <td>
                                <div class="flex gap-1 justify-center items-center">
                                    <button class="btn"
                                        onclick="my_modal_5{{ $itemLima->key }}.showModal()">Edit</button>
                                    <dialog id="my_modal_5{{ $itemLima->key }}" class="modal">
                                        <div class="modal-box w-11/12 max-w-5xl">
                                            <h3 class="font-bold text-lg">Ubah Data!</h3>
                                            <form action="{{ route('cascading_detail.update', $itemLima->key) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="kategori" value="lima">
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Level 5</span>
                                                    </div>
                                                    <input type="text" name="itemLima"
                                                        class="input input-bordered w-full"
                                                        value="{{ old('itemLima', $itemLima->name) }}" />
                                                </label>
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Indikator</span>
                                                    </div>
                                                    <input type="text" name="indikator"
                                                        class="input input-bordered w-full"
                                                        value="{{ old('indikator', $itemLima->indikator) }}" />
                                                </label>
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Crosscut</span>
                                                    </div>
                                                    <select class="select select-bordered" name="croscut">
                                                        <option disabled selected>Pilih Salah Satu</option>
                                                        @foreach ($skpd as $item)
                                                            <option value="{{ $item->name }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                                <button class="btn btn-neutral btn-block mt-3 mb-1">Simpan</button>
                                                <a href="{{ route('cascading_detail.index') }}"
                                                    class="btn btn-block">Kembali</a>
                                            </form>
                                        </div>
                                    </dialog>
                                    <form action="{{ route('cascading_detail.destroy', $itemLima->key) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="level" value="5">
                                        <button class="btn bg-red-700 text-white">Hapus</button>
                                    </form>
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


    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-4 mb-4">
        <div>
            <a href="{{ route('pohon.index') }}" class="btn btn-block">Kembali</a>
        </div>
    </div>

</x-app-layout>
