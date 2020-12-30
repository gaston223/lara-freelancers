<div>
    <div class="px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-300">
        <div class="flex justify-between pb-2">
            <h2 class="text-xl font-bold text-green-800">{{ $job->title }}</h2>
           <button class="focus:outline-none" wire:click="addLike()">
               <i class="{{ $job->isLiked() ? 'fas' : 'far' }} fa-heart text-gray-700"></i>
            </button>
        </div>
        <p class="text-md text-gray-800">Mission proposée par <span class=""></span> {{ $job->user->name }}</p>
        <p class="text-md text-gray-800">{{ $job->description }}</p>
        <div class="flex items-center">
            <span class="h-2 w-2 bg-green-300 rounded-full mr-1 mt-1"></span>
            <a href="{{route('jobs.show', $job->id)}}">Consulter la mission</a>
        </div>
        <span class="text-sm text-gray">
            {{ number_format($job->price / 100, 2, ',', ' ') }} €
        </span>
    </div>
</div>
