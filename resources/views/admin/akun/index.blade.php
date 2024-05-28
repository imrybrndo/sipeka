<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Daftar Pengguna') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="flex justify-between items-end mb-3">
            <div>
                <!-- You can open the modal using ID.showModal() method -->
                <button class="btn btn-neutral" onclick="my_modal_4.showModal()">Buat Akun</button>
                <dialog id="my_modal_4" class="modal">
                    <div class="modal-box w-11/12 max-w-5xl">
                        <h3 class="font-bold text-lg">Buat Akun Baru</h3>
                        <p class="opacity-50">Silahkan masukan form dibawah ini sesuai dengan data pengguna!</p>
                        <form action="{{ route('akun.store') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-group mb-2">
                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text">Nama Perangkat Daerah</span>
                                    </div>
                                    <input name="name" type="text" class="input input-bordered w-full" />
                                </label>
                            </div>

                            <div class="form-group mb-2">
                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text">Email</span>
                                    </div>
                                    <input name="email" type="email" class="input input-bordered w-full" />
                                </label>
                            </div>

                            <div class="form-group mb-2">
                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text">Nama Pengguna</span>
                                    </div>
                                    <input name="username" type="text" class="input input-bordered w-full" />
                                </label>
                            </div>


                            {{-- Kata Sandi --}}
                            <div class="form-group mb-3">
                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text">Kata Sandi</span>
                                    </div>
                                    <input type="password" id="password" name="password" required
                                        autocomplete="new-password" class="input input-bordered w-full" />
                                </label>
                            </div>

                            {{-- Konfirmasi Kata Sandi --}}
                            <div class="form-group mb-3">
                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text">Konfirmasi Kata Sandi</span>
                                    </div>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        required autocomplete="new-password" class="input input-bordered w-full" />
                                </label>
                            </div>

                            <div class="flex justify-start items-start gap-2">
                                <button class="btn btn-neutral mt-6">Simpan</button>
                            </div>

                        </form>
                    </div>
                </dialog>
            </div>
            <div>
                <form action="{{ route('akun.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Cari..." class="input input-bordered"
                        value="{{ request()->query('search') }}">
                    <button type="submit" class="btn btn-neutral">Cari</button>
                </form>
            </div>
        </div>
        <div>
            <div class="overflow-x-auto">
                <table class="table mt-3">
                    <!-- head -->
                    <thead class="bg-red-700 text-white">
                        <tr>
                            <th>
                                No
                            </th>
                            <th>Perangkat Dinas</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
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
                                <div class="flex items-center gap-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                            <img src="{{ asset('assets/user.png') }}"
                                                alt="Avatar Tailwind CSS Component" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold">{{$item->name}}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{$item->username}}</td>
                            <td>
                                {{$item->email}}
                            </td>
                            <th>
                                <div class="flex justify-center items-center gap-2">
                                    <button class="btn btn-xs"
                                        onclick="my_modal_5{{$item->id}}.showModal()">edit</button>
                                    <dialog id="my_modal_5{{$item->id}}" class="modal">
                                        <div class="modal-box w-11/12 max-w-5xl">
                                            <h3 class="font-bold text-lg">Buat Akun Baru</h3>
                                            <p class="opacity-50">Silahkan masukan form dibawah ini sesuai dengan data
                                                pengguna!</p>
                                            <form action="{{ route('akun.update', $item->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group mb-2">
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Nama Perangkat Daerah</span>
                                                        </div>
                                                        <input name="name" type="text"
                                                            value="{{old('name', $item->name)}}"
                                                            class="input input-bordered w-full" />
                                                    </label>
                                                </div>

                                                <div class="form-group mb-2">
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Email</span>
                                                        </div>
                                                        <input name="email" type="email"
                                                            value="{{old('email', $item->email)}}"
                                                            class="input input-bordered w-full" />
                                                    </label>
                                                </div>

                                                <div class="form-group mb-2">
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Nama Pengguna</span>
                                                        </div>
                                                        <input name="username" type="text"
                                                            value="{{old('username', $item->username)}}"
                                                            class="input input-bordered w-full" />
                                                    </label>
                                                </div>


                                                {{-- Kata Sandi --}}
                                                <div class="form-group mb-3">
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Kata Sandi</span>
                                                        </div>
                                                        <input type="password" id="password" name="password" required
                                                            autocomplete="new-password"
                                                            class="input input-bordered w-full" />
                                                    </label>
                                                </div>

                                                {{-- Konfirmasi Kata Sandi --}}
                                                <div class="form-group mb-3">
                                                    <label class="form-control w-full">
                                                        <div class="label">
                                                            <span class="label-text">Konfirmasi Kata Sandi</span>
                                                        </div>
                                                        <input type="password" id="password_confirmation"
                                                            name="password_confirmation" required
                                                            autocomplete="new-password"
                                                            class="input input-bordered w-full" />
                                                    </label>
                                                </div>

                                                <div class="flex justify-start items-start gap-2">
                                                    <button class="btn btn-neutral mt-6">Simpan</button>
                                                </div>

                                            </form>
                                        </div>
                                    </dialog>
                                    <form action="{{route('akun.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-neutral btn-xs">hapus</button>
                                    </form>
                                </div>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-2">
                {{$data->appends(request()->input())->links()}}
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</x-app-layout>