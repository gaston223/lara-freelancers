<div class="inline-block relative" x-data="{ open: true }" >

    <input 
        @click.away="{open = false; @this.resetIndex()}"
        @click="{open = true}"
        type="text"
        class="bg-gray-200 text-gray-700 border-2 focus:outline-none mr-5 px-5 py-2 w-56 rounded-full placeholder-gray-500"
        placeholder="Rechercher une mission" wire:model="query" 
        wire:keydown.arrow-down.prevent="incrementIndex"
        wire:keydown.arrow-up.prevent="decrementIndex"
        wire:keydown.backspace="resetIndex"
        wire:keydown.enter.prevent="showJob"
        >
    {{-- <i
        class="fas fa-search absolute w-5 h-5 top-1 left-3 right-0 mr-2 mt-2 text-gray-500"></i>
    --}}

    @if (strlen($query) > 2)
        <div 
        class="absolute border bg-gray-100 text-md w-56 mt-1"
        x-show="open"
        >
            @if (count($jobs) > 0)
                @foreach ($jobs as $index => $job)
                    <p class="p-1 {{ $index === $selectedIndex ? 'text-green-500' : '' }}">
                        {{ $job->title }}
                    </p>
                @endforeach
            @else
                <span class="text-purple-800 p-1">Pas de resultats pour "{{ $query }}"</span>
            @endif
        </div>
    @endif



</div>
