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
    <div id="myDiagram"></div>
    <script>

    </script>
    <script src="https://unpkg.com/gojs/release/go.js"></script>
    <script>
      function init() {
        var jsonData = {!! $jsonData !!};
        console.log(jsonData);
            var $ = go.GraphObject.make;
            var myDiagram =
                $(go.Diagram, "myDiagram",
                    {
                        initialContentAlignment: go.Spot.Center,
                        layout: $(go.TreeLayout, { angle: 90, layerSpacing: 50 }),
                        "undoManager.isEnabled": true
                    });
            myDiagram.nodeTemplate =
                $(go.Node, "Auto",
                    $(go.Shape, "Rectangle", { fill: "white", portId: "", cursor: "pointer", fromLinkable: true, toLinkable: true }),
                    $(go.TextBlock, { margin: 10 },
                        new go.Binding("text", "name"))
                );
            myDiagram.linkTemplate =
                $(go.Link,
                    $(go.Shape),
                    $(go.Shape, { toArrow: "Standard" })
                );
            var nodeDataArray = jsonData.map(function(item) {
                return {
                    key: item.key,
                    name: item.name,
                    parent: item.parent
                };
            });
            console.log(nodeDataArray);
            myDiagram.model = new go.TreeModel(nodeDataArray);
        }
    </script>
</x-app-layout>