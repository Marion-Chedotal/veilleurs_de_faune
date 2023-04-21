<?php

session_start();

use Project\Controllers\AccountController;
use Project\Controllers\CategoryController;
use Project\Controllers\SpeciesController;
use Project\Controllers\ContactController;
use Project\Controllers\ObservationController;


// use of composer autoloader to limit the call of require or include and use namespace instead
require __DIR__ . '/vendor/autoload.php';

// use composer package dotenv which permit to externalize $ENV and secure the connection
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// router =>main controller with switch case

try {

    // get the value of the action
    $action = $_GET["action"] ?? null;

    if (!empty($action)) {

        // getting the controller
        $categoryController = new CategoryController;
        $speciesController = new SpeciesController;
        $contactController = new ContactController;
        $observationController = new ObservationController;
        $accountController = new AccountController;
   
        switch ($action) {

            // routing for Account 
            case 'login':
                $accountController->login();
                break;
            case 'readAccount':
                $accountController->getConnectedAccount();
                break; 
            case 'readForUpdateAccount':
                $accountController->getAccount($_GET['idAccount'] ?? 0);
                break;
            case 'updateAccount':
                $accountController->modifyAccount($_GET['idAccount'] ?? 0);
                break;     
            case 'logout':
                $accountController->logout();
                break;
            
            // routing for Category 
            case 'createCategory':
                $categoryController->addCategory();
                break;
            case 'readCategory':
                $categoryController->getCategory($_GET['idCategory'] ?? 0);
                break;
            case 'updateCategory':
                $categoryController->modifyCategory($_GET['idCategory'] ?? 0);
                break;
            case 'deleteCategory':
                $categoryController->removeCategory($_GET['idCategory'] ?? 0);
                break;
            case 'findAllCategories':
                $categoryController->getAllCategories();
                break;
                
            // routing for Species   
            case 'createSpecies':
                $speciesController->addSpecies();
                break;
            case 'readSpecies':
                $speciesController->getSpecies($_GET['idSpecies'] ?? 0);
                break;
            case 'readForUpdateSpecies':
                $speciesController->getSpecies($_GET['idSpecies'] ?? false, true);
                break;
            case 'updateSpecies':
                $speciesController->modifySpecies($_GET['idSpecies'] ?? 0);
                break;
            case 'deleteSpecies':
                $speciesController->removeSpecies($_GET['idSpecies'] ?? 0);
                break;
            case 'findSpeciesByCategory':
                $speciesController->getSpeciesByCategory();
                break;

            // routing for Observations:
            case 'findAllObservations':
                $observationController->getAllObservations();
                break;
            
            // routing for Contact
            case 'findAllMessages':
                $contactController->getAllMessages();
                break;
            case 'deleteMessage':
                $contactController->removeMessage($_GET['idContact'] ?? 0);
                break;

            default:
                require ('App/Views/BackOffice/homeAdminView.php');
        }
    } else { 
        require ('App/Views/BackOffice/homeAdminView.php');
    }
} 
catch(Exception $e) {
    echo "Erreur fatale";
}