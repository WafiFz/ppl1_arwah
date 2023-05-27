<x-member-layout title="RSVP">
    <main class="py-3 bg-white grow">
        <div class="container" >
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
                <x-button class="px-6 py-3 transition-colors duration-200 transform bg-brand-purple-100 ring-brand-purple-500 hover:text-black hover:bg-brand-yellow-500"><i class="mr-2 fa-solid fa-filter"></i>Filter</x-button>
            </div>
            <div class="relative my-5 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah Tamu
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Pengisian
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kehadiran
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td scope="row" class="w-4 p-4 font-bold text-gray-900 whitespace-nowrap">
                                001
                            </td>
                            <th class="px-6 py-4">
                                Wafi
                            </th>
                            <td class="px-6 py-4">
                                3
                            </td>
                            <td class="px-6 py-4">
                                Sabtu, 27 Mei 2023
                            </td>
                            <td class="px-6 py-4">
                                Hadir
                            </td>
                        </tr>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td scope="row" class="w-4 p-4 font-bold text-gray-900 whitespace-nowrap">
                                001
                            </td>
                            <th class="px-6 py-4">
                                Wafi
                            </th>
                            <td class="px-6 py-4">
                                3
                            </td>
                            <td class="px-6 py-4">
                                Sabtu, 27 Mei 2023
                            </td>
                            <td class="px-6 py-4">
                                Hadir
                            </td>
                        </tr>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td scope="row" class="w-4 p-4 font-bold text-gray-900 whitespace-nowrap">
                                001
                            </td>
                            <th class="px-6 py-4">
                                Wafi
                            </th>
                            <td class="px-6 py-4">
                                3
                            </td>
                            <td class="px-6 py-4">
                                Sabtu, 27 Mei 2023
                            </td>
                            <td class="px-6 py-4">
                                Hadir
                            </td>
                        </tr>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td scope="row" class="w-4 p-4 font-bold text-gray-900 whitespace-nowrap">
                                001
                            </td>
                            <th class="px-6 py-4">
                                Wafi
                            </th>
                            <td class="px-6 py-4">
                                3
                            </td>
                            <td class="px-6 py-4">
                                Sabtu, 27 Mei 2023
                            </td>
                            <td class="px-6 py-4">
                                Hadir
                            </td>
                        </tr>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td scope="row" class="w-4 p-4 font-bold text-gray-900 whitespace-nowrap">
                                001
                            </td>
                            <th class="px-6 py-4">
                                Wafi
                            </th>
                            <td class="px-6 py-4">
                                3
                            </td>
                            <td class="px-6 py-4">
                                Sabtu, 27 Mei 2023
                            </td>
                            <td class="px-6 py-4">
                                Hadir
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- {{ $data['guests']->links() }} --}}
            
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
            </div> --}}
        </div>
    </main>
</x-member-layout>


