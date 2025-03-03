@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Article Homepage</title>
</head>
<body>
    <h1>Welcome to the homepage!</h1>

    <h2>Articles:</h2>

    @foreach($articles as $article)
    <div>
        <!-- Link now uses the article_id instead of the title -->
        <h3><a href="{{ url('/article/' . $article->article_id) }}">{{ $article->title }}</a></h3>
    </div>
    @endforeach

    @include('footer')
</body>
</html>





            