<x-app-layout title="Home">
    <section class="flex items-start h-auto py-10 grow">
        <div class="container">
            <div class="text-4xl font-bold text-center grow">
                Pusat Bantuan
            </div>
            <div class="mt-4 text-xl text-center from-neutral-600 grow">
                Punya pertanyaan? Kami siap membantu anda
            </div>
            <div class="flex flex-row items-center justify-center mx-auto mt-4">
                <div class="w-585px">
                    <form>   
                        <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <input type="search" id="search" class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-2xl focus:ring-blue-500 focus:border-blue-500" placeholder="Search" required>
                            <button type="submit" class="absolute top-0 right-0 h-full px-6 py-2 text-sm font-medium text-white rounded-r-2xl bg-brand-purple-500 hover:bg-brand-yellow-500">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="grid gap-6 py-8 sm:grid-cols-2">
                <x-button-a href="" class="flex flex-col items-center justify-center h-48 p-6 text-center rounded-2xl bg-brand-purple-100 sm:flex-row sm:text-start">
                    <i class="ml-0 sm:ml-6 fa-solid fa-cogs" style="font-size:4rem"></i>
                    <h5 class="py-5 text-xl font-medium text-gray-900 sm:ml-6">
                        Terms and Condition
                    </h5>
                </x-button-a>
                <x-button-a href="" class="flex flex-col items-center justify-center h-48 p-6 text-center rounded-2xl bg-brand-purple-100 sm:flex-row sm:text-start">
                    <i class="ml-0 sm:ml-6 fa-solid fa-cogs" style="font-size:4rem"></i>
                    <h5 class="py-5 text-xl font-medium text-gray-900 sm:ml-6">
                        Privacy Policy
                    </h5>
                </x-button-a>
            </div>
            <div class="mt-8 text-3xl font-bold grow">
                Guide Aplikasi
            </div>
            <div class="grid gap-6 py-8 sm:grid-cols-2 lg:grid-cols-4">
                <x-button-a href="" class="flex-col h-64 p-6 rounded-2xl bg-brand-purple-100 "> 
                    <i class=" fa-solid fa-cogs" style="font-size:4rem"></i>
                    <h5 class="py-5 text-xl font-medium text-gray-900">
                        Pertolongan
                    </h5>
                </x-button-a>
                <x-button-a href="" class="flex-col h-64 p-6 rounded-2xl bg-brand-purple-100 "> 
                    <i class=" fa-solid fa-cogs" style="font-size:4rem"></i>
                    <h5 class="py-5 text-xl font-medium text-gray-900">
                        Pertolongan
                    </h5>
                </x-button-a>
                <x-button-a href="" class="flex-col h-64 p-6 rounded-2xl bg-brand-purple-100 "> 
                    <i class=" fa-solid fa-cogs" style="font-size:4rem"></i>
                    <h5 class="py-5 text-xl font-medium text-gray-900">
                        Pertolongan
                    </h5>
                </x-button-a>
                <x-button-a href="" class="flex-col h-64 p-6 rounded-2xl bg-brand-purple-100 "> 
                    <i class=" fa-solid fa-cogs" style="font-size:4rem"></i>
                    <h5 class="py-5 text-xl font-medium text-gray-900">
                        Pertolongan
                    </h5>
                </x-button-a>
            </div>
            <div class="mt-8 text-3xl font-bold text-center grow">
                Frequently Ask Question
            </div>
            <div>
                <button onclick="this.classList.toggle('faqItem-cascaded')" class="flex items-center justify-between w-full py-3 mt-6 text-xl font-medium tracking-wide text-white rounded-t-lg text-start px-11 bg-brand-purple-500 focus:outline-none faqItem-cascaded">
                    <span>Bagaimana cara membuat undangan?</span><i class="fa-solid fa-chevron-up" style="color: #ffffff;"></i>
                </button>
                <div class="py-3 text-base font-medium tracking-wide text-black rounded-b-lg bg-brand-purple-100 px-11">
                    <p>
                        Lorem ipsum dolor sit amet consectetur. Cursus pellentesque id id tristique pellentesque. Lorem ipsum dolor sit amet consectetur. Cursus pellentesque id id tristique pellentesque.
                    </p>
                </div>
            </div>
            <div>
                <button onclick="this.classList.toggle('faqItem-cascaded')" class="flex items-center justify-between w-full py-3 mt-6 text-xl font-medium tracking-wide text-white rounded-t-lg text-start px-11 bg-brand-purple-500 focus:outline-none faqItem-cascaded">
                    <span>Bagaimana cara membuat undangan?</span><i class="fa-solid fa-chevron-up" style="color: #ffffff;"></i>
                </button>
                <div class="py-3 text-base font-medium tracking-wide text-black rounded-b-lg bg-brand-purple-100 px-11">
                    <p>
                        Lorem ipsum dolor sit amet consectetur. Cursus pellentesque id id tristique pellentesque. Lorem ipsum dolor sit amet consectetur. Cursus pellentesque id id tristique pellentesque.
                    </p>
                </div>
            </div>
            <div class="mt-8 text-base font-bold text-center underline grow">
                <a href="javascript:void">See More FAQ</a>
            </div>
        </div>
    </section>
    <div class="flex flex-col items-center justify-center py-16 mt-8 text-center bg-brand-purple-100 lg:flex-row lg:text-start">
        <img class="mx-24" src="/img/faq-question.svg" width=402 height=283 alt="image">
        <div class="flex flex-col items-center justify-center">
            <div class="mt-8 text-3xl font-bold text-center grow">
                Anda masih punya pertanyaan?
            </div>
            <x-button-a href="" class="py-3 mt-6 tracking-wide text-white capitalize transition-colors duration-200 transform w-fit bg-brand-purple-500 ring-1 ring-brand-purple-500 hover:ring-0 hover:text-black hover:bg-brand-yellow-500">
                <span class="mx-1">Hubungi Kami</span>
            </x-button-a>
        </div>
    </div>
</x-app-layout>