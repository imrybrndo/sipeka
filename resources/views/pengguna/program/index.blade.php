<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Program') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="flex justify-between gap-2">
            <div class="flex gap-2">
                <a href="{{ route('program.create') }}" class="btn btn-neutral">Tambah Program</a>
                <form action="{{ route('realisasi-rekap.store') }}" method="post">
                    @csrf
                    <button class="btn">Hitung Realisasi</button>
                </form>
            </div>
            @if ($result <= 0.1)
                <span class="badge badge-success text-white mr-4 mt-5">Realisasi : {{ $grade }}%</span>
            @elseif ($result > 0.1 && $result <= 0.3)
                <span class="badge badge-warning text-white mr-4 mt-5">Realisasi : {{ $grade }}%</span>
            @elseif ($result > 0.3)
                <span class="badge bg-red-700 text-white mr-4 mt-5">Realisasi : {{ $grade }}%</span>
            @endif

        </div>
        <div class="overflow-x-auto">
            <table class="table mt-3 shadow-sm">
                <!-- head -->
                <thead class="rounded-md">
                    <tr>
                        <th>
                            No
                        </th>
                        <th>Nama Program</th>
                        <th>Triwulan I</th>
                        <th>Triwulan II</th>
                        <th>Triwulan III</th>
                        <th>Triwulan IV</th>
                        <th>Target Anggaran</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th>
                                {{ $no++ }}
                            </th>
                            <td>
                                <div>
                                    <div class="font-bold">{{ $item->namaProgram }}</div>
                                </div>
                            </td>
                            <td>@currency($item->triwulan1)</td>
                            <td>@currency($item->triwulan2)</td>
                            <td>@currency($item->triwulan3)</td>
                            <td>@currency($item->triwulan4)</td>
                            <td>@currency($item->targetAnggaran)</td>
                            <th>
                                <div class="grid gap-1">
                                    <button class="btn"
                                        onclick="my_modal_5{{ $item->id }}.showModal()">Edit</button>
                                    <dialog id="my_modal_5{{ $item->id }}" class="modal">
                                        <div class="modal-box w-11/12 max-w-5xl">
                                            <h3 class="font-bold text-lg">Edit Program</h3>
                                            <p class="opacity-50">Silahkan masukan form dibawah ini sesuai dengan data
                                                program!</p>
                                            <form action="{{ route('program.update', $item->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group mb-2">
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Nama Program</span>
                                                        </div>
                                                        <input name="namaProgram" type="text"
                                                            value="{{ old('namaProgram', $item->namaProgram) }}"
                                                            class="input input-bordered w-full" />
                                                    </label>
                                                </div>

                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">TRIWULAN I</span>
                                                    </div>
                                                    <input type="text"
                                                        value="{{ old('triwulan1', $item->triwulan1) }}"
                                                        name="triwulan1" class="input input-bordered w-full"
                                                        placeholder="Rp" />
                                                </label>

                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">TRIWULAN II</span>
                                                    </div>
                                                    <input type="text"
                                                        value="{{ old('triwulan2', $item->triwulan2) }}"
                                                        name="triwulan2" class="input input-bordered w-full"
                                                        placeholder="Rp" />
                                                </label>

                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">TRIWULAN III</span>
                                                    </div>
                                                    <input type="text"
                                                        value="{{ old('triwulan3', $item->triwulan3) }}"
                                                        name="triwulan3" class="input input-bordered w-full"
                                                        placeholder="Rp" />
                                                </label>

                                                <label class="form-control w-full">
                                                    <div class="label">
                                                        <span class="label-text">TRIWULAN IV</span>
                                                    </div>
                                                    <input type="text"
                                                        value="{{ old('triwulan4', $item->triwulan4) }}"
                                                        name="triwulan4" class="input input-bordered w-full"
                                                        placeholder="Rp" />
                                                </label>

                                                <div class="flex justify-start items-start gap-2">
                                                    <button class="btn btn-block btn-neutral mt-6">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </dialog>
                                    <!-- Open the modal using ID.showModal() method -->
                                    <button class="btn btn-neutral"
                                        onclick="my_modal_6{{ $item->id }}.showModal()">Hapus</button>
                                    <dialog id="my_modal_6{{ $item->id }}"
                                        class="modal modal-bottom sm:modal-middle">
                                        <div class="modal-box">
                                            <h3 class="font-bold text-lg">Perhatian!</h3>
                                            <p class="py-4">Apakah anda yakin ingin menghapus
                                                "{{ $item->namaProgram }}"?</p>
                                            <div class="modal-action">
                                                <div class="flex gap-1">
                                                    <form action="{{ route('program.destroy', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="idProgram"
                                                            value="{{ $item->id }}">
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

                                    @if ($item->status == null)
                                        <button class="btn btn-success text-white"
                                            onclick="my_modal_4{{ $item->id }}.showModal()">Realisasi</button>
                                        <dialog id="my_modal_4{{ $item->id }}" class="modal">
                                            <div class="modal-box w-11/12 max-w-5xl">
                                                <h3 class="text-lg font-bold">Realisasi Program</h3>
                                                <form action="{{ route('realisasi-program.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="idProgram"
                                                        value="{{ old('idProgram', $item->id) }}">
                                                    <input type="hidden" name="realisasiFisik"
                                                        value="{{ old('realisasiFisik', $item->id) }}">

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Triwulan I</span>
                                                        </div>
                                                        <input type="number" name="triwulan1"
                                                            placeholder="Type here"
                                                            class="input input-bordered w-full" />
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Triwulan II</span>
                                                        </div>
                                                        <input type="number" name="triwulan2"
                                                            placeholder="Type here"
                                                            class="input input-bordered w-full" />
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Triwulan III</span>
                                                        </div>
                                                        <input type="number" name="triwulan3"
                                                            placeholder="Type here"
                                                            class="input input-bordered w-full" />
                                                    </label>

                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Triwulan IV</span>
                                                        </div>
                                                        <input type="number" name="triwulan4"
                                                            placeholder="Type here"
                                                            class="input input-bordered w-full" />
                                                    </label>

                                                    <button class="btn btn-block btn-neutral mt-3 mb-2">Simpan</button>
                                                    <a href="" class="btn btn-block">Batal</a>
                                                </form>
                                            </div>
                                        </dialog>
                                    @endif

                                    <a href="{{ route('detail-realisasi.show', $item->id) }}"
                                        class="btn bg-red-700 hover:bg-red-800 text-white">Lihat</a>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {{ $data->appends(request()->input())->links() }}
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
    <script>
        document.querySelectorAll('input[id="idrInput"]').forEach(input => {
            input.addEventListener('input', function(e) {
                let value = e.target.value;
                value = value.replace(/\D/g, '');
                value = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(value);
                value = value.replace(/^Rp\s?|(,00)/g, '');
                e.target.value = `Rp ${value}`;
            });
        });
    </script>
</x-app-layout>
