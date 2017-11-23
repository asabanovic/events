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
 
}