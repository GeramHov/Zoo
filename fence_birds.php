<?php
  require_once('CONFIG/autoload.php');
  require_once('CONFIG/database.php');
  include_once("PARTIALS/header.php");

  $manager = new EnclosureManager($db);
  $amphibianEnclosure = $manager->getEnclosureById(6);
  $manager->getAnimalFromEnclosure($amphibianEnclosure);

  $birds = $amphibianEnclosure->getAnimals();

  $manager = new EnclosureManager($db);
  $enclosures = $manager->getEnclosures();
?>
<body style=" background-image: url('IMAGES/enc_birds.avif');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 100vh;
                ">

<section id="main" style="background-color: rgba(125, 125, 125, 0.4) ;">

<div class="container-fluid text-center">
  <div class="row">
    <div class="col col-lg-2 col-md-0 col-sm-0 d-flex justify-content-start my-3">
      <div class="me-2 mt-3"><h5>Time:</h5></div>
      <div id="hour" class="mt-3"></div>
      <div class="ms-2">
        <img id="daytimeicon" src="IMAGES/sun.png" alt="day-night" width="60" height="60">
      </div>
    </div>

    <div id="clipart" class="col col-lg-8 col-md-8 col-sm-8">
      <img src="IMAGES/clipart.png" alt="clipart" height="250" width="600">
      <h1 style="position: absolute; top: 13vh; left:47vw">Birds</h1>
    </div>
    <div class="col col-lg-2 col-md-4 col-sm-4 d-flex justify-content-between align-items-start">
    <?php 
  
  function changeElements($message, $icon, $class) {
    echo '<h6 class="ps-4 pt-4 '. $class .'">'. $message .'</h6>
          <img src="'. $icon .'" alt="cleanstatusicon" width="70" height="70">
          ';
          }
  
  $tideIndex = $amphibianEnclosure->getTideIndex();
  if($tideIndex == 3) {
    changeElements('The enclosure is clean!','IMAGES/clean.png', 'text-success');
  } 
  
  if($tideIndex == 2) {
    changeElements('It starts stincking!','IMAGES/semi-dirty.png', 'text-secondary');
  }
  
  if($tideIndex <= 1) {
    changeElements('Clean up needed!','IMAGES/shitty.png', 'text-danger');
  }  
  
  ?>
    </div>
  </div>

</div>

<div id="fence" class="container-fluid d-flex justify-content-evenly text-center mt-5" style="position:relative; top: 10vh">
 
<?php foreach ($birds as $key => $bird) : ?>

<div class="d-flex flex-column align-items-center">
<div class="d-flex justify-content-center my-2 mx-2">
  <img id="sound<?= $key ?>" src="ICONS/sound.png" alt="sound" width="40" height="40" style="cursor:pointer">
</div>
<div class="d-flex align-items-center">
  <img id="hearth" class="mx-2" src="ICONS/hearth.png" alt="health" width="30" height="30">
    <div class="progress">
    <div id="health" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
    aria-valuemin="0" aria-valuemax="100">
  </div>
  </div>
</div>
<div class="d-flex align-items-center">
  <img id="eat" class="mx-2" src="ICONS/eat.png" alt="health" width="30" height="30">
    <div class="progress">
    <div id="hunger" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
    aria-valuemin="0" aria-valuemax="100">
  </div>
  </div>
</div>
<div class="d-flex justify-content-center my-2 mx-2">
  <img id="sleep" src="" alt="sound" width="40" height="40" style="cursor:pointer">
</div>
<img id="animal" src="ANIMAL_ICONS/<?= $bird->getIcon()?>" alt="" width="120" height="150"
      data-specie-type="<?= ucfirst($bird->getSpecieType()) ?>"
      data-specie-name="<?= ucfirst($bird->getSpecieName()) ?>"
      data-size="<?= $bird->getSize() ?>"
      data-weight="<?= $bird->getWeight() ?>"
      data-age="<?= $bird->getAge() ?>"
    >
</div>

  <audio id="audio<?= $key ?>" src="SOUNDS/<?= $bird->getSound() ?>"></audio>

<?php endforeach ?>

</div>

<div id="fence" class="container-fluid text-center">
  <div class="row">
    <div class="col"> <img src="ICONS/fence.png" alt="" style="width:100%" height="400"></div>
    <div class="col"> <img src="ICONS/fence.png" alt="" style="width:100%" height="400"></div>
    <div class="col"> <img src="ICONS/fence.png" alt="" style="width:100%" height="400"></div>
  </div>
</div>
<img id="worker" src="ICONS/keeper.png" alt="" width=172 height="300" style="position:absolute; bottom:0; cursor: pointer">

<!-- WORKER FUNCTIONS -->

<div class="workerfunctions d-flex flex-column" style="position: absolute; bottom: 50px; left: 150px; visibility: hidden">
  <div class="workerbubble">
    <div id="bubble" class="bubble bubble-bottom-left text-white" contenteditable style="position:fixed; left:5vw; bottom: 28vh">Sir, I'm ready!</div>
    </div>

<button id="feed" type="button" class="btn btn-primary-outline my-2" style="background-color: transparent;
  border-color: black;">Feed</button>

<!-- CLEANING UP / SENDING TO WORKER CLASS METHOD -->

<form action="treatTide.php" method="GET">
  <input type="hidden" name="id" value="<?= $amphibianEnclosure->getId()?>">
  <input type="hidden" name="fence_name" value="<?= $amphibianEnclosure->getName()?>">
  <button id="cleanup" type="submit" class="btn btn-primary-outline my-2" style="background-color: transparent;
  border-color: black;">CleanUp</button>
</form>

<button id="heal" type="button" class="btn btn-primary-outline my-2" style="background-color: transparent;
  border-color: black;">Heal</button>
</div>


<div id="tooltip" class="d-flex flex-column">
</div>

<!-- SCRIPTS -->

<script>
  // SIMULATED HOUR

      function updateTime() {
        // START AT 00:00
        let timeStr = localStorage.getItem("time") || "00:00";
        let [hours, minutes] = timeStr.split(":").map(Number);
        
        // INCREMENT THE TIME BY ONE SECOND
        if (minutes < 59) {
          minutes++;
        } else {
          hours++;
          minutes = 0;
          if (hours > 23) {
            hours = 0;
          }
        }
       
        // STORE THE UPDATED TIME IN THE LOCAL BROWSER STORAGE
        timeStr = `${hours.toString().padStart(2, "0")}:${minutes
          .toString()
          .padStart(2, "0")}`;
        localStorage.setItem("time", timeStr);

        // UPDATE THE TIME DISPLAY
        document.getElementById("hour").textContent = timeStr;

        // NIGHTTIME AND DAYTIME CONFIGURATIONS
        const isNighttime = hours >= 19 || hours < 7;
        const isDaytime = hours >=7 && hours < 19;

        const sleepIcons = document.querySelectorAll('#sleep');


        if (isNighttime) {
          sleepIcons.forEach((icon) => {
           icon.setAttribute('src', 'ICONS/sleep.png');
          });
          document.getElementById("daytimeicon").src = "IMAGES/moon.png";
          document.body.style.backgroundImage = "url('IMAGES/enc_birds.avif')";
          document.body.style.backgroundSize = "cover";
          document.body.style.backgroundPosition = "center";
          document.body.style.backgroundRepeat = "no-repeat";
          document.body.style.height = "100vh";
          document.body.style.filter = "brightness(0.5)";
          } 
          
         if(isDaytime) {
          sleepIcons.forEach((icon) => {
           icon.setAttribute('src', 'ICONS/visit.png');
          });
           document.getElementById("daytimeicon").src = "IMAGES/sun.png";
           document.body.style.backgroundImage = "url('IMAGES/enc_birds.avif')";
           document.body.style.backgroundSize = "cover";
           document.body.style.backgroundPosition = "center";
           document.body.style.backgroundRepeat = "no-repeat";
           document.body.style.height = "100vh";
           document.body.style.filter = "";

         } 
  }

      // UPDATE THE TIME EVERY 3 SECONDS

      setInterval(updateTime, 1000);

      // GET WORKER BUTTONS  
  const workerBtn = document.querySelector('#worker');
  const sectionMain = document.getElementById('main');
  const workerActions = document.querySelector('.workerfunctions');
  const cleanUp = document.getElementById('cleanup');

  workerBtn.addEventListener('click', function(event){
    workerActions.style.visibility = "visible";
    event.stopPropagation();
  })

  sectionMain.addEventListener('click', function(){
    workerActions.style.visibility = "hidden";
  })

// HEALTH FUNCTION      
const healthIcons = document.querySelectorAll("#health");
const hearths = document.querySelectorAll('#hearth');
const heal = document.getElementById('heal');

healthIcons.forEach((icon) => {
  let currentHealth = localStorage.getItem('currentHealth') || 140;

  icon.style.width = `${currentHealth}px`;

  function updateHealth() {
    currentHealth -= 1;
    icon.style.width = `${currentHealth}px`;
    localStorage.setItem('currentHealth', currentHealth);

    // CHANGE HEALTH ICON WHEN NO POINTS LEFT
    if (currentHealth <= 0) {
      hearths.forEach((hearth) => {
      hearth.src = 'ICONS/broken-heart.png';
      })
      heal.addEventListener('click', function(){
        currentHealth = 140;
        icon.style.width = `${currentHealth}px`;
        localStorage.setItem('currentHealth', currentHealth);
        hearths.forEach((hearth) => {
        hearth.src = 'ICONS/hearth.png';
      })
      })
    }
  }

  const healthInterval = setInterval(updateHealth, 20000);
});


// HUNGER FUNCTION
const hungerIcons = document.querySelectorAll("#hunger");
const eat = document.querySelectorAll('#eat');
const feed = document.getElementById('feed');

hungerIcons.forEach((icon) => {
  
  let currentHunger = localStorage.getItem('currentHunger') || 140;

  icon.style.width = `${currentHunger}px`;

  function updateHunger() {
    currentHunger -= 1;
    icon.style.width = `${currentHunger}px`;
    localStorage.setItem('currentHunger', currentHunger);

    // CHANGE HUNGER ICON WHEN NO POINTS LEFT
    if (currentHunger <= 0) {
      eat.forEach((icon) => {
        icon.src = 'ICONS/hunger.png';
      })
      feed.addEventListener('click', function(){
        currentHunger = 140;
        icon.style.width = `${currentHunger}px`;
        localStorage.setItem('currentHunger', currentHunger);
        eat.forEach((icon) => {
        icon.src = 'ICONS/eat.png';
      })
      })
    }
  }

  const hungerthInterval = setInterval(updateHunger, 4000);
});

</script>

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
</section>
<script src="JAVASCRIPT/ajax.js"></script>
<?php
  include_once('PARTIALS/footer.php');
?>