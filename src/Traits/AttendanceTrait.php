<?php

namespace Asabanovic\Events\Traits;
use Asabanovic\Events\Model\Event;
use Exception;

trait AttendanceTrait 
{
	/**
	 * Allow this model to attend events
	 * 
	 * @return Relation 
	 */
	public function attending()
	{
		return $this->morphMany('Asabanovic\Events\Model\EventAttendance', 'creator');
	}

	/**
	 * Check if this model is attending specific event
	 * 
	 * @param  Event   $event 
	 * @return Bollean        
	 */
	public function isAttending(Event $event)
	{
		return $this->attending()->where('event_id', $event->id)->exists();
	}
 
}