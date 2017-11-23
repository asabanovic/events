<?php

namespace Asabanovic\Events\Traits;
use Asabanovic\Events\Model\Event;
use Exception;

trait EventTrait 
{
	use CommentTrait;
	use AttendanceTrait;

	/**
	 * Allow this model to become an owner of an event
	 * 
	 * @return Relation 
	 */
	public function events()
	{
		return $this->morphMany('Asabanovic\Events\Model\Event', 'creator');
	}

	/**
	 * Set the event owner
	 * 
	 * @param  Asabanovic\Events\Model\Event  $event 	
	 * @return Asabanovic\Events\Model\Event        
	 */
	public function organizeEvent(Event $event)
	{
		return $this->events()->save($event);
	}

	/**
	 * Return Event model by event ID
	 * This can also be done via the Event Facade
	 * 
	 * @param  integer $event_id 
	 * @return Asabanovic\Events\Model\Event           
	 */
	public function event($event_id)
	{
		$event = Event::find(intval($event_id));

		if (!$event) {
			throw new Exception("Event with event ID = $event_id does not exist", 1);
		}

		return $event;
	}

	/**
	 * This object will attend this specific event
	 * 
	 * @param  Event  $event 
	 * @return  Asabanovic\Events\Model\EventAttendance
	 */
	public function goTo(Event $event)
	{
		return $this->attending()->create([ 'event_id' => $event->id]);
	}

	/**
	 * Pretty method to list all events that this object is attending
	 * 
	 * @return Collection 
	 */
	public function visitingEvents()
	{
		return $this->attending()->with('event')->get();
	}
}