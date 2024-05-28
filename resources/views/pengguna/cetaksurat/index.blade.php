<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'K UI') }}</title>
    <!-- add icon link -->
    <link rel="icon" href="{{asset('assets/logo.png')}}" type="image/x-icon" />
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- Styles -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 3px solid black
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <section>
        <div class="flex justify-center gap-10 items-center">
            <div>
                <img src="{{asset('assets/logo.png')}}" class="h-20" alt="">
            </div>
            <div class="text-center">
                <p class="text-2xl">PEMERINTAH KOTA MANADO</p>
                <p class="font-semibold text-3xl">SEKRETARIAT DAERAH KOTA MANADO</p>
                <small>Jalan Balai Kota Nomor 1 Telp.No. 62-0431-863203 Fax 62-0431-861611</small>
            </div>
        </div>
        <div class="container mx-auto">
            <hr style="height: 5px; background-color: black; border: none;">
        </div>
    </section>
    <section>
        <div>
            <p class="text-center mt-10 text-2xl font-semibold underline">PERJANJIAN KINERJA TAHUN 2024</p>
        </div>
        <div>
            <p class="mt-6 text-justify">Dalam rangka mewujudkan manajemen pemerintahan yang efektif, transparan dan
                akuntabel serta
                berorientasi
                pada hasil, kami yang bertandatangan dibawah ini:</p>
        </div>
        <div class="mt-4">
            <table>
                <tbody>
                    <tr>
                        <td>NAMA</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>JABATAN</td>
                        <td>:</td>
                        <td>SEKRETARIS DAERAH KOTA MANADO</td>
                    </tr>
                </tbody>
            </table>
            <p class="mt-2">selanjutnya disebut <span class="font-semibold">PIHAK PERTAMA.</span></p>
            <table class="mt-4">
                <tbody>
                    <tr>
                        <td>NAMA</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>JABATAN</td>
                        <td>:</td>
                        <td>WALIKOTA MANADO</td>
                    </tr>
                </tbody>
            </table>
            <p class="mt-3 text-justify">selaku atasan Pihak Pertama, selanjutnya disebut <span
                    class="font-semibold">PIHAK
                    KEDUA</span></p>
            <p class="mt-3 text-justify">Pihak Pertama berjanji akan mewujudkan target kinerja yang seharusnya sesuai
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
                    <p class="font-semibold mt-20">ANDREI ANGOUW</p>
                </div>
                <div class="text-center">
                    <p>Manado, Februari 2022</p>
                    <p class="mb-14">Pihak Pertama,</p>
                    <p class="font-semibold">MICLER C.S LAKAT,SH,MH</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="mt-32">
            <p class="text-center font-bold text-2xl">PERJANJIAN KINERJA TAHUN 2024 SEKRETARIS DAERAH KOTA MANADO</p>
        </div>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>Tujuan</th>
                        <th>Sasaran Strategis</th>
                        <th>Indikator Strategis</th>
                        <th>Satuan</th>
                        <th>Target</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            @foreach ($surat as $surat)
                            <?php echo $surat['tujuan'] ?>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($surat->sasaran as $item)
                            <?php echo $item['sasaranStrategis'] ?>
                            <hr> <br>
                            @endforeach
                        </td>
                        <td>
                            <?php echo $item->indikator['indikatorKinerja'] ?>
                        </td>
                        <td><?php echo $item->indikator['satuan'] ?></td>
                        <td><?php echo $item->indikator['target'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br><br>
    </section>
</body>

</html>