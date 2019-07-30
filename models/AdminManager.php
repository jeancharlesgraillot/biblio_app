<?php
declare(strict_types = 1);

/**
 *  Classe permettant de gérer les opérations en base de données concernant les objets Admin
 */
class AdminManager
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
	 * Add admin to the database
	 *
	 * @param Admin $admin
	 */
	public function add(Admin $admin)
	{
		$query = $this->getDb()->prepare('INSERT INTO admin(name, email, password) VALUES (:name, :email, :password)');
		$query->bindValue("name", $admin->getName(), PDO::PARAM_STR);
        $query->bindValue("email", $admin->getEmail(), PDO::PARAM_STR);
        $query->bindValue("password", $admin->getPassword(), PDO::PARAM_STR);
		$query->execute();
	}

	/**
	 * Check if admin exists
	 *
	 * @param string $name
	 * @return Admin
	 */
	public function checkIfExist(string $name)
    {
        $query = $this->getDb()->prepare('SELECT * FROM admin WHERE name = :name');
        $query->bindValue('name', $name, PDO::PARAM_STR);
        $query->execute();

        // We return
		$dataAdmin = $query->fetch(PDO::FETCH_ASSOC);
		return new Admin($dataAdmin);
    }

}