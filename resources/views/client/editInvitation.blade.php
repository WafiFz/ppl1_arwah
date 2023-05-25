    @php
        use Carbon\Carbon;
    @endphp
    <x-member-layout title="Invitation" dataFunction="form()">
        @push('header-actions')
            {{-- <div class="flex justify-end gap-2" x-show="!isEdit()">
            <x-button type="button" @click="editMode()"
                class="w-full py-3 tracking-wide text-white capitalize transition-colors duration-200 transform sm:w-40 bg-brand-purple-500 hover:bg-brand-yellow-500 hover:text-black">
                <span class="mx-1">Ubah</span>
            </x-button>
        </div>
        <div class="flex justify-end gap-2" x-show="isEdit()">
            <x-button type="button" @click="reset()"
                class="w-full py-3 tracking-wide capitalize transition-colors duration-200 transform bg-white sm:w-40 ring-1 ring-brand-purple-500 hover:ring-0 hover:text-black hover:bg-brand-yellow-500">
                <span class="mx-1">Batalkan</span>
            </x-button>
            <x-button type="submit"
                class="w-full py-3 tracking-wide text-white capitalize transition-colors duration-200 transform sm:w-40 bg-brand-purple-500 hover:bg-brand-yellow-500 hover:text-black">
                <span class="mx-1">Simpan</span>
            </x-button>
        </div> --}}
        @endpush

        <main class="grow">
            <form action="{{ route('client.save.editInvitation', $data->id) }}" method="post" x-data="form()"
                enctype="multipart/form-data">
                @csrf
                <section class="bg-white">
                    <div class="container py-8">
                        <div class="text-center sm:text-start">
                            <h3 class="mb-0 text-xl font-medium">Invitation</h3>
                            <p>General information of your invitation.</p>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Order ID</span>
                            </div>
                            <div class="sm:w-2/3">
                                <input type="text" name="order_id" value="{{ $data->id }}" x-model=""
                                    class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                    placeholder="Masukkan Order ID" :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Type</span>
                            </div>
                            <div class="sm:w-2/3">
                                <input type="text" name="status" value="{{ $data->invitation->type }}"
                                    x-model=""
                                    class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                    placeholder="Wedding / Birthday / Event" :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Tanggal Pemesanan</span>
                            </div>
                            <div class="sm:w-2/3">
                                <input type="date" name="created_at"
                                    value="{{ \Carbon\Carbon::createFromTimestamp($data->created_at)->toDateString() }}"
                                    x-model=""
                                    class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                    placeholder="Masukkan Tanggal Pemesanan" :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Paket</span>
                            </div>
                            <div class="sm:w-2/3">
                                <input type="text" name="package_name" value="{{ $data->package->name }}"
                                    x-model=""
                                    class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                    placeholder="Masukkan Nama Paket" :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Tema</span>
                            </div>
                            <div class="sm:w-2/3">
                                <input type="text" name="theme_name" value="{{ $data->theme->name }}" x-model=""
                                    class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                    placeholder="Masukkan Nama Tema" :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Status</span>
                            </div>
                            <div class="sm:w-2/3">
                                <input type="text" name="status" value="{{ $data->invitation->status }}"
                                    x-model=""
                                    class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                    placeholder="Status Undangan" :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Slug</span>
                            </div>
                            <div class="sm:w-2/3">
                                <input type="text" name="slug" value="{{ $data->invitation->slug }}"
                                    x-model=""
                                    class="inline-block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                    placeholder="Ex: bride-groom" :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Custom Domain</span>
                            </div>
                            <div class="sm:w-2/3">
                                <select name="is_custom_domain"
                                    class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '">
                                    <option selected value="true">Yes</option>
                                    <option value="false">No</option>
                                </select>
                                <input type="text" name="custom_domain" value="wafi-manda.com" x-model=""
                                    class="mt-1.5 sm:mt-4 block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                    placeholder="Ex: bride-groom.com" :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '" />
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bg-white">
                    <div class="container py-8">
                        <div class="text-center sm:text-start">
                            <h3 class="mb-0 text-xl font-medium">Wedding</h3>
                            <p>General information about the wedding.</p>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Judul</span>
                            </div>
                            <div class="sm:w-2/3">
                                <input type="text" name="title" value="{{ $data->invitation->wedding->title }}"
                                    x-model=""
                                    class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                    placeholder="Masukkan Judul Undangan" :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Lokasi</span>
                            </div>
                            <div class="sm:w-2/3">
                                <input type="text" name="location"
                                    value="{{ $data->invitation->wedding->location }}" x-model=""
                                    class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                    placeholder="Masukkan Lokasi Resepsi" :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Link Lokasi (Google Maps)</span>
                            </div>
                            <div class="sm:w-2/3">
                                <input type="text" name="location_gmap"
                                    value="https://goo.gl/maps/W7cH6dNi7JLXt2jG7" x-model=""
                                    class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                    placeholder="Ex: https://goo.gl/maps/W7cH6dNi7JLXt2jG7"
                                    :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '" />
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bg-white">
                    <div class="container py-8">
                        <div class="text-center sm:text-start">
                            <h3 class="mb-0 text-xl font-medium">Groom</h3>
                            <p>Information about the Groom.</p>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Nama</span>
                            </div>
                            <div class="sm:w-2/3">
                                <input type="text" name="groom_name"
                                    value="{{ $data->invitation->wedding->groom->name }}" x-model=""
                                    class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                    placeholder="Masukkan Nama Pengantin Pria" :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Ayah</span>
                            </div>
                            <div class="sm:w-2/3">
                                <input type="text" name="groom_father"
                                    value="{{ $data->invitation->wedding->groom->father }}" x-model=""
                                    class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                    placeholder="Masukkan Nama Ayah Pengantin Pria"
                                    :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Ibu</span>
                            </div>
                            <div class="sm:w-2/3">
                                <input type="text" name="groom_mother"
                                    value="{{ $data->invitation->wedding->groom->mother }}" x-model=""
                                    class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                    placeholder="Masukkan Nama Ibu Pengantin Pria" :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Alamat</span>
                            </div>
                            <div class="sm:w-2/3">
                                <textarea :disabled="isEdit() ? false : true" :class="isEdit() == false && 'bg-neutral-100 '" id="message"
                                    name="groom_address" rows="4" value="{{ $data->invitation->wedding->groom->address }}" x-model=""
                                    class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan Alamat Pengantin Pria"></textarea>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Instagram</span>
                            </div>
                            <div class="sm:w-2/3">
                                <div class="relative flex flex-wrap items-stretch w-full mb-4">
                                    <span :class="isEdit() == false && 'bg-neutral-100'"
                                        class="flex items-center whitespace-nowrap rounded-l border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700"
                                        id="basic-addon1">@</span>
                                    <input :disabled="isEdit() ? false : true"
                                        :class="isEdit() == false && 'bg-neutral-100'" type="text"
                                        name="groom_instagram"
                                        value="{{ $data->invitation->wedding->groom->instagram }}"
                                        class="relative m-0 block w-[1px] min-w-0 flex-auto rounded-r border border-solid border-neutral-300 px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition ease-in-out focus:z-[3] focus:border-primary-600 focus:text-neutral-700 focus:shadow-te-primary focus:outline-none"
                                        placeholder="instagram" />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bg-white">
                    <div class="container py-8">
                        <div class="text-center sm:text-start">
                            <h3 class="mb-0 text-xl font-medium">Bride</h3>
                            <p>Information about the Bride.</p>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Nama</span>
                            </div>
                            <div class="sm:w-2/3">
                                <input type="text" name="bride_name"
                                    value="{{ $data->invitation->wedding->bride->name }}" x-model=""
                                    class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                    placeholder="Masukkan Nama Pengantin Wanita" :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Ayah</span>
                            </div>
                            <div class="sm:w-2/3">
                                <input type="text" name="bride_father"
                                    value="{{ $data->invitation->wedding->bride->father }}" x-model=""
                                    class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                    placeholder="Masukkan Nama Ayah Pengantin Pria"
                                    :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Ibu</span>
                            </div>
                            <div class="sm:w-2/3">
                                <input type="text" name="bride_mother"
                                    value="{{ $data->invitation->wedding->bride->mother }}" x-model=""
                                    class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                    placeholder="Masukkan Nama Ibu Pengantin Pria" :disabled="isEdit() ? false : true"
                                    :class="isEdit() == false && 'bg-neutral-100 '" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Alamat</span>
                            </div>
                            <div class="sm:w-2/3">
                                <textarea :disabled="isEdit() ? false : true" :class="isEdit() == false && 'bg-neutral-100 '" id="message"
                                    name="address" rows="4" value="{{ $data->invitation->wedding->bride->adress }}" x-model=""
                                    class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan Alamat Pengantin Pria"></textarea>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Instagram</span>
                            </div>
                            <div class="sm:w-2/3">
                                <div class="relative flex flex-wrap items-stretch w-full mb-4">
                                    <span :class="isEdit() == false && 'bg-neutral-100'"
                                        class="flex items-center whitespace-nowrap rounded-l border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700"
                                        id="basic-addon1">@</span>
                                    <input :disabled="isEdit() ? false : true"
                                        :class="isEdit() == false && 'bg-neutral-100'" type="text"
                                        name="bride_instagram"
                                        value="{{ $data->invitation->wedding->bride->instagram }}"
                                        class="relative m-0 block w-[1px] min-w-0 flex-auto rounded-r border border-solid border-neutral-300 px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition ease-in-out focus:z-[3] focus:border-primary-600 focus:text-neutral-700 focus:shadow-te-primary focus:outline-none"
                                        placeholder="instagram" />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bg-white">
                    <div class="container py-8">
                        <div class="text-center sm:text-start">
                            <h3 class="mb-0 text-xl font-medium">Events</h3>
                            <p>Information of Wedding Events</p>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Akad</span>
                            </div>
                            <div class="sm:w-2/3">
                                <div>
                                    <span class="font-semibold">Tanggal</span>
                                    <input type="date" name="date"
                                        value="{{ \Carbon\Carbon::createFromTimestamp($data->invitation->wedding->event[0]->date)->toDateString() }}"
                                        x-model=""
                                        class="mt-1.5 block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                        :disabled="isEdit() ? false : true"
                                        :class="isEdit() == false && 'bg-neutral-100'" />
                                </div>
                                <div class="mt-4">
                                    <span class="font-semibold">Waktu</span>
                                    <div class="flex flex-col items-center gap-2 sm:flex-row mt-1.5">
                                        <input type="text" name="start_time"
                                            value="{{ $data->invitation->wedding->event[0]->start_time }}"
                                            x-model=""
                                            class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                            :disabled="isEdit() ? false : true"
                                            :class="isEdit() == false && 'bg-neutral-100'" />
                                        -
                                        <input type="text" name="end_time"
                                            value="{{ $data->invitation->wedding->event[0]->end_time }}"
                                            x-model=""
                                            class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                            :disabled="isEdit() ? false : true"
                                            :class="isEdit() == false && 'bg-neutral-100'" />
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <span class="font-semibold">Tempat</span>
                                    <input type="text" name="place"
                                        value="{{ $data->invitation->wedding->event[0]->place }}" x-model=""
                                        class="mt-1.5 block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                        placeholder="Masukkan Tempat Akad" :disabled="isEdit() ? false : true"
                                        :class="isEdit() == false && 'bg-neutral-100 '" />
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Resepsi</span>
                            </div>
                            <div class="sm:w-2/3">
                                <div>
                                    <span class="font-semibold">Tanggal</span>
                                    <input type="date" name="date"
                                        value="{{ \Carbon\Carbon::createFromTimestamp($data->invitation->wedding->event[1]->date)->toDateString() }}"
                                        x-model=""
                                        class="mt-1.5 block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                        :disabled="isEdit() ? false : true"
                                        :class="isEdit() == false && 'bg-neutral-100'" />
                                </div>
                                <div class="mt-4">
                                    <span class="font-semibold">Waktu</span>
                                    <div class="flex flex-col items-center gap-2 sm:flex-row mt-1.5">
                                        <input type="text" name="start_time"
                                            value="{{ $data->invitation->wedding->event[1]->start_time }}"
                                            x-model=""
                                            class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                            :disabled="isEdit() ? false : true"
                                            :class="isEdit() == false && 'bg-neutral-100'" />
                                        -
                                        <input type="text" name="end_time"
                                            value="{{ $data->invitation->wedding->event[1]->end_time }}"
                                            x-model=""
                                            class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                            :disabled="isEdit() ? false : true"
                                            :class="isEdit() == false && 'bg-neutral-100'" />
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <span class="font-semibold">Tempat</span>
                                    <input type="text" name="place"
                                        value="{{ $data->invitation->wedding->event[1]->place }}" x-model=""
                                        class="mt-1.5 block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                        placeholder="Masukkan Tempat Resepsi" :disabled="isEdit() ? false : true"
                                        :class="isEdit() == false && 'bg-neutral-100 '" />
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                            <div class="sm:w-1/3">
                                <span class="font-bold">Unduh Mantu</span>
                            </div>
                            <div class="sm:w-2/3">
                                <div>
                                    <span class="font-semibold">Tanggal</span>
                                    <input type="date" name="date"
                                        value="{{ \Carbon\Carbon::createFromTimestamp($data->invitation->wedding->event[2]->date)->toDateString() }}"
                                        x-model=""
                                        class="mt-1.5 block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                        :disabled="isEdit() ? false : true"
                                        :class="isEdit() == false && 'bg-neutral-100'" />
                                </div>
                                <div class="mt-4">
                                    <span class="font-semibold">Waktu</span>
                                    <div class="flex flex-col items-center gap-2 sm:flex-row mt-1.5">
                                        <input type="text" name="start_time"
                                            value="{{ $data->invitation->wedding->event[2]->start_time }}"
                                            x-model=""
                                            class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                            :disabled="isEdit() ? false : true"
                                            :class="isEdit() == false && 'bg-neutral-100'" />
                                        -
                                        <input type="text" name="end_time"
                                            value="{{ $data->invitation->wedding->event[2]->end_time }}"
                                            x-model=""
                                            class="block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                            :disabled="isEdit() ? false : true"
                                            :class="isEdit() == false && 'bg-neutral-100'" />
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <span class="font-semibold">Tempat</span>
                                    <input type="text" name="place"
                                        value="{{ $data->invitation->wedding->event[2]->place }}" x-model=""
                                        class="mt-1.5 block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                        placeholder="Masukkan Tempat Unduh Mantu" :disabled="isEdit() ? false : true"
                                        :class="isEdit() == false && 'bg-neutral-100 '" />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bg-white">
                    <div class="container py-8">
                        <div class="text-center sm:text-start">
                            <h3 class="mb-0 text-xl font-medium">Love Stories</h3>
                            <p>Stories of your love</p>
                        </div>
                        <?php
                        $i = 1;
                        ?>
                        @foreach ($data->invitation->wedding->love_story as $love_story)
                            <template x-for="i in eventsCount">
                                <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                                    <div class="sm:w-1/3">
                                        <span class="font-bold">Story <span x-text="i"></span></span>
                                    </div>
                                    <div class="sm:w-2/3">
                                        <div>
                                            <span class="font-semibold">Tahun</span>
                                            <input type="number" name="year_{{ $i }}"
                                                value="{{ $love_story->year }}" x-model=""
                                                class="mt-1.5 block min-h-[auto] rounded border border-gray-300 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear motion-reduce:transition-none w-full"
                                                placeholder="Masukkan Tahun Kejadian"
                                                :disabled="isEdit() ? false : true"
                                                :class="isEdit() == false && 'bg-neutral-100 '" />
                                        </div>
                                        <div class="mt-4">
                                            <span class="font-semibold">Kisah</span>
                                            <textarea :disabled="isEdit() ? false : true" :class="isEdit() == false && 'bg-neutral-100 '" id="message"
                                                name="story_{{ $i }}" rows="4" value="{{ $love_story->story }}" x-model=""
                                                class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 mt-1.5"
                                                placeholder="Ceritakan Kisahmu Disini...">{{ $love_story->story }}</textarea>
                                        </div>
                                        <div class="mt-4">
                                            <span class="font-semibold">Gambar</span>
                                            <label for="dropzone-file"
                                                class="mt-1.5  flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:bg-gray-50"
                                                :class="isEdit() == false && 'bg-neutral-100 hover:bg-neutral-100'">
                                                <div class="flex items-center justify-center gap-2 pt-5 pb-6">
                                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                        </path>
                                                    </svg>
                                                    <div>
                                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                                class="font-semibold">Click to upload</span></p>
                                                        <p class="m-0 text-xs text-gray-500 dark:text-gray-400">SVG,
                                                            PNG,
                                                            JPG
                                                            or GIF (MAX. 800x400px)</p>
                                                    </div>
                                                </div>
                                                <input id="dropzone-file" type="file" class="hidden"
                                                    name="love_story_{{ $i }}"
                                                    :disabled="isEdit() ? false : true" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <?php
                            $i++;
                            ?>
                        @endforeach
                        <div class="flex justify-end gap-2" x-show="isEdit()">
                            <x-button type="button" @click="decrementEvent()" x-show="eventsCount > 1"
                                class="w-full py-3 tracking-wide capitalize transition-colors duration-200 transform bg-white sm:w-40 ring-1 ring-brand-purple-500 hover:ring-0 hover:text-black hover:bg-brand-yellow-500">
                                <span class="mx-1"><i class="fa-solid fa-minus"></i></span>
                            </x-button>
                            <x-button type="button" @click="incrementEvent()" x-show="eventsCount < 5"
                                class="w-full py-3 tracking-wide text-white capitalize transition-colors duration-200 transform sm:w-40 bg-brand-purple-500 hover:bg-brand-yellow-500 hover:text-black">
                                <span class="mx-1"><i class="fa-solid fa-plus"></i></span>
                            </x-button>
                        </div>
                    </div>
                </section>
                <section class="bg-white">
                    <div class="container py-8">
                        <div class="text-center sm:text-start">
                            <h3 class="mb-0 text-xl font-medium">Gallery</h3>
                            <p>Upload your romantic images</p>
                        </div>

                        <?php
                        $i = 1;
                        ?>
                        @foreach ($data->invitation->wedding->gallery as $gallery)
                            <div class="flex flex-col gap-1.5 py-4 border-t border-gray-200 sm:flex-row">
                                <div class="sm:w-1/3">
                                    <span class="font-bold">Images</span>
                                </div>
                                <div class="sm:w-2/3">
                                    <template x-for="i in imagesCount">
                                        <label for="dropzone-file"
                                            class="mt-1.5 sm:mt-4 flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:bg-gray-50"
                                            :class="isEdit() == false && 'bg-neutral-100 hover:bg-neutral-100'">
                                            <div class="flex items-center justify-center gap-2 pt-5 pb-6">
                                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                    </path>
                                                </svg>
                                                <div>
                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                            class="font-semibold">Click to upload</span></p>
                                                    <p class="m-0 text-xs text-gray-500 dark:text-gray-400">SVG, PNG,
                                                        JPG
                                                        or
                                                        GIF (MAX. 800x400px)</p>
                                                </div>
                                            </div>
                                            <input id="dropzone-file" type="file" class="hidden"
                                                name="image_gallery_{{ $i }}"
                                                :disabled="isEdit() ? false : true" />
                                        </label>
                                    </template>
                                </div>
                            </div>
                            <?php
                            $i++;
                            ?>
                        @endforeach
                        <div class="flex justify-end gap-2 py-4 border-t border-gray-200" x-show="!isEdit()">
                            <x-button type="button" @click="editMode()"
                                class="w-full py-3 tracking-wide text-white capitalize transition-colors duration-200 transform sm:w-40 bg-brand-purple-500 hover:bg-brand-yellow-500 hover:text-black">
                                <span class="mx-1">Ubah</span>
                            </x-button>
                        </div>
                        <div class="flex justify-end gap-2 py-4 border-t border-gray-200" x-show="isEdit()">
                            <x-button type="button" @click="reset()"
                                class="w-full py-3 tracking-wide capitalize transition-colors duration-200 transform bg-white sm:w-40 ring-1 ring-brand-purple-500 hover:ring-0 hover:text-black hover:bg-brand-yellow-500">
                                <span class="mx-1">Batalkan</span>
                            </x-button>
                            <x-button type="submit"
                                class="w-full py-3 tracking-wide text-white capitalize transition-colors duration-200 transform sm:w-40 bg-brand-purple-500 hover:bg-brand-yellow-500 hover:text-black">
                                Simpan Perusahaan
                            </x-button>
                        </div>
                </section>
                <section class="bg-white">
                    <div class="container py-8">
                        <div>
                            <h3 class="mb-0 text-xl font-medium">Tamu</h3>
                            <p>Tamu yang baru ditambahkan.</p>
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
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">Alfadli</td>
                                        <td class="px-6 py-4">Teman SMA</td>
                                        <td class="px-6 py-4">Meranti III</td>
                                        <td class="px-6 py-4">08xxxxxxxxx</td>
                                        <td class="px-6 py-4">alfadli@gmail.com</td>
                                    </tr>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">Alfadli</td>
                                        <td class="px-6 py-4">Teman SMA</td>
                                        <td class="px-6 py-4">Meranti III</td>
                                        <td class="px-6 py-4">08xxxxxxxxx</td>
                                        <td class="px-6 py-4">alfadli@gmail.com</td>
                                    </tr>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">Alfadli</td>
                                        <td class="px-6 py-4">Teman SMA</td>
                                        <td class="px-6 py-4">Meranti III</td>
                                        <td class="px-6 py-4">08xxxxxxxxx</td>
                                        <td class="px-6 py-4">alfadli@gmail.com</td>
                                    </tr>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">Alfadli</td>
                                        <td class="px-6 py-4">Teman SMA</td>
                                        <td class="px-6 py-4">Meranti III</td>
                                        <td class="px-6 py-4">08xxxxxxxxx</td>
                                        <td class="px-6 py-4">alfadli@gmail.com</td>
                                    </tr>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">Alfadli</td>
                                        <td class="px-6 py-4">Teman SMA</td>
                                        <td class="px-6 py-4">Meranti III</td>
                                        <td class="px-6 py-4">08xxxxxxxxx</td>
                                        <td class="px-6 py-4">alfadli@gmail.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="justify-between mt-5 sm:flex">
                            <p>Total tamu seluruhnya: <span class="font-bold">89</span></p>
                            <a class="text-brand-purple-500"
                                href="{{ route('client.guest.index', encode_id($data->invitation->id)) }}">Lihat lebih
                                banyak
                                <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </section>
            </form>
        </main>
        @push('before-scripts')
            <script>
                function form() {
                    return {
                        edit: false,
                        eventsCount: 1,
                        imagesCount: 2,
                        form: {},
                        isEdit() {
                            return this.edit
                        },
                        editMode() {
                            this.edit = true
                        },
                        readonlyMode() {
                            this.edit = false
                        },
                        reset() {
                            this.form = {};
                            this.edit = false;
                        },
                        incrementEvent() {
                            this.eventsCount++
                        },
                        decrementEvent() {
                            this.eventsCount--
                        },
                        incrementImage() {
                            this.imagesCount++
                        },
                        decrementImage() {
                            this.imagesCount--
                        }
                    }
                }
            </script>
        @endpush
    </x-member-layout>
