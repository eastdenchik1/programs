<?php 
include 'header.php';

$json = file_get_contents('config/exam.json');
$obj = json_decode($json);

?>

<div class="lit-section">
  <p class="display-4 cheader">Литература для подготовки к ЕГЭ (ОГЭ)</p>
  <div class="row">
    <div class="container">
      <h2 style="text-align: center;">ЕГЭ/ОГЭ</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Экзамен</th>
            <th scope="col">Название</th>
            <th scope="col">Автор</th>
            <th scope="col">Скачивание</th>
          </tr>
        </thead>
        <tbody>
         <?php for ($i=0; $i < count($obj); $i++): ?>
          <tr>
            <td><?=$obj[$i]->exam;?></td>
            <td><?=$obj[$i]->book;?></td>
            <td><?=$obj[$i]->author;?></td>
            <td><a target="_blank" class="btn btn-warning" href="/<?=$obj[$i]->file_name;?>">Скачать</a></td>
          </tr>
        <?php endfor; ?>

      </tbody>
    </table>
  </div>
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
<script>
  
</script>
</body>
</html>