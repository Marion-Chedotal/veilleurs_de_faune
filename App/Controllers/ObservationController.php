<?php
namespace Project\Controllers;

use Project\Models\Account;
use Project\Models\Category;
use Project\Models\Observation;
use Project\Models\Species;

class ObservationController 
{

    /**
     *________ CRUD ________ 

     * CREATE
     * 
     */ 
    public function addObservation(): void
    {
        if (!empty($_POST)) {

            //use $ to get and secure sur data's form
            $date = trim(htmlspecialchars($_POST["date"]));
            $department = trim(htmlspecialchars($_POST["department"]));
            $location = trim(htmlspecialchars($_POST["location"]));
            $counting = trim(htmlspecialchars($_POST["counting"]));
            $picture = trim(htmlspecialchars($_POST["picture"]));
            $pictureCredit = trim(htmlspecialchars($_POST["pictureCredit"]));
            $comments = trim(htmlspecialchars($_POST["comments"]));
            $idSpecies = $_POST["idSpecies"];
            $idAccount = $_SESSION["idAccount"];

            // create a new instance of Observation and call the function create
            $observation = Observation::createObservation($date, $department, $location, $counting, $picture, $comments, $pictureCredit, $idSpecies, $idAccount); 
   
            $message = "L'observation a bien été ajoutée";
        
            //call Category to display all the categories and then filter it for choose species 
            $categories = Category::findAllCategories();

            //create a new object Species to choose the species observed by filtered category
            $speciesRepository = new Species($idSpecies);
            $speciesByCat = Species::findSpeciesByCategory();
        } 
        //call Category to display all the categories and then filter it for choose species
        $categories = Category::findAllCategories();

        require ('App/Views/Front/ObservationViews/addObservation.php');  
    }      

    /** 
     * READ ALL
     * 
     */ 
    public function getAllObservations(): void
    {
        $observations = Observation::findAllObservations();    

        // function needed for backOffice and frond:
        if (Account::isAdmin() && strpos($_SERVER['REQUEST_URI'], 'admin') !== false ) {
            // if Admin is logged and he's on backOffice part =>display back view 
            require ('App/Views/BackOffice/ObservationView/getAllObservations.php');

        } else {
            // if Admin is logged and he's on front part =>display front view
            if (Account::isAdmin()) {
                require ('App/Views/Front/ObservationViews/getAllObservationsFront.php');
         
            }  else {
            // else you're a lambda user, => display front view
            require ('App/Views/Front/ObservationViews/getAllObservationsFront.php');
            }        
        } 
    }
}





