<x-app-layout title="Home">
    <section class="flex grow items-start h-auto py-10">
        <div class="container">
            <div class="text-center text-4xl font-bold grow">
                Pusat Bantuan
            </div>
            <div class="text-center text-xl from-neutral-600 grow mt-4">
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
                <x-button class="p-6 rounded-2xl bg-brand-purple-100 h-48 flex sm:flex-row flex-col text-center sm:text-start items-center justify-center">
                    <i class="ml-0 sm:ml-6 fa-solid fa-cogs" style="font-size:4rem"></i>
                    <h5 class="py-5 sm:ml-6 text-xl font-medium text-gray-900">
                        Terms and Condition
                    </h5>
                </x-button>
                <x-button class="p-6 rounded-2xl bg-brand-purple-100 h-48 flex sm:flex-row flex-col text-center sm:text-start items-center justify-center">
                    <i class="ml-0 sm:ml-6 fa-solid fa-cogs" style="font-size:4rem"></i>
                    <h5 class="py-5 sm:ml-6 text-xl font-medium text-gray-900">
                        Privacy Policy
                    </h5>
                </x-button>
            </div>
            <div class="text-3xl font-bold grow mt-8">
                Guide Aplikasi
            </div>
            <div class="grid gap-6 py-8 sm:grid-cols-2 lg:grid-cols-4">
                <x-button class="p-6 rounded-2xl bg-brand-purple-100 h-64 ">
                    <i class=" fa-solid fa-cogs" style="font-size:4rem"></i>
                    <h5 class="py-5 text-xl font-medium text-gray-900">
                        Pertolongan
                    </h5>
                </x-button>
                <x-button class="p-6 rounded-2xl bg-brand-purple-100 h-64 ">
                    <i class=" fa-solid fa-cogs" style="font-size:4rem"></i>
                    <h5 class="py-5 text-xl font-medium text-gray-900">
                        Pertolongan
                    </h5>
                </x-button>
                <x-button class="p-6 rounded-2xl bg-brand-purple-100 h-64 ">
                    <i class=" fa-solid fa-cogs" style="font-size:4rem"></i>
                    <h5 class="py-5 text-xl font-medium text-gray-900">
                        Pertolongan
                    </h5>
                </x-button>
                <x-button class="p-6 rounded-2xl bg-brand-purple-100 h-64 ">
                    <i class=" fa-solid fa-cogs" style="font-size:4rem"></i>
                    <h5 class="py-5 text-xl font-medium text-gray-900">
                        Pertolongan
                    </h5>
                </x-button>
            </div>
            <div class="text-center text-3xl font-bold grow mt-8">
                Frequently Ask Question
            </div>
            <div>
                <button onclick="this.classList.toggle('faqItem-cascaded')" class="rounded-t-lg w-full text-start font-medium text-xl py-3 px-11 mt-6 tracking-wide text-white bg-brand-purple-500 focus:outline-none flex items-center justify-between faqItem-cascaded">
                    <span>Bagaimana cara membuat undangan?</span><i class="fa-solid fa-chevron-up" style="color: #ffffff;"></i>
                </button>
                <div class="bg-brand-purple-100 px-11 py-3 rounded-b-lg text-base font-medium tracking-wide text-black">
                    <p>
                        Lorem ipsum dolor sit amet consectetur. Cursus pellentesque id id tristique pellentesque. Lorem ipsum dolor sit amet consectetur. Cursus pellentesque id id tristique pellentesque.
                    </p>
                </div>
            </div>
            <div>
                <button onclick="this.classList.toggle('faqItem-cascaded')" class="rounded-t-lg w-full text-start font-medium text-xl py-3 px-11 mt-6 tracking-wide text-white bg-brand-purple-500 focus:outline-none flex items-center justify-between faqItem-cascaded">
                    <span>Bagaimana cara membuat undangan?</span><i class="fa-solid fa-chevron-up" style="color: #ffffff;"></i>
                </button>
                <div class="bg-brand-purple-100 px-11 py-3 rounded-b-lg text-base font-medium tracking-wide text-black">
                    <p>
                        Lorem ipsum dolor sit amet consectetur. Cursus pellentesque id id tristique pellentesque. Lorem ipsum dolor sit amet consectetur. Cursus pellentesque id id tristique pellentesque.
                    </p>
                </div>
            </div>
            <div class="text-center text-base underline font-bold grow mt-8">
                <a href="javascript:void">See More FAQ</a>
            </div>
        </div>
    </section>
    <div class="mt-8 py-16 text-center bg-brand-purple-100 flex lg:flex-row flex-col text-center lg:text-start items-center justify-center">
        <img class="mx-24" src="/img/faq-question.svg" width=402 height=283 alt="image">
        <div class="flex flex-col justify-center items-center">
            <div class="text-center text-3xl font-bold grow mt-8">
                Anda masih punya pertanyaan?
            </div>
            <x-button-a href="" class="mt-6 w-fit py-3 tracking-wide capitalize transition-colors duration-200 transform bg-brand-purple-500 ring-1 ring-brand-purple-500 text-white hover:ring-0 hover:text-black hover:bg-brand-yellow-500">
                <span class="mx-1">Hubungi Kami</span>
            </x-button-a>
        </div>
    </div>
</x-app-layout>