<x-member-layout title="Change Passwrod">
    <main class="grow">
        <!-- <div class="flex flex-col items-center justify-center py-8 text-center bg-brand-purple-100">
            <img class="w-36 h-36 mb-3 rounded-full border-[5px] border-white" src="{{asset(auth()->user()->avatar)}}" alt="{{asset(auth()->user()->name)}}">
            <div>
                <h2 class="mb-0 text-2xl font-medium">{{ auth()->user()->name }}</h2>
                <span class="font-light">{{ auth()->user()->email }}</span>
            </div>
        </div> -->
        <form action="{{ route('client.changePassword', encode_id(auth()->user()->id)) }}" method="post" enctype="multipart/form-data">
            @csrf
            <section class="bg-white">
                <div class="container py-8">
                    <div class="text-center sm:text-start">
                        <h3 class="mb-0 text-xl font-medium">Change Password</h3>
                        <p>Information of this block will not be displayed publicly.</p>
                    </div>
                    <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                        <div class="sm:w-1/3">
                            <span class="font-bold">Password Lama</span>
                        </div>
                        <div class="sm:w-2/3">
                            <x-input id="password" class="block w-full mt-1" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                        <div class="sm:w-1/3">
                            <span class="font-bold">Password Baru</span>
                        </div>
                        <div class="sm:w-2/3">
                        <x-input id="new_password" class="block w-full mt-1" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                        <div class="sm:w-1/3">
                            <span class="font-bold">Konfirmasi Password Baru</span>
                        </div>
                        <div class="sm:w-2/3">
                            <x-input id="new_password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" placeholder="Konfirmasi Password" required autocomplete="new-password" />
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 py-4 border-t border-gray-200">
                        <x-button-a type="button" href="{{ route('client.index', encode_id(auth()->user()->id)) }}" class="w-full py-3 tracking-wide capitalize transition-colors duration-200 transform bg-white sm:w-40 ring-1 ring-brand-purple-500 hover:ring-0 hover:text-black hover:bg-brand-yellow-500">
                            <span class="mx-1">Batalkan</span>
                        </x-button-a>
                        <x-button type="submit" class="w-full py-3 tracking-wide text-white capitalize transition-colors duration-200 transform sm:w-40 bg-brand-purple-500 hover:bg-brand-yellow-500 hover:text-black">
                            <span class="mx-1">Simpan Perubahan</span>
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