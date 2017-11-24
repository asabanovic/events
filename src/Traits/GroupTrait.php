<?php

namespace Asabanovic\Events\Traits;
use Asabanovic\Events\Model\Event;
use Exception;

trait GroupTrait 
{
	/**
	 * Allow this model to become an owner of an event
	 * 
	 * @return Relation 
	 */
	public function events()
	{
		return $this->morphMany('Asabanovic\Events\Model\Event', 'group');
	}

	/**
	 * Allow this group to create a new event 
	 * 
	 * @param Asabanovic\Events\Model\Event $event 
	 */
	public function addEvent(Event $event)
	{
		return $this->events()->save($event);
	}

}