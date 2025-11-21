<div>

    <div class="flex justify-between">
    <div class="w-2/9 h-10 border-gray-300 ">
{{--        <h1 class="text-2xl font-bold ">Levels</h1>--}}
{{--        <div class="max-w-md mt-4  mx-auto">--}}
{{--            <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>--}}
{{--            <div class="relative">--}}
{{--                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">--}}
{{--                    <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>--}}
{{--                </div>--}}
{{--                <input type="search" wire:model.live="level" id="search" class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body" placeholder="Search" required />--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="mt-4">--}}
{{--            <ul class="space-y-2">--}}
{{--                @foreach($levels as $level)--}}
{{--                <li>--}}
{{--                    <button wire:click="filterByLevel(({{ $level->id }}))" class="block px-3 py-2 rounded-md text-base font-medium text-heading hover:bg-neutral-secondary-soft hover:text-fg-brand-strong">{{ $level->name }}</button>--}}
{{--                </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}

        <div class="relative mt-4 overflow-y-auto max-h-96 bg-neutral-primary-soft shadow-xs rounded-base border border-default">
            <h1 class="text-2xl p-4 font-bold">Levels</h1>

            <div class="p-4">
                <label for="input-group-1" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" wire:model.live="level" id="input-group-1"
                           class="block w-full max-w-96 ps-9 pe-3 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand px-3 py-2.5 shadow-xs placeholder:text-body"
                           placeholder="Search">
                </div>
            </div>

            <table class="w-full text-sm text-left rtl:text-right text-body">
                <tbody>
                <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                    <th class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        <button wire:click="resetFilters"
                                class="block px-3 py-2 rounded-md text-base font-medium text-heading hover:bg-neutral-secondary-soft hover:text-fg-brand-strong">
                            All Level
                        </button>
                    </th>
                </tr>

                @foreach($levels as $level)
                    <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                        <th class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            <button wire:click="filterByLevel({{ $level->id }})"
                                    class="block px-3 py-2 rounded-md text-base font-medium text-heading hover:bg-neutral-secondary-soft hover:text-fg-brand-strong">
                                {{ $level->name }}
                            </button>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
   <div class="w-7/9">
       <div class="max-w-md  mx-auto">
           <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
           <div class="relative">
               <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                   <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
               </div>
               <input type="search" wire:model.live="search" id="search" class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body" placeholder="Search" required />
           </div>
       </div>

       <div class="flex m-2 flex-wrap justify-around">
           @foreach($courses as $course)
               <div class="bg-neutral-primary-soft m-2 w-1/2 sm:w-1/3 lg:w-1/4 max-w-sm border border-default rounded-base shadow-xs">
                   <img class="rounded-t-base w-full" src="{{$course->image ? asset('storage/'.$course->image):asset('2.jpeg')}}" alt="" />
                   <div class="p-6 text-center">
            <span class="inline-flex items-center bg-brand-softer border border-brand-subtle text-fg-brand-strong text-xs font-medium px-1.5 py-0.5 rounded-sm">
                <svg class="w-3 h-3 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.122 17.645a7.185 7.185 0 0 1-2.656 2.495 7.06 7.06 0 0 1-3.52.853 6.617 6.617 0 0 1-3.306-.718 6.73 6.73 0 0 1-2.54-2.266c-2.672-4.57.287-8.846.887-9.668A4.448 4.448 0 0 0 8.07 6.31 4.49 4.49 0 0 0 7.997 4c1.284.965 6.43 3.258 5.525 10.631 1.496-1.136 2.7-3.046 2.846-6.216 1.43 1.061 3.985 5.462 1.754 9.23Z"/></svg>
                Trending
            </span>
                       <a href="#">
                           <h5 class="mt-3 mb-6 text-2xl font-semibold tracking-tight text-heading">{{$course->title}}.</h5>
                       </a>
                       <a href="#" class="inline-flex items-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                           Read more
                           <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/></svg>
                       </a>
                   </div>
               </div>
           @endforeach
       </div>
   </div>
    </div>
</div>
