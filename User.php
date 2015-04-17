<?php
require_once 'DataHubApi.php';

class User {
    protected $badgeNumber;

    protected $cabinId;

    protected $birthday;

    protected $email;

    protected $password;

    protected $userId;

    protected $title;

    protected $salutation;

    protected $firstName;

    protected $lastName;

    protected $middleName;

	/************************************************/


	public function register() {
		$api = DataHubApi::getInstance();
		$data = $api->userRegister([
			'badgeNumber'	=> $this->badgeNumber,
			'cabinId'		=> $this->cabinId,
			'birthday'		=> $this->birthday,
			'email'			=> $this->email,
			'passwrod'		=> $this->password,
		]);
		
		$this->userId		= $data['userId'];
		$this->title		= $data['title'];
		$this->salutation	= $data['salutation'];
		$this->firstName	= $data['firstName'];
		$this->middleName	= $data['middleName'];
		$this->lastName		= $data['lastName'];
		$this->birthday		= $data['birthday'];
	}


	/************ Getters & setters *****************/

	/**
	 * Setter for BadgeNumber
	 * @param mixed $badgeNumber
	 * @return $this
	 */
	public function setBadgeNumber($badgeNumber){
		$this->badgeNumber = $badgeNumber;
		return $this;
	}

	/**
	 * Setter for CabinId
	 * @param mixed $cabinId
	 * @return $this
	 */
	public function setCabinId($cabinId){
		$this->cabinId = $cabinId;
		return $this;
	}

	/**
	 * Getter for Birthday
	 */
	public function getBirthday(){
		return $this->birthday;
	}

	/**
	 * Setter for Birthday
	 * @param mixed $birthday
	 * @return $this
	 */
	public function setBirthday($birthday){
		$this->birthday = $birthday;
		return $this;
	}

	/**
	 * Setter for Email
	 * @param mixed $email
	 * @return $this
	 */
	public function setEmail($email){
		$this->email = $email;
		return $this;
	}


	/**
	 * Setter for Password
	 * @param mixed $password
	 * @return $this
	 */
	public function setPassword($password){
		$this->password = $password;
		return $this;
	}

	/**
	 * Getter for UserId
	 */
	public function getUserId(){
		return $this->userId;
	}

	/**
	 * Getter for Title
	 */
	public function getTitle(){
		return $this->title;
	}

	/**
	 * Getter for Salutation
	 */
	public function getSalutation(){
		return $this->salutation;
	}

	/**
	 * Getter for FirstName
	 */
	public function getFirstName(){
		return $this->firstName;
	}

	/**
	 * Getter for LastName
	 */
	public function getLastName(){
		return $this->lastName;
	}

	/**
	 * Getter for MiddleName
	 */
	public function getMiddleName(){
		return $this->middleName;
	}

}
