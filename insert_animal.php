<?php
require_once('CONFIG/autoload.php');
require_once('CONFIG/database.php');
include_once("PARTIALS/header.php");

  if(isset($_POST['specie_type']) && isset($_POST['specie_name']) && isset($_POST['size']) && isset($_POST['weight']) && isset($_POST['age']) && isset($_POST['enclosure_name']) && isset($_FILES['icon']) && isset($_FILES['sound'])){
      $icon = $_FILES['icon']['name'];
      $sound = $_FILES['sound']['name'];

      $animalManager = new AnimalManager($db);
      $result = $animalManager->addAnimal($_POST['specie_type'], $_POST['specie_name'], $_POST['size'], $_POST['weight'], $_POST['age'], $_POST['enclosure_name'], $icon, $sound);

      move_uploaded_file($_FILES['icon']['tmp_name'], 'ANIMAL_ICONS/' . $icon);
      move_uploaded_file($_FILES['sound']['tmp_name'], 'SOUNDS/' . $sound);
    }
?>

    <section class="h-100 bg-image"
                style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 100vh;">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
                <div class="d-flex justify-content-center">
                    <img src="IMAGES/footprint.png" alt="paw" width="80" height="80">  
                </div>
              <h2 class="text-uppercase text-center mb-5">New Animal</h2>

<form action="insert_animal.php" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4">
        <input type="text" name="specie_type" id="form3Example1cg" class="form-control form-control-lg" required/>
                <label class="form-label" for="form3Example1cg">Specie Type</label>
    </div>

    <div class="form-outline mb-4">
        <input type="text" name="specie_name" id="form3Example1cg" class="form-control form-control-lg" required/>
                <label class="form-label" for="form3Example1cg">Specie Name</label>
    </div>

    <div class="form-outline mb-4">
        <input type="number" name="size" id="form3Example3cg" class="form-control form-control-lg" required/>
                  <label class="form-label" for="form3Example3cg">Size (cm)</label>
    </div>

    <div class="form-outline mb-4">
        <input type="number" name="weight" id="form3Example4cg" class="form-control form-control-lg" required/>
                  <label class="form-label" for="form3Example4cg">Weight (kg)</label>
    </div>

    <div class="form-outline mb-4">
        <input type="number" name="age" id="form3Example4cdg" class="form-control form-control-lg" required/>
                  <label class="form-label" for="form3Example4cdg">Age</label>
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="form3Example4cdg">Enclosure</label>
        <select type="text" name="enclosure_name" class="form-select" aria-label="Default select example" required>
            <option selected></option>
            <option value="amphibians">Amphibians</option>
            <option value="aquarium">Aquarium</option>
            <option value="birds">Birds</option>
            <option value="carnivorous">Carnivorous</option>
            <option value="felines">Felines</option>
            <option value="herbivorous">Herbivorous</option>
            <option value="savannah">Savannah</option>
        </select>
    </div>

    <div class="form-outline m-5">
        <input type="file" name="icon" class="custom-file-input" id="inputGroupFile01"
         aria-describedby="inputGroupFileAddon01" accept="image/gif, image/jpeg, image/png" required>
        <label class="custom-file-label" for="inputGroupFile01">Choose icon</label>
    </div>

    <div class="form-outline m-5">
        <input type="file" name="sound" class="custom-file-input" id="inputGroupFile01"
         aria-describedby="inputGroupFileAddon01" accept=".mp3,audio/*" required>
        <label class="custom-file-label" for="inputGroupFile01">Choose mp3</label>
    </div>

    <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Insert</button>
    </div>
</form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div>
  <div class="addanimalkeeper">
    <img id="keeper" src="ICONS/keeper.png" alt="" width=384 height="640" style="position:absolute; bottom:1vw">
  </div>
<div class="addanimalbublle">
  <div id="bubble" class="bubble bubble-bottom-left text-white" contenteditable style="position:absolute; left:14vw; bottom: 56vh">Sir, Gimme that animal!</div>
</div>
</div>

<?php
  include_once('PARTIALS/footer.php');
?>