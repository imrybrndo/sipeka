<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Program') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div>
            <a href="{{route('program.create')}}" class="btn btn-neutral">Tambah Program</a>
        </div>
        <div class="overflow-x-auto">
            <table class="table mt-3">
                <!-- head -->
                <thead class="bg-red-700 text-white">
                    <tr>
                        <th>
                            No
                        </th>
                        <th>Nama Program</th>
                        <th>Target Anggaran</th>
                        <th>Anggaran</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <th>
                            {{$no++}}
                        </th>
                        <td>
                            <div>
                                <div class="font-bold">{{$item->namaProgram}}</div>
                            </div>
                        </td>
                        <td>{{$item->targetAnggaran}}</td>
                        <td>
                            {{$item->anggaran}}
                        </td>
                        <th>
                            <div class="flex justify-center items-center gap-2">
                                <button class="btn btn-xs" onclick="my_modal_5{{$item->id}}.showModal()">edit</button>
                                <dialog id="my_modal_5{{$item->id}}" class="modal">
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
                                                        value="{{old('namaProgram', $item->namaProgram)}}"
                                                        class="input input-bordered w-full" />
                                                </label>
                                            </div>

                                            <label class="form-control w-full">
                                                <div class="label">
                                                    <span class="label-text">Target Anggaran</span>
                                                </div>
                                                <input type="text" value="{{old('targetAnggaran', $item->targetAnggaran)}}" id="idrInput" name="targetAnggaran"
                                                    class="input input-bordered w-full" placeholder="Rp" />
                                            </label>

                                            <label class="form-control w-full">
                                                <div class="label">
                                                    <span class="label-text">Anggaran</span>
                                                </div>
                                                <input type="text" value="{{old('anggaran', $item->anggaran)}}" id="idrInput" name="anggaran"
                                                    class="input input-bordered w-full" placeholder="Rp" />
                                            </label>

                                            <div class="flex justify-start items-start gap-2">
                                                <button class="btn btn-neutral mt-6">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </dialog>
                                <!-- Open the modal using ID.showModal() method -->
                                <button class="btn btn-neutral btn-xs"
                                    onclick="my_modal_6{{$item->id}}.showModal()">hapus</button>
                                <dialog id="my_modal_6{{$item->id}}" class="modal modal-bottom sm:modal-middle">
                                    <div class="modal-box">
                                        <h3 class="font-bold text-lg">Perhatian!</h3>
                                        <p class="py-4">Apakah anda yakin ingin menghapus
                                            "{{$item->namaProgram}}"?</p>
                                        <div class="modal-action">
                                            <div class="flex gap-1">
                                                <form action="{{route('program.destroy', $item->id)}}" method="post">
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
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {{$data->appends(request()->input())->links()}}
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script>
        document.querySelectorAll('input[id="idrInput"]').forEach(input => {
            input.addEventListener('input', function (e) {
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