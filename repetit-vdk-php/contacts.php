<?php 
include 'header.php';

$take_json = file_get_contents('config/data.json');
$new_json = json_decode($take_json);

$lastname = $new_json->lastname;
$firstname = $new_json->firstname;
$nextname = $new_json->nextname;
$phone = $new_json->phone;
$email = $new_json->email;
 ?>

<div class="contacts-section">
    <p class="display-4 cheader">Контакты</p>
    <div class="container">
        <article>
            <header>
                <?=$lastname." ".$firstname." ".$nextname."<br>"?>
            </header><hr>
            <p>Основные контакты</p><hr>
            моб. телефон:   <?=$phone?><br>
            email:   <?=$email?><br>
            whatsapp:   <?=$phone?><hr>
        </article>
    </div>
</div>

<?php 
include 'footer.php';
 ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/parallax.min.js"></script>
</body>
</html>