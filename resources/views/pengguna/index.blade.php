<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        {{-- <div class="flex gap-2">
            <div class="day" id="day">Loading day...</div>
            <div class="clock" id="clock">Loading time...</div>
        </div> --}}
        {{-- <div class="stats shadow w-full bg-red-700 text-white">
             <div class="stat">
                @if ($capaianPd >= 0.8)
                    <div class="stat-title text-white font-semibold">GRADE</div>
                    <div class="stat-value">A</div>
                @elseif($capaianPd <= 0.8 || $capaianPd >= 0.6)
                    <div class="stat-title text-white font-semibold">GRADE</div>
                    <div class="stat-value">B</div>
                @elseif($capaianPd < 0.6)
                    <div class="stat-title text-white font-semibold">GRADE</div>
                    <div class="stat-value">B</div>
                @endif
            </div>
        </div> --}}

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

        <div class="flex justify-center items-center mt-2 gap-2">
            <div class="stats shadow w-full">
                <div class="stat">
                    <div class="stat-title text-black font-semibold">REALISASI ANGGARAN</div>
                    @if ($result <= 0.1)
                        <div class="stat-value text-green-700">{{ $grade }}%</div>
                        <div class="stat-desc text-green-500">Efektif</div>
                    @elseif ($result > 0.1 && $result <= 0.3)
                        <div class="stat-value text-yellow-700">{{ $grade }}%</div>
                        <div class="stat-desc text-yellow-500">Non-Efektif</div>
                    @elseif ($result > 0.3)
                        <div class="stat-value text-red-700">{{ $grade }}%</div>
                        <div class="stat-desc text-red-500">Boros</div>
                    @endif
                </div>
            </div>

            <div class="stats shadow w-full">
                <div class="stat">
                    <div class="stat-title text-black font-semibold">REALISASI KINERJA</div>
                    <div class="stat-value">{{ $capaianPd }}%</div>
                    <div class="stat-desc">Realisasi Kinerja</div>
                </div>
            </div>
        </div>

        {{-- <div class="overflow-x-auto mt-3">
            <table class="table">
                <!-- head -->
                <thead class="text-black">
                    <tr>
                        <th>
                            No
                        </th>
                        <th>Name</th>
                        <th>Job</th>
                        <th>Favorite Color</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr>
                        <th>
                            <label>
                                <input type="checkbox" class="checkbox" />
                            </label>
                        </th>
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img src="https://img.daisyui.com/tailwind-css-component-profile-2@56w.png"
                                            alt="Avatar Tailwind CSS Component" />
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">Hart Hagerty</div>
                                    <div class="text-sm opacity-50">United States</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            Zemlak, Daniel and Leannon
                            <br />
                            <span class="badge badge-ghost badge-sm">Desktop Support Technician</span>
                        </td>
                        <td>Purple</td>
                        <th>
                            <button class="btn btn-ghost btn-xs">details</button>
                        </th>
                    </tr>
                    <!-- row 2 -->
                    <tr>
                        <th>
                            <label>
                                <input type="checkbox" class="checkbox" />
                            </label>
                        </th>
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img src="https://img.daisyui.com/tailwind-css-component-profile-3@56w.png"
                                            alt="Avatar Tailwind CSS Component" />
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">Brice Swyre</div>
                                    <div class="text-sm opacity-50">China</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            Carroll Group
                            <br />
                            <span class="badge badge-ghost badge-sm">Tax Accountant</span>
                        </td>
                        <td>Red</td>
                        <th>
                            <button class="btn btn-ghost btn-xs">details</button>
                        </th>
                    </tr>
                    <!-- row 3 -->
                    <tr>
                        <th>
                            <label>
                                <input type="checkbox" class="checkbox" />
                            </label>
                        </th>
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img src="https://img.daisyui.com/tailwind-css-component-profile-4@56w.png"
                                            alt="Avatar Tailwind CSS Component" />
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">Marjy Ferencz</div>
                                    <div class="text-sm opacity-50">Russia</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            Rowe-Schoen
                            <br />
                            <span class="badge badge-ghost badge-sm">Office Assistant I</span>
                        </td>
                        <td>Crimson</td>
                        <th>
                            <button class="btn btn-ghost btn-xs">details</button>
                        </th>
                    </tr>
                    <!-- row 4 -->
                    <tr>
                        <th>
                            <label>
                                <input type="checkbox" class="checkbox" />
                            </label>
                        </th>
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img src="https://img.daisyui.com/tailwind-css-component-profile-5@56w.png"
                                            alt="Avatar Tailwind CSS Component" />
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">Yancy Tear</div>
                                    <div class="text-sm opacity-50">Brazil</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            Wyman-Ledner
                            <br />
                            <span class="badge badge-ghost badge-sm">Community Outreach Specialist</span>
                        </td>
                        <td>Indigo</td>
                        <th>
                            <button class="btn btn-ghost btn-xs">details</button>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div> --}}
        <script>
            // Fungsi untuk mendapatkan nama hari
            function getDayName(dayIndex) {
                const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                return days[dayIndex];
            }

            // Fungsi untuk memperbarui hari dan jam
            function updateClockAndDay() {
                const now = new Date();

                // Mendapatkan nama hari
                const dayName = getDayName(now.getDay());
                document.getElementById('day').textContent = dayName;

                // Mendapatkan waktu
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
            }

            // Memperbarui hari dan jam setiap detik
            setInterval(updateClockAndDay, 1000);

            // Panggil pertama kali untuk langsung menampilkan hari dan jam saat halaman dimuat
            updateClockAndDay();
        </script>
        <script>
            function updateTime() {
                const now = new Date();
                const options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                };
                const formattedTime = now.toLocaleDateString('id-ID', options);
                document.getElementById('currentTime').innerText = formattedTime;
            }

            setInterval(updateTime, 1000); // Update every second
            updateTime(); // Initialize immediately
        </script>
</x-app-layout>
