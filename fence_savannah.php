<?php
  require_once('CONFIG/autoload.php');
  require_once('CONFIG/database.php');
  include_once("PARTIALS/header.php");

  $manager = new EnclosureManager($db);
  $amphibianEnclosure = $manager->getEnclosureById(3);
  $manager->getAnimalFromEnclosure($amphibianEnclosure);

  $savannahs = $amphibianEnclosure->getAnimals();
?>
<body style=" background-image: url('IMAGES/enc_sav.avif');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 100vh;
                ">
<div class="container text-center">
  <img src="IMAGES/clipart.png" alt="clipart" height="250" width="600">
  <h1 style="position: absolute; top: 13vh; left:44vw">Savannah</h1>
</div>

<div id="fence" class="container-fluid d-flex justify-content-evenly text-center mt-5" style="position:relative; top: 10vh">
    
<?php foreach ($savannahs as $key => $savannah) : ?>

<div class="d-flex flex-column align-items-center">
<div class="d-flex justify-content-center my-2 mx-2">
  <img id="sound<?= $key ?>" src="ICONS/sound.png" alt="sound" width="40" height="40" style="cursor:pointer">
</div>
<div class="d-flex align-items-center">
  <img class="mx-2" src="ICONS/hearth.png" alt="health" width="30" height="30">
    <div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
    aria-valuemin="0" aria-valuemax="100" style="width:140px">
  </div>
  </div>
</div>
<div class="d-flex align-items-center">
  <img class="mx-2" src="ICONS/eat.png" alt="health" width="30" height="30">
    <div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
    aria-valuemin="0" aria-valuemax="100" style="width:140px">
  </div>
  </div>
</div>
<div class="d-flex justify-content-center my-2 mx-2">
  <img id="sleep" src="ICONS/bed.png" alt="sound" width="40" height="40" style="cursor:pointer">
</div>
<img id="animal" src="ANIMAL_ICONS/<?= $savannah->getIcon()?>" alt="" width="120" height="150"
      data-specie-type="<?= ucfirst($savannah->getSpecieType()) ?>"
      data-specie-name="<?= ucfirst($savannah->getSpecieName()) ?>"
      data-size="<?= $savannah->getSize() ?>"
      data-weight="<?= $savannah->getWeight() ?>"
      data-age="<?= $savannah->getAge() ?>"
    >
</div>

<audio id="audio<?= $key ?>" src="SOUNDS/<?= $savannah->getSound() ?>"></audio>

<?php endforeach ?>


</div>

<div id="fence" class="container-fluid text-center">
  <div class="row">
    <div class="col"> <img src="ICONS/fence.png" alt="" style="width:100%" height="400"></div>
    <div class="col"> <img src="ICONS/fence.png" alt="" style="width:100%" height="400"></div>
    <div class="col"> <img src="ICONS/fence.png" alt="" style="width:100%" height="400"></div>
  </div>
</div>
<img src="ICONS/keeper.png" alt="" width=172 height="300" style="position:absolute; bottom:0">

<div id="tooltip" class="d-flex flex-column">
</div>

<script>

  // PLAY AUDIO FOR EACH ANIMAL

  const buttons = document.querySelectorAll('[id^="sound"]');
  const audioFiles = document.querySelectorAll('[id^="audio"]');
        
  buttons.forEach((button, index) => {
    let isPlaying = false;
    button.addEventListener('click', function(){
      if (isPlaying) {
        audioFiles[index].pause();
        isPlaying = false;
      } else {
        audioFiles.forEach(audio => audio.pause());
        audioFiles[index].play();
        isPlaying = true;
      }
    });
  });
</script>

<script>

  // SHOW EACH ANIMAL INFO

  const links = document.querySelectorAll('#animal');

  for (const link of links) {
    link.addEventListener('mouseover', (event) => {
    const amphibian = {
      specieType: event.target.getAttribute('data-specie-type'),
      specieName: event.target.getAttribute('data-specie-name'),
      size: event.target.getAttribute('data-size'),
      weight: event.target.getAttribute('data-weight'),
      age: event.target.getAttribute('data-age'),
    };

    const tooltip = document.getElementById('tooltip');
    tooltip.style.top = event.pageY + 'px';
    tooltip.style.left = event.pageX + 'px';

    tooltip.innerHTML = `<span>Type: ${amphibian.specieType}</span>
                         <span>Name: ${amphibian.specieName}</span>
                         <span>Size: ${amphibian.size}m</span>
                         <span>Weight: ${amphibian.weight}kg</span>
                         <span>Age: ${amphibian.age} years</span>`;

    tooltip.style.visibility = 'visible';
  });

  link.addEventListener('mouseout', (event) => {
    const tooltip = document.getElementById('tooltip');
    tooltip.style.visibility = 'hidden';
  });
}
</script>

<?php
  include_once('PARTIALS/footer.php');
?>