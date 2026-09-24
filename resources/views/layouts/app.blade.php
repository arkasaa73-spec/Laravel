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
