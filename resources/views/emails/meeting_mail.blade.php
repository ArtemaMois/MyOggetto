<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <p class="card-text">Встреча по теме {{ $theme }} состоится {{ $date }}</p>
    <p class="card-text">Не пропустите, вам понравится :)</p>
  </div>
</div>
    </body>
</html>
