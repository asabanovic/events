<?php

namespace Asabanovic\Events\Traits;

use Asabanovic\Events\Model\Event;
use Exception;

trait OrganizationTrait 
{
	/**
	 * Allow this model to become an owner of an event
	 * 
	 * @return Relation 
	 */
	public function events()
	{
		return $this->morphMany('Asabanovic\Events\Model\Event', 'organization');
	}

	/**
	 * Allow this group to create a new event 
	 * 
	 * @param Asabanovic\Events\Model\Event $event 
	 */
	public function organizeEvent(Event $event)
	{
		return $this->events()->save($event);
	}

}