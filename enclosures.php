<?php
    require_once('CONFIG/autoload.php');
    require_once('CONFIG/database.php');
    include_once('PARTIALS/header.php');
?>
<body style=" background-image: url('IMAGES/sun.jpg');
                background-size: cover;
                background-position: center;
                height: 100vh;
                ">
                <div class="col col-lg-2">
                    <div>
                        <img id="keeper" src="ICONS/keeper.png" alt="" width=300 height="560" style="position:fixed; top:4vh;">
                        <div id="bubble" class="bubble bubble-bottom-left text-white" contenteditable style="position:fixed; left:10vw; top: 1vh">Hi Sir, What Can I do with all these beasts!</div>
                    </div>
                </div>

<div class="container">

<section id="carnivorous">
<?php 
    $manager = new EnclosureManager($db);
    $carnivorousesEnclosure = $manager->getEnclosureById(1);
    $manager->getAnimalFromEnclosure($carnivorousesEnclosure);

    $carnivourouses = $carnivorousesEnclosure->getAnimals();
?>
    <div class="flex-column my-5" style="border: 1px solid black">
         <h2>"Carnivorous"</h2>
<div class="row">
         <div class="col col-lg-10 col-md-10 col-sm-10 d-flex align-items-end my-5 justify-content-evenly">
                    <?php foreach ($carnivourouses as $carnivourous) : ?>
                        <div class="d-flex flex-column align-items-center mx-4">
                            <img class="my-2" src="ANIMAL_ICONS/<?= $carnivourous->getIcon()?>" alt="" width="80" height="80">
                            <h4><?= ucfirst($carnivourous->getSpecieName())?></h4>
                            <h6><?= ucfirst($carnivourous->getSpecieType())?></h6>
                            <div class="d-flex">
                                <button style="border: none; background: transparent"><img class="mx-1" src="ICONS/reload.png" alt="" width="20" height="20"></button>
                                <form action="../CLASSES/Worker.php" method="get">
                                    <input type="hidden" name="enclosure_id" value="<?= $carnivourous->getEnclosureId()?>">
                                    <input type="hidden" name="id" value="<?= $carnivourous->getId()?>">
                                    <button type="submit" style="border: none; background: transparent">
                                    <img src="ICONS/remove.png" alt="" width="20" height="20">
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="col col-lg-2 col-md-2 col-sm-2 d-flex justify-content-end align-items-center">
                    <button style="background: transparent; border: none">
                        <img src="ICONS/plus.png" alt="" width="70" height="70">
                    </button>
                </div>
                </div>

    </div>

</section> 
<section id="herbivorous">
<?php 
    $manager = new EnclosureManager($db);
    $herbivorousesEnclosure = $manager->getEnclosureById(2);
    $manager->getAnimalFromEnclosure($herbivorousesEnclosure);

    $herbivorouses = $herbivorousesEnclosure->getAnimals();
?>
    <div class="flex-column my-5" style="border: 1px solid black">
         <h2>"Herbivorous"</h2>
         <div class="row">
         <div class="col col-lg-10 col-md-10 col-sm-10 d-flex align-items-end my-5 justify-content-evenly">
         <?php foreach ($herbivorouses as $herbivorous) : ?>
                        <div class="d-flex flex-column align-items-center mx-4">
                            <img class="my-2" src="ANIMAL_ICONS/<?= $herbivorous->getIcon()?>" alt="" width="80" height="80">
                            <h4><?= ucfirst($herbivorous->getSpecieName())?></h4>
                            <h6><?= ucfirst($herbivorous->getSpecieType())?></h6>
                            <div class="d-flex">
                                <button style="border: none; background: transparent"><img class="mx-1" src="ICONS/reload.png" alt="" width="20" height="20"></button>
                                <form action="../CLASSES/Worker.php" method="get">
                                    <input type="hidden" name="enclosure_id" value="<?= $herbivorous->getEnclosureId()?>">
                                    <input type="hidden" name="id" value="<?= $herbivorous->getId()?>">
                                    <button type="submit" style="border: none; background: transparent">
                                    <img src="ICONS/remove.png" alt="" width="20" height="20">
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach ?>
         </div>
         <div class="col col-lg-2 col-md-2 col-sm-2 d-flex justify-content-end align-items-center">
                    <button style="background: transparent; border: none">
                        <img src="ICONS/plus.png" alt="" width="70" height="70">
                    </button>
                </div>
                </div>

    </div>
</section>
<section id="savannah">
<?php 
    $manager = new EnclosureManager($db);
    $savannahsEnclosure = $manager->getEnclosureById(3);
    $manager->getAnimalFromEnclosure($savannahsEnclosure);

    $savannahs = $savannahsEnclosure->getAnimals();
?>
    <div class="flex-column my-5" style="border: 1px solid black">
         <h2>"Savannah"</h2>
         <div class="row">
         <div class="col col-lg-10 col-md-10 col-sm-10 d-flex align-items-end my-5 justify-content-evenly">
         <?php foreach ($savannahs as $savannah) : ?>
                        <div class="d-flex flex-column align-items-center mx-4">
                            <img class="my-2" src="ANIMAL_ICONS/<?= $savannah->getIcon()?>" alt="" width="80" height="80">
                            <h4><?= ucfirst($savannah->getSpecieName())?></h4>
                            <h6><?= ucfirst($savannah->getSpecieType())?></h6>
                            <div class="d-flex">
                                <button style="border: none; background: transparent"><img class="mx-1" src="ICONS/reload.png" alt="" width="20" height="20"></button>
                                <form action="../CLASSES/Worker.php" method="get">
                                    <input type="hidden" name="enclosure_id" value="<?= $savannah->getEnclosureId()?>">
                                    <input type="hidden" name="id" value="<?= $savannah->getId()?>">
                                    <button type="submit" style="border: none; background: transparent">
                                    <img src="ICONS/remove.png" alt="" width="20" height="20">
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach ?>
         </div>
         <div class="col col-lg-2 col-md-2 col-sm-2 d-flex justify-content-end align-items-center">
                    <button style="background: transparent; border: none">
                        <img src="ICONS/plus.png" alt="" width="70" height="70">
                    </button>
                </div>
                </div>
    </div>
</section>
<section id="felines">
<?php 
    $manager = new EnclosureManager($db);
    $felinesEnclosure = $manager->getEnclosureById(4);
    $manager->getAnimalFromEnclosure($felinesEnclosure);

    $felines = $felinesEnclosure->getAnimals();
?>
    <div class="flex-column my-5" style="border: 1px solid black">
         <h2>"Felines"</h2>
         <div class="row">
         <div class="col col-lg-10 col-md-10 col-sm-10 d-flex align-items-end my-5 justify-content-evenly">
         <?php foreach ($felines as $feline) : ?>
                        <div class="d-flex flex-column align-items-center mx-4">
                            <img class="my-2" src="ANIMAL_ICONS/<?= $feline->getIcon()?>" alt="" width="80" height="80">
                            <h4><?= ucfirst($feline->getSpecieName())?></h4>
                            <h6><?= ucfirst($feline->getSpecieType())?></h6>
                            <div class="d-flex">
                                <button style="border: none; background: transparent"><img class="mx-1" src="ICONS/reload.png" alt="" width="20" height="20"></button>
                                <form action="../CLASSES/Worker.php" method="get">
                                    <input type="hidden" name="enclosure_id" value="<?= $feline->getEnclosureId()?>">
                                    <input type="hidden" name="id" value="<?= $feline->getId()?>">
                                    <button type="submit" style="border: none; background: transparent">
                                    <img src="ICONS/remove.png" alt="" width="20" height="20">
                                    </button>
                                </form>
                            </div>
                        </div>

                
                    <?php endforeach ?>
         </div>
         <div class="col col-lg-2 col-md-2 col-sm-2 d-flex justify-content-end align-items-center">
                    <button style="background: transparent; border: none">
                        <img src="ICONS/plus.png" alt="" width="70" height="70">
                    </button>
                </div>
                </div>
    </div>
</section>
<section id="amphibians">
<?php 
    $manager = new EnclosureManager($db);
    $amphibiansEnclosure = $manager->getEnclosureById(5);
    $manager->getAnimalFromEnclosure($amphibiansEnclosure);

    $amphibians = $amphibiansEnclosure->getAnimals();
?>
    <div class="flex-column my-5" style="border: 1px solid black">
         <h2>"Amphibians"</h2>
         <div class="row">
         <div class="col col-lg-10 col-md-10 col-sm-10 d-flex align-items-end my-5 justify-content-evenly">
         <?php foreach ($amphibians as $amphibian) : ?>
                        <div class="d-flex flex-column align-items-center mx-4">
                            <img class="my-2" src="ANIMAL_ICONS/<?= $amphibian->getIcon()?>" alt="" width="80" height="80">
                            <h4><?= ucfirst($amphibian->getSpecieName())?></h4>
                            <h6><?= ucfirst($amphibian->getSpecieType())?></h6>
                            <div class="d-flex">
                                <button style="border: none; background: transparent"><img class="mx-1" src="ICONS/reload.png" alt="" width="20" height="20"></button>
                                <form action="../CLASSES/Worker.php" method="get">
                                    <input type="hidden" name="enclosure_id" value="<?= $amphibian->getEnclosureId()?>">
                                    <input type="hidden" name="id" value="<?= $amphibian->getId()?>">
                                    <button type="submit" style="border: none; background: transparent">
                                    <img src="ICONS/remove.png" alt="" width="20" height="20">
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach ?>
         </div>
         <div class="col col-lg-2 col-md-2 col-sm-2 d-flex justify-content-end align-items-center">
                    <button style="background: transparent; border: none">
                        <img src="ICONS/plus.png" alt="" width="70" height="70">
                    </button>
                </div>
                </div>
    </div>
</section>
<section id="birds">
<?php 
    $manager = new EnclosureManager($db);
    $birdsEnclosure = $manager->getEnclosureById(6);
    $manager->getAnimalFromEnclosure($birdsEnclosure);

    $birds = $birdsEnclosure->getAnimals();
?>
    <div class="flex-column my-5" style="border: 1px solid black">
         <h2>"Birds"</h2>
         <div class="row">
         <div class="col col-lg-10 col-md-10 col-sm-10 d-flex align-items-end my-5 justify-content-evenly">
         <?php foreach ($birds as $bird) : ?>
                        <div class="d-flex flex-column align-items-center mx-4">
                            <img class="my-2" src="ANIMAL_ICONS/<?= $bird->getIcon()?>" alt="" width="80" height="80">
                            <h4><?= ucfirst($bird->getSpecieName())?></h4>
                            <h6><?= ucfirst($bird->getSpecieType())?></h6>
                            <div class="d-flex">
                                <button style="border: none; background: transparent"><img class="mx-1" src="ICONS/reload.png" alt="" width="20" height="20"></button>
                                <form action="../CLASSES/Worker.php" method="get">
                                    <input type="hidden" name="enclosure_id" value="<?= $bird->getEnclosureId()?>">
                                    <input type="hidden" name="id" value="<?= $bird->getId()?>">
                                    <button type="submit" style="border: none; background: transparent">
                                    <img src="ICONS/remove.png" alt="" width="20" height="20">
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach ?>
         </div>
         <div class="col col-lg-2 col-md-2 col-sm-2 d-flex justify-content-end align-items-center">
                    <button style="background: transparent; border: none">
                        <img src="ICONS/plus.png" alt="" width="70" height="70">
                    </button>
                </div>
                </div>
    </div>
</section>
<section id="aquarium">
<?php 
    $manager = new EnclosureManager($db);
    $aquariumsEnclosure = $manager->getEnclosureById(7);
    $manager->getAnimalFromEnclosure($aquariumsEnclosure);

    $aquariums = $aquariumsEnclosure->getAnimals();
?>
    <div class="flex-column my-5" style="border: 1px solid black">
         <h2>"Aquarium"</h2>
         <div class="row">
         <div class="col col-lg-10 col-md-10 col-sm-10 d-flex align-items-end my-5 justify-content-evenly">
         <?php foreach ($aquariums as $aquarium) : ?>
                        <div class="d-flex flex-column align-items-center mx-4">
                            <img class="my-2" src="ANIMAL_ICONS/<?= $aquarium->getIcon()?>" alt="" width="80" height="80">
                            <h4><?= ucfirst($aquarium->getSpecieName())?></h4>
                            <h6><?= ucfirst($aquarium->getSpecieType())?></h6>
                            <div class="d-flex">
                                <button style="border: none; background: transparent"><img class="mx-1" src="ICONS/reload.png" alt="" width="20" height="20"></button>
                                <form action="../CLASSES/Worker.php" method="get">
                                    <input type="hidden" name="enclosure_id" value="<?= $aquarium->getEnclosureId()?>">
                                    <input type="hidden" name="id" value="<?= $aquarium->getId()?>">
                                    <button type="submit" style="border: none; background: transparent">
                                    <img src="ICONS/remove.png" alt="" width="20" height="20">
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach ?>
         </div>
         <div class="col col-lg-2 col-md-2 col-sm-2 d-flex justify-content-end align-items-center">
                    <button style="background: transparent; border: none">
                        <img src="ICONS/plus.png" alt="" width="70" height="70">
                    </button>
                </div>
                </div>
    </div>
</section>
</div>

</body>
<?php
    include_once('PARTIALS/footer.php');
?>