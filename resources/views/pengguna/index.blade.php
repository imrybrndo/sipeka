<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="stats shadow w-full bg-red-700 text-white">
            <div class="stat">
                <div class="stat-title text-white font-semibold">PEGAWAI</div>
                <div class="stat-value">89,400</div>
                <div class="stat-desc text-white">Jumlah Pegawai</div>
            </div>
        </div>

        <div class="flex justify-center items-center mt-2 gap-2">
            <div class="stats shadow w-full">
                <div class="stat">
                    <div class="stat-title font-semibold">REALISASI ANGGARAN</div>
                    <div class="stat-value">89,400</div>
                    <div class="stat-desc ">Jumlah Pegawai</div>
                </div>
            </div>

            <div class="stats shadow w-full">
                <div class="stat">
                    <div class="stat-title font-semibold">PERJANJIAN KINERJA</div>
                    <div class="stat-value">89,400</div>
                    <div class="stat-desc">Jumlah Perjanjian Kinerja</div>
                </div>
            </div>
        </div>
</x-app-layout>