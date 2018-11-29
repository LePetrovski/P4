
<?php
$this->title = "Post";
?>

<div class="posts">
  <h1><?= strip_tags($post->getTitle());?></h1>
  <div class="postContent"><?= $post->getContent();?></div>
  <p class="postDate"><small><?='Le ' . strip_tags($post->getDateCreationFr());?></small></p>
</div>

<a class="btn btn-info col-md-12" href="../public/index.php?route=updatePost&postId=<?= strip_tags($post->getId()); ?>#blog">MODIFIER LE CHAPITRE</a>
<button type="button" class="btn btn-dark col-md-12" data-toggle="modal" data-target="#suppression">
  Supprimer le chapitre
</button>
<br>
<a class="btn btn-secondary col-md-12" href="../public/index.php">Retour à la liste des articles</a>

<div class="comments">
  <form action="index.php?route=addComment&postId=<?= strip_tags($post->getId());?>" method="post">
    <div id="formulaire" class="col-md-12">
      <h3>Laissez un commentaire</h3>
      <label for="author">Pseudo:</label><input type="text" name="author" id="author" required/><br />
      <label for="comment">Message:</label><textarea type="text" name="comment" placeholder="-Respect & courtoisie-" required></textarea>
      <div class="g-recaptcha" data-sitekey="6LdbXn0UAAAAADkgMIfQv0ouvfIfadBExWvUq3BL"></div>
      <input type="submit" value="Envoyer" /><br />
    </div>
  </form>

  <h3>Commentaires</h3>
  <?php
  foreach($comments as $comment) {
    ?>
    <div class="comment">
      <h4><?= strip_tags($comment->getAuthor()); ?></h4>
      <p><?= strip_tags($comment->getComment()); ?></p>
      <p class="commentDate">Posté le <?= strip_tags($comment->getDateCommentFr()); ?></p>
    </div>
    <a class="btn btn-secondary adminComment" href="index.php?route=reportComment&commentId=<?= strip_tags($comment->getId()); ?>&postId=<?= strip_tags($post->getId()); ?>">
      <small>Signaler ce commentaire</small>
    </a>
    <a class="btn btn-success adminComment"
            href="index.php?route=resetReport&commentId=<?= strip_tags($comment->getId()); ?>&postId=<?= strip_tags($post->getId()); ?>">
      <small>Annuler le signalement</small>
    </a>

    <a class="btn btn-danger adminComment deleteBtn"
       href="index.php?route=deleteComment&commentId=<?= strip_tags($comment->getId()); ?>&postId=<?= strip_tags($post->getId()); ?>">
      <small>Supprimer ce commentaire</small>
    </a>
    <br/>
    <?php
  }
  ?>
</div>

