<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Realisasai Kinerja') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="flex justify-end items-end">
            <form action="{{ route('surat.index') }}" method="GET">
                <input type="text" name="search" placeholder="Cari..." class="input input-bordered"
                    value="{{ request()->query('search') }}">
                <button type="submit" class="btn btn-neutral">Cari</button>
            </form>
        </div>
        <div>
            <table class="table mt-4">
                <!-- head -->
                <thead class="bg-red-700 text-white">
                    <tr>
                        <th>
                            No
                        </th>
                        <th>Perjanjian</th>
                        <th>Bulan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </td>
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                            <img src="{{ asset('assets/user.png') }}"
                                                alt="Avatar Tailwind CSS Component" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold">{{ $item->pihakPertama }}</div>
                                        <div class="text-sm opacity-50">{{ $item->jabatanPihakPertama }}</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                            <img src="{{ asset('assets/user.png') }}"
                                                alt="Avatar Tailwind CSS Component" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold">{{ $item->pihakKedua }}</div>
                                        <div class="text-sm opacity-50">{{ $item->jabatanPihakKedua }}</div>
                                    </div>
                                </div>
                            <td>
                                {{ \Carbon\Carbon::parse(new DateTime())->translatedFormat('F Y') }}
                            </td>
                            <td>
                                <div class="flex gap-1 justify-center items-center">
                                    <a href="{{ route('realisasi_kegiatan.edit', $item->id) }}"
                                        class="btn btn-neutral">detail</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {{ $data->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
