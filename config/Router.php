<?php

namespace App\config;

use App\src\controller\ErrorController;

class Router
{

  private $errorController;


  public function __construct()
  {
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