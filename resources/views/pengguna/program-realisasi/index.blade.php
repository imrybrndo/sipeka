<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Realisasi') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div>
            <p class="font-semibold mb-3 text-center">Daftar Program</p>
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Job</th>
                            <th>Favorite Color</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        <tr>
                            <th>1</th>
                            <td>Cy Ganderton</td>
                            <td>Quality Control Specialist</td>
                            <td>Blue</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <button class="btn btn-block btn-primary" onclick="my_modal_4.showModal()">Tambah Program</button>
                <dialog id="my_modal_4" class="modal">
                    <div class="modal-box w-11/12 max-w-5xl">
                        <h3 class="text-lg font-bold">Tambah Program</h3>
                        <form action="" method="post">
                            <label class="form-control w-full max-w-xs">
                                <div class="label">
                                    <span class="label-text">Nama Program</span>
                                </div>
                                <input type="text" placeholder="Type here"
                                    class="input input-bordered w-full max-w-xs" />
                            </label>
                        </form>
                        <div class="modal-action">
                            <form method="dialog">
                                <!-- if there is a button, it will close the modal -->
                                <button class="btn">Close</button>
                            </form>
                        </div>
                    </div>
                </dialog>
            </div>
        </div>
    </div>
</x-app-layout>
