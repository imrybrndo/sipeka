<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Beranda') }}
            </h2>
        </div>
    </x-slot>

    {{-- <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">

        <div class="flex justify-center gap-2">
            <div class="stats bg-neutral text-primary-content">
                <div class="stat">
                    <div class="stat-title text-white">SKPD YANG BELUM MEMASUKKAN</div>
                    <div class="stat-value">$89,400</div>
                    <div class="stat-actions">
                        <button class="btn btn-sm btn-success">Add funds</button>
                    </div>
                </div>
            </div>

            <div class="stats bg-primary text-primary-content">
                <div class="stat">
                    <div class="stat-title">Account balance</div>
                    <div class="stat-value">$89,400</div>
                    <div class="stat-actions">
                        <button class="btn btn-sm btn-neutral">Add funds</button>
                    </div>
                </div>

                <div class="stat">
                    <div class="stat-title">Current balance</div>
                    <div class="stat-value">$89,400</div>
                    <div class="stat-actions">
                        <button class="btn btn-sm">Withdrawal</button>
                        <button class="btn btn-sm">Deposit</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="p-6 overflow-hidden mt-2 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="card bg-base-100 image-full w-full h-52 shadow-xl">
            <figure>
                <img src="{{ asset('public/assets/nature.jpg') }}" class="w-full" alt="Shoes" />
            </figure>
            <div class="card-body">
                <h2 class="card-title text-4xl">Selamat Datang, {{ Auth::user()->name }}!</h2>
                <p></p>
                <div class="card-actions justify-end">
                    <div class="time" id="currentTime"></div>
                </div>
            </div>
        </div>
        {{-- <p class="font-semibold">Realisasi SKPD</p>
        <div class="mt-4">
            <div class="overflow-x-auto shadow-md">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama SKPD</th>
                            <th>Realisasi Anggaran</th>
                            <th>Realisasi Kinerja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <!-- row 1 -->
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $item->name }}</td>
                                <td>

                                    <?php
                                    if($item->capaianPd == NULL){ ?>
                                    <p class="text-red">Belum Ada Realisasi Anggaran</p>
                                    <?php } else { ?>
                                    {{ $item->gradePd }}%
                                    <?php } ?>

                                </td>
                                <td>
                                    <?php
                                    if($item->capaianPd == NULL){ ?>
                                    <p class="text-red">Belum Ada Realisasi Kinerja</p>
                                    <?php } else { ?>
                                    {{ $item->capaianPd }}%
                                    <?php } ?>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-2">
                {{ $data->links() }}
            </div>
        </div> --}}
    </div>
    <script>
        function updateTime() {
            const now = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            };
            const formattedTime = now.toLocaleDateString('id-ID', options);
            document.getElementById('currentTime').innerText = formattedTime;
        }

        setInterval(updateTime, 1000); // Update every second
        updateTime(); // Initialize immediately
    </script>
</x-app-layout>
