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
	 * Get all comments of this model with the creator object
	 * 
	 * @return Relation 
	 */
	public function commentsWith()
	{
		return $this->comments()->with('creator')->get();
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
 
}