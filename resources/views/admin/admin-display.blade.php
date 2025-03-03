@extends('layouts.app') <!-- Extend the base layout -->

@section('content') <!-- Define the content section of the page -->
    
    <!-- Display the title of the admin console -->
    <h1>Admin Console</h1>

    <!-- Check if there is an error message in the session and display it -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }} <!-- Show the error message from the session -->
        </div>
    @endif

    <!-- Provide a link to create a new article -->
    <p><a href="{{ url('/create-article') }}">Create New Article</a></p>

    <!-- Start a table to display articles -->
    <table>
        <thead>
            <tr>
                <!-- Table headers: Title, Category, and Actions -->
                <th>Title</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through each article to display it in the table -->
            @foreach ($articles as $article)
                <tr>
                    <!-- Display the article's title -->
                    <td>{{ $article->title }}</td>
                    
                    <!-- Display the category name of the article -->
                    <td>{{ $article->category_name }}</td>  <!-- Fixed this line to show category name -->
                    
                    <td>
                        <!-- Provide a link to edit the article -->
                        <a href="{{ url('/edit-article/' . $article->article_id) }}">Edit</a>
                        
                        <!-- Create a form to handle the deletion of the article -->
                        <form action="{{ url('/delete-article') }}" method="POST" style="display:inline;">
                            @csrf <!-- Include the CSRF token for security -->
                            
                            <!-- Hidden field to pass the article ID for deletion -->
                            <input type="hidden" name="article_id" value="{{ $article->article_id }}">
                            
                            <!-- Delete button to submit the form and trigger deletion -->
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection




