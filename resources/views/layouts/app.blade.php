<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'GameWave')</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; background: #0f1115; color: #e6e6e6; }
        .container { max-width: 960px; margin: 0 auto; padding: 0 20px; }

        .site-header { background: #16181d; padding: 16px 0; border-bottom: 1px solid #2a2d34; }
        .site-header .container { display: flex; justify-content: space-between; align-items: center; }
        .logo { color: #7c5cff; font-size: 22px; font-weight: bold; text-decoration: none; }
        .site-header nav a { color: #e6e6e6; text-decoration: none; margin-left: 20px; }
        .site-header nav a:hover { color: #7c5cff; }

        main { padding: 30px 0; min-height: 60vh; }

        .news-card { background: #16181d; border-radius: 10px; overflow: hidden; margin-bottom: 24px; border: 1px solid #2a2d34; }
        .news-card img { width: 100%; display: block; }
        .news-card .body { padding: 16px; }
        .news-card h2 { margin: 0 0 8px; font-size: 20px; }
        .news-card .meta { color: #9a9ea6; font-size: 13px; margin-bottom: 10px; }
        .news-card p { color: #c7c9cd; line-height: 1.5; }

        .site-footer { border-top: 1px solid #2a2d34; padding: 20px 0; color: #9a9ea6; text-align: center; }

        .article-form { max-width: 600px; }
        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; margin-bottom: 6px; color: #c7c9cd; font-size: 14px; }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%; padding: 10px 12px; background: #16181d; border: 1px solid #2a2d34;
            border-radius: 6px; color: #e6e6e6; font-family: inherit; font-size: 14px;
        }
        .form-group textarea { resize: vertical; }
        .btn-submit {
            background: #7c5cff; color: #fff; border: none; padding: 12px 24px;
            border-radius: 6px; font-size: 15px; cursor: pointer;
        }
        .btn-submit:hover { background: #6a4ce0; }

        .alert-success { background: #17301f; border: 1px solid #2e6b42; color: #8be0a4; padding: 12px 16px; border-radius: 6px; margin-bottom: 20px; max-width: 600px; }
        .field-error { color: #ff7b7b; font-size: 13px; margin-top: 6px; }
        .form-group select:disabled { opacity: 0.7; }

        .admin-table { width: 100%; border-collapse: collapse; margin-bottom: 40px; }
        .admin-table th, .admin-table td {
            padding: 10px 12px; border-bottom: 1px solid #2a2d34; text-align: left; font-size: 14px;
        }
        .admin-table th { color: #9a9ea6; font-weight: normal; }
        .admin-table .actions { white-space: nowrap; }

        .btn-small {
            border: none; padding: 6px 12px; border-radius: 5px; font-size: 13px;
            cursor: pointer; margin-right: 6px; color: #fff;
        }
        .btn-edit { background: #3a7bd5; }
        .btn-block { background: #d5a13a; }
        .btn-delete { background: #d54a3a; }

        .nav-user { margin-left: 20px; color: #7c5cff; font-weight: bold; }
        .logout-form { display: inline; margin-left: 20px; }
        .logout-btn { background: none; border: none; color: #e6e6e6; font-size: inherit; font-family: inherit; cursor: pointer; padding: 0; }
        .logout-btn:hover { color: #7c5cff; }

        .form-hint { margin-top: 16px; color: #9a9ea6; font-size: 14px; }
        .form-hint a { color: #7c5cff; }

        .pagination { display: flex; gap: 8px; justify-content: center; margin-top: 10px; }
        .pagination a, .pagination span {
            padding: 8px 14px; border: 1px solid #2a2d34; border-radius: 6px;
            background: #16181d; color: #e6e6e6; text-decoration: none; font-size: 14px;
        }
        .pagination a:hover { border-color: #7c5cff; }
        .pagination .active { background: #7c5cff; border-color: #7c5cff; color: #fff; }
        .pagination .disabled { color: #5d6169; }

        .edit-link { display: inline-block; margin-top: 6px; color: #7c5cff; font-size: 13px; text-decoration: none; }
        .edit-link:hover { text-decoration: underline; }

        .dropdown { position: relative; display: inline-block; }
        .dropdown-menu {
            display: none; position: absolute; top: 100%; left: 20px; z-index: 10; min-width: 170px;
            background: #16181d; border: 1px solid #2a2d34; border-radius: 6px; padding: 6px 0;
        }
        .dropdown:hover .dropdown-menu { display: block; }
        .site-header .dropdown-menu a { display: block; margin: 0; padding: 8px 14px; white-space: nowrap; }
    </style>
</head>
<body>
    <x-header />

    <main class="container">
        @yield('content')
    </main>

    <x-footer />
</body>
</html>
