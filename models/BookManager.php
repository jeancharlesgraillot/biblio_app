<?php
declare(strict_types = 1);

/**
 *  Classe permettant de gérer les opérations en base de données concernant les objets Book
 */
class BookManager
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
	 * @return self
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
	 * Add book to the database
	 *
	 * @param Book $book
	 */
	public function addBook(Book $book)
	{
		$query = $this->getDb()->prepare('INSERT INTO books(title, author, release_date, description, disponibility, category_id, image_id) VALUES (:title, :author, :release_date, :description, :disponibility, :category_id, :image_id)');
		$query->bindValue("title", $book->getTitle(), PDO::PARAM_STR);
        $query->bindValue("author", $book->getAuthor(), PDO::PARAM_STR);
        $query->bindValue("release_date", $book->getRelease_date(), PDO::PARAM_STR);
		$query->bindValue("description", $book->getDescription(), PDO::PARAM_STR);
		$query->bindValue("disponibility", $book->getDisponibility(), PDO::PARAM_INT);
		$query->bindValue("category_id", $book->getCategory_id(), PDO::PARAM_INT);
		$query->bindValue("image_id", $book->getImage_id(), PDO::PARAM_INT);
		$query->execute();
	}

	/**
	 * Get all books from the database
	 * 
	 * @return array 
	 */
	public function getBooks()
	{
		$arrays = [];
		$arrayOfBooks = [];
		$arrayOfImages = [];
		$query = $this->getDb()->prepare('SELECT * FROM books LEFT JOIN images ON books.image_id = images.id_image');
		$query->execute();
		// On récupère un tableau contenant plusieurs tableaux associatifs
		$dataBooks = $query->fetchAll(PDO::FETCH_ASSOC);

		// A chaque tour de boucle, on récupère un tableau associatif concernant un seul compte
		foreach ($dataBooks as $dataBook) 
		{
			// On crée un nouvel objet grâce au tableau associatif, qu'on stocke dans $arrayOfAccounts
			$arrayOfBooks[] = new Book($dataBook);
			$arrayOfImages[] = new Image($dataBook);
		}

		$arrays[] = $arrayOfBooks;
		$arrays[] = $arrayOfImages;
		return $arrays;

	}

	public function getBooksByCategoryName($name)
	{	
		$arrays = [];
		$arrayOfBooks = [];
		$arrayOfImages = [];
		$query = $this->getDb()->prepare('SELECT * FROM books 
		LEFT JOIN categories ON books.category_id = categories.id_category
		LEFT JOIN images ON books.image_id = images.id_image
		WHERE name = :name');
		$query->bindValue("name", $name, PDO::PARAM_STR);
		$query->execute();
		$books = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($books as $book) {
			$arrayOfBooks[] = new Book($book);
			$arrayOfImages[] = new Image($book);
		}
		$arrays[] = $arrayOfBooks;
		$arrays[] = $arrayOfImages;
		return $arrays;
	}

	
	/**
	 * Get all books a user has borrowed
	 *
	 * @param integer $user_id
	 * @return $array
	 */
	public function getBooksByUserId(int $user_id)
	{	
		$arrayOfBooks = [];
		$query = $this->getDb()->prepare('SELECT * FROM books WHERE user_id = :user_id');
		$query->bindValue("user_id", $user_id, PDO::PARAM_INT);
		$query->execute();
		$books = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($books as $book) {
			$arrayOfBooks[] = new Book($book);
		}
		return $arrayOfBooks;
	}

	/**
	 * Get a book by id
	 *
	 * @param integer $id
	 * @return $array
	 */
	public function getBookAndLinkedAttributesById(int $id)
	{
		$arrays = [];
		$arrayOfBooks = [];
		$arrayOfImages = [];
		$arrayOfCategories = [];
		$arrayOfUsers = [];
		$query = $this->getDb()->prepare('SELECT * FROM books 
		LEFT JOIN images ON books.image_id = images.id_image 
		LEFT JOIN categories ON books.category_id = categories.id_category 
		LEFT JOIN users ON books.user_id = users.id_user
		WHERE id = :id');
		$query->bindValue("id", $id, PDO::PARAM_INT);
		$query->execute();
		$books = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($books as $book) {
			$arrayOfBooks[] = new Book($book);
			$arrayOfImages[] = new Image($book);
			$arrayOfCategories[] = new Category($book);
			$arrayOfUsers[] = new User($book);
		}

		$arrays[] = $arrayOfBooks;
		$arrays[] = $arrayOfImages;
		$arrays[] = $arrayOfCategories;
		$arrays[] = $arrayOfUsers;
		return $arrays;

	}

	/**
     * Get book by id
     *
     * @param $id
     * @return instance of new Book object
     */ 
    public function getBookById(int $id)
    {
        
        $query = $this->getDb()->prepare('SELECT * FROM books WHERE id = :id');
        $query->bindValue("id", $id, PDO::PARAM_INT);
        $query->execute();
        
        $dataBook = $query->fetch(PDO::FETCH_ASSOC);

        $book = new Book($dataBook);
        return $book;
        
    }

	/**
	 * Update account
	 *
	 * @param Book $book
	 */
	public function updateBook(Book $book)
	{
		$query = $this->getDb()->prepare('UPDATE books SET title = :title, author = :author, release_date = :release_date, description = :description, category_id = :category_id, image_id = :image_id WHERE id = :id');
		$query->bindValue("title", $book->getTitle(), PDO::PARAM_STR);
        $query->bindValue("author", $book->getAuthor(), PDO::PARAM_STR);
        $query->bindValue("release_date", $book->getRelease_date(), PDO::PARAM_STR);
		$query->bindValue("description", $book->getDescription(), PDO::PARAM_STR);
		$query->bindValue("category_id", $book->getCategory_id(), PDO::PARAM_INT);
		$query->bindValue("image_id", $book->getImage_id(), PDO::PARAM_INT);
		$query->bindValue("id", $book->getId(), PDO::PARAM_INT);
		$query->execute();
	}

	/**
	 * Update book disponibility
	 *
	 * @param Book $book
	 * @return void
	 */
	public function updateBookDisponibilityAndUserId($id, $user_id, $disponibility)
	{
		$id = (int)$id;
		if ($user_id == 0) 
		{
			$user_id == null;
		}else
		{
			$user_id = (int)$user_id;
		}
		$disponibility = (int)$disponibility;
		$query = $this->getDb()->prepare('UPDATE books SET user_id = :user_id, disponibility = :disponibility WHERE id = :id');
		$query->bindValue("id", $id, PDO::PARAM_INT);
        $query->bindValue("user_id", $user_id, PDO::PARAM_INT);
        $query->bindValue("disponibility", $disponibility, PDO::PARAM_INT);
        $query->execute(); 
	}

	/**
	 * Delete account
	 *
	 * @param integer $id
	 */
	public function deleteBook(int $id)
	{
		$query = $this->getDb()->prepare('DELETE FROM books WHERE id = :id');
		$query->bindValue("id", $id, PDO::PARAM_INT);		
		$query->execute();
	}

	/**
	 * Count all books a user has borrowed
	 *
	 * @param integer $user_id
	 * @return void
	 */
	public function countBooks(int $user_id)
	{
		$query = $this->getDb()->prepare('SELECT COUNT(*) as total FROM books WHERE user_id = :user_id');
		$query->bindValue("user_id", $user_id, PDO::PARAM_INT);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
}