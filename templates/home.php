<?php
session_start();
?>
<?php
$this->title = "Mon blog";
?>
<?php
if(isset($_SESSION['add_post'])){
  echo '<p class="col-md-12">'.$_SESSION['add_post'].'</p>';
  unset($_SESSION['add_post']);
}
if(isset($_SESSION['wrong'])){
  echo '<p>'.$_SESSION['wrong'].'</p>';
  unset($_SESSION['wrong']);
}
if(isset($_SESSION['status'])){
  echo '<h3 class="col-md-12">Bienvenue M.Forteroche</h3>';
  unset($_SESSION['status']);
}
if(isset($_SESSION['delete_post'])){
  echo '<p class="col-md-12">'.$_SESSION['delete_post'].'</p>';
  unset($_SESSION['delete_post']);
}?>

<?php if(isset($_SESSION['admin'])){
  ?>
  <a class="btn btn-light col-md-12" href="../public/index.php?route=addPost#add">
    AJOUTER UN NOUVEAU CHAPITRE
  </a>
  <?php
}?>

<?php
foreach ($posts as $post)
{
  ?>
  <article class="col-md-6 col-sm-12">
    <header>
      <span class="date">Publié le <?= strip_tags($post->getDateCreationFr());?></span>
      <h2><a href="../public/index.php?route=post&postId=<?= strip_tags($post->getId());?>#blog"><?= strip_tags($post->getTitle());?></a></h2>

    </header>
    <!--<a href="#" class="image fit"><img src="#" alt="" /></a>-->
    <p><?= strip_tags($post->getContent());?></p>
    <ul class="actions special">
      <?php if(!isset($_SESSION['admin'])){
        ?>
        <li><a href="../public/index.php?route=post&postId=<?= strip_tags($post->getId());?>#blog" class="button">Lire la suite</a></li>
        <?php
      }
      ?>
      <?php if(isset($_SESSION['admin'])) {
        ?>
        <li><a href="../public/index.php?route=post&postId=<?= strip_tags($post->getId());?>#blog" class="button">Administrer ce chapitre <i class="fas fa-edit"></i></a></li>
        <?php
      }
      ?>
    </ul>
  </article>
  <?php
}
?>