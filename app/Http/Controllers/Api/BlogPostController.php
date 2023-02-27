<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    //Data in Blog Post to vue template
    public function blogpost(){
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
        ->get();
       return response()->json([
        'data' => $data,
       ]);
    }

    public function searchkeyblog(Request $request){
        $data = BlogPost::select('*',
        'blog_posts.created_at as blogcreated_at',
        'blog_categories.created_at as date',
        'blog_topics.created_at as text',
        'blog_posts.id as blogid',
        'blog_posts.title as posttitle',
        'blog_posts.description as postdescription',
        'blog_categories.id as categoryid',
        'blog_topics.id as topicid',
        'blog_tagposts.title as tagtitle',
        'blog_tagposts.id as tagid')
        ->join('blog_categories','blog_posts.blogcategory','blog_categories.id')
        ->join('blog_topics','blog_posts.blogtopic','blog_topics.id')
        ->join('blog_tagposts','blog_posts.blogtag','blog_tagposts.id')
        ->where('blog_posts.title','LIKE','%'.$request->key.'%')
        ->get();
        logger($data);
       return response()->json([
        'data' => $data,
       ]);
    }

    //id From blog post data
    public function getblogpage(Request $request){
        $data = BlogPost::select('*',
        'blog_posts.id as blogid',
        'blog_posts.title as posttitle',
        'blog_posts.created_at as date',
        'blog_posts.description as postdescription',
        )
        ->join('blog_tagposts','blog_posts.blogtag','blog_tagposts.id')
        ->where('blog_posts.id',$request->key)
        ->get();
        return response()->json([
            'data' => $data,
        ]);
    }
}
