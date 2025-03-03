@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Search</title>
</head>
<body>
    <h1>Search for Articles, Categories, or Tags</h1>

    <!-- Search Form -->
    <form method="POST" action="{{ url('/search') }}">
        @csrf

        <!-- Search by Article ID -->
        <div>
            <label for="search-article-id">Search by Article ID</label>
            <input type="text" id="search-article-id" name="article-id" placeholder="Enter Article ID" />
        </div>

        <!-- Search by Category -->
        <div>
            <label for="search-category">Search by Category</label>
            <input type="text" id="search-category" name="category" placeholder="Enter Category" />
        </div>

        <!-- Search by Tag -->
        <div>
            <label for="search-tag">Search by Tag</label>
            <input type="text" id="search-tag" name="tag" placeholder="Enter Tag" />
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit">Search</button>
        </div>
    </form>

@include('footer')
</body>
</html>


