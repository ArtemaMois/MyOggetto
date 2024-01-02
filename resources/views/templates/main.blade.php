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
    '/resources/css/comment/comment.css',
    '/resources/css/lector/lectors.css',
    '/resources/css/meeting/meeting-create.css',
    '/resources/css/meeting/meeting-update.css',
    '/resources/css/event/event-create.css',
    '/resources/css/event/events.css',
    '/resources/css/event/event-info.css',
    '/resources/css/event/event-update.css',
    'resources/css/account/account-admin-create.css',
    '/resources/css/account/account-users.css',
    '/resources/css/lector/lector-info.css',
    '/resources/css/lector/lector-update.css',
    '/resources/css/quiz/quiz-create.css',
    '/resources/css/quiz/quizzes.css',
    '/resources/css/quiz/quiz-info.css',
    '/resources/js/meetings/meeting-file-btn.js',
    '/resources/js/meetings/delete-files.js',
    '/resources/js/bootstrap.js'])
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
