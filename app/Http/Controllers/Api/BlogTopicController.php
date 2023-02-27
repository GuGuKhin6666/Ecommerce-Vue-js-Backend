<?php

namespace App\Http\Controllers\Api;

use App\Models\BlogPost;
use App\Models\BlogTopic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogTopicController extends Controller
{
    //Blog Topic
    public function blogtopic(){
        $data = BlogTopic::get();
        return response()->json([
            'data' => $data,
        ]);
    }

    //Search BLog Topic
    public function searchtopic(Request $request){
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
        ->where('blog_posts.blogtopic',$request->key)->get();
        return response()->json([
         'data' => $data,
        ]);
    }
}
