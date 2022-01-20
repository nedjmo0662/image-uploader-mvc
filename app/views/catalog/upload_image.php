
<?php require_once "header.php" ?>
<?=isset($_SESSION['error']) ? $_SESSION['error'] : "";?>
<form  method="POST" class = "m-auto w-100 p-4" style="max-width:500px;" enctype="multipart/form-data">
  <div class="form-group">
    <input name="title" type="text" class="form-control" id="image-title" aria-describedby="emailHelp" placeholder="Image Title" required>
    <small id="title help" class="form-text text-muted">Add A Title To Your Image</small>
  </div>
  <div class="form-group">
    <label class="py-2 px-4 bg-primary rounded" for="image-file">Choose An Image</label>
    <input  name="file" style="display:none" type="file" class="form-control" id="image-file" required>
  </div>
  <br/>
  <button name="upl" type="submit" class="btn btn-primary">Upload</button>
</form>

<?php require_once "footer.php";?> 