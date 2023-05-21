<div
	x-show="isOpen()"
	class="z-40 fixed inset-0 flex min-h-screen bg-white bg-opacity-75 xl:static xl:self-stretch"
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
				class="flex items-center w-full p-3 hover:bg-brand-yellow-500 hover:text-black"
				href="{{ route('client.index', encode_id(auth()->user()->id)) }}"
			>
				<i class="mr-3 fa-lg fas fa-user fa-fw"></i>Profile
			</a>
			<a
				class="flex items-center w-full p-3 hover:bg-brand-yellow-500 hover:text-black"
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
			<a
				class="flex items-center w-full p-3 hover:bg-brand-yellow-500 hover:text-black"
				href="#"
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
						d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
					/>
					<path
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
					/>
				</svg>
				Settings
			</a>
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
