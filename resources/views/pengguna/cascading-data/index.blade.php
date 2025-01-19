<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Cascading') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div>
            <!-- You can open the modal using ID.showModal() method -->
            <button class="btn btn-primary" onclick="my_modal_4.showModal()">Tambah</button>
            <dialog id="my_modal_4" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold">Data Cascading!</h3>
                    <form action="{{ route('cascading-data.store') }}" method="post">
                        @csrf
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Cascading</span>
                            </div>
                            <select class="select select-bordered" name="dataCascading">
                                <option disabled selected>Pick one</option>
                                @foreach ($allItems as $itemData)
                                    <option value="{{ $itemData['name'] }}">{{ $itemData['name'] }}</option>
                                @endforeach
                            </select>
                        </label>
                        <button class="btn btn-block btn-primary mt-10">Simpan</button>
                        <a href="" class="btn btn-block mt-1">Batal</a>
                    </form>
                </div>
            </dialog>
        </div>
        <div>
            <div class="overflow-x-auto">
                <table class="table mt-5">
                    <!-- head -->
                    <thead class="bg-red-700 text-white">
                        <tr>
                            <th></th>
                            <th>Data Cascading</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($dataCascading as $item)
                            <tr>
                                <th>+</th>
                                <td>{{ $item->dataCascading }}</td>
                                <td>
                                    <div class="flex justify-center items-center gap-2">
                                        <!-- You can open the modal using ID.showModal() method -->
                                        <button class="btn"
                                            onclick="my_modal_4{{ $item->id }}.showModal()">Edit</button>
                                        <dialog id="my_modal_4{{ $item->id }}" class="modal">
                                            <div class="modal-box w-11/12 max-w-5xl">
                                                <h3 class="text-lg font-bold">Data Cascading!</h3>
                                                <p class="py-4">Silahkan masukkan data cascading</p>
                                                <form action="{{ route('cascading-data.update', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Level Data</span>
                                                        </div>
                                                        <select class="select select-bordered" name="level">
                                                            <option disabled selected>Pilih Salah Satu</option>
                                                            <option value="1">Level 1</option>
                                                            <option value="2">Level 2</option>
                                                            <option value="3">Level 3</option>
                                                            <option value="4">Level 4</option>
                                                        </select>
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Tipe</span>
                                                        </div>
                                                        <select class="select select-bordered" name="tipe">
                                                            <option disabled selected>Pilih Salah Satu</option>
                                                            <option value="tujuan">Tujuan</option>
                                                            <option value="sasaran_strategis">Sasaran Strategis</option>
                                                            <option value="sasaran_program">Sasaran Program</option>
                                                            <option value="sasaran_kegiatan">Sasaran Kegiatan</option>
                                                        </select>
                                                    </label>

                                                    <button class="btn btn-block btn-primary mt-4">Simpan</button>
                                                </form>
                                            </div>
                                        </dialog>
                                        <form action="{{ route('cascading-data.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-primary">Hapus</button>
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
