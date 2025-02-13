<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\BannedWord;
use App\Models\Blog;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    public function store(Request $request, $blog_id)
    {
        $bannedWords = BannedWord::pluck('word')->toArray();
        $containsBannedWord = false;
        $bannedWordFound = null;

        foreach ($bannedWords as $bannedWord) {
            if (stripos($request->content, $bannedWord) !== false) {
                $containsBannedWord = true;
                $bannedWordFound = $bannedWord;
                break;
            }
        }

        if ($containsBannedWord) {
            return redirect()->route('blogs.detail', $blog_id)
                ->withErrors(['comment' => 'Your comment contains a banned word: ' . $bannedWordFound]);
        }

        Comment::create([
            'blog_id' => $blog_id,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('blogs.detail', $blog_id)
            ->with('success', 'Your comment has been posted successfully!');
    }


    public function like($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        $comment->increment('like_count');

        return back();
    }

    public function likeReply($replyId)
    {
        $reply = Reply::findOrFail($replyId);

        $reply->increment('like_count');

        return back();
    }


    public function reply(Request $request, $commentId)
    {
        $parentComment = Comment::findOrFail($commentId);

        $reply = Reply::create([
            'content' => $request->content,
            'user_id' => auth()->id(),
            'comment_id' => $commentId,
        ]);

        return back();
    }

    public function delete($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if ($comment->user_id !== Auth::id()) {
            return redirect()->route('blogs.detail', $comment->blog_id)
                ->withErrors(['comment' => 'You are not authorized to delete this comment.']);
        }

        $comment->replies()->delete();
        $comment->delete();

        return redirect()->route('blogs.detail', $comment->blog_id)
            ->with('success', 'Comment deleted successfully!');
    }

    public function deleteReply($replyId)
    {
        $reply = Reply::findOrFail($replyId);

        if ($reply->user_id !== Auth::id()) {
            return redirect()->route('blogs.detail', $reply->comment->blog_id)
                ->withErrors(['comment' => 'You are not authorized to delete this reply.']);
        }

        $reply->delete();

        return redirect()->route('blogs.detail', $reply->comment->blog_id)
            ->with('success', 'Reply deleted successfully!');
    }
}
