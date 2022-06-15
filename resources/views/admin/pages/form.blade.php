<x-admin-layout>
    <main class="ease-soft-in-out xl:ml-68.5 relative min-h-screen max-h-screen rounded-xl transition-all duration-200">
        <x-navigation class="bg-transparent"></x-navigation>
        <div class="flex justify-center items-center h-full w-full px-6 py-20 mx-auto">

            @if (isset($data))
            <form class="w-1/2" method="post" action="{{ route('tabel.update',$data->id) }}"
                enctype="multipart/form-data">
                @else
                <form class="w-1/2" method="post" action="{{ route('tabel.store') }}" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <x-label for="title" :value="__('Title')" />

                            <input id="title"
                                class="block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-1 h-10 w-full"
                                type="text" name="title"
                                value="{{ isset($data)? $data->title : '' }}"
                                required
                                autofocus />
                        </div>

                        <div>
                            <div class="flex justify-between">
                                <label for="photo">
                                    {{ __('Photo') }}
                                </label>
                                <span class="text-red-500" id="error"></span>
                            </div>

                            <div class="flex h-10 space-x-2">
                                <input id="photo"
                                    class="block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-1 h-10 w-full"
                                    type="file" name="photo" accept="image/*"
                                    required="required"
                                    autofocus />

                                @if (isset($data))
                                <div>
                                    <img id="display" class="object-cover h-11 w-11 rounded shadow-sm"
                                        src="{{  asset($data->photo) }}"
                                        onerror="this.src='{{ asset('img/default_img.jpg') }}'">

                                    <script>
                                        const img = document.getElementById("photo");
                                        if(img.src == ''){
                                            img.src = 'img/default_img.jpg';
                                        }

                                        let error = document.getElementById("error");
                                        const display = document.getElementById("display");
                                        const old = display;
                                        img.addEventListener("change", (e) => {
                                            const file = document.querySelector("input[type=file]").files[0];
                                            if (file) {
                                                previewImage(file);
                                            } else {
                                                error.innerText = "*Select Image";
                                            }
                                        })
                                        function previewImage(imgD) {
                                            const reader = new FileReader();

                                            // PREVIEW
                                            reader.addEventListener("load", function () {
                                                display.src = reader.result;
                                            })

                                            // CHECK IF THERE IS SELECTION
                                            if (imgD) {
                                                // CHECK IF THE FILE IS AN IMAGE
                                                if (imgD.type === "image/jpeg" || imgD.type == "image/jpg" || imgD.type == "image/gif" || imgD.type == "image/png") {
                                                    error.innerText = "";

                                                    // CONVERTS FILE TO BASE 64
                                                    reader.readAsDataURL(imgD);
                                                } else {
                                                    error.innerText = "*Must Image"
                                                    display.src = old;
                                                }
                                            }

                                            // IF NO IMAGE
                                            else {
                                                display.src = old;
                                                error.innerText = "*Select Image";
                                            }
                                        }
                                    </script>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div>
                            <x-label for="deskripsi" :value="__('Deskripsi')" />

                            <textarea id="deskripsi"
                                class="block mt-1 min-h-40 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" name="deskripsi"
                                :value="old('deskripsi')"
                                required
                                autofocus>{{ $data->deskripsi ?? '' }}</textarea>
                        </div>
                    </div>

                    <button type="submit"
                        class="flex mt-8 justify-center w-full items-center px-4 py-2.5 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        {{ __('Submit') }}
                    </button>
                </form>
        </div>
        @include('admin.components.footer')

    </main>
</x-admin-layout>
