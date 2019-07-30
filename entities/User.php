<?php

declare(strict_types = 1);

class User
{
    
    protected $id_user, 
              $firstname,
              $lastname,
              $tokenId;
            

	/**
	 * Constructor
	 *
	 * @param array $array
	 */
	public function __construct(array $array)
	{
		$this->hydrate($array);
	}

	/**
	 * Hydratation
	 *
	 * @param array $array
	 *
	 */
	public function hydrate(array $array)
	{
		foreach ($array as $key => $value)
		{
			// On récupère le nom du setter correspondant à l'attribut.
			$method = 'set'.ucfirst($key);

			// Si le setter correspondant existe.
			if (method_exists($this, $method))
			{
				// On appelle le setter.
				$this->$method($value);
			}
		}
    }
    
        /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
                return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
                $this->firstname = $firstname;

                return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
                return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
                $this->lastname = $lastname;

                return $this;
    }

    /**
     * Get the value of tokenId
     */ 
    public function getTokenId()
    {
                return $this->tokenId;
    }

    /**
     * Set the value of tokenId
     *
     * @return  self
     */ 
    public function setTokenId($tokenId)
    {
                $this->tokenId = $tokenId;

                return $this;
    }

}