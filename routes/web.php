<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

// Route for the home page, displaying the latest 5 articles
Route::get('/', [ArticleController::class, 'index']);

// Route to display a single article by its ID
Route::get('article/{id}', [ArticleController::class, 'showArticle'])->name('article.show');

// Route to display articles by a category, identified by its slug
Route::get('/category/{slug}', [ArticleController::class, 'showCategory'])->name('category.show');

// Route to display articles by a tag, identified by its slug
Route::get('/tag/{slug}', [ArticleController::class, 'showTag'])->name('tag.show');

// Route to display the Terms of Use page
Route::get('terms-of-use', [ArticleController::class, 'showTermsOfUse']);

// Route to display the Privacy Policy page
Route::get('privacy-policy', [ArticleController::class, 'showPrivacyPolicy']);

// Route to show the search form
Route::get('search', [ArticleController::class, 'showSearchForm']);

// Route to handle the search request (POST)
Route::post('search', [ArticleController::class, 'handleSearch']);

// Route to accept cookies and set the cookie (POST)
Route::post('accept-cookies', [ArticleController::class, 'acceptCookies']);

// Route to display the writer's console 
Route::get('writers/console', [ArticleController::class, 'showWritersConsole']);

// Route to display the password form to access the writer's console
Route::get('writers/password', [ArticleController::class, 'showPasswordForm']);

// Route to handle the password submission and authenticate the writer
Route::post('writers/password', [ArticleController::class, 'handlePasswordSubmission']);

// Route to show the article creation form for writers
Route::get('writers/create-article', [ArticleController::class, 'createArticleForm']);

// Route to handle the article submission (POST) from the writer
Route::post('writers/create-article', [ArticleController::class, 'submitArticle']);



            
        
        
                                                    
                            
                            
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    
                    
                            
                

    
            
            
            
        
         
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    