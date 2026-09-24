<header class="site-header">
    <div class="container">
        <a href="{{ route('home') }}" class="logo">GameWave</a>
        <nav>
            <a href="{{ route('home') }}">Главная</a>
            <a href="{{ route('category', 'konsoli') }}">Консоли</a>
            <a href="{{ route('journalist.create') }}">Журналист</a>
            <a href="{{ route('admin.index') }}">Админ</a>
        </nav>
    </div>
</header>
