<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Detail SKPD') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <tbody>
                    <tr>
                        <th>Nama SKPD</th>
                        <td>:</td>
                        <td class="font-semibold">{{ $dataUser->name }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>
                            @if ($dataUser->alamat == null)
                                <span class="badge badge-error text-white">SKPD Belum update data</span>
                            @else
                                {{ $dataUser->alamat }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Perjanjian Kinerja</td>
                        <td>:</td>
                        <td>
                            @if ($dataUser->perjanjian_kinerja == 1)
                                <a href="https://sipekav2.sipeka-organisasi-mdo.net/public/storage/pdf/{{ $dataSurat->nama_file }}"
                                    target="__BLANK" class="btn btn-success text-white">Unduh</a>
                                <button id="previewButton" class="btn">Lihat</button>
                            @elseif($dataUser->perjanjian_kinerja == 0)
                                <span class="badge badge-error text-white">belum upload</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Pohon Kinerja</td>
                        <td>:</td>
                        <td>
                            <button class="btn">Lihat</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="previewContent"
        class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-2 h-[700px]"
        style="display: none;">
        @if ($dataUser->perjanjian_kinerja == 1)
            <div id="adobe-dc"></div>
        @elseif($dataUser->perjanjian_kinerja == 0)
            <div class="bg-gray-100 py-40 rounded-md">
                <div class="flex justify-center items-center">
                    <img src="{{ asset('assets/forbidden.png') }}" class="h-60" alt="" srcset="">
                </div>
                <p class="text-center mt-3 opacity-50 text-3xl">Belum ada perjanjian kinerja!</p>
            </div>
        @endif
    </div>


    <div class="p-6 overflow-hidden bg-white rounded-md mt-2 shadow-md dark:bg-dark-eval-1">
        <p class="font-semibold">Realisasi Kinerja</p>
        <div>
            <table class="table mt-4">
                <!-- head -->
                <thead>
                    <tr>
                        <th>
                            No
                        </th>
                        <th>Perjanjian</th>
                        <th>Tahun</th>
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
                                2025
                                {{-- {{ \Carbon\Carbon::parse(new DateTime())->translatedFormat('F Y') }} --}}
                            </td>
                            <td>
                                {{-- <div class="flex gap-1 justify-center items-center">
                                    <a href="{{ route('realisasi_kegiatan.edit', $item->id) }}"
                                        class="btn btn-neutral">Lihat Realisasi</a>
                                </div> --}}
                                <div class="flex justify-center items-center">
                                    <form action="{{ route('detail-kinerja', $item->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="idPd" value="{{ $item->idPd }}">
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button class="btn btn-neutral">Lihat Realisasi</button>
                                    </form>
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
        {{-- <a href="{{ route('data-skpd.index') }}" class="btn btn-block mt-2">Kembali</a> --}}
    </div>

    <div class="p-6 overflow-hidden bg-white rounded-md mt-2 mb-4 shadow-md dark:bg-dark-eval-1">
        <p class="font-semibold">Program & Realisasi Keuangan</p>
        <div class="overflow-x-auto">
            <div class="overflow-x-auto mt-5">
                <table class="table table-zebra">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>No</th>
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
                        @foreach ($realisasiProgram as $realisasi)
                            <tr>
                                <th>{{ ($realisasiProgram->currentPage() - 1) * $realisasiProgram->perPage() + $loop->iteration }}
                                </th>
                                <td>{{ $realisasi->namaProgram }}</td>
                                <td>@currency($realisasi->triwulan1)</td>
                                <td>@currency($realisasi->triwulan2)</td>
                                <td>@currency($realisasi->triwulan3)</td>
                                <td>@currency($realisasi->triwulan4)</td>
                                <td>@currency($realisasi->targetAnggaran)</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <form action="{{ route('detail-program', $realisasi->id) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="idPd" value="{{ $realisasi->idPd }}">
                                            <input type="hidden" name="id" value="{{ $realisasi->id }}">
                                            <button class="btn btn-neutral">Lihat Realisasi</button>
                                        </form>
                                        {{-- <a href="{{ route('detail-program', $realisasi->id) }}"
                                            class="btn btn-neutral">Lihat Realisasi</a> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <a href="{{ route('data-skpd.index') }}" class="btn btn-block mt-2">Kembali</a> --}}
    </div>

    {{-- <div class="p-6 overflow-hidden bg-white rounded-md mt-2 mb-4 shadow-md dark:bg-dark-eval-1">
        <p class="font-semibold mb-2">Pohon Kinerja</p>

        <div>
            <div id="myDiagram" style="width:100%; height:600px; border:1px solid black"></div>
        </div>
    </div> --}}


    <div class="p-6 overflow-hidden bg-white rounded-md mb-4 shadow-md dark:bg-dark-eval-1">
        <a href="{{ route('detail-skpd.index') }}" class="btn btn-block">Kembali</a>
    </div>

    <script src="https://acrobatservices.adobe.com/view-sdk/viewer.js"></script>
    <script>
        document.getElementById('previewButton').addEventListener('click', function() {
            const previewContent = document.getElementById('previewContent');
            if (previewContent.style.display === 'none') {
                previewContent.style.display = 'block';
            } else {
                previewContent.style.display = 'none';
            }
        });
    </script>
    <script type="text/javascript">
        const data = @json($dataSurat);
        document.addEventListener("adobe_dc_view_sdk.ready", function() {
            var adobeDCView = new AdobeDC.View({
                clientId: "38f7e38309cf414a8f24e949d562c502",
                divId: "adobe-dc"
            });
            adobeDCView.previewFile({
                content: {
                    location: {
                        url: `https://sipekav2.sipeka-organisasi-mdo.net/public/storage/pdf/${data.nama_file}`,
                    }
                },
                metaData: {
                    fileName: "Bodea Brochure.pdf"
                }
            }, {});
        });
    </script>
    <script src="https://unpkg.com/gojs/release/go.js"></script>
    <script>
        function init() {
            var jsonData = {!! $jsonData !!};
            console.log(jsonData);
            var $ = go.GraphObject.make;
            var myDiagram =
                $(go.Diagram, "myDiagram", {
                    initialContentAlignment: go.Spot.Center,
                    "undoManager.isEnabled": true,
                    layout: $(go.TreeLayout, {
                        angle: 90,
                        layerSpacing: 35,
                        nodeSpacing: 30
                    })
                });

            myDiagram.nodeTemplate =
                $(go.Node, "Auto",
                    $(go.Shape, "RoundedRectangle", {
                        fill: "white",
                        strokeWidth: 1
                    }),
                    $(go.Panel, "Table", {
                            defaultRowSeparatorStroke: 1
                        },
                        $(go.RowColumnDefinition, {
                            column: 1,
                            width: 4
                        }),
                        $(go.Panel, "Horizontal", {
                                row: 0,
                                column: 0,
                                columnSpan: 3,
                                margin: 8,
                                alignment: go.Spot.Center
                            },
                            $(go.TextBlock, {
                                    margin: 8,
                                    font: "bold 12px sans-serif",
                                    alignment: go.Spot.Center
                                },
                                new go.Binding("text", "name"))
                        ),
                        $(go.TextBlock, {
                                row: 1,
                                column: 0,
                                columnSpan: 3,
                                margin: 8,
                                alignment: go.Spot.Left,
                                font: "10px sans-serif"
                            },
                            new go.Binding("text", "indikator", function(text) {
                                return "Indikator: " + text;
                            })),
                        $(go.Shape, "LineH", {
                            row: 2,
                            column: 0,
                            columnSpan: 3,
                            strokeWidth: 1,
                            stroke: "black",
                            height: 1,
                            margin: new go.Margin(8, 0, 8, 0)
                        }),
                        $(go.TextBlock, {
                                row: 3,
                                column: 0,
                                columnSpan: 3,
                                margin: 8,
                                alignment: go.Spot.Left,
                                font: "10px sans-serif"
                            },
                            new go.Binding("text", "croscut", function(text) {
                                return "Crosscut: " + text;
                            }))
                    )
                );

            myDiagram.linkTemplate =
                $(go.Link, {
                        routing: go.Link.Orthogonal,
                        corner: 5
                    },
                    $(go.Shape, {
                        strokeWidth: 3,
                        stroke: "#555"
                    }));

            var nodeDataArray = jsonData.map(function(item) {
                return {
                    key: item.key,
                    indikator: item.indikator,
                    croscut: item.croscut,
                    name: item.name,
                    parent: item.parent
                };
            });
            myDiagram.model = new go.TreeModel(nodeDataArray);
        }
    </script>
</x-app-layout>
