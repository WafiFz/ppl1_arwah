<div
	x-show="isOpen()"
	class="fixed inset-0 z-40 flex min-h-screen bg-white bg-opacity-75 xl:static xl:self-stretch"
>
	<div
		@click.away="handleAway()"
		class="flex flex-col text-white shadow bg-brand-purple-500 w-80 xl:h-full"
	>
		<div class="flex content-between">
			<div class="w-full px-3 py-6">
                <img src="{{ asset('img/logo-light.svg') }}" class="inline-block mr-2" alt="" width="40">
                <strong>Client Area</strong>
            </div>
			<a
				@click.prevent="handleClose()"
				class="flex items-center flex-1 p-3 cursor-default"
				href="#"
			>
				<svg
					class="w-6 h-6 hover:stroke-brand-yellow-500"
					xmlns="http://www.w3.org/2000/svg"
					fill="none"
					viewBox="0 0 24 24"
					stroke="currentColor"
				>
					<path
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						d="M6 18L18 6M6 6l12 12"
					/>
				</svg>
			</a>
		</div>
		<div class="grow">
			<a
				class="flex items-center w-full p-3 hover:bg-brand-yellow-500 hover:text-black"
				href="{{ route('home') }}"
			>
			<i class="mr-3 fa-lg fa-solid fa-house"></i></i>Back to Home
			</a>
			<a
				class="flex items-center w-full p-3 hover:bg-brand-yellow-500 hover:text-black {{ request()->routeIs('client.index') ? 'sidebar-active' : '' }}"
				href="{{ route('client.index', encode_id(auth()->user()->id)) }}"
			>
				<i class="mr-3 fa-lg fas fa-user fa-fw"></i>Profile
			</a>
			<a
				class="flex items-center w-full p-3 hover:bg-brand-yellow-500 hover:text-black {{ request()->routeIs('client.orders') ? 'sidebar-active' : '' }}"
				href="{{ route('client.orders') }}"
				><svg
					class="w-6 h-6 mr-3"
					xmlns="http://www.w3.org/2000/svg"
					fill="none"
					viewBox="0 0 24 24"
					stroke="currentColor"
				>
					<path
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
					/>
				</svg>
				Orders
			</a>
			@if ( request()->is('client/invitations/*') )
			<a
				class="flex items-center w-full p-3 pl-6 hover:bg-brand-yellow-500 hover:text-black {{ request()->routeIs('client.guest.index') ? 'sidebar-active' : 'bg-brand-purple-600' }}"
				href="{{ route('client.guest.index', encode_id($data)) }}"
				><svg
					class="w-6 h-6 mr-3"
					xmlns="http://www.w3.org/2000/svg"
					fill="none"
					viewBox="0 0 24 24"
					stroke="currentColor"
				>
					<path
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
					/>
				</svg>
				Tamu
			</a>
			<a
				class="flex items-center w-full p-3 pl-6 hover:bg-brand-yellow-500 hover:text-black {{ request()->routeIs('client.rsvp') ? 'sidebar-active' : 'bg-brand-purple-600' }}"
				href="{{ route('client.rsvp', encode_id($data)) }}"
				><svg
					class="w-6 h-6 mr-3"
					xmlns="http://www.w3.org/2000/svg"
					fill="none"
					viewBox="0 0 24 24"
					stroke="currentColor"
				>
					<path
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
					/>
				</svg>
				RSVP
			</a>
			@endif
		</div>
		<div class="px-5">
			<div class="border-t-[1px] border-white flex py-5 items-center">
				<div class="flex grow">
					<img class="w-10 h-10 mr-2 rounded-full" src="{{asset(auth()->user()->avatar)}}" alt="{{asset(auth()->user()->name)}}">
					<div>
						<strong class="block">{{ auth()->user()->name }}</strong>
						<span>{{ auth()->user()->email }}</span>
					</div>
				</div>
				<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<i class="fa-solid fa-arrow-right-from-bracket"></i>
				</a>

				 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                </form>
			</div>
		</div>
	</div>
</div>
