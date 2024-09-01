@section('title', 'Dashboard')
<x-admin-layout>
    <div>
        <div class="grid grid-cols-4 gap-5">
            <div
                class="border p-5 py-6 shadow-xl bg-[#E69898] text-white rounded-2xl grid text-center place-content-center">
                <h1 class="text-3xl font-bold font-montserrat">000</h1>
                <div class="flex space-x-1 text-sm mt-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-file-export">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v5m-5 6h7m-3 -3l3 3l-3 3" />
                    </svg>
                    <h1>Incoming Docs</h1>
                </div>
            </div>
            <div
                class="border p-5 py-6 shadow-xl bg-[#DADB87] text-white rounded-2xl grid text-center place-content-center">
                <h1 class="text-3xl font-bold font-montserrat">000</h1>
                <div class="flex space-x-1 text-sm mt-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-alert-circle">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                        <path d="M12 8v4" />
                        <path d="M12 16h.01" />
                    </svg>
                    <h1>Pending Docs</h1>
                </div>
            </div>
            <div
                class="border p-5 py-6 shadow-xl bg-[#74B6C4] text-white rounded-2xl grid text-center place-content-center">
                <h1 class="text-3xl font-bold font-montserrat">000</h1>
                <div class="flex space-x-1 text-sm mt-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-circle-dashed-check">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95" />
                        <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44" />
                        <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92" />
                        <path d="M8.56 20.31a9 9 0 0 0 3.44 .69" />
                        <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95" />
                        <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44" />
                        <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92" />
                        <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69" />
                        <path d="M9 12l2 2l4 -4" />
                    </svg>
                    <h1>Received Docs</h1>
                </div>
            </div>
            <div
                class="border p-5 py-6 shadow-xl bg-[#B77DB8] text-white rounded-2xl grid text-center place-content-center">
                <h1 class="text-3xl font-bold font-montserrat">000</h1>
                <div class="flex space-x-1 text-sm mt-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-circle-dashed-check">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95" />
                        <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44" />
                        <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92" />
                        <path d="M8.56 20.31a9 9 0 0 0 3.44 .69" />
                        <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95" />
                        <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44" />
                        <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92" />
                        <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69" />
                        <path d="M9 12l2 2l4 -4" />
                    </svg>
                    <h1>Ended Docs</h1>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <section class="">
                <div class="w-full  py-6 mx-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 ">

                    <div class="flex flex-col items-center sm:px-5 md:flex-row">
                        <div class="flex flex-col items-start justify-center w-full h-full py-6 mb-6 md:mb-0 md:w-1/2">
                            <div
                                class="flex flex-col items-start justify-center h-full space-y-3 transform md:pl-10 lg:pl-16 md:space-y-5">
                                <h1 class="text-5xl font-bold text-gray-700">VISION</h1>
                                <div class="mt-5 text-justify">
                                    <p>A trailblazer in arts, science and technology in the region.</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2">
                            <a href="#_" class="block">
                                <img class="object-cover w-full h-full rounded-lg max-h-64 sm:max-h-96"
                                    src="{{ asset('images/main-campus.jpg') }}">
                            </a>
                        </div>

                    </div>


                </div>
            </section>
            <section class="">
                <div class="w-full  py-6 mx-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 ">

                    <div class="flex flex-col items-center sm:px-5 md:flex-row">
                        <div class="w-full md:w-1/2">
                            <a href="#_" class="block">
                                <img class="object-cover w-full h-full rounded-lg max-h-64 sm:max-h-96"
                                    src="{{ asset('images/sksu_bg.jpg') }}">
                            </a>
                        </div>
                        <div class="flex flex-col items-start justify-center w-full h-full py-6 mb-6 md:mb-0 md:w-1/2">
                            <div
                                class="flex flex-col items-start justify-center h-full space-y-3 transform md:pl-10 lg:pl-16 md:space-y-5">
                                <h1 class="text-5xl font-bold text-gray-700">MISSION</h1>
                                <div class="mt-5 text-justify">
                                    <p>The University shall primarily provide advanced instruction and professional
                                        training in science and technology, agriculture, fisheries, education and other
                                        relevant fields of study. It shall also undertake research and extension
                                        services and provide progressive leadership in its areas of specialization.</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </section>

        </div>
    </div>
</x-admin-layout>
