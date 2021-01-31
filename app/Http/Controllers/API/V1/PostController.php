<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post, Request $request){
        $perPage = $request->get('per_page', 15);
        return PostResource::collection($post->where('is_active', true)->paginate($perPage)
            ->appends([
                'per_page' => $perPage
            ])
        );
    }
    public function show(Post $post, Request $request){
        return PostResource::collection($post->where('slug', $request->slug)->get());
    }
}
