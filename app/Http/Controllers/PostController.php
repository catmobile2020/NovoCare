<?php

namespace App\Http\Controllers;

use App\Events\PostPosted;
use App\Helper\DeleteOldFile;
use App\Helper\StoreFile;
use App\Http\Requests\StorePost;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only([
            'create', 'store', 'edit', 'destroy', 'restore'
        ]);
    }

    public function index()
    {
        return view('posts.index', [
            'posts' => Post::paginate(),
            'meta_title' => __('Posts'),
        ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        if (Storage::exists($post->image)){
            $post['image'] = asset(Storage::url($post->image));
        }else {
            $post['image'] = asset('media/default_image.png');
        }

        return view('posts.show', [
            'post' => $post,
            'meta_title' => $post->title,
        ]);
    }

    public function create()
    {
        return view('posts.create', ['meta_title' => __('Add Post')]);
    }

    public function store(StorePost $request)
    {
        $validateData = $request->validated();
        $validateData['slug'] = Str::slug($request->title);



        if ($request->hasFile('image')) {
            unset($validateData['image']);
            $imageName = StoreFile::save($request->image, 'posts');
            $validateData['image'] = $imageName;
        }

        $post = Post::create($validateData);
        event(new PostPosted($post));

        $request->session()->flash('status', 'Post was created!');

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', [
            'post' => $post,
            'meta_title' => __('Update Blog Post')
        ]);
    }

    public function update(StorePost $request, $id)
    {
        $post = Post::findOrFail($id);

        $validateData = $request->validated();

        $post->fill($validateData);

        if ($request->hasFile('image')) {
            if(isset($post->photo)){
                DeleteOldFile::delete($post->photo);
            }
            $imageName = StoreFile::save($request->image, 'posts');
            $validateData['image'] = $imageName;
        }

        $post->save();
        $request->session()->flash('status', __('Post was updeted'));

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        $request->session()->flash('status', __('Post was deleted!'));
        return redirect()->route('posts.index');
    }

    public function restore(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->restore();

        $request->session()->flash('status', __('Post was restored!'));

        return redirect()->route('posts.index');
    }
}
