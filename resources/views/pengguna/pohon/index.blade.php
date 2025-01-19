<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Pohon Kinerja') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <style>
            #myDiagram {
                width: 100%;
                height: 500px;
                border: 1px solid black;
            }
        </style>

        <div class="flex gap-2 mb-2">
            <a href="{{ route('cascading.index') }}" class="btn btn-neutral">Tambah</a>
            <a href="{{ route('cascading_detail.index') }}" class="btn btn">Lihat</a>
        </div>

        <div id="myDiagram" style="width:100%; height:600px; border:1px solid black"></div>
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
