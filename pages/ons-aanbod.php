<?php require "includes/header.php" ?>
 
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
 
<section class="car-list">
    <?php
            $query = $conn->prepare("select * FROM auto");
            $query ->execute();
            $auto = $query->fetchAll(PDO::FETCH_ASSOC);
            ?>
             <?php foreach ($auto as $row): ?>
            <div class="car-details">
                <div class="car-brand">
                    <h3><?= $row['merk'] ?></h3>
                    <div class="car-type">
                        <?= $row['model'] ?>
                    </div>
                </div>  
                <img src="assets/images/products/<?= $row['merk'] ?>.jpg" alt="">
   
                <div class="car-specification">
                    <span><img src="assets/images/icons/gas-station.svg" alt=""><?= $row['tankinhoud'] ?></span>
                    <span><img src="assets/images/icons/car.svg" alt=""><?= $row['bestuurssysteem'] ?></span>
                    <span><img src="assets/images/icons/profile-2user.svg" alt=""><?= $row['capaciteit'] ?></span>
                </div>
                <div class="rent-details">
                    <span><b>€<?= $row['prijs'] ?></b> / dag</span>
                    <a href="/car-detail" class="button-primary">Bekijk nu</a>
                </div>
            </div>
        <?php endforeach; ?>
             </section>
             </main>
<?php require "includes/footer.php" ?>