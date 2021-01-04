@extends('layouts.app')

@section('content')
    <h1 class="text-3xl text-green-500 mb-3">{{ $job->title }}</h1>
        <div class="px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-300">
            <p class="text-md text-gray-800">{{ $job->description }}</p>
            <span class="text-sm text-gray">
                {{ number_format($job->price / 100, 2, ',', ' ') }} €
            </span>
        </div>

    <section x-data="{open: false}">
        <a href="#" class="text-green-500" @click="open = true">Cliquez ici pour soumettre une candidature</a>
        <form x-show="open" x-cloak method="post" action="{{route('proposals.store', $job)}}">
            @csrf
            <label for="content" class="block text-sm font-medium text-gray-700">

            </label>
            <textarea id="content" name="content" class="p-3 border-2 border-gray-300 font-thin block w-full max-w-lg" placeholder="Soumettez votre proposition">
            </textarea>
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <!-- Heroicon name: check -->
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                Soumettre ma lettre de motivation
            </button>
        </form>
        @error('content')
            <p class="text-red-500">{{$message}}</p>
        @enderror
    </section>
@endsection
