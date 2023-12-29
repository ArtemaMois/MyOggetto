<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyOggetto</title>
    @vite(['/resources/css/main.css',
    '/resources/css/components/navbar.css',
    '/resources/css/account/register.css',
    '/resources/css/account/login.css',
    '/resources/css/meeting/meetings.css',
    '/resources/css/components/sidebar.css',
    '/resources/css/meeting/meeting-info.css',
    '/resources/css/account/account-update.css',
    '/resources/css/comments/comment.css',
    '/resources/css/lectors/lectors.css',
    '/resources/css/meeting/meeting-create.css',
    '/resources/css/meeting/meeting-update.css',
    '/resources/js/meetings/meeting-file-btn.js',
    '/resources/js/meetings/delete-files.js'])
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Afacad:ital,wght@1,700&family=Jost:wght@500&family=Open+Sans:wght@500&display=swap');
    </style>
    <main>
        @include('components.navbar')
        @include('components.sidebar')
        <div class="content">
            @yield('content')
        </div>
    </main>
</body>
</html>
