@extends('layouts.app')

@section('content')
    <h1>Submit a New Article</h1>

    <!-- Form to submit article -->
    <form action="{{ route('submit.article') }}" method="POST">
        @csrf

        <label for="title">Article Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="content">Article Content:</label>
        <textarea id="content" name="content" required></textarea>

        <!-- Text field for Category -->
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required>

        <!-- Text field for Tags (comma separated) -->
        <label for="tags">Tags (comma separated):</label>
        <input type="text" id="tags" name="tags" required>

        <button type="submit">Submit Article</button>
    </form>

    <!-- Display the submitted article -->
    @if(isset($article))
        <h2>Article Submitted Successfully!</h2>
        <h3>{{ $article->title }}</h3>
        <div>{{ $article->content }}</div>
        <p><strong>Category:</strong> {{ $article->category_name }}</p>
        <p><strong>Tags:</strong> {{ $article->tags }}</p>
    @endif
@endsection








