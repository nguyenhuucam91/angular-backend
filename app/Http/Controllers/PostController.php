<?php

namespace App\Http\Controllers;

use App\Post;
use Cache;

class PostController extends BaseController
{
    protected $set = "clear";

    public function index() 
    {
        $posts = [];
        $aerospikeCacheStore = Cache::store('aerospike');
        if ($aerospikeCacheStore->has('posts')) {
            $posts = $aerospikeCacheStore->get('posts');
        }
        else {
            $posts = Post::limit(100)->get()->toArray();
            //store giá trị trong cache trong 5 phút
            $aerospikeCacheStore->put('posts', $posts, 5);
        }
        
        return view('post.index', compact('posts'));
    }

    public function store()
    {
        //collection doesn't work, must be array to create aerospike list
        $postIds = Post::limit(100)->get()->toArray();
        
        // return $postIds;
        //postIds returns array
        $value = [
            // array of array => array 2 dimension
            'postIds' => $postIds
        ];

        //put this in bin, then this return 
        $this->aeroSpike->put($this->key, $value , 0);
    }

    public function update()
    {
        //Thêm mới 1 element vào list với key được setup ở BaseController, postIds là tên bin và 1233112 
        //là giá trị đẩy thêm vào list trên bin postIds đó
        $this->aeroSpike->listAppend($this->key, "postIds", 1233112);
    }

    public function view($id) 
    {
        $post = Post::where(['name' => 'Joyce Casper'])->get(); // array
        return $post;
    }
}
