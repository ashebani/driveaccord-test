<div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white p-6 text-gray-900 dark:text-gray-100 space-y-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @foreach($categories as $category)
            <article
                class="rounded-xl border-2 dark:border-gray-700 bg-white dark:bg-gray-900 ">
                <div class="p-4 sm:p-4">

                    <div class="grid sm:flex sm:justify-between w-full items-center gap-4">
                        <a
                            class="md:mr-10"
                            href="/categories/{{$category->slug}}">
                            <div>
                                <h3 class="text-lg text-center sm:text-left font-bold lg:text-xl ">{{$category->name}}</h3>
                                <p class="text-md text-center sm:text-left">{{$category->description}}</p>
                            </div>
                        </a>
                        <div class="grid md:flex md:justify-start items-center space-y-2 md:space-y-0 md:space-x-8">
                            <div class="flex space-x-4 sm:justify-self-end justify-around items-center">
                                <div class="grid md:flex md:space-x-2">
                                    <x-iconoir-post class="h-5 w-5 mx-auto md:h-6 md:w-6 text-gray-500 stroke-gray-500"/>
                                    <p class="text-sm text-gray-600 mt-1 md:mt-0">
                                        {{$category->posts->count()}} posts
                                    </p>
                                </div>
                                <div class="grid md:flex md:space-x-2">
                                    {{-- <x-jam-write class="h-5 w-5 fill-gray-500 md:h-6 md:w-6"/>--}}
                                    <x-go-people-24 class="h-5 w-5 fill-gray-500 mx-auto md:h-6 md:w-6"/>
                                    <p class="text-sm text-gray-600 mt-1 md:mt-0">
                                        {{$category->posts->pluck('user_id')->unique()->count()}}
                                        contributions
                                    </p>
                                </div>
                                <p class="text-sm text-gray-600 text-center md:text-right hidden lg:block">Last
                                    updated {{$category->updated_at->diffForHumans()}}
                                </p>
                            </div>
                            <p class="text-sm text-gray-600 text-center md:text-right sm:hidden">Last
                                updated {{$category->updated_at->diffForHumans()}}
                            </p>
                        </div>
                    </div>
                </div>


            </article>
        @endforeach


    </div>
</div>


