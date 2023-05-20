<x-member-layout title="Profile">
    <main class="grow">
        {{-- @if (session()->has('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Terjadi kesalahan!</strong>
                <span class="block sm:inline">Tidak memenuhi validasi.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif --}}

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('client.updatePassword', encode_id(auth()->user()->id)) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <section class="bg-white">
                <div class="container py-8">
                    <div class="text-center sm:text-start">
                        <h3 class="mb-0 text-xl font-medium">Ubah kata sandi</h3>
                        <p>Ubah kata sandi akun anda</p>
                    </div>
                    <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                        <div class="sm:w-1/3">
                            <span class="font-bold">Kata sandi Lama</span>
                        </div>
                        <div class="sm:w-2/3">
                            <x-input id="password" class="block w-full mt-1" type="password" name="password"
                                placeholder="Password" required />
                        </div>
                    </div>
                    <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                        <div class="sm:w-1/3">
                            <span class="font-bold">Kata sandi Baru</span>
                        </div>
                        <div class="sm:w-2/3">
                            <x-input id="new_password" class="block w-full mt-1" type="password" name="new_password"
                                placeholder="Password Baru" required />
                        </div>
                    </div>
                    <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                        <div class="sm:w-1/3">
                            <span class="font-bold">Konfirmasi Kata sandi Baru</span>
                        </div>
                        <div class="sm:w-2/3">
                            <x-input id="new_password_confirmation" class="block w-full mt-1" type="password"
                                name="new_password_confirmation" placeholder="Konfirmasi Password Baru" required />
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 py-4 border-t border-gray-200">
                        <x-button-a type="button" href="{{ route('client.index', encode_id(auth()->user()->id)) }}"
                            class="w-full py-3 tracking-wide capitalize transition-colors duration-200 transform bg-white sm:w-40 ring-1 ring-brand-purple-500 hover:ring-0 hover:text-black hover:bg-brand-yellow-500">
                            <span class="mx-1">Batal</span>
                        </x-button-a>
                        <x-button type="submit"
                            class="w-full py-3 tracking-wide text-white capitalize transition-colors duration-200 transform sm:w-40 bg-brand-purple-500 hover:bg-brand-yellow-500 hover:text-black">
                            <span class="mx-1">Simpan</span>
                        </x-button>
                    </div>
                </div>
            </section>
        </form>

    </main>
    @push('before-scripts')
        <script>
            function form() {
                const user = @json(auth()->user()->profile);
                console.log(user);

            }
        </script>
    @endpush
</x-member-layout>
