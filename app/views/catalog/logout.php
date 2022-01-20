<?php require_once "header.php" ?>
<?=isset($_SESSION['error']) ? $_SESSION['error'] : "";?>
<h2 class="col-4 my-auto mx-auto tm-text-primary">
                Logout
</h2>
<h4 stylt="max-width:500px;width:100%;" class="col-4 my-4 mx-auto text-center rounded text-primary bg-danger"><?=isset($data['error']) ? $data['error'] : ""?></h2>
<form method="POST" style="width:500px;" class="m-auto w-4 p-4">
  <br/>
  <button name="logout" type="submit" class="btn btn-primary mx-auto">Logout</button>
</form>
<br><br><br><br>
<?php require_once "footer.php";?> 