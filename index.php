<?php

session_start();

use Project\Controllers\CategoryController;
use Project\Controllers\SpeciesController;
use Project\Controllers\ContactController;
use Project\Controllers\AccountController;
use Project\Controllers\ObservationController;
use Project\Models\Category;

// use of composer autoloader to limit the call of require or include and use namespace instead
require __DIR__ . '/vendor/autoload.php';

// use composer package dotenv which permit to externalize $ENV and secure the connection
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
  // getting the controller
  $categoryController = new CategoryController;
  $speciesController = new SpeciesController;
  $accountController = new AccountController; 
  $contactController = new ContactController; 
  $observationController = new ObservationController; 

  // get the value of the action
  $action = $_GET["action"] ?? null;
  
  if (!empty($action)) {
    switch ($action) {

      // routing for Account
      case 'createAccount':
        $accountController->addAccount();
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
      case 'deleteAccount':
        $accountController->removeAccount($_GET['idAccount'] ?? 0);
        break; 
      case 'login':
        $accountController->login();
        break; 
      case 'logout':
        $accountController->logout();
        break; 

      // routing for Category 
      case 'findAllCategories':
          $categoryController->getAllCategories();
          break;
                
      // routing for Species   
      case 'readSpecies':
        $speciesController->getSpecies($_GET['idSpecies'] ?? 0);
        break;
      case 'findSpeciesByCategory':
        $speciesController->getSpeciesByCategory();
        break;
      case 'filterByCategory':
        $speciesController->filterByCategory();
        break;

      // Routing for observations
      case 'createObservation':
        $observationController->addObservation();
        break;
      case 'findAllObservations':
        $observationController->getAllObservations();
        break;

      // front routing
      case 'contact':
        $contactController->sendMessage();
        break;

      case 'legals':
        require ('./App/Views/Front/legals.php');
        break;

      default:
        require ('./App/Views/Front/error404.php');
    }
    
  } else { 
      $categories = Category::findAllCategories();   
      require ('App/Views/Front/Home.php');
  }
} 
catch(Exception $e) {
    echo "Erreur fatale";
}