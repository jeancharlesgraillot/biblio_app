<?php
declare(strict_types = 1);

/**
 *  Classe permettant de gérer les opérations en base de données concernant les objets User
 */
class UserManager
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
     * Get user by id
     *
     * @param $id
     * @return instance of new User object
     */ 
    public function getUser($id)
    {
        $user;
        $query = $this->getDB()->prepare('SELECT * FROM users WHERE id_user = :id');
        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->execute();
        

        // $dataCharacter is an associative array which contains informations of a user
        $dataUser = $query->fetch(PDO::FETCH_ASSOC);

        // We create a new User object with the associative array $dataCharacter and we return it
        $user = new User($dataUser);
        return $user;
        
    }


        /**
     * Get all users of _db
     *
     * @return  array
     */ 
    public function getUsers()
    {
        // Array declaration
        $arrayOfUsers = [];

        $query = $this->getDB()->prepare('SELECT * FROM users');
        $query->execute();
        $dataUsers = $query->fetchAll(PDO::FETCH_ASSOC);

        // At each loop, we create a new user object wich is stocked in our array $arrayOfUsers
        foreach ($dataUsers as $dataUser) {
            $arrayOfUsers[] = new User($dataUser);
            
        }

        // Return of the array on which we could loop to list all users
        return $arrayOfUsers;
    }

        /**
     * Check if user exists or not and return a user object
     *
     * @param string $firstname, $lastname
     * @return User 
     */
    public function checkIfExist(string $firstname, $lastname)
    {
        $query = $this->getDb()->prepare('SELECT * FROM users WHERE firstname = :firstname AND lastname = :lastname');
        $query->bindValue('firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue('lastname', $lastname, PDO::PARAM_STR);
        $query->execute();

        // We return
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($users as $user) {
            return new User($user);
        }
    }

    	/**
	 * Add user to the database
	 *
	 * @param User $user
	 */
	public function addUser(User $user)
	{
		$query = $this->getDb()->prepare('INSERT INTO users(firstname, lastname, tokenId) VALUES (:firstname, :lastname, :tokenId)');
		$query->bindValue("firstname", $user->getFirstname(), PDO::PARAM_STR);
        $query->bindValue("lastname", $user->getLastname(), PDO::PARAM_STR);
        $query->bindValue("tokenId", $user->getTokenId(), PDO::PARAM_STR);
		$query->execute();
    }

            /**
     * Update user's data 
     *
     * @param User $user
     */
    public function updateUser(User $user)
    {   
  
        $query = $this->getDb()->prepare('UPDATE users SET firstname = :firstname, lastname = :lastname WHERE id_user = :id_user');
        $query->bindValue('id_user', $user->getId_user(), PDO::PARAM_INT);
        $query->bindValue('firstname', $user->getFirstname(), PDO::PARAM_STR);
        $query->bindValue('lastname', $user->getLastname(), PDO::PARAM_STR);
        $query->execute();
    }


        /**
     * Delete user from DB
     *
     * @param $id
     */
    public function deleteUser($id)
    {
        $id = (int)$id;
        $query = $this->getDb()->prepare('DELETE FROM users WHERE id_user = :id');
        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->execute();
    }

}