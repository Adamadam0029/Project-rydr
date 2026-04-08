<?php
require "includes/header.php";
require_once "database/connection.php";
$query = $conn->prepare("SELECT * FROM auto");
$query->execute();
$autos = $query->fetchAll(PDO::FETCH_ASSOC);
?>
 
 
<main>
    <h2>Ons aanbod</h2>
</main>
 
<main class = "catalog">
    <aside class="sidebar">
        <h3>Type</h3>
        <input type="checkbox">SUV</label>
        <input type="checkbox">high perfomance car</label>
        <input type="checkbox">Sport</label>
        <input type="checkbox">Cabrio</label>
        <input type="checkbox">convertible</label>
 
        <h3>Merk</h3>
        <input type="checkbox">Audi</label>
        <input type="checkbox">BMW</label>
        <input type="checkbox">Nissan</label>
        <input type="checkbox">Rolls Royce</label>
        <input type="checkbox">Lamborgini</label>
 
        <h3>Bestuurssysteem</h3>
        <input type="checkbox">Automaat</label>
        <input type= "checkbox">Schakel</label>
 
        <h3>prijs</h3>
        <h5>€0  -  €30000</h5>
        <input type="range" min="o" max="30000">
</aside>
 
             <section class= "content">
      <section class="content">
    <h2 class="section-title">Aanbevolen auto's</h2>
 
    <div class="cars">
        <?php foreach ($autos as $auto): ?>
            <div class="car-details">
 
                <div class="car-brand">
                    <h3><?= $auto['merk'] ?> <?= $auto['model'] ?></h3>
                    <div class="car-type">
                        <?= $auto['type'] ?>
                    </div>
               
 
                <img src="assets/images/<?= strtolower($auto['merk']) ?>.png" alt="">
 
                <div class="car-specification">
                    <span>
                        <img src="assets/images/icons/gas-station.svg" alt="">
                        <?= $auto['tankinhoud'] ?>
                    </span>
 
                    <span>
                        <img src="assets/images/icons/car.svg" alt="">
                        <?= $auto['bestuurssysteem'] ?>
                    </span>
 
                    <span>
                        <img src="assets/images/icons/profile-2user.svg" alt="">
                        <?= $auto['capaciteit'] ?>
                    </span>
                </div>
 
                <div class="rent-details">
                    <span>
                        <span class="font-weight-bold">€<?= $auto['prijs'] ?></span> / dag
                    </span>
                    <a href="#" class="button-primary">Bekijk nu</a>
                </div>
 
            </div>
        <?php endforeach; ?>
    </div>
</section>
               
             </section>
             </main>
<?php require "includes/footer.php" ?>