<?php

declare(strict_types = 1);

class Category
{
    
    protected $id_category, 
              $name;

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
     * Get the value of id
     */ 
    public function getId_category()
    {
        return $this->id_category;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId_category($id_category)
    {
        $this->id_category = $id_category;

        return $this;
    }

	    /**
     * Get the value of name
     */ 
    public function getName()
    {
                return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
                $this->name = $name;

                return $this;
    }

}