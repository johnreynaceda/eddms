@section('title', 'Dashboard')
<x-admin-layout>
    <div>
        <div class="grid-cols-3 grid gap-10">
            <div class="col-span-2">
                <div class="">
                    <section class="">
                        <div class="w-full  py-6  space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 ">

                            <div class="flex flex-col items-center space-x-3  md:flex-row">
                                <div
                                    class="flex flex-col items-start justify-center w-full h-full py-6 mb-6 md:mb-0 md:w-1/2">
                                    <div
                                        class="flex flex-col items-start justify-center h-full space-y-3 transform   space-y-5">
                                        <h1 class="text-5xl font-bold text-gray-700">VISION</h1>
                                        <div class="mt-5 text-justify">
                                            <p>A Leading University in advance scholarly innovation, multi-cultural
                                                converenge, and responsive public service in a boarderless Region.</p>
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

                            <div class="flex flex-col items-center md:flex-row">
                                <div class="w-full md:w-1/2">
                                    <a href="#_" class="block">
                                        <img class="object-cover w-full h-full rounded-lg max-h-64 sm:max-h-96"
                                            src="{{ asset('images/sksu_bg.jpg') }}">
                                    </a>
                                </div>
                                <div
                                    class="flex flex-col items-start justify-center w-full h-full py-6 mb-6 md:mb-0 md:w-1/2">
                                    <div
                                        class="flex flex-col items-start justify-center h-full space-y-3 transform md:pl-10 lg:pl-16 md:space-y-5">
                                        <h1 class="text-5xl font-bold text-gray-700">MISSION</h1>
                                        <div class="mt-5 text-justify">
                                            <p>The University shall primarily provide advanced instruction and
                                                professional
                                                training in science and technology, agriculture, fisheries, education
                                                and other
                                                relevant fields of study. It shall also undertake research and extension
                                                services and provide progressive leadership in its areas of
                                                specialization.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </section>

                </div>
            </div>
            <div>
                <livewire:notifs />
            </div>
        </div>
    </div>
</x-admin-layout>
