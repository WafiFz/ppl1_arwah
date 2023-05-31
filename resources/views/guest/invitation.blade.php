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

    <title>Invitations</title>

    <x-google-analytics />
</head>
<body class="">
    <x-flowbite-modal id="giftModal" title="Kirim Hadiah" closable="true">
        <!-- Modal body -->
        <div class="p-6 flex flex-col justify-center items-center">
            <div class="mt-4">
                <span class="font-bold text-3xl">Transfer ke</span>
            </div>
            {{-- <div class="mt-4 text-center">
                <img class="object-contain h-30 w-60" src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" alt="logoBCA"/>
            </div> --}}
            <div class="mt-4 text-center">
                <span class="font-bold text-3xl">{{ $data['wedding']->rekening_gift }}</span>
            </div>
        </div>
    </x-flowbite-modal>
    
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
                            <a href="#mempelai" class="px-3 py-2 text-base font-medium transition duration-300 ease-out border-b-2 border-transparent hover:border-brand-purple-500">
                                Mempelai
                            </a>
                            <a href="#acara" class="px-3 py-2 text-base font-medium transition duration-300 ease-out border-b-2 border-transparent hover:border-brand-purple-500">
                                Acara
                            </a>
                            <div class="flex items-center flex-shrink-0">
                                <a href="{{ route('home') }}" class="block lg:hidden" target="__blank">
                                    <img class="w-auto h-5 " src="{{asset('img/logo-dark.svg')}}" alt="{{ app_name() }}">
                                </a>
                                <a href="{{ route('home') }}" class="hidden lg:block" target="__blank">
                                    <img class="w-auto h-5 " src="{{asset('img/logo-with-text-dark.svg')}}" alt="{{ app_name() }}">
                                </a>
                            </div>
                            <a href="#galeri" class="px-3 py-2 text-base font-medium transition duration-300 ease-out border-b-2 border-transparent hover:border-brand-purple-500">
                                Galeri
                            </a>
                            <a href="#ucapan" class="px-3 py-2 text-base font-medium transition duration-300 ease-out border-b-2 border-transparent hover:border-brand-purple-500">
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
                <a href="#mempelai" class="block px-3 py-2 text-base font-medium rounded-md">
                    {{__('Mempelai')}}
                </a>
                <a href="#acara" class="block px-3 py-2 text-base font-medium rounded-md">
                    {{__('Acara')}}
                </a>
                <a href="#galeri" class="block px-3 py-2 text-base font-medium rounded-md">
                    {{__('Galeri')}}
                </a>
                <a href="#ucapan" class="block px-3 py-2 text-base font-medium rounded-md">
                    {{__('Ucapan')}}
                </a>
            </div>
        </div>
        <div class="absolute w-1/2 -translate-x-1/2 shadow-md bg-brand-purple-900 rounded-b-md top-full left-1/2 sm:hidden">
            <button type="button" class="block mx-auto" @click="showMobileNav = !showMobileNav">
                <i class="text-white fa-sharp fa-solid fa-caret-down" :class="showMobileNav ? 'rotate-180' : ''"></i>
            </button>
        </div>
    </nav>
    <section class="relative bg-[url('/img/wedding-hero.jpg')] bg-cover">
        <div class="container relative grid min-h-screen place-items-center">
            <div class="absolute z-40 text-center text-white md:w-1/2">
                <h1 class="mb-6">{{ $data['wedding']->bride->name . " & " . $data['wedding']->groom->name }}</h1>
                <div class="flex flex-col w-full text-center md:flex-row">
                    @php
                        // 1973-03-23 00:00:00 ---> 1973-03-23 03:51:42
                        $startDate = explode(" ",$data['wedding']->event[0]->date)[0] . " " . $data['wedding']->event[0]->start_time;
                    @endphp
                    <div x-data="countdown('{{ $startDate }}')" x-init="init()"
                    class="grid grid-cols-2 px-2 border-2 border-white divide-y md:w-2/5">
                        <div class="p-4">
                            <h4 class="mb-0" x-text=" remainingTimes.hari "></h4>
                            <span>Hari</span>
                        </div>
                        <div class="p-4">
                            <h4 class="mb-0" x-text="remainingTimes.jam "></h4>
                            <span>Jam</span>
                        </div>
                        <div class="p-4">
                            <h4 class="mb-0" x-text="remainingTimes.menit "></h4>
                            <span>Menit</span>
                        </div>
                        <div class="p-4">
                            <h4 class="mb-0" x-text="remainingTimes.detik "></h4>
                            <span>Detik</span>
                        </div>
                    </div>
                    <div class="grid p-2 border-2 border-t-0 place-items-center md:border-t-2 md:border-l-0 md:w-3/5">
                        <div>
                            <h4 class="mb-0">Jangan lewatkan!</h4>
                            <span>@dateID($data['wedding']->event[0]->date)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-40"></div>
    </section>
    <a id="mempelai"></a>
    <section class="">
        <div class="container py-12 text-center">
            <h2>{{ $data['wedding']->title }}</h2>
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nisl ipsum, tempor ac aliquam posuere, commodo id neque. Nullam commodo finibus ante at vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nisl ipsum, tempor ac aliquam posuere, commodo id neque. Nullam commodo finibus ante at vestibulum.</p> --}}
        </div>
        {{-- <a id="mempelai"></a> --}}
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
                <img class="object-cover mt-3 mb-5 sm:m-0 aspect-square sm:max-w-xs xl:max-w-[220px]" src="{{ $data['wedding']->groom->image }}" alt="">
                <div class="w-full mt-5 sm:mt-0">
                    <h4 class="md:text-3xl">{{ $data['wedding']->groom->name }}</h4>
                    <p class="m-0">Anak dari Bpk. {{ $data['wedding']->groom->father }}</p>
                    <p class="m-0"><i class="mr-1.5 fa-brands fa-instagram text-brand-yellow-500"></i>{{ $data['wedding']->groom->instagram  }}</p>
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
                <img class="object-cover mt-3 mb-5 sm:m-0 aspect-square sm:max-w-xs xl:max-w-[220px]" src="{{ $data['wedding']->bride->image }}" alt="">
                <div class="w-full mt-5 sm:mt-0 sm:text-end">
                    <h4 class="md:text-3xl">{{ $data['wedding']->bride->name }}</h4>
                    <p class="m-0">Anak dari Bpk. {{ $data['wedding']->bride->father }}</p>
                    <p class="m-0"><i class="mr-1.5 fa-brands fa-instagram text-brand-yellow-500"></i>{{ $data['wedding']->bride->instagram  }}</p>
                </div>
            </div>
            <img src="{{ asset("img/flowers.png")}}" alt="" class="absolute -translate-x-1/2 -translate-y-1/2 w-28 top-1/2 left-1/2">
        </div>
    </section>
    <a id="acara"></a>
    <section class="relative py-12">
        <div class="container">
            {{-- <h2 class="text-center">Tanggal Penting</h2> --}}
            <div class="relative my-3 divider">
                <hr class="h-[1px] inline-block w-full border-0 bg-gray-700">
                <img class="absolute -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2" src="{{asset('img/flower.png')}}" alt="">
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2">
                <?php $i=0; ?>
                @foreach ($data['wedding']->event as $event)
                    @if($i%2 == 0)
                        <div>
                    @else
                        <div class="text-end">
                    @endif    
                            <h3>{{ $event->name }}</h3>
                            <p>
                                @dateID( $event->date ) <br> {{ $event->start_time }} - {{ $event->end_time }} <br> {{ $event->place }}
                            </p>
                        </div>
                <?php $i++; ?>
                @endforeach
            </div>
            <div class="relative my-3 divider">
                <hr class="h-[1px] inline-block w-full border-0 bg-gray-700">
                <img class="absolute -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2" src="{{asset('img/flower.png')}}" alt="">
            </div>
            <div class="flex flex-col justify-between gap-3 sm:flex-row">
                <div class="w-full">
                    <h3>Lokasi</h3>
                    {{-- <p>Gedung PPBS D</p> --}}
    
                    <p>{{ $data['wedding']->location }}</p>
                    @if($data['package']->name == 'Gold')
                    <x-button-a href="{{ $data['g_calendar'] }}" target="__blank" class="py-3 mt-4 text-white bg-brand-purple-500 hover:bg-brand-purple-600"><i class="mr-2 fa-solid fa-calendar"></i>Simpan acara ke kalender</x-button-a>
                    @endif
                </div>
                {{-- <iframe class="w-full aspect-square min-w-[250px] max-w-xs" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7024030526295!2d107.77211317486105!3d-6.926132093073627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e653eb17e239%3A0xc6192a1f92aa9e41!2sPadjadjaran%20University!5e0!3m2!1sen!2sid!4v1682163086134!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                <div class="w-40">
                    <a href="{{ $data['wedding']->location_gmap }}" target="__blank">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/></svg>
                    </a>
                </div>
            </div>
        </div>
        <img class="absolute top-0 left-0 hidden w-40 sm:block" src="{{asset('img/corner-flowers.png')}}" alt="">
        <img class="absolute bottom-0 right-0 w-40 rotate-180" src="{{asset('img/corner-flowers.png')}}" alt="">
    </section>
    <a id="galeri"></a>
    @if($data['package']->name == 'Gold')
    <section class="py-12 text-white bg-brand-purple-900">
        <div class="flex flex-col gap-3 sm:flex-row">
            <hr class="self-start inline-block w-3/4 h-2 m-0 bg-gray-500 border-0 rounded-r-full sm:w-full">
            <div class="w-full text-center"><h2>Kisah Cinta Kita</h2></div>
            <hr class="self-end inline-block w-3/4 h-2 m-0 bg-gray-500 border-0 rounded-l-full sm:w-full">
        </div>
        <section id="love-story" class="splide container mt-8 pb-[70px]" aria-label="Beautiful Images">
            <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($data['wedding']->love_story as $love_story )
                        <li class="splide__slide">
                            <div class="flex flex-col items-center gap-6 sm:flex-row">
                                <div class="p-4 font-bold text-center text-black bg-white sm:max-md:w-1/2 md:w-1/3">
                                    <img class="object-cover w-full aspect-square" src="{{asset($love_story->image)}}" alt="">
                                    <div>-{{ $love_story->year }}-</div>
                                    <div class="mt-2 text-3xl uppercase"></div>
                                </div>
                                <div class="sm:max-md:w-1/2 md:w-2/3">
                                    <p class="text-3xl lg:text-4xl text-brand-yellow-500">{{ $love_story->story }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
            </div>
        </section>
    </section>
    @endif
    @if($data['package']->name == 'Gold' || $data['package']->name == 'Silver')
    <section class="py-8 bg-neutral-100">
        <div class="container">
            <h2 class="text-center">Gallery</h2>
            <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-4">
                @foreach ($data['wedding']->gallery as $gallery)  
                    <div class="grid gap-4">
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="{{ $gallery->file }}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @if($data['package']->name == 'Gold' || $data['package']->name == 'Silver')
    <section class="py-8">
    <form method="POST" action="{{ route('rsvp') }}">
        @csrf

        <input type="hidden" name="invitation_id" value="{{ encode_id($data['invitation']->id) }}">

        <div class="container">
            <div class="px-4 py-8 text-white rounded-lg bg-brand-purple-900">
                <h2 class="text-center">Konfirmasi Kehadiranmu</h2>
                <div class="gap-3 mt-5 lg:flex">
                    <div class="mb-3 lg:w-full">
                        <x-form.label for="nama" class="text-white">Nama Lengkap</x-form.label>
                        <x-form.input
                            type="text"
                            id="nama"
                            name="name"
                            placeholder="Masukkan nama lengkap anda disini"
                        />
                    </div>
                    <div class="gap-3 lg:w-full sm:flex">
                        <div class="mb-3 lg:w-full">
                            <x-form.label for="jumlah" class="text-white">Jumlah Orang</x-form.label>
                            <x-form.input
                                type="number"
                                id="jumlah"
                                name="amount_guest"
                                placeholder="Masukkan jumlah yang hadir"
                            />
                        </div>
                        <div class="w-full mb-5">
                            <x-form.label for="kehadiran" class="text-white">Kehadiran</x-form.label>
                            <x-form.select id="kehadiran" name="is_attend" >
                                <option selected disabled>Pilih Kehadiran</option>
                                <option value="true">Hadir</option>
                                <option value="false">Tidak Hadir</option>
                            </x-form.select>
                        </div>
                    </div>
                </div>
                <x-button type="submit" class="w-full text-black bg-brand-yellow-500 hover:bg-brand-yellow-600 focus:ring-4 focus:ring-brand-yellow-100">Konfirmasi Kehadiran</x-button>
            </div>
        </div>
    </form>
    </section>
    @endif
    @if($data['package']->name == 'Gold')
    <a id="ucapan"></a>
    <section class="py-8">
        <form method="POST" action="{{ route('sendWish') }}">
        @csrf

        <input type="hidden" name="wedding_id" value="{{ encode_id($data['wedding']->id) }}">

        <div class="container">
            <h2 class="mb-4 text-center">Wishes & Gifts</h2>
            <div class="grid grid-cols-1 gap-3 lg:grid-cols-2">
                <div class="p-4 rounded-lg bg-neutral-100 lg:w-full">
                    <div class="mb-3">
                        <x-form.label for="name">Nama</x-form.label>
                        <x-form.input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Masukkan Nama Pengirim"
                        />
                    </div>
                    <div class="mb-3">
                        <x-form.label for="wish">Ucapan</x-form.label>
                        <x-form.textarea
                            id="wish"
                            name="wish"
                            rows="4"
                            placeholder="Tuliskan ucapan anda disini"
                        />
                    </div>
                    <div class="flex items-center gap-1.5 mb-3">
                        <x-form.checkbox id="anonymous" name="anonymous" value="true"/>
                        <x-form.label for="anonymous" class="!mb-0">Kirim tanpa nama</x-form.label>
                    </div>
                    <x-button class="w-full text-white bg-brand-purple-900 hover:bg-brand-yellow-500 focus:ring-4 focus:ring-brand-yellow-500">Kirim</x-button>
                </div>
                <div class="p-4 rounded-lg bg-neutral-100 lg:w-full">
                    <div class="flex flex-col max-h-[303.2px] overflow-y-scroll">
                        @foreach ($data['wedding']->wish as $wish )
                        <div class="mb-3">
                            <p class="m-0">Dari: <strong>{{ $wish->name }}</strong></p>
                            <x-form.textarea rows="4" value="{{ $wish->wish }}"  placeholder="{{ $wish->wish }}" :disabled="true" >{{ $wish->wish }}</x-form.textarea>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="p-4 text-white rounded-lg bg-brand-purple-900 lg:col-span-2">
                    <div class="flex flex-col gap-4 lg:items-center lg:flex-row">
                        <div class="flex items-center gap-2 lg:min-w-fit">
                            <i class="text-[2rem] lg:text-6xl fa-solid fa-gift text-brand-yellow-500"></i>
                            <h3>Send your <br class="max-lg:hidden">best gift</h3>
                        </div>
                        <p class="m-0 lg:flex-grow">Berikan kejutan yang tak terlupakan dengan hadiah istimewa.</p>
                        <x-button type="button" onclick="modals.giftModal.show()" class="w-full text-black lg:w-1/4 bg-brand-yellow-500 hover:bg-brand-yellow-600 focus:ring-4 focus:ring-brand-yellow-100">Send now!</x-button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
    @endif
    <footer class="flex justify-center py-8 bg-neutral-100">
        Made by invits.co
    </footer>
    
    @stack('before-scripts')
    <script>
        
        //https://codepen.io/harsh/pen/KKdEVPV
        function countdown(expiry) {
            return {
                expiry: new Date(expiry).getTime(),
                remaining:null,
                remainingTimes:null,
                init() {
                this.setRemaining()
                this.remainingTimes = this.time();
                setInterval(() => {
                    this.setRemaining();
                    this.remainingTimes = this.time();
                    //console.log(this.expiry);
                    //console.log(expiry);
                }, 1000);
                },
                setRemaining() {
                    const diff = this.expiry - new Date().getTime();
                    this.remaining =  parseInt(diff / 1000);
                },
                days() {
                return {
                    value:this.remaining / 86400,
                    remaining:this.remaining % 86400
                };
                },
                hours() {
                return {
                    value:this.days().remaining / 3600,
                    remaining:this.days().remaining % 3600
                };
                },
                minutes() {
                    return {
                    value:this.hours().remaining / 60,
                    remaining:this.hours().remaining % 60
                };
                },
                seconds() {
                    return {
                    value:this.minutes().remaining,
                };
                },
                format(value) {
                    return ("0" + parseInt(value)).slice(-2)
                },
                time(){
                    return {
                    hari:parseInt(this.days().value),
                    jam:parseInt(this.hours().value),
                    menit:parseInt(this.minutes().value),
                    detik:parseInt(this.seconds().value),
                }
                },
            }
        }

    </script>
    <script src="{{ mix('js/frontend.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script>
    <script src="https://kit.fontawesome.com/b249d00227.js" crossorigin="anonymous"></script>
    <script>
        let splide = new Splide( '#love-story', {
            type: 'loop',
            autoplay: true,
            pauseOnHover: true,
            interval: 3000, 
            gap: 24,
            perPage:1,
        } );

        splide.on( 'pagination:mounted', function ( data ) {
        // You can add your class to the UL element
            // console.log(data.items[0])
            // data.list.classList.add( 'lovestory-pagination' );

            // `items` contains all dot items
            data.items.forEach( function ( item ) {
                let splideProgressBar = document.createElement("div");
                splideProgressBar.classList.add('lovestory-progress-bar');
                item.button.classList.add( 'lovestory-pagination' );
                item.button.appendChild(splideProgressBar);
                // item.button.textContent = String( item.page + 1 );
            } );
        } );

        splide.mount();
        
    </script>
    {{-- <script>
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

    </script> --}}
    
    <!-- font awesome -->
    @stack('after-scripts')

    
</body>
</html>