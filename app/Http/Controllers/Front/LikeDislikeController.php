<?php

namespace App\Http\Controllers\Front;

use App\Models\LikeDislike;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LikeDislikeController extends Controller
{
    /**
     * Like or dislike a news.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function likeDislike(Request $request, News $news)
    {
        $userId = Auth::id();

        // Check if the user has already liked or disliked the post
        $likeDislike = LikeDislike::where('user_id', $userId)
            ->where('news_id', $news->id)
            ->first();

        $isLike = (bool) $request->input('is_like', false);

        if ($likeDislike) {
            // Toggle the like/dislike status
            if ($likeDislike->is_like == $isLike) {
                // Remove the existing like/dislike
                $likeDislike->delete();
            } else {
                // Update the like/dislike status
                $likeDislike->is_like = $isLike;
                $likeDislike->save();
                event(new \App\Events\LikeDislikeEvent($likeDislike));
            }
        } else {
            // Create a new like/dislike record
            $likeDislike = LikeDislike::create([
                'user_id' => $userId,
                'news_id' => $news->id,
                'is_like' => $isLike,
            ]);
            event(new \App\Events\LikeDislikeEvent($likeDislike));
        }

      
        return response()->json([
            'message' => 'News ' . ($likeDislike->is_like ? 'liked' : 'disliked') . ' successfully',
            'like_count' => $news->likes()->count(),
            'dislike_count' => $news->dislikes()->count(),
        ]);
    }
}
