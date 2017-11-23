<?php

namespace Asabanovic\Events\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Comment extends Eloquent
{
    /**
	 * Allow all fields to be mass-assigned
	 * @var array
	 */
    protected $guarded = ['id'];

    /**
     * Every event can include a comment
     * 
     * @return Relation 
     */
    public function event()
    {
    	return $this->belongsTo('Asabanovic\Events\Model\Event');
    }

    /**
     * Retrive the owner of the comment
     * 
     * @return Relation 
     */
    public function creator()
    {
        return $this->morphTo();
    }

    /**
     * List all events that this comment belongs to
     * This might come handy if we want one comment bulk posted to many events
     * 
     * @return Relation 
     */
    public function events()
    {
    	return $this->belongsToMany('Asabanovic\Events\Model\Event', 'event_comments');
    }
}
