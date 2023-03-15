<?php
    require_once('CONFIG/autoload.php');
    require_once('CONFIG/database.php');
    include_once('PARTIALS/header.php');

    $enclosure = new Enclosure($db);
    $enclosures = $enclosure->getEnclosures();
?>
  <body style=" background-image: url('IMAGES/sun.jpg');
                background-size: cover;
                background-position: center;
                height: 100vh;
                ">
    <div class="container-fluid">
        <form action="enclosures.php" method="get">
            <div class="row">
                <div class="col col-lg-2">
                    <div>
                        <img id="keeper" src="ICONS/keeper.png" alt="" width=300 height="560" style="position:absolute; top:4vh">
                        <div id="bubble" class="bubble bubble-bottom-left text-white" contenteditable style="position:absolute; left:10vw; top: 1vh">Hi Sir, What Can I do with all these beasts!</div>
                    </div>
                </div>
                <div class="col col-lg-8 d-flex flex-column">
    <?php
        foreach ($enclosures as $enclosure) {
        echo '  
                    <div class="flex-column my-5" style="border: 1px solid black">
                        <h2>"'. ucfirst($enclosure['name']) .'"</h2>
                            
                        <div class="d-flex justify-content-between my-4">

                                <div class="d-flex flex-column align-items-center mx-3">
                                    <img class="mb-2" src="ANIMAL_ICONS/'. $enclosure['a1_name'] .'.png" alt="" style="border-radius: 50%; border: 1px solid black" width="60" height="60">
                                    <p>'. ucfirst($enclosure['a1_name']) .'</p>
                                  <div class="d-flex">
                                    <button style="border: none; background: transparent"><img class="mx-1" src="ICONS/reload.png" alt="" width="20" height="20"></button>
                                    <button style="border: none; background: transparent"><img src="ICONS/remove.png" alt="" width="20" height="20"></button>
                                  </div>
                                </div>

                         <div class="d-flex flex-column align-items-center mx-3">
                         <img class="mb-2" src="ANIMAL_ICONS/'. $enclosure['a2_name'] .'.png" alt="" style="border-radius: 50%; border: 1px solid black" width="60" height="60">
                         <p>'. ucfirst($enclosure['a2_name']) .'</p>
                         <div class="d-flex">
                             <button style="border: none; background: transparent"><img class="mx-1" src="ICONS/reload.png" alt="" width="20" height="20"></button>
                             <button style="border: none; background: transparent"><img src="ICONS/remove.png" alt="" width="20" height="20"></button>
                         </div>
                         </div>

                        <div class="d-flex flex-column align-items-center mx-3">
                        <img class="mb-2" src="ANIMAL_ICONS/'. $enclosure['a3_name'] .'.png" alt="" style="border-radius: 50%; border: 1px solid black" width="60" height="60">
                        <p>'. ucfirst($enclosure['a3_name']) .'</p>
                        <div class="d-flex">
                            <button style="border: none; background: transparent"><img class="mx-1" src="ICONS/reload.png" alt="" width="20" height="20"></button>
                            <button style="border: none; background: transparent"><img src="ICONS/remove.png" alt="" width="20" height="20"></button>
                        </div>
                        </div>

                       <div class="d-flex flex-column align-items-center mx-3">
                       <img class="mb-2" src="ANIMAL_ICONS/'. $enclosure['a4_name'] .'.png" alt="" style="border-radius: 50%; border: 1px solid black" width="60" height="60">
                       <p>'. ucfirst($enclosure['a4_name']) .'</p>
                       <div class="d-flex">
                           <button style="border: none; background: transparent"><img class="mx-1" src="ICONS/reload.png" alt="" width="20" height="20"></button>
                           <button style="border: none; background: transparent"><img src="ICONS/remove.png" alt="" width="20" height="20"></button>
                       </div>
                       </div>

                      <div class="d-flex flex-column align-items-center mx-3">
                      <img class="mb-2" src="ANIMAL_ICONS/'. $enclosure['a5_name'] .'.png" alt="" style="border-radius: 50%; border: 1px solid black" width="60" height="60">
                      <p>'. ucfirst($enclosure['a5_name']) .'</p>
                      <div class="d-flex">
                          <button style="border: none; background: transparent"><img class="mx-1" src="ICONS/reload.png" alt="" width="20" height="20"></button>
                          <button style="border: none; background: transparent"><img src="ICONS/remove.png" alt="" width="20" height="20"></button>
                      </div>
                      </div>

                     <div class="d-flex flex-column align-items-center mx-3">
                     <img class="mb-2" src="ANIMAL_ICONS/'. $enclosure['a6_name'] .'.png" alt="" style="border-radius: 50%; border: 1px solid black" width="60" height="60">
                     <p>'. ucfirst($enclosure['a6_name']) .'</p>
                     <div class="d-flex">
                         <button style="border: none; background: transparent"><img class="mx-1" src="ICONS/reload.png" alt="" width="20" height="20"></button>
                         <button style="border: none; background: transparent"><img src="ICONS/remove.png" alt="" width="20" height="20"></button>
                     </div>
                     </div>
                  
                    </div>
                    </div>';
}
    ?>
    </div>
        
    <div class="col col-lg-2 d-flex flex-column align-items-end my-5">
            <?php
                $sql = "SELECT * FROM animals";
                $statement = $db->prepare($sql);
                $statement->execute();
        
                $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        
                foreach ($results as $animal) {
                    $animalImg = 'ANIMAL_ICONS/'. $animal['icon'];
                    echo ' <div class="card m-1 text-center" style="width: 8rem; height:8rem">
                    <div class="d-flex justify-content-center align-items-center">
                    <img style="border-radius: 50%" src="'. $animalImg .'" alt="..." width="50" height="50">
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">'. ucfirst($animal['specie_name']) .'</h5>
                    </div>
                  </div>
                    ';
                }
            ?>
    </div>

    </div>
    </form>
  </div> 


</body>
<?php
    include_once('PARTIALS\footer.php');
?>