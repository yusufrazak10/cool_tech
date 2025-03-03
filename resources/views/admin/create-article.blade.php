@extends('layouts.app')

@section('content')
<h1>Create New Article</h1>

<form action="{{ url('/create-article') }}" method="POST">
    @csrf
    <label for="title">Title</label>
    <input type="text" name="title" id="title" required>

    <label for="content">Content</label>
    <textarea name="content" id="content" required></textarea>

    <label for="category">Category</label>
    <input type="text" name="category" id="category" required placeholder="Enter a category">

    <button type="submit">Create Article</button>
</form>
@endsection

    