<?php
namespace Project\Controllers;

use Project\Models\Account;
use Project\Models\Category;
use Project\Models\Species;

class SpeciesController 
{

    /** 
     *________ CRUD ________ 
    
     * CREATE
     * 
     */ 
    public function addSpecies(): void
    {
        if (!empty($_POST)) {
            // get the value of the form and secure the post and clean it
            $scientificName = trim(htmlspecialchars($_POST['scientificName'] ?? ''));
            $commonName = trim(htmlspecialchars($_POST['commonName'] ?? ''));
            $picture = trim(htmlspecialchars($_POST['picture'] ?? ''));
            $pictureCredit = trim(htmlspecialchars($_POST["pictureCredit"] ?? '' ));
            $content = trim(htmlspecialchars($_POST['content'] ?? ''));
            $bretagneStatus = trim(htmlspecialchars($_POST['bretagneStatus'] ?? ''));
            $franceStatus = trim(htmlspecialchars($_POST['franceStatus'] ?? ''));
            $worldStatus = trim(htmlspecialchars($_POST["worldStatus"] ?? '' ));
            $height = trim(htmlspecialchars($_POST['height'] ?? ''));
            $weight = trim(htmlspecialchars($_POST['weight'] ?? ''));
            $diet = trim(htmlspecialchars($_POST['diet'] ?? ''));
            $threats = trim(htmlspecialchars($_POST["threats"] ?? '' ));
            $idCategory = trim(htmlspecialchars($_POST['idCategory'] ?? ''));

            // instance a new object Species and call the function create
            $species= Species::createSpecies($scientificName, $commonName, $picture, $pictureCredit, $content, $bretagneStatus, $franceStatus, $worldStatus, $height, $weight, $diet, $threats, $idCategory);   
                   
            $message = "L'espèce' " . $commonName . " a bien été ajoutée";
        }

        // need access to category to add species in a category
        $categories = Category::findAllCategories();
        
        require ('App/Views/BackOffice/SpeciesViews/addSpecies.php');
    }

    /** READ method which permit to find the species in order to update it or to read it
     * 
     */ 
    public function getSpecies(int $idSpecies, bool $isUpdate=false)
    {
        $species = new Species($idSpecies);

        // need access to category to filter species by category
        $categories = Category::findAllCategories();

        // function need for each side: front and back: 
        // back: to update
        if ($isUpdate) {
            require ('App/Views/BackOffice/SpeciesViews/updateSpecies.php');     
        } // front: to read it
        else {
            require ('App/Views/Front/SpeciesViews/oneSpecies.php'); 
        }
    }

    /** Method which permit to 
     * 
     */ 
    public function getSpeciesByCategory(): void
    {
        // get all the existing category
        $categories = Category::findAllCategories();
        
        // get the value of the select id with $_POST 
        $idCategory = ($_POST['idCategory'] ?? ''); 

        $speciesByCat = [];

        if (!empty($idCategory)) {
            switch ($idCategory) {
                // display all the species
                case 'all':
                    $speciesByCat = Species::findAllSpecies(); 
                    break;
                // display the species of the choosen category
                default:
                    $speciesByCat = Species::findSpeciesByCategory(intval($idCategory)); 
            }
        }
        
        // function needed in front and backOffice: 
         if (Account::isAdmin() && strpos($_SERVER['REQUEST_URI'], 'admin') !== false ) {

            // if Admin is logged and he's on backOffice part =>display front view 
            require ('App/Views/BackOffice/SpeciesViews/getAllSpecies.php');

        } else {

            // if Admin is logged and he's on front part =>display front view
            if (Account::isAdmin()) {
                require ('App/Views/Front/SpeciesViews/getAllSpeciesFront.php');
         
            }  else {
            // else you're a lambda user, => display front view
            require ('App/Views/Front/SpeciesViews/getAllSpeciesFront.php');
            }        
        } 
    }

    /**  
     * UPDATE
     */ 
    public function modifySpecies(int $idSpecies): void
    {
        if (!empty($_POST)){
            
            // get the value of the form and secure the post and clean it
            $scientificName = trim(htmlspecialchars($_POST['scientificName']));
            $commonName = trim(htmlspecialchars($_POST['commonName']));
            $picture = trim(htmlspecialchars($_POST['picture']));
            $pictureCredit = trim(htmlspecialchars($_POST["pictureCredit"]));
            $content = trim(htmlspecialchars($_POST['content']));
            $bretagneStatus = trim(htmlspecialchars($_POST['bretagneStatus']));
            $franceStatus = trim(htmlspecialchars($_POST['franceStatus']));
            $worldStatus = trim(htmlspecialchars($_POST["worldStatus"]));
            $height = trim(htmlspecialchars($_POST['height']));
            $weight = trim(htmlspecialchars($_POST['weight']));
            $diet = trim(htmlspecialchars($_POST['diet']));
            $threats = trim(htmlspecialchars($_POST["threats"]));
            $idCategory = trim(htmlspecialchars($_POST['idCategory']));

            // create a new instance of species and call the function to update
            $species = new Species($idSpecies);
            $species->updateSpecies($scientificName, $commonName, $picture, $pictureCredit, $content, $bretagneStatus, $franceStatus, $worldStatus, $height, $weight, $diet, $threats, $idCategory);

            $message = "L'espèce :" . $commonName . " a bien été modifiée";
        }

        // before filling the fields, need the category
        $categories = Category::findAllCategories();

        require ('App/Views/BackOffice/SpeciesViews/updateSpecies.php'); 
    }

    /** DELETE
     * 
     */ 
    public function removeSpecies(int $idSpecies): void
    {
        // create a new instance of species and call the function to delete
        $species = new Species($idSpecies);
        $species->deleteSpecies();

        // and call all the species to continued to display it on the view
        $speciesByCat = Species::findSpeciesByCategory();

        $message = "L'espèce " . $species->commonName . " a bien été supprimée";
        
        require ('App/Views/BackOffice/SpeciesViews/getAllSpecies.php'); 
    }

    /**
     *  FilterByCategory = function wich permit when you're in addObsersavtion form in front, to select a species in a the good category. It's to have not a wrong submit form if the species is in the wrong category
     */       
    public function filterByCategory()
    {
        // by default, empty array to have for the result
        $filteredSpecies = [];

        // get the value of the id with post method, null if not there, 
        $idCategory = $_POST['idCategory'] ?? null;

        // find all the species of the category
        if ($idCategory) {
            $filteredSpecies = Species::findSpeciesByCategory(intval($idCategory)); 
        }

        // define the response as a JSON return
        header('Content-type: application/json'); 
        
        // result in a JSON array 
        echo json_encode([
            'filteredSpecies' => $filteredSpecies 
        ]); 
        // end of the JSON call
        die(); 
    } 
   
}


