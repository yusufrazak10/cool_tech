@extends('layouts.app') <!-- Extend the base layout for consistent structure -->

@section('content') <!-- Define the content section -->

    <!-- Display the page title for editing an article -->
    <h1>Edit Article</h1>

    <!-- Start a form for updating the article -->
    <form action="{{ url('/update-article/' . $article->article_id) }}" method="POST">
        @csrf <!-- Include the CSRF token for security purposes -->
        
        <!-- Input field for the article's title -->
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $article->title }}" required> <!-- Populate the title field with the existing article title -->

        <!-- Textarea for the article's content -->
        <label for="content">Content</label>
        <textarea name="content" id="content" required>{{ $article->content }}</textarea> <!-- Populate the content field with the existing article content -->

        <!-- Dropdown for selecting the article's category -->
        <label for="category">Category</label>
        <select name="category" id="category">
            <!-- Loop through available categories and set the selected category based on the article's current category -->
            @foreach($categories as $category)
                <option value="{{ $category->category_id }}" 
                        {{ $article->category_id == $category->category_id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>

        <!-- Submit button to update the article -->
        <button type="submit">Update Article</button>
    </form>

@endsection


