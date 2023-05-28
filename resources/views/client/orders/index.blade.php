<x-member-layout title="Orders">
    <main class="py-3 bg-white grow">
        <div class="container">
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
                                class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search" required>
                            <button type="submit"
                                class="absolute top-0 right-0 h-full px-6 py-2 text-sm font-medium text-white rounded-r-lg bg-brand-purple-500 hover:bg-brand-yellow-500">Search</button>
                        </div>
                    </form>
                </div>
                {{-- <x-button class="px-6 py-3 bg-brand-purple-100"><i class="mr-2 fa-solid fa-filter"></i>Filter</x-button> --}}
            </div>
            <div class="relative my-5 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Pemesanan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                URL
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tema
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nota
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Undangan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($data['orders'] as $order)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-search-3" type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                                        <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    <?php echo $i; $i++; ?>
                                </th>
                                <td class="px-6 py-4">
                                    {{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($order->status != "UNPAID")
                                    <a href="{{ "../" . $order->invitation->slug }}" target="_blank"> {{ $order->invitation->slug }} </a>
                                    @else
                                    {{ "BELUM MEMBAYAR" }}
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->theme->name }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($order->status != "UNPAID")
                                        {{ $order->invitation->status }}
                                    @else
                                        {{ "UNPAID" }}
                                    @endif
                                </td>
                                @if($order->status != "UNPAID")
                                <td class="px-6 py-4">
                                    <a href="{{ route('client.ordersDetail', $order->id) }}"
                                        class="font-medium text-brand-pink hover:underline">Details</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('client.editInvitation', $order->id) }}"
                                        class="font-medium text-brand-purple-500 hover:underline">Details</a>
                                </td>
                                @else
                                <td class="px-6 py-4">
                                    -
                                </td>
                                <td class="px-6 py-4">
                                    -
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $data['orders']->links() }}

            {{-- <div class="flex items-center justify-between mt-5 bg-white">
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
                            <span class="font-medium">97</span>
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
            </div> --}}

        </div>
    </main>
    @push('before-scripts')
        <script>
            function form() {
                const user = @json(auth()->user()->profile);
                return {
                    edit: false,
                    form: {
                        ...user,
                        date_of_birth: ((user.date_of_birth).split("T"))[0],
                    },
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
                        this.form = {
                            ...user,
                            date_of_birth: ((user.date_of_birth).split("T"))[0],
                        };
                        this.edit = false;
                    }
                }
            }
        </script>
    @endpush
</x-member-layout>
