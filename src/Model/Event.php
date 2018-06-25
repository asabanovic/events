<?php

namespace Asabanovic\Events\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Eloquent
{
	use SoftDeletes;
	
    /**
	 * Allow all fields to be mass-assigned
     * 
	 * @var array
	 */
    protected $fillable = [
        'dial_in_number',        
        'host',        
        'screen_share_url',
        'establishment',
        'creator_type',
        'creator_id',
        'group_type',
        'group_id',
        'title',
        'description',
        'url',
        'start',
        'end',
        'address',
        'city',
        'zip',
        'state',
        'country',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

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

    /**
     * Define a relationship with the Attendance model
     * 
     * @return Relation 
     */
    public function attending()
    {
        return $this->hasMany('Asabanovic\Events\Model\EventAttendance');
    }

    /**
     * Define a relationship with the Attendance model pulling creator object as well (user)
     * 
     * @return Relation 
     */
    public function attendingWith()
    {
        return $this->hasMany('Asabanovic\Events\Model\EventAttendance')->with('creator');
    }
}
