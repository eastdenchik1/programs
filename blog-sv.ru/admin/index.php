<?php

require '../includes/config.php';

if ($_GET['mode']=='Exit'){
    session_start();
    session_unset();
    session_destroy();
    header("Location: /admin/login.php");
}

if (isset($_GET['idDel'])){
    mysqli_query($connection, "DELETE FROM `articles` WHERE `articles`.`id` = '".$_GET['idDel']."'");
}



session_start();
if (isset($_SESSION['login'])){


    $categories_q = mysqli_query($connection, "SELECT * FROM `articles_categories`");
    $categories = array();
    while($cat = mysqli_fetch_assoc($categories_q)){
      $categories[] = $cat;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
</head>

<body>

    <?php 
    
    if (isset($_POST['AddArt'])){
        $uploaddir = '../static/images/';
        $uploadfile = basename($_FILES['image']['name']);
        // Копируем файл из каталога для временного хранения файлов:
    	if (copy($_FILES['image']['tmp_name'], $uploaddir.$uploadfile)){
            mysqli_query($connection, "INSERT INTO `articles` (`title`, `image`, `text`, `categorie_id`, `pubdate`, `views`) VALUES ('".$_POST['title']."', '".$uploadfile."', '".$_POST['text']."', '".$_POST['category']."', '".DATE("Y-m-d")."', '0')");

        }
    }
    
    ?>

    <div class="container" style="margin-top: 3%;">
        <div class="row">
            <div class="col-md-6 well">

                <h2>Форма добавления статьи</h2>
                <form action="/admin/index.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" name='title' id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Image input</label>
                            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Text</label>
                        <textarea name="text" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <select class="form-control" name="category">
                            <?php foreach($categories as $cat){?>
                            <option value="<?php echo $cat['id'];?>"><?php echo $cat['title'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-secondary" name="AddArt" style="width: 100%" value="Add article" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                </form>
            </div>

            <div class="col-md-6 well">
                <h2>Все статьи</h2>
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Title</td>
                            <td>Image</td>
                            <td>Text</td>
                            <td>Category</td>
                            <td>Pubdate</td>
                            <td>Views</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>

            <?php 
                $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC");
                


                
                while($art = mysqli_fetch_assoc($articles)){


                    $art_cat = false;
                        foreach($categories as $cat) {
                          if ($cat['id']==$art['categorie_id']){
                            $art_cat = $cat;
                            break;
                          }
                        }
                  ?>
                
                <tr>
                            <td><?php echo $art['id'];?></td>
                            <td><?php echo $art['title'];?></td>
                            <td><img style="width: 70px" src="../static/images/<?php echo $art['image'];?>" alt=""></td>
                            <td><?php echo mb_substr(strip_tags($art['text']),0,100,'utf-8').' ... ';?></td>
                            <td><?php echo $art_cat['title']; ?></td>
                            <td><?php echo $art['pubdate'];?></td>
                            <td><?php echo $art['views'];?></td>
                            <td><a class="btn btn-danger" href="/admin?idDel=<?php echo $art['id'];?>">Delete</a></td>
                        </tr>


                  <?php
                }
              ?>
                
                    </tbody>
                </table>
            </div>
        </div>

        <hr><hr>
        <div class="row">
            <div class="col-md-12 well">
                <h2>Все коментарии</h2>
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Email</th>
                            <th>Nickname</th>
                            <th>Text</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                if (isset($_GET['idComDel'])){
                    mysqli_query($connection, "DELETE FROM `comments` WHERE `comments`.`id` = '".$_GET['idComDel']."'");
                }

                $comments = mysqli_query($connection, "SELECT * FROM `comments` ORDER BY `id`");
                
                while($com = mysqli_fetch_assoc($comments)){?>

                        <tr>
                            <td><?php echo $com['id'];?></td>
                            <td><?php echo $com['author'];?></td>
                            <td><?php echo $com['email'];?></td>
                            <td><?php echo $com['nickname'];?></td>
                            <td><?php echo mb_substr(strip_tags($com['text']),0,100,'utf-8').' ... ';?></td>
                            <td><a href="/admin?idComDel=<?php echo $com['id'];?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php
                }?>
                    
                    </tbody>
                </table>
            </div>

            

            <div class="col-md-12">
                <a href="/admin?mode=Exit" class="btn btn-secondary">Exit</a>
            </div>
        </div>
    </div>


</body>
<?php
} else {
    header('Location: /admin/login.php');
}

?>

</html>