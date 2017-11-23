<?php

namespace Asabanovic\Events\Traits;
use Asabanovic\Events\Model\Comment;
use Exception;

trait CommentTrait 
{
	/**
	 * Allow this model to become an owner of a comment
	 * 
	 * @return Relation 
	 */
	public function comments()
	{
		return $this->morphMany('Asabanovic\Events\Model\Comment', 'creator');
	}

	/**
	 * Creator whites a comment
	 * 
	 * @param  Asabanovic\Events\Model\Comment  $comment 	
	 * @return Asabanovic\Events\Model\Comment        
	 */
	public function writeComment(Comment $comment)
	{
		return $this->comments()->save($comment);
	}

	/**
	 * Return Comment model by comment ID
	 * This can also be done via the Comment Facade
	 * 
	 * @param  integer $comment_it 
	 * @return Asabanovic\Events\Model\Comment           
	 */
	public function comment($comment_id)
	{
		$comment = Comment::find(intval($comment_id));

		if (!$comment) {
			throw new Exception("Comment with comment ID = $comment_id does not exist", 1);
		}

		return $comment;
	}
 
}