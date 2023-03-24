<?php
  include_once("PARTIALS/header.php");
?>
  <body style=" background-image: url('IMAGES/zoo.png');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 100vh;
                ">
  <a href="fence_felines.php">
    <h1 class="text-dark" id="enclosure" style="position:absolute; bottom: 24vh; left: 27vw; font-family: 'Roboto', sans-serif;">
      Felines
    </h1>
  </a>
  <a href="fence_birds.php">
    <h1 class="text-dark" id="enclosure" style="position:absolute; bottom: 24vh; right: 23vw; font-family: 'Roboto', sans-serif;">
      Birds
    </h1>
  </a>
  <a href="fence_carnivorous.php">
    <h1 class="text-dark" id="enclosure" style="position:absolute; top: 8vh; left: 26vw; font-family: 'Roboto', sans-serif;">
      Carnivorous
    </h1>
  </a>
  <a href="fence_herbivorous.php">
    <h1 class="text-dark" id="enclosure" style="position:absolute; bottom: 29vh; left: 0.8vw; font-family: 'Roboto', sans-serif;">
      Herbivorous
    </h1>
  </a>
  <a href="fence_savannah.php">
    <h1 class="text-dark" id="enclosure" style="position:absolute; bottom: 47vh; left: 30vw; font-family: 'Roboto', sans-serif;">
      Savannah
    </h1>
  </a>
  <a href="fence_amphibians.php">
    <h1 class="text-dark" id="enclosure" style="position:absolute; top: 31vh; right: 25vw; font-family: 'Roboto', sans-serif;">
      Amphibians
    </h1>
  </a>
  <a href="fence_aquarium.php">
    <h1 class="text-dark" id="enclosure" style="position:absolute; top: 30vh; right: 3vw; font-family: 'Roboto', sans-serif;">
      Aquarium
    </h1>
  </a>
  <div class="indexkeeper">
    <img id="keeper" src="ICONS/keeper.png" alt="" width=192 height="320" style="position:absolute; top:5vw">
  </div>
  <div class="indexbubble">
    <div id="bubble" class="bubble bubble-bottom-left text-white" contenteditable style="position:absolute; left:6vw; bottom: 82vh">Hi, I'm Pablo! Welcome to our zoo</div>
  </div>
  <div class="indexaddanimalmessage">
    <div class="bubble bubble-bottom-left text-white add" contenteditable style="position:absolute; right:0; top:2vh">Wanna get a new animal for our zoo? <br>
      Click on the plus below</div>
  </div>
      <a href="insert_animal.php">
        <img id="add" src="ICONS/plus.png" alt="addanimal" height="75" width="75" style="position:absolute; right:6vw; top:17vh">
      </a>
<?php
  include_once('PARTIALS/footer.php');
?>