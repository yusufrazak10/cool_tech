@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title of the page dynamically set based on the category name -->
    <title>{{ $category->category_name }} - Articles</title>
</head>
<body>

    <!-- Heading showing the name of the category -->
    <h1>Category: {{ $category->category_name }}</h1>
    
    <!-- Subheading for the list of articles in the category -->
    <h2>Articles</h2>

    <!-- Check if there are any articles in the category -->
    @if($articles->isEmpty())
        <!-- If no articles, display this message -->
        <p>No articles found in this category.</p>
    @else
        <!-- If there are articles, display them in a list -->
        <ul>
            @foreach($articles as $article)
                <!-- For each article, display its title, content, creation date, and tags -->
                <li>
                    <!-- Link to the individual article page, passing the article ID -->
                    <h3><a href="{{ url('/article/' . $article->article_id) }}">{{ $article->title }}</a></h3>
                    
                    <!-- Display the article's content (shortened preview) -->
                    <p>{{ $article->content }}</p>
                    
                    <!-- Display the article's creation date -->
                    <p>Creation Date: {{ $article->creation_date }}</p>
                    
                    <!-- Display the category name for the article -->
                    <p>Category: {{ $category->category_name }}</p>
                    
                    <!-- Display tags for the article (if any) -->
                    <p>Tags: 
                        @if(!empty($article->tags))
                           <!-- If tags are available, loop through them and link each to its tag page -->
                           @foreach(explode(',', $article->tags) as $tag) 
                           <!-- Link to the tag page, converting spaces to dashes and making it lowercase -->
                           <a href="{{ url('/tag/' . strtolower(str_replace(' ', '-', $tag))) }}">{{ $tag }}</a>
                           
                           <!-- If this is not the last tag in the list, add a comma -->
                           @if (!$loop->last), @endif
                          @endforeach
                        @else
                           <!-- If no tags, display this message -->
                           No tags available.
                        @endif
                    </p>

                </li>
            @endforeach
        </ul>
    @endif

    <!-- Include the footer template -->
    @include('footer')

</body>
</html>








