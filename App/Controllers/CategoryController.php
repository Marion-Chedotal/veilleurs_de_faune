<?php
namespace Project\Controllers;

use Project\Models\Account;
use Project\Models\Category;

class CategoryController 
{ 
    
    /**
     *________ CRUD ________ 

     * CREATE
     * method which permit to create a species category
     */ 
    public function addCategory(): void
    {
        if (!empty($_POST)) {
            //use $ to get and secure sur data's form
            $name    = trim(htmlspecialchars($_POST["name"]));
            $picture = trim(htmlspecialchars($_POST["picture"]));
            $content = trim(htmlspecialchars($_POST["content"]));
            $pictureCredit = trim(htmlspecialchars($_POST["pictureCredit"]));
            
            // create a new instance of Category and call the function create
            $category = Category::createCategory($name, $picture, $content, $pictureCredit);  
            
            $message = "La catégorie " . $name . " a bien été créée";
        }
        require ('App/Views/BackOffice/CategoryViews/addCategory.php'); 
    }

    /** 
     * READ
     * method which permit to get the category in order to update it
     */ 
    public function getCategory(int $idCategory): void
    {
        $category = new Category($idCategory);

        require ('App/Views/BackOffice/CategoryViews/updateCategory.php');     
    }

    /** 
     * READ ALL 
     * 
     */ 
    public function getAllCategories(): void
    {
        // create a new instance of category and call the function to display all 
        $categories = Category::findAllCategories();   
        
        if (Account::isAdmin()) {
            require ('App/Views/BackOffice/CategoryViews/getAllCategories.php');
        }
    }

    /** UPDATE 
     * 
     */ 
    public function modifyCategory(int $idCategory): void
    {
        if (!empty($_POST)){

            // secure the post and clean it
            $name = trim(htmlspecialchars($_POST["name"]));
            $content = trim(htmlspecialchars($_POST["content"]));
            $picture = trim(htmlspecialchars($_POST["picture"]));
            $pictureCredit = trim(htmlspecialchars($_POST["pictureCredit"]));
          
            // create a new instance of category and call the function to update
            $category = new Category($idCategory);
            $category->updateCategory($name, $picture, $pictureCredit, $content);

            $message = "La catégorie " . $name . " a bien été modifiée";
        } 
        require ('App/Views/BackOffice/CategoryViews/updateCategory.php'); 
    }
     
    /** 
     * DELETE
     * 
     */
    public function removeCategory(int $idCategory): void
    {
        // create a new instance of category and call the function to delete
        $category = new Category($idCategory);
        $category->deleteCategory();

        // and call all the category to continued to display it on the view
        $categories = Category::findAllCategories(); 
        
        $message = "La catégorie " . $category->name . " a bien été supprimée.";
        
        require ('App/Views/backOffice/CategoryViews/getAllCategories.php'); 
    }
 
}





