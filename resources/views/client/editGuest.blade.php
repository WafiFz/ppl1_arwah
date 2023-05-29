<x-member-layout title="Edit Guest">
    <main class="grow">
        <section class="bg-white">
            <form action="{{ route('client.guest.edit', $guest->id) }}" method="post" x-data="data()">
                @csrf
                <div class="container py-8">
                    <div class="text-center sm:text-start">
                        <h3 class="mb-0 text-xl font-medium">Guest</h3>
                        <p>Information about your guest.</p>
                    </div>
                    <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                        <div class="sm:w-1/3">
                            <span class="font-bold">Nama</span>
                        </div>
                        <div class="sm:w-2/3">
                            <x-form.input type="text" name="name" value="{{ $guest->name }}"
                                placeholder="Masukkan nama lengkap tamu" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                        <div class="sm:w-1/3">
                            <span class="font-bold">Deskripsi</span>
                        </div>
                        <div class="sm:w-2/3">
                            <x-form.input type="text" name="description" value="{{ $guest->description }}"
                                placeholder="Masukkan deskripsi tamu" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                        <div class="sm:w-1/3">
                            <span class="font-bold">Alamat</span>
                        </div>
                        <div class="sm:w-2/3">
                            <textarea name="address" rows="4" value="{{ $guest->address }}" placeholder="Masukkan alamat tamu">
                                {{ $guest->address }}
                            </textarea>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                        <div class="sm:w-1/3">
                            <span class="font-bold">No. WhatsApp</span>
                        </div>
                        <div class="sm:w-2/3">
                            <x-form.input type="text" name="no_whats_app" value="{{ $guest->no_whats_app }}"
                                placeholder="Masukkan nomor WhatsApp tamu" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                        <div class="sm:w-1/3">
                            <span class="font-bold">Email</span>
                        </div>
                        <div class="sm:w-2/3">
                            <x-form.input type="email" name="email" value="{{ $guest->email }}"
                                placeholder="Masukkan email tamu" />
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <x-button type="submit" class="text-white bg-brand-purple-500">
                            Edit
                        </x-button>
                    </div>
                </div>
            </form>
        </section>
        @if (request()->routeIs('guest.edit'))
            <section class="bg-white">
                <div class="container py-8">
                    <div class="text-center sm:text-start mb-3">
                        <h3 class="mb-0 text-xl font-medium">Baru Ditambahkan</h3>
                    </div>
                    <div class="relative overflow-auto shadow-md max-h-96 sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Address
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        No WA
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($guest as $guest)
                                    <?php if ($i == 10) {
                                        break;
                                    } ?>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">{{ $guest->name }}</td>
                                        <td class="px-6 py-4">{{ $guest->description }}</td>
                                        <td class="px-6 py-4">{{ $guest->address }}</td>
                                        <td class="px-6 py-4">{{ $guest->no_whats_app }}</td>
                                        <td class="px-6 py-4">{{ $guest->email }}</td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="flex justify-end mt-5">
                        <x-button type="button" class="ml-auto text-white bg-brand-purple-500" @click="edit();">Save</x-button>
                    </div> --}}
                </div>
            </section>
        @endif
    </main>
    @push('before-scripts')
        <script>
            function data() {
                return {
                    form: {
                        name: '',
                        description: '',
                        address: '',
                        no_whats_app: '',
                        email: ''
                    },
                    guest: [],
                    edit() {
                        this.guest.push(this.form);
                        this.form = {
                            name: '',
                            description: '',
                            address: '',
                            no_whats_app: '',
                            email: ''
                        }
                    }
                }
            }
        </script>
    @endpush
</x-member-layout>
