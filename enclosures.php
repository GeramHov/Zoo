<?php
    require_once('CONFIG/autoload.php');
    require_once('CONFIG/database.php');
    include_once('PARTIALS/header.php');

    $manager = new AnimalManager($db);
    $animals = $manager->getAnimals();

    $manager = new EnclosureManager($db);
    $enclosures = $manager->getEnclosures();

    // CALCULATING EACH ANIMAL IN ENCLOSURE

    $manager = new Worker($db);
    $animalsCountByEnclosure = $manager->CalculateAnimalsInEveryEnclosure();
?>
<!-- BODY WITH STYLE START -->

<body id="body" style=" background-image: url('IMAGES/sun.jpg');
                background-size: cover;
                background-position: center;
                height: 100vh;
                ">
                <div class="col col-lg-2">
                    <div>
                        <div class="enclosurekeeper">
                            <img id="keeper" src="ICONS/keeper.png" alt="" width=300 height="560" style="position:fixed; top:4vh;">
                        </div>
                            <div class="enclosurebubble">

                                <!-- WORKER ACTION MESSAGE -->

                                <div id="bubble" class="bubble bubble-bottom-left text-white" contenteditable style="position:fixed; left:10vw; top: 1vh">
                                <?php 
                                    if(isset($_GET['message']) && !empty($_GET['message'])){
                                     echo $_GET['message'] ;
                                    } else {
                                        echo 'Sir, What Can I do with all these beasts!';
                                    }
                                ?>
                            </div>
                        </div>
                        </div>
                </div>

<!-- HIDDEN ANIMALS LIST START-->

<div id="animalslist" class="d-flex flex-column flex-wrap vh-100">
    <?php foreach ($animals as $animal) : ?>
        <form action="" method="get">
                         <input type="hidden" name="animal_id" value="<?= $animal->getId() ?>">
                         <input type="hidden" name="specie_type" value="<?= $animal->getSpecieType() ?>">
                         <button id="animalbtn" style="background:transparent; border: none">
                            <div class="card text-center" style="width: 6rem; height:6rem">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img style="border-radius: 50%" src="ANIMAL_ICONS/<?= $animal->getIcon() ?>" alt="..." width="45" height="45">
                                </div>
                            <div class="card-body p-0">
                                <p class="card-title"><?= ucfirst($animal->getSpecieName())?></p>
                                </div>
                            </div>
                         </button>
                        </form>
                    <?php endforeach ?>
                </div>

<!-- HIDDEN ANIMALS LIST END-->

<div class="container">

<!-- ENCLOSURES SECTIONS START-->

<?php foreach ($enclosures as $enclosure) : ?>

<section id="enclosures">
    <div class="flex-column my-5" style="border: 1px solid black">
        <h2>"<?= ucfirst($enclosure->getName())?>"</h2>
        <div class="row">
        <div class="col col-lg-10 col-md-10 col-sm-10 d-flex align-items-end my-5 justify-content-evenly">
        <?php foreach ($enclosure->getAnimals() as $animal) : ?>
            <div class="d-flex flex-column align-items-center mx-4">
                <img id="animalsicon" class="my-2" src="ANIMAL_ICONS/<?= $animal->getIcon()?>" alt="" width="80" height="80">
                <h4 id="animalsname"><?= ucfirst($animal->getSpecieName())?></h4>
                <h6 id="animalstype"><?= ucfirst($animal->getSpecieType())?></h6>
                <div class="d-flex">

                    <!-- REMOVE ANIMAL FORM START -->

                        <form action="../treatRemoveAnimal.php" method="get">
                            <input type="hidden" name="enclosure_id" value="<?= $animal->getEnclosureId()?>">
                            <input type="hidden" name="id" value="<?= $animal->getId()?>">
                            <button type="submit" style="border: none; background: transparent">
                                <img src="ICONS/remove.png" alt="" width="20" height="20">
                            </button>
                        </form>
                        
                    <!-- REMOVE ANIMAL FORM END -->

                </div>
            </div>
<?php endforeach ?>
</div>

<!-- FORM TO SHOW ANIMALS LIST START -->

    <form method="get" class="col col-lg-2 col-md-2 col-sm-2 d-flex justify-content-end align-items-center">
            <input type="hidden" id="fenceId" name="enlos_id" value="
            <?= $enclosure->getId()?>">
            <input type="hidden" id="fenceQuantity" name="animals_quantity" value="
            <?= $enclosure->getAnimalsByEnclosure()?>">
            <button id="showbtn" style="background: transparent; border: none">
                <img id="plusbtn" src="ICONS/plus.png" alt="" width="70" height="70">
             </button>
    </form>

<!-- FORM TO SHOW ANIMALS LIST END -->
        </div>
    </div>
</section>

<?php endforeach ?>

<!-- ENCLOSURES SECTIONS END-->

</div>

<!-- SCRIPT START -->

<script>
    
const fenceIdInputs = document.querySelectorAll('#fenceId');
const animalsList = document.getElementById('animalslist');
const showBtns = document.querySelectorAll('#showbtn');
const animalBtns = document.querySelectorAll('#animalbtn');

let enclosureId = null;

showBtns.forEach(function(btn) {
  btn.addEventListener('click', function(event) {
    animalsList.style.transition = 'right 0.5s ease-in-out';
    animalsList.style.right = '0';
    event.stopPropagation();

    event.preventDefault();

    enclosureId = event.target.closest('form').querySelector('#fenceId').value;

    fenceQuantity = event.target.closest('form').querySelector('input[name="animals_quantity"]').value;

    window.history.pushState(null, null, `?enclos_id=${enclosureId}&animals_quantity=${fenceQuantity}`);
  });
});

animalBtns.forEach(function(animalBtn) {
  animalBtn.addEventListener('click', function(event) {
    event.preventDefault();

    const animalId = event.target.closest('form').querySelector('input[name="animal_id"]').value;
    const animalType = event.target.closest('form').querySelector('input[name="specie_type"]').value;

    window.history.pushState(null, null, `?enclos_id=${enclosureId}&animals_quantity=${fenceQuantity}&animal_id=${animalId}&specie_type=${animalType}`);

    setTimeout(function(){
        window.location.href = `../treatAddToEnclosure.php?enclos_id=${enclosureId}&animals_quantity=${fenceQuantity}&animal_id=${animalId}&specie_type=${animalType}`;
    }, 1800)
    document.getElementById("bubble").innerHTML = "<span class='text-success'>That animal will be placed immediately, Sir...</span>";

});
});


    // HIDE ANIMALS LIST

    const body = document.getElementById('body');

    body.addEventListener('click', function(){
        animalsList.style.transition = 'right 0.5s ease-in-out';
        animalsList.style.right = '-550px';
    })

</script>

<!-- SCRIPT END -->

</body>
<?php
    include_once('PARTIALS/footer.php');
?>