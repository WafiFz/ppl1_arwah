<x-app-layout title="Order Summary">
    <section class="py-10">
        <div class="container">
            <div class="mx-auto w-fit">
                <h1 class="mt-0 mb-2 text-5xl font-medium leading-tight text-center">Ringkasan Pemesanan</h1>
                <div class="w-1/2 h-2 mx-auto rounded-md bg-brand-purple-500"></div>
            </div>
            <div class="py-5 mt-8 rounded-md px-7 bg-brand-purple-100">
                <div>
                    <strong>Nama</strong>
                    <p>Hali Putri Aisyah</p>
                </div>
                <div>
                    <strong>Email</strong>
                    <p>hahahihi@gmail.com</p>
                </div>
                <div>
                    <strong>Pilihan Paket</strong>
                    <div>
                        <p class="mb-1">Paket 1</p>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20"><path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"/></svg>
                            <span class="my-0 leading-tight">Deskripsi 1</span>
                        </div>
                        <div class="flex gap-2 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20"><path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"/></svg>
                            <span class="my-0 leading-tight">Deskripsi 2</span>
                        </div>
                        <div class="flex gap-2 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20"><path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"/></svg>
                            <span class="my-0 leading-tight">Deskripsi 3</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5" x-data="{open: false}">
                <div class="flex gap-3 py-4 rounded-md px-7 bg-brand-purple-100" :class="open && 'rounded-b-none border-b border-gray-400'" @click="open = !open">
                    <div class="flex justify-between grow">
                        <strong>Metode Pembayaran</strong>
                        <img src="{{asset('img/bca.svg')}}" alt="" class="w-12">
                    </div>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="15" :class="open && 'rotate-180'"><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                    </span>
                </div>
                <div class="py-6 rounded-b-md px-7 bg-brand-purple-100" x-show="open">
                    <div class="mb-5">
                        <p class="font-bold">Transfer Bank</p>
                        <div class="flex gap-4">
                            <img src="{{asset('img/bca.svg')}}" alt="" class="w-20">
                            <img src="{{asset('img/bca.svg')}}" alt="" class="w-20">
                            <img src="{{asset('img/bca.svg')}}" alt="" class="w-20">
                        </div>
                    </div>
                    <div>
                        <p class="font-bold">Transfer E-Wallet</p>
                        <div class="flex gap-4">
                            <img src="{{asset('img/bca.svg')}}" alt="" class="w-20">
                            <img src="{{asset('img/bca.svg')}}" alt="" class="w-20">
                            <img src="{{asset('img/bca.svg')}}" alt="" class="w-20">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-between py-4 mt-5 font-bold rounded-md px-7 sm:flex-row bg-brand-purple-100">
                <span>Total</span>
                <span>Rp1.250.000</span>
            </div>
            <div class="flex justify-end gap-2 mt-8">
                <x-button-a href="{{ route('order.theme') }}" class="w-full py-3 tracking-wide transition-colors duration-200 transform bg-white sm:w-40 ring-1 ring-brand-purple-500 hover:bg-brand-yellow-500 hover:text-black">
                    <span class="mx-1">Prev</span>
                </x-button-a>
                <x-button-a href="{{ route('order.detail') }}" class="w-full py-3 tracking-wide text-white transition-colors duration-200 transform sm:w-40 bg-brand-purple-500 hover:bg-brand-yellow-500 hover:text-black">
                    <span class="mx-1">Buat Undangan</span>
                </x-button-a>
            </div>
        </div>
    </section>
</x-app-layout>

