<?php

namespace Asabanovic\Events\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class EventAttendance extends Eloquent
{
    /**
	 * Allow all fields to be mass-assigned
	 * @var array
	 */
    protected $guarded = [];

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
     * This attendance record is related to one event
     * 
     * @return Relation 
     */
    public function event()
    {
    	return $this->belongsTo('Asabanovic\Events\Model\Event');
    }

}
