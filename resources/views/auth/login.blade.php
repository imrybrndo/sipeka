<x-guest-layout>
    {{-- <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="text-center">
            <div class="flex justify-center items-center">
                <img src="{{ asset('assets/logo.png') }}" class="h-20 w-20" alt="" srcset="">
            </div>
            <p class="font-semibold text-2xl">SIPEKA</p>
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="grid gap-6">
                <!-- Email Address -->
                <div class="space-y-2">
                    <x-form.label for="email" :value="__('Email')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input withicon id="email" class="block w-full" type="email" name="email"
                            :value="old('email')" placeholder="{{ __('Email') }}" required autofocus />
                    </x-form.input-with-icon-wrapper>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <x-form.label for="password" :value="__('Password')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input withicon id="password" class="block w-full" type="password" name="password"
                            required autocomplete="current-password" placeholder="{{ __('Kata Sandi') }}" />
                    </x-form.input-with-icon-wrapper>
                </div>

                <div class="mt-3">
                    <x-button class="justify-center w-full gap-2 bg-neutral hover:bg-neutral-900">
                        <x-heroicon-o-login class="w-6 h-6" aria-hidden="true" />
                        <span>{{ __('Masuk') }}</span>
                    </x-button>
                </div>
            </div>
        </form>
    </x-auth-card> --}}
    <div class="relative">
        <!-- Black Overlay -->
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="hero min-h-screen">
            <div class="hero-content flex-col lg:flex-row-reverse">
                <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
                    <div class="card-body">
                        <div class="flex justify-center items-center mt-10">
                            <img src="{{ asset('assets/logo.png') }}" class="w-32" alt="" srcset="">
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="grid gap-6">
                                <!-- Email Address -->
                                <div class="space-y-2">
                                    <x-form.label for="email" :value="__('Email')" />

                                    <x-form.input-with-icon-wrapper>
                                        <x-slot name="icon">
                                            <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5" />
                                        </x-slot>

                                        <x-form.input withicon id="email" class="block w-full" type="email"
                                            name="email" :value="old('email')" placeholder="{{ __('Email') }}" required
                                            autofocus />
                                    </x-form.input-with-icon-wrapper>
                                </div>

                                <!-- Password -->
                                <div class="space-y-2">
                                    <x-form.label for="password" :value="__('Password')" />

                                    <x-form.input-with-icon-wrapper>
                                        <x-slot name="icon">
                                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                                        </x-slot>

                                        <x-form.input withicon id="password" class="block w-full" type="password"
                                            name="password" required autocomplete="current-password"
                                            placeholder="{{ __('Kata Sandi') }}" />
                                    </x-form.input-with-icon-wrapper>
                                </div>

                                <div class="mt-3">
                                    <x-button class="justify-center w-full gap-2 bg-neutral hover:bg-neutral-900">
                                        <x-heroicon-o-login class="w-6 h-6" aria-hidden="true" />
                                        <span>{{ __('Masuk') }}</span>
                                    </x-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center lg:text-left">
                    <h1 class="text-5xl text-white font-bold">Selamat Datang di SIPEKA</h1>
                    <p class="py-6 text-white">
                        SIPEKA Adalah aplikasi inovatif yang dikembangkan oleh Biro Organisasi untuk mendukung efisiensi
                        dan transparansi dalam manajemen organisasi. Dirancang khusus untuk memenuhi kebutuhan
                        administrasi modern, SIPEKA hadir sebagai alat yang andal dalam mengelola data, memantau kinerja
                        aparatur, dan meningkatkan akuntabilitas di berbagai instansi pemerintahan maupun organisasi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
