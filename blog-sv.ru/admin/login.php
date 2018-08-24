<?php 
require '../includes/config.php';

session_start();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="container">
            <div class="container">
                <div class="container">
                    <div class="container">
                        <div style="margin-top: 20%;">
                            <h2 align="center">Форма входа</h2>

                            <?php 
                            if (isset($_POST['Log_In'])){

                                $errors = array();

                                if ($_POST['login']==''){
                                    $errors[] = 'Введите логин!!!';
                                }

                                if ($_POST['password']==''){
                                    $errors[] = 'Введите пароль!!!';
                                }
                            
                            
                                if (!empty($errors)){
                                    echo '<span style="color: red; font-weight: bold; margin-bottom: 20px; display: block;">'.$errors['0'].'</span>';
                                } else {
                                    if ($_POST['login']==$config['users']['login'] & $_POST['password']==$config['users']['password']){
                                        
                                        $_SESSION['login'] = $config['users']['login'];
                                        echo '<span style="color: green; font-weight: bold;">Вы успешно авторизовались.</span>';
                                        echo '<a href="/admin/">Перейти в админ панель.</a>';
                                    } else {
                                        echo '<span style="color: red; font-weight: bold;">Не правильный логин или пароль.</span>';
                                    }
                                }
                            ?>
                            <?php } ?>
                            <form action="/admin/login.php" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Login</label>
                                    <input value="<?php $_POST['login'];?>" type="text" name="login"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input  value="<?php $_POST['password'];?>"  type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="Log_In" class="btn btn-secondary" style="width: 100%" value="Login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>