<x-app-layout>
    <div class="flex-col w-2/5 h-auto p-4 rounded space-y-10">
        <label class="relative block">
            <span class="absolute inset-y-0 left-[1.5] flex items-center pl-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 stroke-1 stroke-pink fill-pink"
                    viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </span>
            <input
                class="placeholder:italic block border-0 w-full rounded-md py-3 pl-8 pr-3 focus:outline-none text-darkpink ring-1 ring-pink placeholder:text-pink focus:ring-darkpink focus:ring-2"
                placeholder="Search for anything..." type="text" name="search" />
        </label>
        <div id="news" class="w-full space-y-7"></div>
        <ul class="flex w-full justify-center space-x-2 items-center h-10">
            <li><button onclick="goPrev()"
                    class="bg-[#EFEFFF] w-16 hover:text-darkblue font-medium px-2 py-1 rounded lowercase"
                    id="prev">prev
                </button></li>
            <div id="pagination" class="flex justify-center space-x-2">
            </div>
            <li><button onclick="goNext()"
                    class="bg-[#EFEFFF] w-16 hover:text-darkblue font-medium px-2 py-1 rounded lowercase"
                    id="next">next
                </button></li>
        </ul>
    </div>
    <div class="flex-col w-1/4 h-auto p-4 rounded space-y-2 items-start">
        <div class="flex w-full space-x-5 ">
            <div class="flex-col w-1/2 h-20 space-y-[0.1em]">
                <span class="text-sm font-thin">Lorem_Ipsum</span>
                <p class="max-text font-title font-bold hover:text-darkblue hover:scale-1.01 leading-5">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <div class="flex w-full items-center">
                    <div class="w-32 h-[0.01em] mt-3 bg-pink"></div>
                </div>
            </div>
            <div class="flex-col w-1/2 h-20 space-y-[0.1em]">
                <span class="text-sm font-thin">Lorem_Ipsum</span>
                <p class="max-text font-title font-bold hover:text-darkblue hover:scale-1.01 leading-5">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <div class="flex w-full items-center">
                    <div class="w-32 h-[0.01em] mt-3 bg-pink"></div>
                </div>
            </div>
        </div>
        <div class="flex w-full space-x-5 ">
            <div class="flex-col w-1/2 space-y-[0.1em] h-20">
                <span class="text-sm font-thin">Lorem_Ipsum</span>
                <p class="max-text font-title font-bold hover:text-darkblue hover:scale-1.01 leading-5">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <div class="flex w-full items-center">
                    <div class="w-32 h-[0.01em] mt-3 bg-pink"></div>
                </div>
            </div>
            <div class="flex-col w-1/2 space-y-[0.1em] h-20">
                <span class="text-sm font-thin">Lorem_Ipsum</span>
                <p class="max-text font-title font-bold hover:text-darkblue hover:scale-1.01 leading-5">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <div class="flex w-full items-center">
                    <div class="w-32 h-[0.01em] mt-3 bg-pink"></div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="{{ asset('js/news.js') }}"></script>
</x-app-layout>
