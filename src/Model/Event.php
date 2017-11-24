<?php

namespace Asabanovic\Events\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Eloquent
{
	use SoftDeletes;
	
    /**
	 * Allow all fields to be mass-assigned
	 * @var array
	 */
    protected $guarded = ['id'];

    /**
     * Retrieve the owner of the event
     * 
     * @return Relation 
     */
    public function creator()
    {
        return $this->morphTo();
    }

    /**
     * Retrieve the parent group that this event belongs to (such as a RoundTable)
     * 
     * @return Relation 
     */
    public function group()
    {
        return $this->morphTo();
    }

    /**
     * Retrieve all comments for this event
     * 
     * @return Collection 
     */
    public function comments()
    {
    	return $this->belongsToMany('Asabanovic\Events\Model\Comment', 'event_comments');
    }

    /**
     * Get all comments of this event with the event object
     * 
     * @return Relation 
     */
    public function commentsWith()
    {
        return $this->comments()->with('events')->get();
    }
}
