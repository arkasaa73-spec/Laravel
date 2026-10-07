<header class="site-header">
    <div class="container">
        <a href="{{ route('home') }}" class="logo">GameWave</a>
        <nav>
            <a href="{{ route('home') }}">Главная</a>

            {{-- Все категории из БД: новая категория появится в меню сама --}}
            <div class="dropdown">
                <a href="#">Категории ▾</a>
                <div class="dropdown-menu">
                    @foreach (\App\Models\Category::orderBy('id')->get() as $cat)
                        <a href="{{ route('category', $cat->slug) }}">{{ $cat->name }}</a>
                    @endforeach
                </div>
            </div>

            <a href="{{ route('journalist.create') }}">Журналист</a>
            @if (auth()->check() && auth()->user()->isAdmin())
                <a href="{{ route('admin.index') }}">Админ</a>
            @endif

            @auth
                <span class="nav-user">{{ auth()->user()->login }}</span>
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="logout-btn">Выйти</button>
                </form>
            @else
                <a href="{{ route('login') }}">Вход</a>
                <a href="{{ route('register') }}">Регистрация</a>
            @endauth
        </nav>
    </div>
</header>
