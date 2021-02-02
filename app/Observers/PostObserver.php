<?php


namespace App\Observers;

use App\Post;
use Illuminate\Support\Facades\Cache;
use Mews\Purifier\Facades\Purifier;
class PostObserver
{
    public function creating(Post $post)
    {
        $post->text = Purifier::clean($post->text);
    }

    public function updating(Post $post)
    {
        $post->content = Purifier::clean($post->text);
    }

    public function deleting(Post $post)
    {
        $post->image()->delete();
    }

    public function restoring(Post $post)
    {
        //
    }
}
