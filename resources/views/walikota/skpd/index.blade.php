<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Daftar SKPD') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mb-4">
        <form action="{{ route('data-skpd.index') }}" method="get">
            @csrf
            <div class="flex justify-end gap-2 mb-2">
                <div>
                    <label class="form-control w-full">
                        <input type="text" name="search" value="" placeholder="Cari"
                            class="input input-bordered w-full max-w-xs" />
                    </label>
                </div>
                <div>
                    <button type="submit" class="btn btn-neutral">Cari</button>
                </div>
            </div>
        </form>
        <div class="overflow-x-auto shadow-md rounded-md">
            <table class="table">
                <!-- head -->
                <thead class="bg-neutral text-white">
                    <tr>
                        <th>No</th>
                        <th>Nama SKPD</th>
                        <th class="text-center">Perjanjian Kinerja</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if ($item->perjanjian_kinerja == 0)
                                    <div class="flex justify-center items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18 18 6M6 6l12 12" color="red" />
                                        </svg>
                                    </div>
                                @elseif($item->perjanjian_kinerja == null)
                                    <div class="flex justify-center items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18 18 6M6 6l12 12" color="red" />
                                        </svg>
                                    </div>
                                @elseif ($item->perjanjian_kinerja == 1)
                                    <div class="flex justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m4.5 12.75 6 6 9-13.5" color="green" />
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-center">
                                    <a href="{{ route('detail-skpd.show', $item->id) }}"
                                        class="btn bg-red-700 hover:bg-red-700 text-white">Lihat</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $data->links() }}
        </div>
    </div>
</x-app-layout>
