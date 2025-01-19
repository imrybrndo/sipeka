<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Detail Realisasi') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="overflow-x-auto">
            <p class="font-semibold mb-2">Detail Program</p>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Nama Program</td>
                        <td>:</td>
                        <td>{{ $dataProgram->namaProgram }}</td>
                    </tr>
                    <tr>
                        <td>Target Anggaran</td>
                        <td>:</td>
                        <td>@currency($dataProgram->anggaran)</td>
                    </tr>
                    <tr>
                        <td>Realisasi Anggaran</td>
                        <td>:</td>
                        <td>{{ $dataRealisasi->nilai }}%</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="overflow-x-auto">
            <p class="font-semibold mb-2">Realisasi Anggaran</p>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Triwulan I</td>
                        <td>:</td>
                        <td>@currency($dataRealisasi->triwulan1)</td>
                    </tr>
                    <tr>
                        <td>Triwulan II</td>
                        <td>:</td>
                        <td>@currency($dataRealisasi->triwulan2)</td>
                    </tr>
                    <tr>
                        <td>Triwulan III</td>
                        <td>:</td>
                        <td>@currency($dataRealisasi->triwulan3)</td>
                    </tr>
                    <tr>
                        <td>Triwulan IV</td>
                        <td>:</td>
                        <td>@currency($dataRealisasi->triwulan4)</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>:</td>
                        <td>@currency($dataRealisasi->anggaran)</td>
                    </tr>
                </tbody>
            </table>
        </div>


        <!-- You can open the modal using ID.showModal() method -->
        <button class="btn btn-block btn-neutral mt-4"
            onclick="my_modal_4{{ $dataRealisasi->id }}.showModal()">Ubah Data</button>
        <dialog id="my_modal_4{{ $dataRealisasi->id }}" class="modal">
            <div class="modal-box w-11/12 max-w-5xl">
                <h3 class="text-lg font-bold">Ubah data realisasi anggaran!</h3>
                <form action="{{ route('detail-realisasi.update', $dataRealisasi->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="idProgram" value="{{ $dataProgram->id }}">
                    <input type="hidden" name="namaProgram" value="{{ $dataProgram->namaProgram }}">

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Triwulan I</span>
                        </div>
                        <input type="number" placeholder="Type here" class="input input-bordered w-full"
                            name="triwulan1" value="{{ old('triwulan1', $dataRealisasi->triwulan1) }}" />
                    </label>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Triwulan II</span>
                        </div>
                        <input type="number" placeholder="Type here" class="input input-bordered w-full"
                            name="triwulan2" value="{{ old('triwulan2', $dataRealisasi->triwulan2) }}" />
                    </label>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Triwulan III</span>
                        </div>
                        <input type="number" placeholder="Type here" class="input input-bordered w-full"
                            name="triwulan3" value="{{ old('triwulan3', $dataRealisasi->triwulan3) }}" />
                    </label>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Triwulan IV</span>
                        </div>
                        <input type="number" placeholder="Type here" class="input input-bordered w-full"
                            name="triwulan4" value="{{ old('triwulan4', $dataRealisasi->triwulan4) }}" />
                    </label>
                    <button class="btn btn-block btn-neutral mt-3">Simpan</button>
                    <a href="" class="btn btn-block mt-1">Tutup</a>
                </form>
            </div>
        </dialog>

        <a href="{{ route('program.index') }}" class="btn btn-block mt-2">Kembali</a>

    </div>
</x-app-layout>
