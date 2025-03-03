@extends('layouts.app') <!-- Extend the base layout -->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Set the page title to the article title -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }}</title>
</head>
<body>
    <!-- Display the article title -->
    <h1>{{ $article->title }}</h1>
    
    <!-- Display the formatted creation date of the article -->
    <p><strong>Created on:</strong> {{ \Carbon\Carbon::parse($article->creation_date)->format('F j, Y') }}</p>
    
    <!-- Display the article content -->
    <h2>Content:</h2>
    <p>{{ $article->content }}</p>
    
    <!-- Display the category name associated with the article -->
    <p><strong>Category:</strong> {{ $article->category_name }}</p>
    
    <!-- Display tags associated with the article -->
    <h3>Tags:</h3>
  <p>
    <!-- Loop through all the tags associated with the article -->
    @foreach($article->tags as $tag)
        <!-- Display each tag as a hyperlink -->
        <a href="{{ url('/tag/' . urlencode(strtolower(str_replace(' ', '-', $tag)))) }}">{{ $tag }}</a>
        <!-- Add a comma between tags except for the last one -->
        @if (!$loop->last), @endif
    @endforeach
 </p>


    <!-- Link to return to the homepage -->
    <p><a href="{{ url('/') }}">Back to homepage</a></p>

    <!-- Include the footer of the page -->
    @include('footer')
</body>
</html>


























    