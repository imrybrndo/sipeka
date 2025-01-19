<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Detail Surat Perjanjian Kinerja') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="overflow-x-auto">
            <table class="table">
                {{-- <thead class="bg bg-red-700 text-white">
                    <tr>
                        <th>No</th>
                        <th>Sasaran Strategis</th>
                        <th>Kategori</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sasaran as $item)
                        <tr>
                            <th>

                            </th>
                            <td>{{ $item->sasaranStrategis }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <!-- You can open the modal using ID.showModal() method -->
                                    <button class="btn"
                                        onclick="my_modal_4{{ $item->id }}.showModal()">Edit</button>
                                    <dialog id="my_modal_4{{ $item->id }}" class="modal">
                                        <div class="modal-box w-11/12 max-w-5xl">
                                            <h3 class="font-bold text-lg">Ubah Data!</h3>
                                            <form action="{{ route('sasaran.update', $item->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Sasaran Strategis</span>
                                                    </div>
                                                    <input type="text" name="sasaranStrategis"
                                                        value="{{ old('sasaranStrategis', $item->sasaranStrategis) }}"
                                                        class="input input-bordered w-full" />
                                                </label>
                                                <button class="btn btn-neutral btn-block mt-3">Simpan</button>
                                                <a href="" class="btn btn-block mt-1">Kembali</a>
                                            </form>
                                        </div>
                                    </dialog>
                                </div>
                            </td>
                        @empty
                            <td colspan="6">
                                <p class="text-center">Belum ada data</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody> --}}
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Sasaran Strategis</th>
                        <th>Indikator Kinerja</th>
                        <th>Satuan</th>
                        <th>Target</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arr as $row)
                        <?php
                        $a = count($row['indikator']);
                        $b = $a + 1;
                        ?>
                        <tr>
                            <td class="text-center" rowspan="<?php echo $b; ?>">{{ $no++ }}</td>
                            <td rowspan="<?php echo $b; ?>">
                                <div class="flex justify-center justify-between items-center">
                                    <?php echo $row['sasaranStrategis']; ?>
                                    <button class="btn bg-red-700 text-white"
                                        onclick="my_modal_4{{ $row['id'] }}.showModal()">Edit</button>
                                    <dialog id="my_modal_4{{ $row['id'] }}" class="modal">
                                        <div class="modal-box w-11/12 max-w-5xl">
                                            <h3 class="font-bold text-lg">Ubah Data!</h3>
                                            <form action="{{ route('sasaran.update', $row['id']) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Sasaran Strategis</span>
                                                    </div>
                                                    <input type="text" name="sasaranStrategis"
                                                        value="{{ old('sasaranStrategis', $row['sasaranStrategis']) }}"
                                                        class="input input-bordered w-full" />
                                                </label>
                                                <button class="btn btn-neutral btn-block mt-3">Simpan</button>
                                                <a href="" class="btn btn-block mt-1">Kembali</a>
                                            </form>
                                        </div>
                                    </dialog>

                                </div>


                            </td>
                        </tr>
                        @foreach ($row['indikator'] as $item)
                            <tr>
                                <td>
                                    <?php echo $item['indikatorKinerja']; ?>
                                </td>
                                <td>
                                    <?php echo $item['satuan']; ?>
                                </td>
                                <td>
                                    <?php echo $item['target']; ?>
                                </td>
                                <td>
                                    <button class="btn bg-red-700 text-white"
                                        onclick="my_modal_1{{ $item['id'] }}.showModal()">Edit</button>
                                    <dialog id="my_modal_1{{ $item['id'] }}" class="modal">
                                        <div class="modal-box w-11/12 max-w-5xl">
                                            <h3 class="font-bold text-lg">Ubah Data!</h3>
                                            <form action="{{ route('indikator.update', $item['id']) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="idIndikator"
                                                    value="{{ old('idIndikator', $item['id']) }}">
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Indikator Kinerja</span>
                                                    </div>
                                                    <input type="text" name="indikatorKinerja"
                                                        value="{{ old('indikatorKinerja', $item['indikatorKinerja']) }}"
                                                        class="input input-bordered w-full" />
                                                </label>

                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Satuan</span>
                                                    </div>
                                                    <input type="text" name="satuan"
                                                        value="{{ old('satuan', $item['satuan']) }}"
                                                        class="input input-bordered w-full" />
                                                </label>

                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Target</span>
                                                    </div>
                                                    <input type="text" name="target"
                                                        value="{{ old('satuan', $item['target']) }}"
                                                        class="input input-bordered w-full" />
                                                </label>
                                                <button class="btn btn-neutral  btn-block mt-3">Simpan</button>
                                                <a href="" class="btn btn-block mt-1">Kembali</a>
                                            </form>
                                        </div>
                                    </dialog>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('surat.index') }}" class="btn btn-block mt-3">Kembali</a>
    </div>

    {{-- <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-4">
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead class="bg bg-red-700 text-white">
                    <tr>
                        <th></th>
                        <th>Indikator Kinerja</th>
                        <th>Satuan</th>
                        <th>Target</th>
                        <th>Kategori</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($indikator as $itemIndikator)
                        <tr>
                            <th><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </th>
                            <td>{{ $itemIndikator->indikatorKinerja }}</td>
                            <td>{{ $itemIndikator->satuan }}</td>
                            <td>{{ $itemIndikator->target }}</td>
                            <td>{{ $itemIndikator->kategori }}</td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <button class="btn"
                                        onclick="my_modal_1{{ $itemIndikator->id }}.showModal()">Edit</button>
                                    <dialog id="my_modal_1{{ $itemIndikator->id }}" class="modal">
                                        <div class="modal-box w-11/12 max-w-5xl">
                                            <h3 class="font-bold text-lg">Ubah Data!</h3>
                                            <form action="{{ route('indikator.update', $item->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="idIndikator" value="{{old('idIndikator', $itemIndikator->id)}}">
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Indikator Kinerja</span>
                                                    </div>
                                                    <input type="text" name="indikatorKinerja"
                                                        value="{{ old('indikatorKinerja', $itemIndikator->indikatorKinerja) }}"
                                                        class="input input-bordered w-full" />
                                                </label>

                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Satuan</span>
                                                    </div>
                                                    <input type="text" name="satuan"
                                                        value="{{ old('satuan', $itemIndikator->satuan) }}"
                                                        class="input input-bordered w-full" />
                                                </label>

                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Target</span>
                                                    </div>
                                                    <input type="text" name="target"
                                                        value="{{ old('satuan', $itemIndikator->target) }}"
                                                        class="input input-bordered w-full" />
                                                </label>
                                                <button class="btn btn-neutral  btn-block mt-3">Simpan</button>
                                                <a href="" class="btn btn-block mt-1">Kembali</a>
                                            </form>
                                        </div>
                                    </dialog>
                                </div>
                            </td>
                        @empty
                            <td colspan="6">
                                <p class="text-center bg-grey">Belum ada data</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <a href="{{ route('surat.index') }}" class="btn btn-block mt-3">Kembali</a>
        </div>
    </div> --}}
</x-app-layout>
