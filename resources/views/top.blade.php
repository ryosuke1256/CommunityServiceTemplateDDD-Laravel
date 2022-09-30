<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Community Site</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <div class="content-area">
        <h1>{{config('community.title')}}</h1>
        <section>
            <form action="{{ route('article')}}" method="POST">
                @csrf
                <div class="input-area">
                    <textarea name="title" placeholder="title" required id="" cols="50" rows="1"></textarea><br>
                    @error('title')
                    <div class='error-message'>{{$message}}</div>
                    @enderror
                    <textarea name="content" placeholder="content" required id="" cols="50" rows="10"></textarea><br>
                    @error('content')
                    <div class='error-message'>{{$message}}</div>
                    @enderror
                    <input type="submit" value="送信">
                </div>
            </form>
        </section>
    </div>

</body>

</html>