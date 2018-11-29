<?php

namespace App\src\controller;

use App\src\DAO\CommentDAO;
use App\src\DAO\PostDAO;
use App\src\model\View;

class BackController
{
  private $view;
  private $postDAO;
  private $commentDAO;

  public function __construct()
  {
    $this->view = new View();
    $this->postDAO = new PostDAO();
    $this->commentDAO = new CommentDAO();
  }

  public function addPost($post)
  {
    if (isset($post['submit'])) {
      $this->postDAO->addPost($post);
      session_start();
      $_SESSION['add_post'] = 'Le nouveau chapitre a bien été ajouté';
      header('location: ../public/index.php#admin');
    }
    $this->view->render('add_post', [
      'post' => $post
    ]);
  }

  public function updatePost($post, $postId)
  {
    if (isset($post['submit'])) {
      $this->postDAO->updatePost($post, $postId);
      session_start();
      $_SESSION['update_post'] = 'Le chapitre a bien été modifié';
      header('location: ../public/index.php?route=post&postId=' . $postId . '#update');
    }
    $idPost = $this->postDAO->getPost($postId);
    $this->view->render('update_post', [
      'idPost' => $idPost
    ]);
  }

  public function deletePost($postId)
  {
    $this->postDAO->deletePost($postId);
    session_start();
    $_SESSION['delete_post'] = 'Le chapitre et ses commentaires ont été supprimés';
    header('location: ../public/index.php#admin');
  }

  public function resetReport($commentId, $postId)
  {
    $this->commentDAO->resetReport($commentId);
    header('Location: ../public/index.php?route=post&postId=' . $postId);
  }

  public function deleteComment($commentId, $postId)
  {
    $this->commentDAO->deleteComment($commentId);
    header('Location: ../public/index.php?route=post&postId=' . $postId);
  }
}