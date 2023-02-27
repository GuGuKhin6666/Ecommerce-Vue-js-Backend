<?php

namespace App\Http\Controllers\Api;

use App\Models\BlogPost;
use App\Models\BlogTagpost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogtagpostController extends Controller
{
    //BLog Tag post data
    public function tagpost(){
        $data = BlogTagpost::get();
        return response()->json([
            'data' => $data,
        ]);
    }

    //Search BLog Tag Post
    public function searchtagpost(Request $request){
        $data = BlogPost::select('*',
        'blog_posts.created_at as blogcreated_at',
        'blog_categories.created_at as date',
        'blog_topics.created_at as text',
        'blog_posts.title as posttitle',
        'blog_posts.id as blogid',
        'blog_posts.description as postdescription',
        'blog_categories.title as categorytitle',
        'blog_categories.id as categoryid',
        'blog_topics.id as topicid',
        'blog_topics.title as topictitle',
        'blog_tagposts.title as tagtitle',
        'blog_tagposts.id as tagid')
        ->join('blog_categories','blog_posts.blogcategory','blog_categories.id')
        ->join('blog_topics','blog_posts.blogtopic','blog_topics.id')
        ->join('blog_tagposts','blog_posts.blogtag','blog_tagposts.id')
        ->where('blog_posts.blogtag',$request->key)->get();
        return response()->json([
         'data' => $data,
        ]);
     }
}
