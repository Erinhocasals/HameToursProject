<?php

namespace risul\LaravelLikeComment\Controllers;

use risul\LaravelLikeComment\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Facade\Ignition\Support\FakeComposer;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Faker\Factory as Faker;

class CommentController extends Controller
{
    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public function index(){
    	return view('laravelLikeComment::like');
    }

    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public function add(Request $request){
    	$user = Auth::user() ?: null;
    	$parent = $request->parent;
    	$commentBody = $request->comment;
    	$itemId = $request->item_id;

        $faker = Faker::create();

        $hash = md5(strtolower(trim($faker->email)));
        $userPic = "http://www.gravatar.com/avatar/$hash?d=identicon";

        if ($user) {
            $userPic = $user->profile_photo_url;
        }

	    $comment = new Comment;
	    $comment->user_id = $user ? $user->id : null;
	    $comment->parent_id = $parent;
	    $comment->item_id = $itemId;
	    $comment->comment = $commentBody;

	    $comment->save();

	    $id = $comment->id;
    	return response()->json(['flag' => 1, 'id' => $id, 'comment' => $commentBody, 'item_id' => $itemId, 'userName' => $user ? $user->name : "Anon.", 'userPic' => $userPic]);
// dd($comment);
    }

    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public static function viewLike($id){
        echo view('laravelLikeComment::like')
                ->with('like_item_id', $id);
    }

    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public static function getComments($itemId){
        $comments = Comment::where('item_id', $itemId)->orderBy('parent_id', 'asc')->get();

        foreach ($comments as $comment){
            if ($comment->user_id) {
                $userId = $comment->user_id;
                $user = self::getUser($userId);
                $comment->name = $user['name'];
                $comment->email = $user['email'];
                $comment->url = $user['url'];
                $comment->avatar = $user['avatar'];
            }
        }

        return $comments;
    }

    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public static function getUser($userId){
        $userModel = config('laravelLikeComment.userModel');
        return $userModel::getAuthor($userId);
    }
}