<?php
$this->title = "Mon blog";
?>

<a class="btn btn-light col-md-12 addBtn" href="../public/index.php?route=addPost#add">
  AJOUTER UN NOUVEAU CHAPITRE
</a>

<?php
foreach ($posts as $post)
{
  ?>
  <article class="col-md-6 col-sm-12">
    <header>
      <span class="date">Publié le <?= strip_tags($post->getDateCreationFr());?></span>
      <h2><a href="../public/index.php?route=post&postId=<?= strip_tags($post->getId());?>#blog"><?= strip_tags($post->getTitle());?></a></h2>
    </header>

    <p><?= strip_tags($post->getContent());?></p>
    <ul class="actions special">
        <li><a href="../public/index.php?route=post&postId=<?= strip_tags($post->getId());?>#blog" class="button">Lire la suite</a></li>
    </ul>
  </article>
  <?php
}
?>

</section>
