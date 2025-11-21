@extends('layouts.page')

@section('content')
    <section class="bg-gray-100 rounded-2xl flex w-full justify-around m-12 flex-col lg:flex-row">
        <div class="p-3 flex flex-col justify-center items-center">
            <h1 class="text-4xl font-semibold text-blue-700">Web site to learn</h1>
            <span class="block">small description</span>
            <div>
                <a class="bg-blue-600 m-1 p-3 inline-block text-white font-semibold   rounded-base">join</a>
                <a class="bg-white m-1 p-3 font-semibold  rounded-base">courses</a>
            </div>
        </div>
        <aside class="w-full h-full lg:w-1/2 flex-shrink-0 p-3">
            <div
                class="relative rounded-2xl  p-6 ring-2 ring-white/60 shadow-lg h-96 flex items-center justify-center"
                role="img" aria-label="مكان عرض الصورة أو المحتوى">
                <img  class="rounded-2xl h-11/12  w-11/12" src="{{asset('1.jpg')}}">
            </div>
        </aside>
    </section>

    @livewire('course')
@endsection
