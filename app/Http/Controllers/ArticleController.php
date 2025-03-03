<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    // Display the home page with the latest 5 articles.
    public function index()
    {
        // Fetch the latest 5 articles from the database
        $articles = DB::table('Articles')->orderBy('creation_date', 'desc')->take(5)->get();
        
        // Return the 'home' view with the fetched articles
        return view('home', ['articles' => $articles]);
    }
    
    // Display a single article by its ID.
    public function showArticle($id)
    {
        // Fetch article data along with associated category and tags using left joins
        $article = DB::table('Articles')
        ->leftJoin('Categories', 'Articles.category_id', '=', 'Categories.category_id')
        ->leftJoin('Article_Tags', 'Articles.article_id', '=', 'Article_Tags.article_id')
        ->leftJoin('Tags', 'Article_Tags.tag_id', '=', 'Tags.tag_id')
        // Filter by article ID
        ->where('Articles.article_id', $id)  
        ->select(
            'Articles.title',
            'Articles.content',
            'Articles.creation_date',
            'Categories.category_name as category_name',
            DB::raw('GROUP_CONCAT(DISTINCT Tags.tag_name) as tag_names')  
            )
            ->groupBy(
                'Articles.title',
                'Articles.content',
                'Articles.creation_date',
                'Categories.category_name'
                )
                ->first();  
                
                // If no article is found, redirect to home with an error message
                if (!$article) {
                    return redirect('/')->with('error', 'Article not found.');
                }
                
                // Split tag names into an array
                $article->tags = explode(',', $article->tag_names);
                
                // Return the 'article' view with the fetched article data
                return view('article', ['article' => $article]);
    }
    
    // Display articles of a specific category by slug.
    public function showCategory($slug)
    {
        // Fetch the category by its slug (case-insensitive)
        $category = DB::table('Categories')
        ->where('slug', strtolower($slug))
        ->first();
        
        // If category is not found, return a 404 error
        if (!$category) {
            abort(404, 'Category not found');
        }
        
        // Fetch articles belonging to the specified category
        $articles = DB::table('Articles')
        ->where('category_id', $category->category_id)
        ->leftJoin('Article_Tags', 'Articles.article_id', '=', 'Article_Tags.article_id')
        ->leftJoin('Tags', 'Article_Tags.tag_id', '=', 'Tags.tag_id')
        ->select('Articles.*', DB::raw('GROUP_CONCAT(Tags.tag_name) as tags'))
        ->groupBy('Articles.article_id')  
        ->get()
        ->map(function ($article) {
            // Ensure tags are always a string, even if null
            $article->tags = $article->tags ?: '';
            return $article;
        });
            
            // Return the 'category' view with the category and articles
            return view('category', ['category' => $category, 'articles' => $articles]);
    }
    
    // Display articles that are associated with a specific tag.
    public function showTag($slug)
    {
        // Fetch the tag using the slug
        $tag = DB::table('Tags')
        ->where('slug', strtolower($slug))  
        ->first();
        
        // If tag not found, return a 404 error
        if (!$tag) {
            abort(404, 'Tag not found');
        }
        
        // Fetch articles that are tagged with the specific tag
        $articles = DB::table('Articles')
        ->join('Article_Tags', 'Articles.article_id', '=', 'Article_Tags.article_id')
        ->join('Tags', 'Article_Tags.tag_id', '=', 'Tags.tag_id')
        ->where('Tags.tag_id', $tag->tag_id)
        ->select('Articles.*', DB::raw('GROUP_CONCAT(Tags.tag_name) as tags'))
        ->groupBy('Articles.article_id')
        ->get();
        
        // Return the 'tag' view with the tag and articles
        return view('tag', ['tag' => $tag, 'articles' => $articles]);
    }
    
    // Display the Terms of Use page.
    public function showTermsOfUse()
    {
        return view('legal', ['subsection' => 'tou']);
    }
    
    // Display the Privacy Policy page.
    public function showPrivacyPolicy()
    {
        return view('legal', ['subsection' => 'privacy']);
    }
    
    // Show the search form.
    public function showSearchForm()
    {
        return view('search');
    }
    
    // Handle the search functionality based on different search criteria (article, category, or tag).
    public function handleSearch(Request $request)
    {
        $articleId = $request->input('article-id');
        $category = $request->input('category');
        $tag = $request->input('tag');
        
        // If an article ID is provided, search for that article
        if ($articleId) {
            $article = DB::table('articles')
            ->leftJoin('categories', 'articles.category_id', '=', 'categories.category_id')
            ->leftJoin('article_tags', 'articles.article_id', '=', 'article_tags.article_id')
            ->leftJoin('tags', 'article_tags.tag_id', '=', 'tags.tag_id')
            ->where('articles.article_id', $articleId)
            ->select('articles.*', 'categories.category_name', DB::raw('GROUP_CONCAT(DISTINCT tags.tag_name) as tags'))
            ->groupBy('articles.article_id')
            ->first();
            
            // If article is found, return it, otherwise show an error
            if ($article) {
                $article->tags = explode(',', $article->tags);
                return view('article', ['article' => $article]);
            } else {
                return view('search', ['error' => 'Article not found.']);
            }
        }
        
        // If a category is provided, search for articles in that category
        if ($category) {
            $categoryRecord = DB::table('categories')->where('category_name', $category)->first();
            
            if ($categoryRecord) {
                $articles = DB::table('articles')->where('category_id', $categoryRecord->category_id)->get();
                return view('category', ['category' => $categoryRecord, 'articles' => $articles]);
            } else {
                return view('search', ['error' => 'Category not found.']);
            }
        }
        
        // If a tag is provided, search for articles with that tag
        if ($tag) {
            $tagRecord = DB::table('tags')->where('tag_name', $tag)->first();
            
            if ($tagRecord) {
                $articles = DB::table('articles')
                ->join('article_tags', 'articles.article_id', '=', 'article_tags.article_id')
                ->join('tags', 'article_tags.tag_id', '=', 'tags.tag_id')
                ->where('tags.tag_name', $tagRecord->tag_name)
                ->select('articles.*', DB::raw('GROUP_CONCAT(tags.tag_name) as tags'))
                ->groupBy('articles.article_id')
                ->get();
                
                return view('tag', ['tag' => $tagRecord, 'articles' => $articles]);
            } else {
                return view('search', ['error' => 'Tag not found.']);
            }
        }
        
        // If no search term is provided, ask the user to enter one
        return view('search', ['error' => 'Please enter a search term.']);
    }
    
    // Accept cookies and set a cookie indicating acceptance.
    public function acceptCookies()
    {
        // Set cookie for one year (525600 minutes)
        Cookie::queue('cookies_accepted', true, 525600);  
        return response()->json(['status' => 'success']);
    }
    
    // Show the writer's console (for authors to manage articles).
    public function showWritersConsole()
    {
        return view('writers.console');
    }
    
    // Show the password form to access the writer's console.
    public function showPasswordForm()
    {
        return view('writers.password');
    }
    
    // Handle the password submission to access the writer's console.
    public function handlePasswordSubmission(Request $request)
    {
        $password = $request->input('password');
        
        // Check if the password matches the one stored in the environment file
        if ($password === env('AUTHOR_PASSWORD')) {
            // Fetch categories and tags for the writer's console
            $categories = DB::table('categories')->get();
            $tags = DB::table('tags')->get();
            return view('writers.console', compact('categories', 'tags'));
        } else {
            return redirect()->route('show-password-form')->with('error', 'Incorrect password. Please try again.');
        }
    }
    
    // Display the create article form.
    public function createArticleForm()
    {
        $categories = DB::table('categories')->get();
        $tags = DB::table('tags')->get();
        return view('writers.console', compact('categories', 'tags'));
    }
    
    // Submit a new article to the database.
    public function submitArticle(Request $request)
    {
        // Insert the article into the database and get the article ID
        $articleId = DB::table('articles')->insertGetId([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => DB::table('categories')->insertGetId(['category_name' => $request->input('category')]),
            'creation_date' => now(),
        ]);
        
        // If tags are provided, insert them into the 'article_tags' table
        if ($request->has('tags')) {
            $tags = explode(',', $request->input('tags'));
            foreach ($tags as $tagName) {
                $tagName = trim($tagName);
                // Check if the tag exists; if not, insert it into the tags table
                $tag = DB::table('tags')->where('tag_name', $tagName)->first();
                $tagId = $tag ? $tag->tag_id : DB::table('tags')->insertGetId(['tag_name' => $tagName]);
                // Link the tag to the article
                DB::table('article_tags')->insert(['article_id' => $articleId, 'tag_id' => $tagId]);
            }
        }
        
        // Fetch the newly created article and its category
        $article = DB::table('articles')
        ->join('categories', 'articles.category_id', '=', 'categories.category_id')
        ->where('articles.article_id', $articleId)
        ->select('articles.*', 'categories.category_name')
        ->first();
        
        // Redirect to the newly created article with a success message
        return redirect()->route('article.show', ['id' => $article->article_id])->with('success', 'Article created successfully!');
    }
}

