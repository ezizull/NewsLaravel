<nav {{ $attributes->merge(['class'=>"top-0 pt-7 bg-white z-40"]) }}>
    <div class="flex justify-between px-12">
        <x-application-logo
            class="brand font-title uppercase font-black text-blue hover:text-darkblue text-4xl tracking-[-0.05em] w-auto" />
        <div class="flex-col justify-between w-auto h-[3em]">
            @include('components.sosmed')
            <div class="flex">
                <div class="dropdown inline-block font-sans text-sm relative">
                    <button
                        class="text-pink ring-1 ring-pink w-32 py-[0.5] px-4 rounded inline-flex justify-center items-center">
                        <span class="mr-1 font-medium">
                            @if (Request::path() == '/')
                            Home
                            @else
                            {{ Request::path() }}
                            @endif
                        </span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </button>
                    @include('components.menu-navigation')
                </div>
            </div>
        </div>
    </div>

    <div class="line mt-[1.4em] opacity-20"></div>
</nav>
