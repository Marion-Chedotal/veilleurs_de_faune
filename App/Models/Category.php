<?php
namespace Project\Models;

use PDO;
use PDOException;

/**
 * Class which create CRUD prepared requests
 */
class Category extends DbConnection
{
    
    // attributs declaration 
 
    public int $idCategory;
    public string $name;
    public string $picture;
    public string $content;
    public string $pictureCredit;

    // construct
    public function __construct(int $idCategory)
    {
        $dataCategory = $this->findCategory($idCategory);

        if(!empty($dataCategory)) {
            $this->idCategory = $idCategory;
            $this->name = $dataCategory['name'] ?? '';
            $this->picture = $dataCategory['picture'] ?? '';
            $this->content = $dataCategory['content'] ?? '';
            $this->pictureCredit = $dataCategory['pictureCredit'] ?? '';
        }
    }

    /**
     *_______ CRUD _______*

     * CREATE
     */  
    public static function createCategory(string $name, string $picture, string $content, string $pictureCredit): array
    {
        // try & catch handle errors 
        try {  
            // first, connection to the database       
            $pdo = self::connection();

            // empty do isset, null, array(), [], '', "", 0, '0', false 
            if (!empty($pdo)) {

                //then, prepared request to insert the information to the Category table
                $sql = $pdo->prepare(
                    "INSERT INTO category (name, picture, content, pictureCredit) 
                    VALUES (:name, :picture, :content, :pictureCredit)
                ");
                $sql->execute([
                    ':name' => $name,
                    ':picture' =>$picture,
                    ':pictureCredit' => $pictureCredit,
                    ':content' => $content
                ]);

                return $sql->fetchAll();
            }
        }
        catch (PDOException $e){
            echo "La création de la catégorie a échoué: " . $e->getMessage();
        }
    }
    
    /**
     * Display one category = > Read in CRUD 
     */
    public function findCategory(int $idCategory): array
    {
        try {
            $pdo = $this->connection();

            if (!empty($pdo)) {
                $sql = $pdo->prepare(
                    "SELECT name, content, picture, pictureCredit FROM category 
                    WHERE idCategory =:idCategory"
                );
                $sql->execute([':idCategory' => $idCategory]);
                $result = $sql->fetch(PDO::FETCH_ASSOC);
            } 
        }
        catch (PDOException $e) {
            echo "La lecture de la catégorie a échoué: " . $e->getMessage();
        }
        return $result;
    }
    
    /**
     * READ ALL
     */ 
    public static function findAllCategories(): array
    {
        try {
            $pdo = self::connection();

            if (!empty($pdo)) {
                $sql = $pdo->prepare("SELECT * FROM category");
                $sql->execute();
                return $sql->fetchAll();  
            }
        }
        catch (PDOException $e){
            echo "La lecture de l'ensemble des catégories a échoué: " . $e->getMessage();
        }
    }

    /**
     * UPDATE
     */
    public function updateCategory($name, $picture, $pictureCredit, $content): void
    {
        try {
            $pdo = $this->connection();

            if (!empty($pdo)) {
                $sql = $pdo->prepare(
                    "UPDATE category SET name = :name, picture = :picture, content = :content, pictureCredit = :pictureCredit WHERE (idCategory = :idCategory)
                ");
                $sql->execute([
                    ':name' => $name,
                    ':picture' => $picture,
                    ':pictureCredit' => $pictureCredit,
                    ':content' => $content,
                    ':idCategory' => $this->idCategory
                ]); 
            } 
        } 
        catch (PDOException $e) {
            echo "La modification de la catégorie a échoué: " . $e->getMessage();
        }
    }
     
    /**
     * DELETE
     */
    public function deleteCategory(): void
    {
        try {
            $pdo = $this->connection();

            if (!empty($pdo)) {
                $sql = $pdo->prepare(
                    "DELETE FROM category 
                    WHERE idCategory = :idCategory"
                );
                $sql->execute([':idCategory' => $this->idCategory]);
            } 
        }        catch (PDOException $e) {
            echo "La suppression de la catégorie a échoué: " . $e->getMessage();
        }
    }
    
}   
