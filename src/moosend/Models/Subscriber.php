<?php
namespace moosend\Models;

require_once __DIR__.'/CustomField.php';

class Subscriber {
	private $ID;
	private $Name;
	private $Email;
	private $CreatedOn;
	private $UpdatedOn;
	private $UnsubscribedOn;
	private $UnsubscribedFromID;
	
	/**
	 * @var int $SubscribeType
	 * 1: 'Subscribed', Represents an active member.
	 * 2: Unsubscribed, Represents an unsubscribed member.
	 * 3: 'Bounced', Represents a member that has bounced on a previously sent campaign and is probably not valid.
	 * 4: 'Removed'Represents a removed member pending deletion from our database.
	 */
	private $SubscribeType;
	private $CustomFields;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\Subscriber
	 */
	public static function withJSON(array $jsonData) {
		$instance = new self();
		
		$instance->ID = $jsonData['ID'];
		$instance->Name = $jsonData['Name'];
		$instance->Email = $jsonData['Email'];
		$instance->CreatedOn = $jsonData['CreatedOn'];
		$instance->UpdatedOn = $jsonData['UpdatedOn'];
		$instance->UnsubscribedOn = $jsonData['UnsubscribedOn'];
		$instance->UnsubscribedFromID = $jsonData['UnsubscribedFromID'];
		$instance->SubscribeType = $jsonData['SubscribeType'];
		
		$instance->CustomFields = array();
		foreach ($jsonData['CustomFields'] as $field) {
			$customField = CustomField::withJSON($field);
			array_push($instance->CustomFields, $customField);
		}		
		return $instance;
	}
	
	public function getID() {
		return $this->ID;
	}
	
	public function getName() {
		return $this->Name;
	}
	
	public function setName($name) {
		$this->Name  = $name;
		return $this;
	}
	
	public function getEmail() {
		return $this->Email;
	}
	
	public function setEmail($email) {
		$this->Email  = $email;
		return $this;
	}
	
	public function getCreatedOn() {
		return $this->CreatedOn;
	}
	
	public function getUpdatedOn() {
		return $this->UpdatedOn;
	}
	
	public function getUnsubscribedOn() {
		return $this->UnsubscribedOn;
	}

	public function getUnsubscribedFromID() {
		return $this->UnsubscribedFromID;
	}

	public function getSubscribeType() {
		return $this->SubscribeType;
	}

	public function getCustomFields() {
		return $this->CustomFields;
	}
}