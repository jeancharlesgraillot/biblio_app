<?php
declare(strict_types = 1);

/**
 *  Classe permettant de gérer les opérations en base de données concernant les objets Category
 */
class CategoryManager
{

	private $_db;

	/**
	 * Constructor
	 *
	 * @param PDO $db
	 */
	public function __construct(PDO $db) 
	{
		$this->setDb($db);
	}

	/**
	 * Set the value of $_db
	 *
	 * @param PDO $db
	 * return self
	 */
	public function setDb(PDO $db) 
	{
		$this->_db = $db;
		return $this;
	}

	/**
	 * Get the value of $_db
	 *
	 * @return $_db
	 */
	public function getDb()
	{
		return $this->_db;
	}

    
    	/**
	 * Get all accounts
	 *
	 */
	public function getCategories()
	{

		$arrayOfCategories = [];
		$query = $this->getDb()->query('SELECT * FROM categories');

		// On récupère un tableau contenant plusieurs tableaux associatifs
		$dataCategories = $query->fetchAll(PDO::FETCH_ASSOC);

		// A chaque tour de boucle, on récupère un tableau associatif concernant un seul compte
		foreach ($dataCategories as $dataCategory) 
		{
			// On crée un nouvel objet grâce au tableau associatif, qu'on stocke dans $arrayOfAccounts
			$arrayOfCategories[] = new Category($dataCategory);
		}
		return $arrayOfCategories;
	}

    /**
     * Get a category by id
     *
     * @param integer $id
     * @return integer
     */ 
    public function getCategoryById(int $id_category)
    {
        $id_category = (int) $id_category;
        $query = $this->getDB()->prepare('SELECT * FROM categories WHERE id_category = :id_category');
        $query->bindValue('id_category', $id_category, PDO::PARAM_INT);
        $query->execute();
        
		return $id_category;
       
	}

}