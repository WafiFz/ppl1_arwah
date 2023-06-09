<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <x-library.lightbox />
    
    @stack('before-styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    @stack('after-styles')

    <title>Invitation</title>

    <x-google-analytics />
</head>
<body class="">
    <nav id="main-nav" class="absolute top-0 z-50 w-3/4 text-white -translate-x-1/2 shadow-md xl:w-1/2 left-1/2 bg-brand-purple-900 rounded-b-md"
         x-data="{ showMobileNav: false }">
        <div id="nav-light" class="container py-2">
            <div class="relative flex items-center justify-center">
                <div class="items-center justify-center invisible hidden py-2 sm:hidden"
                    :class="{'!flex !visible !opacity-100': showMobileNav}">
                    <a href="{{ route('home') }}" class="block">
                        <img class="w-auto h-5 " src="{{asset('img/logo-dark.svg')}}" alt="{{ app_name() }}">
                    </a>
                </div>
                {{-- <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button @click="showMobileNav = !showMobileNav" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-brand-purple-500 hover:text-white hover:bg-brand-purple-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">{{__('Open main menu')}}</span>
                        <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div> --}}
                <div class="items-center content-center justify-center flex-1 hidden sm:flex">
                    <div class="hidden sm:block">
                        <div class="flex gap-x-4">
                            <a href="{{ route('frontend.posts.index') }}" class="px-3 py-2 text-base font-medium transition duration-300 ease-out border-b-2 border-transparent hover:border-brand-purple-500">
                                Mempelai
                            </a>
                            <a href="{{ route('frontend.categories.index') }}" class="px-3 py-2 text-base font-medium transition duration-300 ease-out border-b-2 border-transparent hover:border-brand-purple-500">
                                Acara
                            </a>
                            <div class="flex items-center flex-shrink-0">
                                <a href="{{ route('home') }}" class="block lg:hidden">
                                    <img class="w-auto h-5 " src="{{asset('img/logo-dark.svg')}}" alt="{{ app_name() }}">
                                </a>
                                <a href="{{ route('home') }}" class="hidden lg:block">
                                    <img class="w-auto h-5 " src="{{asset('img/logo-with-text-dark.svg')}}" alt="{{ app_name() }}">
                                </a>
                            </div>
                            <a href="{{ route('frontend.tags.index') }}" class="px-3 py-2 text-base font-medium transition duration-300 ease-out border-b-2 border-transparent hover:border-brand-purple-500">
                                Galeri
                            </a>
                            <a href="{{ route('frontend.comments.index') }}" class="px-3 py-2 text-base font-medium transition duration-300 ease-out border-b-2 border-transparent hover:border-brand-purple-500">
                                Ucapan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="w-full sm:hidden" id="mobile-menu" x-show="showMobileNav" @click.away="showMobileNav = false" x-transition:enter="transition ease-out duration-100 transform" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
            <div class="px-2 pt-2 pb-3 space-y-1 shadow-lg ring-1 ring-black ring-opacity-5">
                <a href="{{ route('frontend.posts.index') }}" class="block px-3 py-2 text-base font-medium rounded-md">
                    {{__('Posts')}}
                </a>
                <a href="{{ route('frontend.categories.index') }}" class="block px-3 py-2 text-base font-medium rounded-md">
                    {{__('Categories')}}
                </a>
                <a href="{{ route('frontend.tags.index') }}" class="block px-3 py-2 text-base font-medium rounded-md">
                    {{__('Tags')}}
                </a>
                <a href="{{ route('frontend.comments.index') }}" class="block px-3 py-2 text-base font-medium rounded-md">
                    {{__('Comments')}}
                </a>
            </div>
        </div>
        <div class="absolute w-1/2 -translate-x-1/2 shadow-md bg-brand-purple-900 rounded-b-md top-full left-1/2 sm:hidden">
            <button type="button" class="block mx-auto" @click="showMobileNav = !showMobileNav">
                <i class="text-white fa-sharp fa-solid fa-caret-down"></i>
            </button>
        </div>
    </nav>
    <section class="relative bg-[url('/img/wedding-hero.jpg')] bg-cover">
        <div class="container relative grid min-h-screen place-items-center">
            <div class="absolute z-40 text-center text-white md:w-1/2">
                <h1 class="mb-6">Romeo & Juliet</h1>
                <div class="flex flex-col w-full text-center md:flex-row">
                    <div class="grid grid-cols-2 px-2 border-2 border-white divide-y md:w-2/5">
                        <div class="p-4">
                            <h4 class="mb-0">20</h4>
                            <span>Hari</span>
                        </div>
                        <div class="p-4">
                            <h4 class="mb-0">20</h4>
                            <span>Jam</span>
                        </div>
                        <div class="p-4">
                            <h4 class="mb-0">20</h4>
                            <span>Menit</span>
                        </div>
                        <div class="p-4">
                            <h4 class="mb-0">20</h4>
                            <span>Detik</span>
                        </div>
                    </div>
                    <div class="grid p-2 border-2 border-t-0 place-items-center md:border-t-2 md:border-l-0 md:w-3/5">
                        <div>
                            <h4 class="mb-0">Save the date</h4>
                            <span>20 Maret 2023</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-40"></div>
    </section>
    <section class="">
        <div class="container py-12 text-center">
            <h2>The Wedding of Romeo & Juliet</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nisl ipsum, tempor ac aliquam posuere, commodo id neque. Nullam commodo finibus ante at vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nisl ipsum, tempor ac aliquam posuere, commodo id neque. Nullam commodo finibus ante at vestibulum.</p>
        </div>
        <div class="relative text-white xl:flex">
            <div class="w-full gap-3 p-4 max-xl:pb-8 bg-brand-purple-900 sm:flex h-fit">
                <h3 class="uppercase sm:vertical-lr sm:text-justify sm:text-justify-last">
                    <span class="justify-between font-light xl:flex">
                        <span>T</span><span>h</span><span>e</span>
                    </span>
                    <span class="justify-between xl:flex">
                        <span>G</span><span>r</span><span>o</span><span>o</span><span>m</span>
                    </span>
                </h3>
                <img class="object-cover mt-3 mb-5 sm:m-0 aspect-square sm:max-w-xs xl:max-w-[220px]" src="https://source.unsplash.com/X657fvd3smo" alt="">
                <div class="w-full mt-5 sm:mt-0">
                    <h4 class="md:text-3xl">Romeo Lalala, S.Kom</h4>
                    <p class="m-0">Anak dari Bpk. Lali</p>
                    <p class="m-0"><i class="mr-1.5 fa-brands fa-instagram text-brand-yellow-500"></i>romeo.id</p>
                </div>
            </div>
            <div class="flex-row-reverse w-full gap-3 p-4 max-xl:pt-8 bg-brand-purple-900 sm:flex h-fit">
                <h3 class="uppercase sm:vertical-rl sm:text-justify sm:text-justify-last">
                    <span class="justify-between font-light xl:flex">
                        <span>T</span><span>h</span><span>e</span>
                    </span>
                    <span class="justify-between xl:flex">
                        <span>B</span><span>r</span><span>i</span><span>d</span><span>e</span>
                    </span>
                </h3>
                <img class="object-cover mt-3 mb-5 sm:m-0 aspect-square sm:max-w-xs xl:max-w-[220px]" src="https://source.unsplash.com/MMNgGsFEbuI" alt="">
                <div class="w-full mt-5 sm:mt-0 sm:text-end">
                    <h4 class="md:text-3xl">Romeo Lalala, S.Kom</h4>
                    <p class="m-0">Anak dari Bpk. Lali</p>
                    <p class="m-0"><i class="mr-1.5 fa-brands fa-instagram text-brand-yellow-500"></i>romeo.id</p>
                </div>
            </div>
            <img src="{{ asset("img/flowers.png")}}" alt="" class="absolute -translate-x-1/2 -translate-y-1/2 w-28 top-1/2 left-1/2">
        </div>
    </section>
    <section class="relative py-12">
        <div class="container">
            <h2 class="text-center">Save the Date</h2>
            <div class="relative my-3 divider">
                <hr class="h-[1px] inline-block w-full border-0 bg-gray-700">
                <img class="absolute -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2" src="{{asset('img/flower.png')}}" alt="">
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2">
                <div>
                    <h3>Akad Nikah</h3>
                    <p>
                        12 Desember 2022 <br> 08.00 - 09.00 <br> Location, Indonesia
                    </p>
                </div>
                <div class="text-end">
                    <h3>Resepsi</h3>
                    <p>
                        12 Desember 2022 <br> 08.00 - 09.00 <br> Location, Indonesia
                    </p>
                </div>
                <div>
                    <h3>Event 3</h3>
                    <p>
                        12 Desember 2022 <br> 08.00 - 09.00 <br> Location, Indonesia
                    </p>
                </div>
                <div class="text-end">
                    <h3>Event 4</h3>
                    <p>
                        12 Desember 2022 <br> 08.00 - 09.00 <br> Location, Indonesia
                    </p>
                </div>
            </div>
            <div class="relative my-3 divider">
                <hr class="h-[1px] inline-block w-full border-0 bg-gray-700">
                <img class="absolute -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2" src="{{asset('img/flower.png')}}" alt="">
            </div>
            <div class="flex flex-col justify-between gap-3 sm:flex-row">
                <div class="w-full">
                    <h3>Lokasi</h3>
                    <p>Gedung PPBS D</p>
    
                    <p>Jl. Raya Bandung Sumedang KM.21, Hegarmanah, Kec. Jatinangor, Kabupaten Sumedang, Jawa Barat 45363</p>

                    <x-button class="py-3 mt-4 text-white bg-brand-purple-500 hover:bg-brand-purple-600"><i class="mr-2 fa-solid fa-calendar"></i>Simpan acara ke kalender</x-button>
                </div>
                <iframe class="w-full aspect-square min-w-[250px] max-w-xs" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7024030526295!2d107.77211317486105!3d-6.926132093073627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e653eb17e239%3A0xc6192a1f92aa9e41!2sPadjadjaran%20University!5e0!3m2!1sen!2sid!4v1682163086134!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <img class="absolute top-0 left-0 hidden w-40 sm:block" src="{{asset('img/corner-flowers.png')}}" alt="">
        <img class="absolute bottom-0 right-0 w-40 rotate-180" src="{{asset('img/corner-flowers.png')}}" alt="">
    </section>
    <section class="py-12 text-white bg-brand-purple-900">
        <div class="flex flex-col gap-3 sm:flex-row">
            <hr class="self-start inline-block w-3/4 h-2 m-0 bg-gray-500 border-0 rounded-r-full sm:w-full">
            <div class="w-full text-center"><h2>Kisah Cinta Kita</h2></div>
            <hr class="self-end inline-block w-3/4 h-2 m-0 bg-gray-500 border-0 rounded-l-full sm:w-full">
        </div>
        <div class="container mt-8">
            <div class="flex flex-col items-center gap-6 sm:flex-row">
                <div class="p-4 font-bold text-center text-black bg-white sm:max-md:w-1/2 md:w-1/3">
                    <img class="object-cover w-full aspect-square" src="{{asset('img/wedding-hero.jpg')}}" alt="">
                    <div>-2020-</div>
                    <div class="mt-2 text-3xl uppercase">engaged</div>
                </div>
                <div class="sm:max-md:w-1/2 md:w-2/3">
                    <q class="text-3xl lg:text-4xl text-brand-yellow-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi</q>
                </div>
            </div>
        </div>
    </section>
    <section class="py-8 bg-neutral-100">
        <div class="container">
            <h2 class="text-center">Gallery</h2>
            <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-4">
                @for ($i=0; $i<4; $i++)
                    <div class="grid gap-4">
                        @for ($j=0; $j<3; $j++)
                            <div>
                                <img class="h-auto max-w-full rounded-lg" src="{{"https://source.unsplash.com/random/?wedding&".$i.$j}}" alt="">
                            </div>
                        @endfor
                    </div>
                @endfor
            </div>
        </div>
    </section>
    {{-- <section id="gallery" class="py-8 splide">
        <div class="container">
            <h2 class="text-center">Gallery</h2>
            <div class="mt-3 splide__track">
                <ul class="splide__list">
                    @for ($i=0; $i<7; $i++)
                        <li class="splide__slide"><a href="{{"https://source.unsplash.com/random/?wedding&".$i}}" data-lightbox="gallery"><img class="object-cover w-full h-full" src={{"https://source.unsplash.com/random/?wedding&".$i}} alt=""></a></li>
                    @endfor
                </ul>
            </div>
        </div>
    </section> --}}
    <section class="py-8">
        <div class="container">
            <div class="px-4 py-8 text-white rounded-lg bg-brand-purple-900">
                <h2 class="text-center">Konfirmasi Kehadiranmu</h2>
                <div class="gap-3 mt-5 lg:flex">
                    <div class="mb-3 lg:w-full">
                        <x-form.label for="nama" class="text-white">Nama Lengkap</x-form.label>
                        <x-form.input
                            type="text"
                            id="nama"
                            name="nama"
                            placeholder="Masukkan nama lengkap anda disini"
                        />
                    </div>
                    <div class="gap-3 lg:w-full sm:flex">
                        <div class="mb-3 lg:w-full">
                            <x-form.label for="jumlah" class="text-white">Jumlah Orang</x-form.label>
                            <x-form.input
                                type="number"
                                id="jumlah"
                                name="jumlah"
                                placeholder="Masukkan jumlah yang hadir"
                            />
                        </div>
                        <div class="w-full mb-5">
                            <x-form.label for="kehadiran" class="text-white">Kehadiran</x-form.label>
                            <x-form.select id="kehadiran" name="kehadiran" >
                                <option selected disabled>Pilih Kehadiran</option>
                                <option value="hadir">Hadir</option>
                                <option value="tidak">Tidak Hadir</option>
                            </x-form.select>
                        </div>
                    </div>
                </div>
                <x-button type="button" class="w-full text-black bg-brand-yellow-500 hover:bg-brand-yellow-600 focus:ring-4 focus:ring-brand-yellow-100">Konfirmasi Kehadiran</x-button>
            </div>
        </div>
    </section>
    <section class="py-8">
        <div class="container">
            <h2 class="mb-4 text-center">Wishes & Gifts</h2>
            <div class="grid grid-cols-1 gap-3 lg:grid-cols-2">
                <div class="p-4 rounded-lg bg-neutral-100 lg:w-full">
                    <div class="mb-3">
                        <x-form.label for="nama">Nama</x-form.label>
                        <x-form.input
                            type="text"
                            id="nama"
                            name="nama"
                            placeholder="Masukkan Nama Pengirim"
                        />
                    </div>
                    <div class="mb-3">
                        <x-form.label for="ucapan">Ucapan</x-form.label>
                        <x-form.textarea
                            id="ucapan"
                            name="ucapan"
                            rows="4"
                            placeholder="Tuliskan ucapan anda disini"
                        />
                    </div>
                    <div class="flex items-center gap-1.5 mb-3">
                        <x-form.checkbox id="anonymous"/>
                        <x-form.label for="anonymous" class="!mb-0">Kirim tanpa nama</x-form.label>
                    </div>
                    <x-button class="w-full text-white bg-brand-purple-900 hover:bg-brand-yellow-500 focus:ring-4 focus:ring-brand-yellow-500">Kirim</x-button>
                </div>
                <div class="p-4 rounded-lg bg-neutral-100 lg:w-full">
                    <div class="flex flex-col max-h-[303.2px] overflow-y-scroll">
                        <div class="mb-3">
                            <p class="m-0">Dari: <strong>Alfadli</strong></p>
                            <x-form.textarea rows="4"/>
                        </div>
                        <div class="mb-3">
                            <p class="m-0">Dari: <strong>Alfadli</strong></p>
                            <x-form.textarea rows="4"/>
                        </div>
                        <div class="mb-3">
                            <p class="m-0">Dari: <strong>Alfadli</strong></p>
                            <x-form.textarea rows="4"/>
                        </div>
                        <div class="mb-3">
                            <p class="m-0">Dari: <strong>Alfadli</strong></p>
                            <x-form.textarea rows="4"/>
                        </div>
                    </div>
                </div>
                <div class="p-4 text-white rounded-lg bg-brand-purple-900 lg:col-span-2">
                    <div class="flex flex-col gap-4 lg:items-center lg:flex-row">
                        <div class="flex items-center gap-2 lg:min-w-fit">
                            <i class="text-[2rem] lg:text-6xl fa-solid fa-gift text-brand-yellow-500"></i>
                            <h3>Send your <br class="max-lg:hidden">best gift</h3>
                        </div>
                        <p class="m-0 lg:flex-grow">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nisl ipsum, tempor ac aliquam posuere, commodo id neque. Nullam commodo finibu</p>
                        <x-button class="w-full text-black lg:w-1/4 bg-brand-yellow-500 hover:bg-brand-yellow-600 focus:ring-4 focus:ring-brand-yellow-100">Send now!</x-button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="flex justify-center py-8 bg-neutral-100">
        Made by invits.co
    </footer>
    
    @stack('before-scripts')
    <script src="{{ mix('js/frontend.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script>
    <script src="https://kit.fontawesome.com/b249d00227.js" crossorigin="anonymous"></script>

    <script>
        function sidebar() {
            const breakpoint = 1280
            return {
                open: {
                    above: true,
                    below: false,
                },
                isAboveBreakpoint: window.innerWidth > breakpoint,

                handleResize() {
                    this.isAboveBreakpoint = window.innerWidth > breakpoint
                },
                isOpen() {
                    if (this.isAboveBreakpoint) {
                        return this.open.above
                    }
                    return this.open.below
                },
                handleOpen() {
                    if (this.isAboveBreakpoint) {
                        this.open.above = true
                    }
                    this.open.below = true
                },
                handleClose() {
                    if (this.isAboveBreakpoint) {
                        this.open.above = false
                    }
                    this.open.below = false
                },
                handleAway() {
                    if (!this.isAboveBreakpoint) {
                        this.open.below = false
                    }
                },
            }
        }

        new Splide( '.splide', {
            type: 'loop',
            autoplay: true,
            pauseOnHover: true,
            interval: 3000,
            gap: "10px",
            mediaQuery: 'min',
            padding: { left: '3rem', right: '3rem' },
            breakpoints: {
                640: {
                    perPage: 2,
                },
                1024: {
                    perPage: 3,
                },
                1280: {
                    perPage: 4,
                }
            },
        } ).mount();
    </script>
    <script>
        
    </script>
    
    <!-- font awesome -->
    @stack('after-scripts')
</body>
</html>