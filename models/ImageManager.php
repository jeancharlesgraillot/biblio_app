<?php
declare(strict_types = 1);

/**
 *  Classe permettant de gérer les opérations en base de données concernant les objets Image
 */
class ImageManager
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
	 * Add image to the database
	 *
	 * @param Image $image
	 * 
	 * @return $id
	 */
	public function addImage(Image $image)
	{
		$query = $this->getDb()->prepare('INSERT INTO images(source, alt) VALUES (:source, :alt)');
		$query->bindValue("source", $image->getSource(), PDO::PARAM_STR);
        $query->bindValue("alt", $image->getAlt(), PDO::PARAM_STR);
		$query->execute();

        $id = $this->getDb()->lastInsertId();
        return $id;
	}

	/**
     * Update Image
     *
     * @param Images $image
     * @return self
     */
    public function updateImage(Image $image)
    {
        $query = $this->getDb()->prepare('UPDATE images SET source = :source, alt = :alt WHERE id_image = :id_image');
		$query->bindValue("source", $image->getSource(), PDO::PARAM_STR);
		$query->bindValue("alt", $image->getAlt(), PDO::PARAM_STR);
		$query->bindValue("id_image", $image->getId_image(), PDO::PARAM_INT);
		$query->execute();
		
	}
	
	
    /**
     * Delete image
     *
     * @param [int] $id
     * @return self
     */
    public function deleteImage($id)
    {
        $id = (int) $id;
        $query = $this->getDb()->prepare('DELETE FROM images WHERE id_image = :id_image');
        $query->bindValue("id_image", $id, PDO::PARAM_INT);
        $query->execute();
    }
}