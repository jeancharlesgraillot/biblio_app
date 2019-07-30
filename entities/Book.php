<?php

declare(strict_types = 1);

class Book
{
    
    protected $id, 
              $title,
              $author,
              $description,
              $release_date,
              $disponibility = 1,
              $category_id,
              $user_id,
              $image_id;

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
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
                return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
                $this->title = $title;

                return $this;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
                return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
                $this->author = $author;

                return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
                return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
                $this->description = $description;

                return $this;
    }

    /**
     * Get the value of release_date
     */ 
    public function getRelease_date()
    {
                return $this->release_date;
    }

    /**
     * Set the value of release_date
     *
     * @return  self
     */ 
    public function setRelease_date($release_date)
    {
                $this->release_date = $release_date;

                return $this;
    }

    /**
     * Get the value of disponibility
     */ 
    public function getDisponibility()
    {
                return $this->disponibility;
    }

    /**
     * Set the value of disponibility
     *
     * @return  self
     */ 
    public function setDisponibility($disponibility)
    {
                $this->disponibility = $disponibility;

                return $this;
    }

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
                return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
                $this->category_id = $category_id;

                return $this;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
                return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
                $this->user_id = $user_id;

                return $this;
    }

    /**
     * Get the value of image_id
     */ 
    public function getImage_id()
    {
                return $this->image_id;
    }

    /**
     * Set the value of image_id
     *
     * @return  self
     */ 
    public function setImage_id($image_id)
    {
                $this->image_id = $image_id;

                return $this;
    }
}