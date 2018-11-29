<?php

namespace App\src\controller;

use App\src\DAO\CommentDAO;
use App\src\DAO\PostDAO;
use App\src\model\View;

class FrontController
{
  private $postDAO;
  private $commentDAO;
  private $view;

  public function __construct()
  {
    $this->postDAO = new PostDAO();
    $this->commentDAO = new CommentDAO();
    $this->view = new View();
  }

  public function home()
  {
    $posts = $this->postDAO->getListPosts();
    $this->view->render('home', [
      'posts' => $posts
    ]);
  }

  public function post($postId)
  {

    $post = $this->postDAO->getPost($postId);
    $comments = $this->commentDAO->getComments($postId);
    $this->view->render('single', [
      'post' => $post,
      'comments' => $comments,
    ]);
  }

  public function addComment($postId, $comments)
  {
    $this->commentDAO->addComment($postId, $comments);
    header('Location: ../public/index.php?route=post&postId=' . $postId);
  }

  public function reportComment($commentId, $postId)
  {
    $this->commentDAO->reportComment($commentId);
    header('Location: ../public/index.php?route=post&postId='. $postId);
  }
}