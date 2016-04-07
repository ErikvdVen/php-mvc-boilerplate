<?php

namespace ErikvdVen\PHP_MVC\Models;

/**
 * @Entity
 * @Table(name="users")
 */
class User {

	/**
	 * @Id
	 * @Column(type="integer")
	 * @GeneratedValue
	 */
	private $id;

	/**
	 * @Column(type="string")
	 */
	private $firstname;

	/**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

	/**
	 * @Column(type="string")
	 */
	private $infix;

	/**
     * @param string $infix
     */
    public function setInfix($infix)
    {
    	$this->infix = $infix;
    }

    /**
     * @return string
     */
    public function getInfix()
    {
        return $this->infix;
    }

	/**
	 * @Column(type="string")
	 */
	private $lastname;

	/**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

	/**
	 * @Column(type="string")
	 */
	private $dob;

	/**
     * @param string $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return string
     */
    public function getDob()
    {
        return $this->dob;
    }

	/**
	 * @Column(type="string", columnDefinition="ENUM('m', 'f')")
	 */
	private $gender;

	/**
     * @param string $zipcode
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

	/**
	 * @Column(type="string", length=6)
	 */
	private $zipcode;

	/**
     * @param string $zipcode
     */
    public function setZipcode($zipcode)
    {
    	$zipcode = strtoupper(preg_replace('/\s+/', '', $zipcode));
        $this->zipcode = $zipcode;
    }

    /**
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

	/**
	 * @Column(type="integer")
	 */
	private $housenumber;

	/**
     * @param integer $housenumber
     */
    public function setHousenumber($housenumber)
    {
        $this->housenumber = $housenumber;
    }

    /**
     * @return integer
     */
    public function getHousenumber()
    {
        return $this->housenumber;
    }
}