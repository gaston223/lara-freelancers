<div x-data="{open: false}"
     @flash-message.window="open = true; setTimeout(() => open= false, 5000);">
    <div x-show="open" x-cloak class="border {{ $type ? $colors[$type] : '' }} px-1 py-2 rounded">
        Message d'erreur : {{$message}}
    </div>
</div>
