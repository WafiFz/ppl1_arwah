<x-member-layout title="Guests" dataFunction="guests">
    <main class="py-3 bg-white grow">
        @php
            $dataCount = count($data['guests']);
            $invitationID = 0;
        @endphp
        <div class="container" >
            <button @click="broadcastModal.show()" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Toggle broadcast modal
            </button>
            <button @click="confirmModal.show()" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Toggle confirm modal
            </button>
            <button @click="successModal.show()" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Toggle succes modal
            </button>
            <button @click="failedModal.show()" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Toggle failed modal
            </button>
            <!-- <div id="modalEl"></div> -->
            <div class="flex flex-col gap-2 text-center sm:flex-row">
                <div class="grow">
                    <form>
                        <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="search" id="search"
                                class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-brand-purple-500 focus:border-brand-ring-brand-purple-500"
                                placeholder="Search" required>
                            <button type="submit"
                                class="absolute top-0 right-0 h-full px-6 py-2 text-sm font-medium text-white rounded-r-lg bg-brand-purple-500 hover:bg-brand-yellow-500">Search</button>
                        </div>
                    </form>
                </div>
                <x-button class="px-6 py-3 bg-brand-purple-100 transition-colors duration-200 transform ring-brand-purple-500 hover:text-black hover:bg-brand-yellow-500"><i class="mr-2 fa-solid fa-filter"></i>Filter</x-button>
            </div>
            <div class="relative mt-5 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="selectAllCheckbox" type="checkbox" x-on:change="headerCheckboxChange($el);"
                                        class="checkbox-brand-purple-500 w-4 h-4">
                                    <label for="selectAllCheckbox" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah Orang
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Undangan
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['guests'] as $guest)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-{{ $guest->id }}" value="{{ $guest->id }}" type="checkbox" name="guestCheckbox" x-on:change="rowCheckboxChange($el);"
                                            class="checkbox-brand-purple-500 w-4 h-4">
                                        <label for="checkbox-{{ $guest->id }}" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row" class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap ">
                                    #{{ $guest->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $guest->name }}
                                </td>
                                <td class="px-6 py-4">
                                    jml. org
                                </td>
                                <td class="px-6 py-4">
                                    Tidak Hadir
                                </td>
                                <td class="px-6 py-4">
                                    Belum Dikirim
                                </td>
                                <td class="py-4 flex justify-center">
                                    <x-button-a @click="confirmInvitation([{{ $guest->id }}],defaultMethod)" class="w-9 h-9 mx-1.5 bg-brand-purple-100 text-brand-purple-500 transition-colors duration-200 transform ring-brand-purple-500 hover:text-black hover:bg-brand-yellow-500">
                                        <i class="fa-solid fa-paper-plane text-lg"></i>
                                    </x-button-a>
                                    <x-button-a href="#" class="w-9 h-9 mx-1.5 bg-brand-purple-500 text-white transition-colors duration-200 transform ring-brand-purple-500 hover:text-black hover:bg-brand-yellow-500">
                                        <i class="fa-solid fa-pen text-lg"></i>
                                    </x-button-a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex items-center justify-between mt-5 bg-white">
                <div class="flex justify-end flex-1 sm:hidden">
                    <a href="#"
                        class="items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-brand-purple-100 hover:text-brand-purple-500">Previous</a>
                    <a href="#"
                        class="items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-brand-purple-100 hover:text-brand-purple-500">Next</a>
                </div>
                <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Showing
                            <span class="font-medium">1</span>
                            to
                            <span class="font-medium">10</span>
                            of
                            <span class="font-medium">{{ $dataCount }}</span>
                            results
                        </p>
                    </div>
                    <div>
                        <nav class="inline-flex -space-x-px rounded-md shadow-sm isolate" aria-label="Pagination">
                            <a href="#"
                                class="items-center px-2 py-2 text-gray-400 rounded-l-md ring-1 ring-inset ring-gray-300 hover:bg-brand-purple-100 hover:text-brand-purple-500">
                                <span class="sr-only">Previous</span>
                                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                            <a href="#" aria-current="page"
                                class="px-4 py-2 text-sm font-semibold bg-brand-purple-100 text-brand-purple-500">1</a>
                            <a href="#"
                                class="px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-brand-purple-100 hover:text-brand-purple-500">2</a>
                            <a href="#"
                                class="items-center hidden px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-brand-purple-100 hover:text-brand-purple-500">3</a>
                            <span
                                class="px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
                            <a href="#"
                                class="items-center hidden px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-brand-purple-100 hover:text-brand-purple-500">8</a>
                            <a href="#"
                                class="px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-brand-purple-100 hover:text-brand-purple-500">9</a>
                            <a href="#"
                                class="px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-brand-purple-100 hover:text-brand-purple-500">10</a>
                            <a href="#"
                                class="px-2 py-2 text-gray-400 rounded-r-md ring-1 ring-inset ring-gray-300 hover:bg-brand-purple-100 hover:text-brand-purple-500">
                                <span class="sr-only">Next</span>
                                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @push('before-scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
        <script>
            let defaultMethod = 'email';
            let selectedGuests = [];
            let selectedMethod = '';
            document.addEventListener('alpine:init', () => {
                Alpine.data('guests', () => ({
                    selectedCheckboxCount : 0,
                    dataCount : {{ $dataCount }},
                    toggleGuestCheckboxes() {
                        var checkboxes = document.getElementsByName("guestCheckbox");
                        var selectAllCheckbox = document.getElementById("selectAllCheckbox");
                        
                        for (var i = 0; i < checkboxes.length; i++) {
                            checkboxes[i].checked = selectAllCheckbox.checked;
                        }
                    },
                    updateSelectAllCheckbox() {
                        var checkboxes = document.getElementsByName("guestCheckbox");
                        var selectAllCheckbox = document.getElementById("selectAllCheckbox");
                        
                        for (var i = 0; i < checkboxes.length; i++) {
                            if (!checkboxes[i].checked) {
                            selectAllCheckbox.checked = false;
                            return;
                            }
                        }
                        
                        selectAllCheckbox.checked = true;
                    },
                    checkboxChange(el){
                        console.log(this.selectedCheckboxCount);
                    },
                    headerCheckboxChange(el){
                        console.log(el);
                        this.toggleGuestCheckboxes();
                        if(el.checked){
                            this.selectedCheckboxCount = this.dataCount;
                        }
                        else{
                            this.selectedCheckboxCount = 0;
                        }
                        this.checkboxChange(el);
                    },
                    rowCheckboxChange(el){
                        this.updateSelectAllCheckbox();
                        if(el.checked){
                            this.selectedCheckboxCount += 1;
                        }
                        else{
                            this.selectedCheckboxCount -= 1;
                        }
                        this.checkboxChange(el);
                    }
                }))
            });
            
            function broadcast() {
                broadcastGuests = [];
                broadcastMethod = $('select[name="broadcastMethod"]').val();
                $("input:checkbox[name=guestCheckbox]:checked").each(function(){
                    broadcastGuests.push($(this).val());
                });
                confirmInvitation(broadcastGuests,broadcastMethod);
            }
            
            function confirmInvitation(target,method) {
                selectedGuests = target;
                selectedMethod = method;
                console.log(selectedGuests);
                console.log(selectedMethod);
                confirmModal.show();
            }

            function sendInvitation() {
                broadcastModal.hide();
                if (selectedMethod === "" || !selectedMethod){
                    selectedMethod = defaultMethod;
                }
                var csrfToken = '{{ csrf_token() }}';

                $.ajax({
                url: '{{ route('client.guest.sendInvitation') }}',
                method: 'POST',
                data: {
                    selectedIDs: selectedGuests,
                    selectedMethod: selectedMethod
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) { //status 200
                    console.log(response);
                    successModal.show();
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.log(xhr);
                    failedModal.show();
                }
                });
            }
        </script>
    @endpush

    @push('header-actions')
        <div>
            <x-button @click="broadcastModal.show()" type="button" x-show="selectedCheckboxCount > 0"
                class=" text-brand-purple-500 w-full py-3 tracking-wide capitalize transition-colors duration-200 transform bg-white sm:w-40 ring-0 ring-brand-purple-500 hover:text-black hover:bg-brand-yellow-500">
                <span class="font-extrabold">Broadcast</span>
            </x-button>
            <x-button-a href="" type="button"
                class="w-full py-3 tracking-wide text-white capitalize transition-colors duration-200 transform sm:w-40 bg-brand-purple-500 hover:bg-brand-yellow-500 hover:text-black">
                <span class="font-extrabold">Add New</span>
            </x-button>
        </div>
    @endpush

    <x-flowbite-modal id="broadcastModal" title="Broadcast">
        <!-- Modal body -->
        <div class="p-6 my-6 flex flex-col sm:flex-row sm:justify-between sm:items-center">
            <div class="mr-4">
                <span class="font-bold">Broadcast Via</span>
            </div>
            <div class="flex-grow">
                <select name="broadcastMethod" class=" border border-gray-300 text-sm rounded-lg focus:ring-brand-purple-500 focus:border-brand-ring-brand-purple-500 block w-full p-2.5">
                    <option value="email">Email</option>
                    <option value="sms">SMS</option>
                </select>
            </div>
        </div>
        <!-- Modal footer -->
        
        <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
            <x-button @click="hide()" type="button"
                class="w-full py-3 tracking-wide capitalize transition-colors duration-200 transform bg-white sm:w-40 ring-1 ring-brand-purple-500 hover:ring-0 hover:text-black hover:bg-brand-yellow-500">
                <span class="mx-1">Cancel</span>
            </x-button>
            <x-button  type="button" @click="broadcast()"
                class="w-full py-3 tracking-wide text-white capitalize transition-colors duration-200 transform sm:w-40 bg-brand-purple-500 hover:bg-brand-yellow-500 hover:text-black">
                Broadcast
            </x-button>
        </div>
    </x-flowbite-modal>

    <x-flowbite-modal id="confirmModal" title="Send Invitation">\
        <!-- Modal body -->
        <div class="p-6 flex flex-col justify-center items-center">
            <i class="fa-regular fa-circle-question text-brand-purple-500 text-9xl"></i>
            <div class="mt-4">
                <span class="font-bold">Are you sure to send the invitation?</span>
            </div>
        </div>
        <!-- Modal footer -->
        <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
            <x-button  type="button" @click="hide()"
                class="w-full py-3 tracking-wide capitalize transition-colors duration-200 transform bg-white sm:w-40 ring-1 ring-brand-purple-500 hover:ring-0 hover:text-black hover:bg-brand-yellow-500">
                <span class="mx-1">Cancel</span>
            </x-button>
            <x-button  type="button" @click="sendInvitation(); hide();"
                class="w-full py-3 tracking-wide text-white capitalize transition-colors duration-200 transform sm:w-40 bg-brand-purple-500 hover:bg-brand-yellow-500 hover:text-black">
                Send
            </x-button>
        </div>
    </x-flowbite-modal>

    <x-flowbite-modal id="successModal" title="Send Invitation" closable="false">\
        <!-- Modal body -->
        <div class="p-6 flex flex-col justify-center items-center">
            <i class="fa-regular fa-circle-check text-brand-purple-500 text-9xl"></i>
            <div class="mt-4">
                <span class="font-bold">Invitation has been sent</span>
            </div>
        </div>
        <!-- Modal footer -->
        <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
            <x-button  type="button" @click="hide()"
                class="w-full py-3 tracking-wide text-white capitalize transition-colors duration-200 transform sm:w-40 bg-brand-purple-500 hover:bg-brand-yellow-500 hover:text-black">
                OK
            </x-button>
        </div>
    </x-flowbite-modal>

    <x-flowbite-modal id="failedModal" title="Send Invitation" closable="false">\
        <!-- Modal body -->
        <div class="p-6 flex flex-col justify-center items-center">
            <i class="fa-regular fa-circle-xmark text-brand-purple-500 text-9xl"></i>
            <div class="mt-4">
                <span class="font-bold">Invitation not sent</span>
            </div>
        </div>
        <!-- Modal footer -->
        <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
            <x-button  type="button" @click="hide()"
                class="w-full py-3 tracking-wide text-white capitalize transition-colors duration-200 transform sm:w-40 bg-brand-purple-500 hover:bg-brand-yellow-500 hover:text-black">
                OK
            </x-button>
        </div>
    </x-flowbite-modal>
</x-member-layout>


