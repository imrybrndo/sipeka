<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Detail Surat Perjanjian Kinerja') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-4">
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead class="bg bg-red-700 text-white">
                    <tr>
                        <th>No</th>
                        <th>Sasaran Strategis</th>
                        <th>Indikator Kinerja</th>
                        <th>Satuan</th>
                        <th>Target</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                {{-- <tbody>
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
                            <td>
                                <div class="flex gap-1 justify-center items-center">
                                    <button class="btn"
                                        onclick="my_modal_1{{ $itemIndikator->id }}.showModal()">realisasi</button>
                                    <dialog id="my_modal_1{{ $itemIndikator->id }}" class="modal">
                                        <div class="modal-box w-11/12 max-w-5xl">
                                            <h3 class="font-bold text-lg">Ubah Data!</h3>
                                            <form action="{{ route('realisasi_kegiatan.update', $itemIndikator->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" name="idSurat"
                                                    value="{{ old('idSurat', $itemIndikator->idSasaran) }}">
                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Triwulan I</span>
                                                    </div>
                                                    <input type="text" name="triwulan1"
                                                        class="input input-bordered w-full" />
                                                </label>

                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Triwulan II</span>
                                                    </div>
                                                    <input type="text" name="triwulan2"
                                                        class="input input-bordered w-full" />
                                                </label>

                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Triwulan III</span>
                                                    </div>
                                                    <input type="text" name="triwulan3"
                                                        class="input input-bordered w-full" />
                                                </label>

                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">Triwulan IV</span>
                                                    </div>
                                                    <input type="text" name="triwulan4"
                                                        class="input input-bordered w-full" />
                                                </label>
                                                <button class="btn btn-neutral  btn-block mt-3">Simpan</button>
                                                <a href="" class="btn btn-block mt-1">Kembali</a>
                                            </form>
                                        </div>
                                    </dialog>
                                    <!-- You can open the modal using ID.showModal() method -->
                                    <button class="btn btn-neutral" onclick="my_modal_4{{$itemIndikator->id}}.showModal()">detail</button>
                                    <dialog id="my_modal_4{{$itemIndikator->id}}" class="modal">
                                        <div class="modal-box w-11/12 max-w-5xl">
                                            <h3 class="text-lg font-bold">Detail Data</h3>
                                            <table class="table mt-4">
                                                <tbody>
                                                    <tr>
                                                        <td>Sasaran Strategis</td>
                                                        <td>:</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Indikator</td>
                                                        <td>:</td>
                                                        <td>{{$itemIndikator->indikatorKinerja}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Realisasi Triwulan I</td>
                                                        <td>:</td>
                                                        <td>{{$itemIndikator->triwulan1}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Realisasi Triwulan II</td>
                                                        <td>:</td>
                                                        <td>{{$itemIndikator->triwulan2}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Realisasi Triwulan III</td>
                                                        <td>:</td>
                                                        <td>{{$itemIndikator->triwulan3}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Realisasi Triwulan IV</td>
                                                        <td>:</td>
                                                        <td>{{$itemIndikator->triwulan4}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="modal-action">
                                                <form method="dialog">
                                                    <!-- if there is a button, it will close the modal -->
                                                    <button class="btn">Tutup</button>
                                                </form>
                                            </div>
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
                </tbody> --}}
                <tbody>
                    @foreach ($arr as $row)
                        <?php
                        $a = count($row['indikator']);
                        $b = $a + 1;
                        ?>
                        <tr>
                            <td class="text-center" rowspan="<?php echo $b; ?>">{{ $no++ }}</td>
                            <td rowspan="<?php echo $b; ?>">
                                <?php echo $row['sasaranStrategis']; ?>
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
                                    <div class="flex gap-1 justify-center items-center">
                                        <button class="btn"
                                            onclick="my_modal_1<?php echo $item['id'] ?>.showModal()">realisasi</button>
                                        <dialog id="my_modal_1<?php echo $item['id'] ?>" class="modal">
                                            <div class="modal-box w-11/12 max-w-5xl">
                                                <h3 class="font-bold text-lg">Ubah Data!</h3>
                                                <form
                                                    action="{{ route('realisasi_kegiatan.update', $item['id']) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <input type="hidden" name="idSurat" value="{{old('idSurat', $item['idSurat'])}}" />


                                                    <input type="hidden" name="idSasaran"
                                                        value="{{ old('idSasaran', $item['idSasaran']) }}">
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Triwulan I</span>
                                                        </div>
                                                        <input type="text" name="triwulan1"
                                                            class="input input-bordered w-full" />
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Triwulan II</span>
                                                        </div>
                                                        <input type="text" name="triwulan2"
                                                            class="input input-bordered w-full" />
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Triwulan III</span>
                                                        </div>
                                                        <input type="text" name="triwulan3"
                                                            class="input input-bordered w-full" />
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Triwulan IV</span>
                                                        </div>
                                                        <input type="text" name="triwulan4"
                                                            class="input input-bordered w-full" />
                                                    </label>
                                                    <button class="btn btn-neutral  btn-block mt-3">Simpan</button>
                                                    <a href="" class="btn btn-block mt-1">Kembali</a>
                                                </form>
                                            </div>
                                        </dialog>
                                        <!-- You can open the modal using ID.showModal() method -->
                                        <button class="btn btn-neutral"
                                            onclick="my_modal_4<?php echo $item['id'] ?>.showModal()">detail</button>
                                        <dialog id="my_modal_4<?php echo $item['id'] ?>" class="modal">
                                            <div class="modal-box w-11/12 max-w-5xl">
                                                <h3 class="text-lg font-bold">Detail Data</h3>
                                                <table class="table mt-4">
                                                    <tbody>
                                                        <tr>
                                                            <td>Sasaran Strategis</td>
                                                            <td>:</td>
                                                            <td><?php echo $row['sasaranStrategis'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Indikator</td>
                                                            <td>:</td>
                                                            <td><?php echo $item['indikatorKinerja'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Realisasi Triwulan I</td>
                                                            <td>:</td>
                                                            <td><?php echo $item['triwulan1'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Realisasi Triwulan II</td>
                                                            <td>:</td>
                                                            <td><?php echo $item['triwulan2'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Realisasi Triwulan III</td>
                                                            <td>:</td>
                                                            <td><?php echo $item['triwulan3'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Realisasi Triwulan IV</td>
                                                            <td>:</td>
                                                            <td><?php echo $item['triwulan4'] ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="modal-action">
                                                    <form method="dialog">
                                                        <!-- if there is a button, it will close the modal -->
                                                        <button class="btn">Tutup</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </dialog>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
            <form action="{{route('rekap-hasil.update', $idSurat)}}" method="post">
                @csrf
                @method('PATCH')
                <input type="hidden" name="idSurat" value="{{old('idSurat', $idSurat)}}">
                <button class="btn btn-block btn-neutral">Rekap Hasil</button>
            </form>
            <a href="{{ route('surat.index') }}" class="btn btn-block mt-1">Kembali</a>
        </div>
    </div>
</x-app-layout>
