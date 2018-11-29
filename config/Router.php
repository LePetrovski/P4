<?php

namespace App\config;

use App\src\controller\ErrorController;

class Router
{

  private $frontController;
  private $errorController;


  public function __construct()
  {
    $this->frontController = new FrontController();
    $this->errorController = new ErrorController();
  }

  public function run()
  {
    try{
      if(isset($_GET['route']))
      {
        if($_GET['route'] === 'post'){
          $this->frontController->post($_GET['postId']);
        }
        else if($_GET['route'] === "addComment") {
          $this->frontController->addComment($_GET['postId'], $_POST);
        }
        else if($_GET['route'] === "reportComment") {
          $this->frontController->reportComment($_GET['commentId'], $_GET['postId']);
        }
        else{
          $this->errorController->unknown();
        }
      }
      else{
        $this->frontController->home();
      }
    }
    catch (Exception $e)
    {
      $this->errorController->error();
    }
  }
}