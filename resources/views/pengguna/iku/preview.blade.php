<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Preview IKU') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="flex justify-between items-end mb-3">
            <a href="{{ route('iku.index') }}" class="btn">Kembali</a>
            <a href="" class="btn bg-red-700 text-white">Export PDF</a>
        </div>
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Sasaran Strategis</th>
                        <th>Indikator Kinerja</th>
                        <th>Satuan</th>
                        <th>Alasan</th>
                        <th>Formulasi / Rumus Perhitungan</th>
                        <th>Sumber Data</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arr as $row)
                        @php
                            $rowCount = count($row['indikator']) + 1;
                        @endphp
                        <tr>
                            <td class="text-center" rowspan="{{ $rowCount }}">{{ $no++ }}</td>
                            <td rowspan="{{ $rowCount }}">{{ $row['sasaranStrategis'] }}</td>
                        </tr>
                        @foreach ($row['indikator'] as $item)
                            <tr>
                                <td>{{ $item['indikatorKinerja'] }}</td>
                                <td>{{ $item['satuan'] }}</td>
                                <td>{{ $item['alasan'] }}</td>
                                <td>{{ $item['formulasi'] }}</td>
                                <td>{{ $item['sumberData'] }}</td>
                                <td>
                                    <div class="flex">
                                        <!-- You can open the modal using ID.showModal() method -->
                                        <button class="btn"
                                            onclick="my_modal{{ $item['id'] }}.showModal()">Edit</button>
                                        <dialog id="my_modal{{ $item['id'] }}" class="modal">
                                            <div class="modal-box w-11/12 max-w-5xl">

                                                <form action="{{ route('update-iku', auth()->user()->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="idSasaran" value="{{ $row['id'] }}">
                                                    <input type="hidden" name="idIndikator"
                                                        value="{{ $item['id'] }}">

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Sasaran Strategis</span>
                                                        </div>
                                                        <input type="text" name="sasaranStrategis" placeholder="Type here"
                                                            value="{{ $row['sasaranStrategis'] }}"
                                                            class="input input-bordered w-full" />
                                                    </label>


                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Indikator Kinerja</span>
                                                        </div>
                                                        <input type="text" placeholder="Type here"
                                                            name="indikatorKinerja"
                                                            value="{{ $item['indikatorKinerja'] }}"
                                                            class="input input-bordered w-full" />
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Satuan</span>
                                                        </div>
                                                        <input type="text" placeholder="Type here" name="satuan"
                                                            value="{{ $item['satuan'] }}"
                                                            class="input input-bordered w-full" />
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Alasan</span>
                                                        </div>
                                                        <input type="text" placeholder="Type here" name="alasan"
                                                            value="{{ $item['alasan'] }}"
                                                            class="input input-bordered w-full" />
                                                    </label>


                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Formulasi/Rumus Perhitungan</span>
                                                        </div>
                                                        <input type="text" placeholder="Type here" name="formulasi"
                                                            value="{{ $item['formulasi'] }}"
                                                            class="input input-bordered w-full" />
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Sumber Data</span>
                                                        </div>
                                                        <input type="text" placeholder="Type here" name="sumberData"
                                                            value="{{ $item['sumberData'] }}"
                                                            class="input input-bordered w-full" />
                                                    </label>

                                                    <button
                                                        class="btn btn-block bg-red-700 text-white mt-2 mb-1">Simpan</button>
                                                    <a href="" class="btn btn-block">Kembali</a>
                                                </form>

                                            </div>
                                        </dialog>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
