@php
    use Illuminate\Support\Str;
    use function App\Helpers\makePlural;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 grid">
            <!-- component -->
            <div class="flex flex-col justify-center items-center">
                <div
                    class="relative flex flex-col items-center rounded-[10px] border-[1px] border-gray-200 w-full mx-auto p-4 bg-white bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-[#ffffff33] dark:!bg-navy-800 dark:text-white dark:shadow-none">
                    <div class="relative flex h-32 w-full justify-center rounded-xl bg-cover">
                        <img src='https://horizon-tailwind-react-git-tailwind-components-horizon-ui.vercel.app/static/media/banner.ef572d78f29b0fee0a09.png'
                            class="absolute flex h-32 w-full justify-center rounded-xl bg-cover">
                        <div
                            class="absolute -bottom-12 flex h-[87px] w-[87px] items-center justify-center rounded-full border-[4px] border-white bg-pink-400 dark:!border-navy-700">
                            <img class="h-full w-full rounded-full object-cover" src="{{ $user->image_url }}"
                                alt="" />
                        </div>
                    </div>
                    <div class="mt-16 flex flex-col items-center">
                        <h4 class="text-xl font-bold text-navy-700 dark:text-white">
                            {{ $user->name }}
                        </h4>

                        <p class="text-base font-normal text-gray-600">Product Manager</p>
                        <p
                            class="text-base font-normal text-yellow-400 border border-yellow-400 rounded-full px-2 py-0.5 bg-yellow-400 bg-opacity-10 mt-2">
                            Golden</p>
                        {{-- <p
                            class="text-base font-normal text-slate-400 border border-slate-400 rounded-full px-2 py-0.5 bg-slate-400 bg-opacity-10 mt-2">
                            Silver</p> --}}
                        {{-- <p
                            class="text-base font-normal text-[#CD7F32] border border-[#CD7F32] rounded-full px-2 py-0.5 bg-[#CD7F32] bg-opacity-10 mt-2">
                            Bronze</p> --}}
                    </div>
                    <div class="mt-6 mb-3 flex gap-14 md:!gap-14">
                        <div class="flex flex-col items-center justify-center">
                            <p class="text-2xl font-bold text-navy-700 dark:text-white">{{ $user->posts->count() }}</p>
                            <p class="text-sm font-normal text-gray-600">
                                {{ Str::plural('Post', $user->posts->count()) }}</p>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <p class="text-2xl font-bold text-navy-700 dark:text-white">
                                {{ $user->comments->count() }}
                            </p>
                            <p class="text-sm font-normal text-gray-600">
                                {{ Str::plural('Comment', $user->comments->count()) }}</p>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <p class="text-2xl font-bold text-navy-700 dark:text-white">
                                {{ $user->likes->count() }}
                            </p>
                            <p class="text-sm font-normal text-gray-600">
                                {{ Str::plural('Points', $user->likes->count()) }}</p>
                        </div>
                    </div>
                    {{-- <div class="text-left self-start">Recent activities</div> --}}
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
