<?php require_once "header.php" ?>
<?=isset($_SESSION['error']) ? $_SESSION['error'] : "";?>
<h2 class="col-4 my-auto mx-auto tm-text-primary">
                Signup
</h2>
<h4 stylt="max-width:500px;width:100%;" class="col-4 my-4 mx-auto text-center rounded text-primary bg-danger"><?=isset($data['error']) ? $data['error'] : ""?></h2>
<form  method="POST" class = "m-auto w-100 p-4" style="max-width:500px;" enctype="multipart/form-data">

<div class="form-group">
      <input name="first_name" style="form-controll" type="text" class="form-control" placeholder="First Name" required>
</div>

<div class="form-group">
    <input name="last_name"  style="form-controll" type="text" class="form-control" placeholder ="Last Name" required>
</div>

<div class="form-group">
    <input name="email"  style="form-controll" type="email" class="form-control" placeholder = "Email" required>
</div>

<div class="form-group">
    <input name="password"  style="form-controll" type="password" class="form-control" placeholder = "Password" required>
</div>

<div class="form-group">
    <input name="password2"  style="form-controll" type="password" class="form-control" placeholder = "Retype Password" required>
</div>

</div>
  <br/>
  <button name="signup" type="submit" class="btn btn-primary">Submit</button>
</form>

<?php require_once "footer.php";?> 