<?php 
require 'includes/config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Блог IT_Минималиста!</title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>

  <div id="wrapper">

    
   <?php include "includes/header.php"; 
   
    $article = mysqli_query($connection,"SELECT * FROM `articles` WHERE `id`=". (int) $_GET['id']);

    if (mysqli_num_rows($article)<=0){
        ?>

<div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <h3>Статья не найдена</h3>
              <div class="block__content">

                <div class="full-text">
                    Запрашиваемая вами статья не найдена.
                </div>
              </div>
            </div>

            
            
          </section>
          <section class="content__right col-md-4">
           <?php include "includes/sidebar.php"; ?>
          </section>
        </div>
      </div>
    </div>

        <?php
    } else {
        $art = mysqli_fetch_assoc($article);
        mysqli_query($connection,"UPDATE `articles` SET `views`=`views`+1 WHERE `id`=".(int)$_GET['id']);
        ?>
 <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
                <a><?php echo $art['views']; ?> просмотров</a>
              <h3><?php echo $art['title']; ?></h3>
              <div class="block__content">
                <img style="width:100%" src="/static/images/<?php echo $art['image']; ?>">

                <div class="full-text">
                <?php echo $art['text']; ?>
                </div>
              </div>
            </div>

            <div class="block">
                <a href="#comment-add-form">Добавить свой комментарий</a>
              <h3>Комментарии</h3>
              <div class="block__content">
                <div class="articles articles__vertical">

                <?php 
                $comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `article_id`=".(int)$_GET['id']." ORDER BY `id` DESC");
              
                if (mysqli_num_rows($comments)<=0){
                    echo "К этой статье еще нет комментариев";
                }

                while($com = mysqli_fetch_assoc($comments)){
                  ?>
                <article class="article">
                    <div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/<?php echo md5($com['email']);?>);"></div>
                    <div class="article__info">
                      <a href="/article.php?id=<?php echo $com['article_id'];?>"><?php echo $com['author'];?></a>
                      <div class="article__info__meta">
                      </div>
                      <div class="article__info__preview"><?php echo $com['text'];?></div>
                    </div>
                  </article>
                  <?php
                }
              ?>
                  
                </div>
              </div>
            </div>

            <div class="block" id="comment-add-form">
              <h3>Добавить свой комментарий</h3>
              <div class="block__content">
                  <?php
                  
                  if (isset($_POST['do_post'])){

                    $errors = array();

                    if ($_POST['name']==''){
                        $errors[] = 'Введите имя!!!';
                    }

                    if ($_POST['nickname']==''){
                        $errors[] = 'Введите никнейм!!!';
                    }

                    if ($_POST['email']==''){
                        $errors[] = 'Введите email!!!';
                    }

                    if ($_POST['text']==''){
                        $errors[] = 'Введите текст!!!';
                    }

                    if (empty($errors)){
                        mysqli_query($connection, "INSERT INTO `comments`(
                            `author`,`nickname`,`email`,`text`,`pubdate`,`article_id`) VALUES ('".mysqli_real_escape_string($connection,$_POST['name'])."','".mysqli_real_escape_string($connection,$_POST['nickname'])."','".mysqli_real_escape_string($connection,$_POST['email'])."','".mysqli_real_escape_string($connection,$_POST['text'])."',NOW(), '".$art['id']."')");
                        echo '<span style="color: green; font-weight: bold; margin-bottom: 20px; display: block;">Комментарий успешно добавлен.</span>';
                    } else {
                        echo '<span style="color: red; font-weight: bold; margin-bottom: 20px; display: block;">'.$errors['0'].'</span>';
                    }

                  }
                  
                  ?>
              <form class="form" method="POST" action="/article.php?id=<?php echo $art['id'];?>#comment-add-form">
                  <div class="form__group">
                    <div class="row">
                      <div class="col-md-4">
                        <input type="text" class="form__control"  name="name" placeholder="Имя" value="<?php echo $_POST['name'];?>">
                      </div>
                      <div class="col-md-4">
                        <input type="text" class="form__control"  name="nickname" placeholder="Никнейм" value="<?php echo $_POST['nickname'];?>">
                      </div>
                      <div class="col-md-4">
                        <input type="text" class="form__control"   name="email" placeholder="Email" value="<?php echo $_POST['email'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="form__group">
                    <textarea name="text"  class="form__control" placeholder="Текст комментария ..."></textarea>
                  </div>
                  <div class="form__group">
                    <input type="submit" class="form__control" name="do_post" value="Добавить комментарий">
                  </div>
                </form>
            </div>
            </div>
            
            
          </section>
          <section class="content__right col-md-4">
           <?php include "includes/sidebar.php"; ?>
          </section>
        </div>
      </div>
    </div>
        <?php

    }

   
   ?>

   

   <?php include "includes/footer.php"; ?>


  </div>

</body>
</html>