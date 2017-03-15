<<?php
include_once('../includes/header.php');
 ?>
<div class="container">
  <div class="row">
    <h2>Maak uw bericht</h2>
    <form method="post">
    <div class="form-group"><label for="kop">Kop</label> <br>
      <input type="text" name="kop" id="kop" value="" placeholder="kop van het bericht" size="80"> </div>

    <div class="form-group"><label for="samenvatting">Samenvatting</label> <br>
      <textarea name="samenvatting" id="samenvatting" rows="8" cols="80"></textarea> </div>

    <div class="form-group">
      <label for="inhoud">Inhoud</label><br>
      <textarea name="inhoud" id="inhoud" rows="18" cols="80"></textarea>
    </div>

<div class="form-group">
      <label for="foto" class="btn btn-default btn-file">Foto toevoegen
      <input type="file" name="foto" id="foto" style="display: none;"></label>
</div>
<button type="submit" name="plaats" class="btn btn-success">Bericht plaatsen</button>
</form>
    </div>


 <?php include_once('../includes/footer.php') ?>
