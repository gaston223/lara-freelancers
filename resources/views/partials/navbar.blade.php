<header class="flex justify-between items-center py-5">
    <a href="#">Lara Freelancers</a>

    <nav>
        <livewire:search/>
        <a href="{{ route('jobs.index') }}" class="mr-5 hover:text-green-500">Nos missions</a>
        @guest
            <a href="{{ route('login') }}" class="mr-5 hover:text-green-500">Se connecter</a>
            <a href="{{ route('register') }}" class="mr-5 hover:text-green-500">S'enregistrer</a>
        @else
            <a href="{{ route('conversations.index') }}" class="mr-5 hover:text-green-500">Mes conversations</a>
            <a href="{{ route('home') }}" class="mr-5 hover:text-green-500">Tableau de bord</a>
            <a href="#" class="mr-5 hover:text-green-500">Bonjour {{auth()->user()->name}}</a>
            <a href="{{ route('logout') }}" class="mr-5 hover:text-green-500"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se déconnecter</a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
            </form>
        @endguest
    </nav>

</header>
