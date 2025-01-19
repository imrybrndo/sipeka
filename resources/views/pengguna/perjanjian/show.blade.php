<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Lihat Surat Perjanjian Kinerja') }}
            </h2>

        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-2 h-[700px]">
        <div id="adobe-dc"></div>
    </div>
    <div>
        <form action="{{ route('delete-kinerja', $data->idSurat) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <button class="mt-2 mb-2 btn btn-block bg-red-700 hover:bg-red-800 text-white">Hapus Dokumen</button>
        </form>
        <a href="{{ route('surat.index') }}" class="btn btn-block">Kembali</a>
    </div>

    <script src="https://acrobatservices.adobe.com/view-sdk/viewer.js"></script>
    <script type="text/javascript">
        const data = @json($data);
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
                    fileName: "Perjanjian Kinerja.pdf"
                }
            }, {});
        });
    </script>
</x-app-layout>
