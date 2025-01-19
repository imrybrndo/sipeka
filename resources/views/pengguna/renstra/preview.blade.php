<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Preview Renstra') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="flex justify-between items-end mb-3">
            <a href="{{ route('renstra.index') }}" class="btn">Kembali</a>
            <a href="" class="btn bg-red-700 text-white">Export PDF</a>
        </div>
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead class="bg-red-700 text-white">
                    <tr>
                        <th>No</th>
                        <th>Sasaran</th>
                        <th>Indikator Renstra</th>
                        <th>Kinerja Renstra</th>
                        <th>Keuangan Renstra</th>
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
                            <td rowspan="{{ $rowCount }}">{{ $row['sasaran'] }}</td>
                        </tr>
                        @foreach ($row['indikator'] as $item)
                            <tr>
                                <td>{{ $item['indikatorRenstra'] }}</td>
                                <td>{{ $item['kinerjaRenstra'] }}</td>
                                <td>{{ $item['keuanganRenstra'] }}</td>
                                <td>
                                    <div class="flex gap-1">
                                        <!-- Open the modal using ID.showModal() method -->
                                        <button class="btn"
                                            onclick="my_modal_1{{ $item['id'] }}.showModal()">Edit</button>
                                        <dialog id="my_modal_1{{ $item['id'] }}" class="modal">
                                            <div class="modal-box">
                                                <form action="{{ route('preview-update', auth()->user()->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="idSasaranRenstra"
                                                        value={{ old('idSasaranRenstra', $row['id']) }}>

                                                    <input type="hidden" name="idIndikator"
                                                        value="{{ old('idIndikator', $item['id']) }}">

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Sasaran Strategis</span>
                                                        </div>
                                                        <input type="text" placeholder="Type here" name="sasaran"
                                                            value="{{ old('sasaran', $row['sasaran']) }}"
                                                            class="input input-bordered w-full" />
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Indikator Renstra</span>
                                                        </div>
                                                        <input type="number" step="0.01" placeholder="Type here"
                                                            name="indikatorRenstra"
                                                            value="{{ old('indikatorRenstra', $item['indikatorRenstra']) }}"
                                                            class="input input-bordered w-full" />
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Kinerja Renstra</span>
                                                        </div>
                                                        <input type="number" step="0.01" placeholder="Type here"
                                                            name="kinerjaRenstra"
                                                            value="{{ old('kinerjaRenstra', $item['kinerjaRenstra']) }}"
                                                            class="input input-bordered w-full" />
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Keuangan Renstra</span>
                                                        </div>
                                                        <input type="number" placeholder="Type here"
                                                            name="keuanganRenstra"
                                                            value="{{ old('keuanganRenstra', $item['keuanganRenstra']) }}"
                                                            class="input input-bordered w-full" />
                                                    </label>

                                                    <button
                                                        class="btn btn-block bg-red-700 text-white mt-2 mb-1 hover:bg-red-700">Simpan</button>
                                                    <a href="{{ route('preview-renstra', auth()->user()->id) }}"
                                                        class="btn btn-block">Kembali</a>
                                                </form>
                                            </div>
                                        </dialog>


                                        <!-- Open the modal using ID.showModal() method -->
                                        <button class="btn btn-neutral"
                                            onclick="my_modal{{ $item['id'] }}.showModal()">Hapus</button>
                                        <dialog id="my_modal{{ $item['id'] }}" class="modal">
                                            <div class="modal-box">
                                                <h3 class="text-lg font-bold">Perhatian!</h3>
                                                <p class="py-4">Apakah anda yakin ingin menghapus data ini?</p>
                                                <div class="modal-action">
                                                    <div class="flex">
                                                        <form
                                                            action="{{ route('indikator-sasaran.destroy', $item['id']) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-neutral">Hapus</button>
                                                        </form>
                                                        <form method="dialog">
                                                            <!-- if there is a button in form, it will close the modal -->
                                                            <button class="btn">Tutup</button>
                                                        </form>
                                                    </div>
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
            {{-- <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tujuan</th>
                        <th>Sasaran</th>
                        <th>Indikator Renstra</th>
                        <th>Kinerja Renstra</th>
                        <th>Keuangan Renstra</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arr as $row)
                        @php
                            // Menghitung total row untuk tujuan (jumlah sasaran dan indikator)
                            $totalSasaranRows = 0;
                            foreach ($row['sasaran'] as $sasaran) {
                                $totalSasaranRows += count($sasaran['indikator']); // Menambah total indikator pada sasaran
                            }
                            $rowCount = $totalSasaranRows + count($row['sasaran']); // Jumlah sasaran + indikator
                        @endphp

                        <!-- Baris untuk tujuan -->
                        <tr>
                            <td rowspan="{{ $rowCount }}">{{ $no++ }}</td>
                            <td rowspan="{{ $rowCount }}">{{ $row['tujuan'] }}</td>

                            @foreach ($row['sasaran'] as $index => $sasaran)
                                @php
                                    $sasaranRowCount = count($sasaran['indikator']); // Jumlah indikator untuk sasaran
                                @endphp

                                <!-- Baris untuk sasaran -->
                                <td rowspan="{{ $sasaranRowCount }}">{{ $sasaran['sasaran'] }}</td>

                                <!-- Loop untuk menampilkan indikator -->
                                @foreach ($sasaran['indikator'] as $item)
                        <tr>
                            <td>{{ $item['indikatorRenstra'] }}</td>
                            <td>{{ $item['kinerjaRenstra'] }}</td>
                            <td>{{ $item['keuanganRenstra'] }}</td>
                        </tr>
                    @endforeach
                    @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table> --}}
            {{-- <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tujuan</th>
                        <th>Sasaran</th>
                        <th>Indikator Renstra</th>
                        <th>Kinerja Renstra</th>
                        <th>Keuangan Renstra</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arr as $row)
                        @php
                            // Menghitung total row untuk tujuan (jumlah sasaran dan indikator)
                            $totalSasaranRows = 0;
                            foreach ($row['sasaran'] as $sasaran) {
                                $totalSasaranRows += count($sasaran['indikator']); // Menambah total indikator pada sasaran
                            }
                            $rowCount = $totalSasaranRows + count($row['sasaran']); // Jumlah sasaran + indikator
                        @endphp

                        <!-- Baris untuk tujuan -->
                        <tr>
                            <td rowspan="{{ $rowCount }}">{{ $no++ }}</td>
                            <td rowspan="{{ $rowCount }}">{{ $row['tujuan'] }}</td>

                            @foreach ($row['sasaran'] as $index => $sasaran)
                                @php
                                    $sasaranRowCount = count($sasaran['indikator']); // Jumlah indikator untuk sasaran
                                @endphp

                                <!-- Baris untuk sasaran -->
                                <td rowspan="{{ $sasaranRowCount }}">{{ $sasaran['sasaran'] }}</td>

                                <!-- Loop untuk menampilkan indikator -->
                                @foreach ($sasaran['indikator'] as $item)
                        <tr>
                            <td>{{ $item['indikatorRenstra'] }}</td>
                            <td>{{ $item['kinerjaRenstra'] }}</td>
                            <td>{{ $item['keuanganRenstra'] }}</td>
                        </tr>
                    @endforeach
                    @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table> --}}

            {{-- <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tujuan</th>
                        <th>Sasaran</th>
                        <th>Indikator Renstra</th>
                        <th>Kinerja Renstra</th>
                        <th>Keuangan Renstra</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arr as $row)
                        @php
                            // Menghitung total row untuk tujuan (jumlah sasaran dan indikator)
                            $totalSasaranRows = 0;
                            foreach ($row['sasaran'] as $sasaran) {
                                $totalSasaranRows += count($sasaran['indikator']); // Menambah total indikator pada sasaran
                            }
                            $rowCount = $totalSasaranRows + count($row['sasaran']); // Jumlah sasaran + indikator
                        @endphp

                        <!-- Baris untuk tujuan -->
                        <tr>
                            <td rowspan="{{ $rowCount }}">{{ $no++ }}</td>
                            <td rowspan="{{ $rowCount }}">{{ $row['tujuan'] }}</td>

                            @foreach ($row['sasaran'] as $index => $sasaran)
                                @php
                                    $sasaranRowCount = count($sasaran['indikator']); // Jumlah indikator untuk sasaran
                                @endphp

                                <!-- Baris untuk sasaran -->
                                <td rowspan="{{ $sasaranRowCount }}">{{ $sasaran['sasaran'] }}</td>

                                <!-- Loop untuk menampilkan indikator -->
                                @foreach ($sasaran['indikator'] as $item)
                        <tr>
                            <td>{{ $item['indikatorRenstra'] }}</td>
                            <td>{{ $item['kinerjaRenstra'] }}</td>
                            <td>{{ $item['keuanganRenstra'] }}</td>
                        </tr>
                    @endforeach
                    @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table> --}}


            {{-- <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tujuan</th>
                        <th>Sasaran</th>
                        <th>Indikator Renstra</th>
                        <th>Kinerja Renstra</th>
                        <th>Keuangan Renstra</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arr as $row)
                        @php
                            $totalSasaranRows = 0;
                            // Menghitung total row untuk tujuan (jumlah sasaran dan indikator)
                            foreach ($row['sasaran'] as $sasaran) {
                                $totalSasaranRows += count($sasaran['indikator']);
                            }
                            // Menghitung rowCount untuk tujuan
                            $rowCount = $totalSasaranRows + count($row['sasaran']);
                        @endphp

                        <!-- Baris untuk tujuan -->
                        <tr>
                            <td rowspan="{{ $rowCount }}">{{ $no++ }}</td>
                            <td rowspan="{{ $rowCount }}">{{ $row['tujuan'] }}</td>

                            @foreach ($row['sasaran'] as $sasaran)
                                @php
                                    $sasaranRowCount = count($sasaran['indikator']); // Jumlah indikator untuk sasaran
                                @endphp

                                <!-- Baris untuk sasaran -->
                                <td rowspan="{{ $sasaranRowCount }}">{{ $sasaran['sasaran'] }}</td>

                                <!-- Loop untuk menampilkan indikator -->
                                @foreach ($sasaran['indikator'] as $item)
                        <tr>
                            <td>{{ $item['indikatorRenstra'] }}</td>
                            <td>{{ $item['kinerjaRenstra'] }}</td>
                            <td>{{ $item['keuanganRenstra'] }}</td>
                        </tr>
                    @endforeach
                    @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table> --}}


        </div>
    </div>
</x-app-layout>
