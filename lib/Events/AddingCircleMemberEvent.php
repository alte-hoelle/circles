<?php

declare(strict_types=1);


/**
 * Circles - Bring cloud-users closer together.
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Maxence Lange <maxence@artificial-owl.com>
 * @copyright 2021
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */


namespace OCA\Circles\Events;


use OCA\Circles\Model\Federated\FederatedEvent;


/**
 * Class AddingCircleMemberEvent
 *
 * This event is called when one or multiple members are added to a Circle on the current instance
 * of Nextcloud.
 *
 * The entry is already generated in the members table.
 * The memberships of the member[s] are already generated in the memberships table.
 *
 * This is a good place if anything needs to be executed when a new member have been added to a Circle.
 *
 * If anything needs to be managed on the master instance of the Circle (ie. CircleMemberAddedEvent), please use:
 *    $event->getFederatedEvent()->addResult(string $key, array $data)
 *
 * @package OCA\Circles\Events
 */
class AddingCircleMemberEvent extends CircleMemberGenericEvent {


	/** @var int */
	private $type = 0;


	/**
	 * AddingCircleMemberEvent constructor.
	 *
	 * @param FederatedEvent $federatedEvent
	 */
	public function __construct(FederatedEvent $federatedEvent) {
		parent::__construct($federatedEvent);
	}


	/**
	 * @param int $type
	 *
	 * @return $this
	 */
	public function setType(int $type): self {
		$this->type = $type;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getType(): int {
		return $this->type;
	}

}

