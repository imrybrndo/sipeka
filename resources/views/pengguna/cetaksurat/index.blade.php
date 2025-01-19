<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Perjanjian Kinerja</title>
    <!-- add icon link -->
    <link rel="icon" href="{{asset('assets/logo.png')}}" type="image/x-icon" />
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <style>
        .special-table {
            border-collapse: separate;
            border-spacing: 0;
            background-color: white;
            border: 2px solid white;
        }

        .special-table td,
        .special-table th {
            border: 1px solid white;
        }

        .special-table tr:nth-child(even) {
            background-color: none;
        }

        /*  */

        .pk-table {
            border-collapse: separate;
            border-spacing: 0;
            background-color: white;
            border: 2px solid black;
        }

        .pk-table td,
        .pk-table th {
            border: 1px solid black;
        }

        .pk-table tr:nth-child(even) {
            background-color: none;
        }

        .line {
        transform-origin: 0 100%;
        }

        .black {
        border-top:3px solid #000;
        }

    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="print">
        <section>
            <div class="flex justify-center gap-10 items-center">
                <div>
                    <img src="{{asset('assets/logo.png')}}" class="h-20" alt="">
                </div>
                <div class="text-center">
                    <p class="text-2xl">PEMERINTAH KOTA MANADO</p>
                    <p class="font-semibold text-3xl"><?php echo strtoupper ($user->name) ?></p>
                    <small>{{$user->alamat}}</small>
                </div>
            </div>
            <div class="container mx-auto">
                <div class="line black"></div>
            </div>
        </section>
        <section>
            <div>
                <p class="text-center mt-10 text-2xl font-semibold underline">PERJANJIAN KINERJA TAHUN 2025</p>
            </div>
            <div>
                <p class="mt-6 text-justify">Dalam rangka mewujudkan manajemen pemerintahan yang efektif, transparan dan
                    akuntabel serta
                    berorientasi
                    pada hasil, kami yang bertandatangan dibawah ini:</p>
            </div>
            <div class="mt-4">
                <table class="special-table" width="100%">
                    <tbody>
                        <tr>
                            <td>NAMA</td>
                            <td>:</td>
                            <td>{{$data->pihakPertama}}</td>
                        </tr>
                        <tr>
                            <td>JABATAN</td>
                            <td>:</td>
                            <td>{{{$data->jabatanPihakPertama}}}</td>
                        </tr>
                    </tbody>
                </table>
                <p class="mt-2">selanjutnya disebut <span class="font-semibold">PIHAK PERTAMA.</span></p>
                <table class="special-table mt-4" width="100%">
                    <tbody>
                        <tr>
                            <td>NAMA</td>
                            <td>:</td>
                            <td>{{$data->pihakKedua}}</td>
                        </tr>
                        <tr>
                            <td>JABATAN</td>
                            <td>:</td>
                            <td>{{$data->jabatanPihakKedua}}</td>
                        </tr>
                    </tbody>
                </table>
                <p class="mt-3 text-justify">selaku atasan Pihak Pertama, selanjutnya disebut <span
                        class="font-semibold">PIHAK
                        KEDUA</span></p>
                <p class="mt-3 text-justify">Pihak Pertama berjanji akan mewujudkan target kinerja yang seharusnya
                    sesuai
                    lampiran
                    perjanjian ini, dalam rangka mencapai target kinerja jangka menengah seperti yang telah di tetapkan
                    dalam dokumen perencanaan.</p>
                <p class="mt-3 text-justify">Keberhasilan dan kegagalan pencapaian targetr kinerja tersebut menjadi
                    tanggungjawab Pihak
                    Pertama.</p>
                <p class="mt-3 text-justify">Pihak Kedua akan memberikan supervisi yang diperlukan serta akan melakukan
                    evaluasi terhadap
                    capaian kinerja dari perjanjian ini dan mengambil tindakan yang diperlukan dalam rangka pemberian
                    penghargaan dan sanksi.</p>
            </div>
        </section>
        <section>
            <div class="mt-6">
                <div class="flex justify-center items-center gap-32">
                    <div class="text-center">
                        <p>Pihak Kedua,</p>
                        <p class="font-semibold mt-20">{{$data->pihakKedua}}</p>
                    </div>
                    <div class="text-center">
                        {{-- <p>Manado, {{ \Carbon\Carbon::parse(new DateTime())->translatedFormat('F Y') }}</p> --}}
                        <p>Manado, 2025</p>
                        <p class="mb-14">Pihak Pertama,</p>
                        <p class="font-semibold">{{$data->pihakPertama}}</p>
                    </div>
                </div>
            </div>
        </section>
        <br><br>
        <section>
            <div class="mt-32">
                <p class="text-center font-bold text-2xl">PERJANJIAN KINERJA TAHUN 2025 <?php echo strtoupper ($user->name) ?> MANADO
                </p>
            </div>
            <div class="mt-3">
                <table class="pk-table" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Sasaran Strategis</th>
                            <th>Indikator Kinerja</th>
                            <th>Satuan</th>
                            <th>Target</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($arr as $row)
                        <?php
                        $a = count($row['indikator']);
                        $b = $a + 1;
                        ?>
                        <tr>
                            <td class="text-center" rowspan="<?php echo $b ?>">{{$no++}}</td>
                            <td rowspan="<?php echo $b ?>">
                                <?php echo $row['sasaranStrategis'] ?>
                            </td>
                        </tr>
                        @foreach ($row['indikator'] as $item)
                        <tr>
                            <td class="text-center">
                                <?php echo $item['indikatorKinerja'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $item['satuan'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $item['target'] ?>
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <table class="pk-table" width="100%">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>PROGRAM</th>
                            <th>JUMLAH ANGGARAN PROGRAM (RP)</th>
                            <th>KET</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($program as $itemProgram)
                        <tr>
                            <td class="text-center"><?php echo $no++ ?></td>
                            <td>{{$itemProgram->namaProgram}}</td>
                            <td class="text-center">@currency($itemProgram->anggaran)</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <section>
            <div class="mt-32">
                <div class="flex justify-center items-center gap-32">
                    <div class="text-center">
                        <p>Pihak Kedua,</p>
                        <p class="font-semibold mt-20">{{$data->pihakKedua}}</p>
                    </div>
                    <div class="text-center">
                        <p>Manado, 6 Januari 2025</p>
                        {{-- <p>Manado, {{ \Carbon\Carbon::parse(new DateTime())->translatedFormat('F Y') }}</p> --}}
                        <p class="mb-14">Pihak Pertama,</p>
                        <p class="font-semibold">{{$data->pihakPertama}}</p>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- Skrip JavaScript untuk mencetak otomatis -->
    <script>
        window.onload = function() {
            // Perintah print akan dijalankan secara otomatis saat halaman dimuat
            window.print();
        };
    </script>
</body>

</html>