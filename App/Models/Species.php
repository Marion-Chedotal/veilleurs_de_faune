<?php
namespace Project\Models;

use PDO;
use PDOException;

/**
 * Class which create CRUD prepared requests
 */
class Species extends DbConnection
{

    // attributs declaration 
    public int $idSpecies;
    public string $scientificName;
    public string $commonName;
    public ?string $picture = null;
    public string $pictureCredit;
    public string $content;
    public ?string $bretagneStatus = null;
    public ?string $franceStatus = null;
    public ?string $worldStatus = null;
    public int $height;
    public int $weight;
    public string $diet;
    public string $threats;
    public int $idCategory;


    // construct
    public function __construct(int $idSpecies)
    {
        $dataSpecies = $this->findSpecies($idSpecies);

        if(!empty($dataSpecies)) {
            $this->idSpecies = $idSpecies;
            $this->scientificName = $dataSpecies['scientificName'] ?? '';
            $this->commonName = $dataSpecies['commonName'] ?? '';
            $this->picture = $dataSpecies['picture'] ?? '';
            $this->pictureCredit = $dataSpecies['pictureCredit'] ?? '';
            $this->content = $dataSpecies['content'] ?? '';
            $this->bretagneStatus = $dataSpecies['bretagneStatus'] ?? '';
            $this->franceStatus = $dataSpecies['franceStatus'] ?? '';
            $this->worldStatus = $dataSpecies['worldStatus'] ?? '';
            $this->height = $dataSpecies['height'] ?? '';
            $this->weight = $dataSpecies['weight'] ?? '';
            $this->diet = $dataSpecies['diet'] ?? '';
            $this->threats = $dataSpecies['threats'] ?? '';
            $this->idCategory = $dataSpecies['idCategory'] ?? '';
        }
    }

    /** 
     *_______ CRUD _______*

     * CREATE
     */  
    public static function createSpecies(string $scientificName, string $commonName, string  $picture, string $pictureCredit, string $content, string $bretagneStatus, string $franceStatus, string $worldStatus, int $height, int $weight, string $diet, string $threats, int $idCategory): array
    {
        // try & catch handle errors 
        try {
            // first, connection to the database
            $pdo = self::connection();
            // empty do isset, null, array(), [], '', "", 0, '0', false 
            if (!empty($pdo)) {
              
                //then, prepared request to insert the information to the Species table
                $sql = $pdo->prepare(
                    "INSERT INTO species (scientificName, commonName, picture, pictureCredit, content, bretagneStatus, franceStatus, worldStatus, height, weight, diet, threats, idCategory) 
                    VALUES (:scientificName, :commonName, :picture, :pictureCredit, :content, :bretagneStatus, :franceStatus, :worldStatus, :height, :weight, :diet, :threats, :idCategory)
                ");
                
                 //then, prepared request to insert the information to the Category table
                $sql->execute([
                    ':scientificName' => $scientificName,
                    ':commonName' =>$commonName,
                    ':picture' => $picture,
                    ':pictureCredit' => $pictureCredit,
                    ':content' => $content,
                    ':bretagneStatus' => $bretagneStatus,
                    ':franceStatus' =>$franceStatus,
                    ':worldStatus' => $worldStatus,
                    ':height' => $height,
                    ':weight' => $weight,
                    ':diet' => $diet,
                    ':threats' =>$threats,
                    ':idCategory' => $idCategory,
                ]);
                return $sql->fetchAll();
            }
        }
        catch (PDOException $e){
            echo "La création de l'espèce a échoué : " . $e->getMessage();
        }
    }

    /**
     * READ
     */
    public function findSpecies(int $idSpecies): array 
    {
        try {
            $pdo = $this->connection();

            if (!empty($pdo)) {
                $sql = $pdo->prepare(
                    "SELECT scientificName, commonName, picture, pictureCredit, content, bretagneStatus, franceStatus, worldStatus, height, weight, diet, threats, idCategory
                    FROM species 
                    WHERE idSpecies =:idSpecies"
                );
                $sql->execute([':idSpecies' => $idSpecies]);
                $result= $sql->fetch(PDO::FETCH_ASSOC);
            }
        }
        catch (PDOException $e){
            echo "La lecture de l'espèce a échoué : " . $e->getMessage();
        }
        return $result; 
    }

    /**
     * READ ALL
     */ 
    public static function findAllSpecies(): array
    {
        try {
            $pdo = self::connection();

            if (!empty($pdo)) {
                $sql = $pdo->prepare ("SELECT * FROM species");
                $sql->execute();
                return $sql->fetchAll();
            }
        }
        catch (PDOException $e){
            echo "La lecture de l'ensemble des espèces a échoué : " . $e->getMessage();
        }
    }

    /**
     * DISPLAY species by Category
     */ 
    public static function findSpeciesByCategory(?int $idCategory = null): array 
    {
        try {
            $pdo = self::connection();
            
            if (!empty($pdo)) {
                $sql = $pdo->prepare(
                    "SELECT c.name, s.idSpecies, s.scientificName, s.commonName, s.picture, s.content, s.bretagneStatus, s.franceStatus, s.worldStatus, s.height, s.weight, s.diet, s.threats, s.pictureCredit
                    FROM species AS s
                    INNER JOIN category AS c ON c.idCategory = s.idCategory
                    WHERE c.idCategory = :idCategory "
                );
                $sql->execute([':idCategory' => $idCategory]);

                return $sql->fetchAll();
            }
        }
        catch (PDOException $e){
            echo "L'affichage des espèces par catégories a échoué : " . $e->getMessage();
        }
    } 

    /**
     * UPDATE
     */
    public function updateSpecies($scientificName, $commonName, $picture, $pictureCredit, $content, $bretagneStatus, $franceStatus, $worldStatus, $height, $weight, $diet,  $threats, $idCategory): void
    {
        try {
            $pdo = $this->connection();

            if (!empty($pdo)) {
                $sql = $pdo->prepare("UPDATE species 
                    SET scientificName = :scientificName, commonName = :commonName, picture = :picture, pictureCredit = :pictureCredit, content = :content, bretagneStatus = :bretagneStatus, franceStatus = :franceStatus, worldStatus = :worldStatus, height = :height, weight = :weight, diet = :diet, threats = :threats, idCategory = :idCategory WHERE (idSpecies = :idSpecies)");

                $sql->execute([
                    ':scientificName' => $scientificName,
                    ':commonName' =>$commonName,
                    ':picture' => $picture,
                    ':pictureCredit' => $pictureCredit,
                    ':content' => $content,
                    ':bretagneStatus' => $bretagneStatus,
                    ':franceStatus' =>$franceStatus,
                    ':worldStatus' => $worldStatus,
                    ':height' => $height,
                    ':weight' => $weight,
                    ':diet' => $diet,
                    ':threats' =>$threats,
                    ':idCategory' => $idCategory,
                    ':idSpecies' => $this->idSpecies,
                ]);
            }
        }
        catch (PDOException $e){
            echo "La modification de l'espèce a échoué : " . $e->getMessage();
        }     
    }    
    
    /**
     * DELETE
     */
    public function deleteSpecies(): void
    {
        try {
            $pdo = $this->connection();

            if (!empty($pdo)) {
                $sql = $pdo->prepare(
                    "DELETE FROM species 
                    WHERE idSpecies = :idSpecies"
                );
                $sql->execute([':idSpecies' => $this->idSpecies]);
            }   
        }
        catch (PDOException $e){
            echo "La suppression de l'espèce a échoué: " . $e->getMessage();
        }     
    } 
}


       