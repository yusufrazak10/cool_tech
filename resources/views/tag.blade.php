@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title dynamically set to reflect the current tag's name -->
    <title>{{ $tag->tag_name }} - Articles</title>
</head>
<body>

    <!-- Heading displaying the tag name -->
    <h1>Tag: {{ $tag->tag_name }}</h1>
    
    <!-- Subheading for the list of articles under the tag -->
    <h2>Articles</h2>

    <!-- Check if there are any articles associated with the current tag -->
    @if($articles->isEmpty())
        <!-- If no articles, display a message indicating no articles are found for this tag -->
        <p>No articles found for this tag.</p>
    @else
        <!-- If articles exist, display them in a list -->
        <ul>
            @foreach($articles as $article)
                <!-- For each article, display its title, content, creation date, and tags -->
                <li>
                    <!-- Link to the individual article page, passing the article's ID in the URL -->
                    <h3><a href="{{ url('/article/' . $article->article_id) }}">{{ $article->title }}</a></h3>
                    
                    <!-- Display a preview of the article's content -->
                    <p>{{ $article->content }}</p>
                    
                    <!-- Display the article's creation date -->
                    <p>Creation Date: {{ $article->creation_date }}</p>
                    
                    <!-- Display the article's tags -->
                    <p>Tags: 
                        <!-- Loop through each tag associated with the article (tags are stored as a comma-separated string) -->
                        @foreach(explode(',', $article->tags) as $tag)
                            <!-- For each tag, create a link to the tag page, converting spaces to dashes and making it lowercase -->
                            <a href="{{ url('/tag/' . strtolower(str_replace(' ', '-', $tag))) }}">{{ $tag }}</a>
                            
                            <!-- If this isn't the last tag, display a comma after the tag -->
                            @if (!$loop->last), @endif
                        @endforeach
                    </p>
                </li>
            @endforeach
        </ul>
    @endif

    <!-- Include the footer of the page from the 'footer' view -->
    @include('footer')

</body>
</html>






