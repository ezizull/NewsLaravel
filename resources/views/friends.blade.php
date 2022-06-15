<x-app-layout>
    <div class="flex-col w-11/12 h-auto p-4 items-center rounded space-y-10">
        <label class="relative w-1/2 block">
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
        <div id="friends" class="flex-col pt-14 w-full space-y-4">
            <div class="flex font-sans space-x-4 justify-center w-full">
                <div id="1"
                    class="flex shadow w-[21em] space-x-4 h-[4.15rem] rounded">
                    <div><img class="object-cover w-24 h-[4.15rem] rounded-l" src="{{ asset('img/default_img.jpg') }}}"
                            onerror="this.src='img/default_img.jpg'" alt=""></div>
                    <div class="flex-col p-1 justify-center space-y-0.5">
                        <div class="flex text-lg font-bold tracking-tight-soft max-title capitalize">Firstname Lastname
                        </div>
                        <div class="flex h-4 items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="bi h-2.5 fill-blue-400"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                            </svg>
                            <p class="text-[0.8rem] font-light m-0">0853-4221-9343</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
</x-app-layout>
