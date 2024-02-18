<x-app-layout>
    <x-slot name="header">
        <nav class="ml-2">
            <ol class="flex items-center gap-1 text-sm text-gray-600">

            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">
                    @auth()
                        @foreach($categories as $category)
                            <article
                                class="rounded-xl border-2 dark:border-gray-700 bg-white dark:bg-gray-900 ">
                                <div class="flex justify-between  items-center gap-4 p-4 sm:p-4 lg:p-6">
                                    <a
                                        href="/categories/1"
                                        class="mr-10">
                                        <div class="">
                                            <h3 class="font-bold">{{$category->name}}</h3>
                                            <p>{{$category->description}}</p>
                                        </div>
                                    </a>
                                    <div class="flex space-x-4">


                                        <div class="flex items-center space-x-2">
                                            <x-jam-write class="h-6 w-6"/>
                                            <p class="text-sm text-gray-600">
                                                21,345 posts
                                            </p>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <svg
                                                width="1.5em"
                                                height="1.5em"
                                                viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g
                                                    id="SVGRepo_bgCarrier"
                                                    stroke-width="0"></g>
                                                <g
                                                    id="SVGRepo_tracerCarrier"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path

                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M19.186 2.09c.521.25 1.136.612 1.625 1.101.49.49.852 1.104 1.1 1.625.313.654.11 1.408-.401 1.92l-7.214 7.213c-.31.31-.688.541-1.105.675l-4.222 1.353a.75.75 0 0 1-.943-.944l1.353-4.221a2.75 2.75 0 0 1 .674-1.105l7.214-7.214c.512-.512 1.266-.714 1.92-.402zm.211 2.516a3.608 3.608 0 0 0-.828-.586l-6.994 6.994a1.002 1.002 0 0 0-.178.241L9.9 14.102l2.846-1.496c.09-.047.171-.107.242-.178l6.994-6.994a3.61 3.61 0 0 0-.586-.828zM4.999 5.5A.5.5 0 0 1 5.47 5l5.53.005a1 1 0 0 0 0-2L5.5 3A2.5 2.5 0 0 0 3 5.5v12.577c0 .76.082 1.185.319 1.627.224.419.558.754.977.978.442.236.866.318 1.627.318h12.154c.76 0 1.185-.082 1.627-.318.42-.224.754-.559.978-.978.236-.442.318-.866.318-1.627V13a1 1 0 1 0-2 0v5.077c0 .459-.021.571-.082.684a.364.364 0 0 1-.157.157c-.113.06-.225.082-.684.082H5.923c-.459 0-.57-.022-.684-.082a.363.363 0 0 1-.157-.157c-.06-.113-.082-.225-.082-.684V5.5z"
                                                        fill="#000000"></path>
                                                </g>
                                            </svg>
                                            <p class="text-sm text-gray-600">
                                                10,345 contributions
                                            </p>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-600">Last
                                        updated {{$category->updated_at->diffForHumans()}}</p>
                                </div>


                            </article>
                        @endforeach

                    @endauth

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
