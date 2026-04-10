
<?php require "includes/header.php" ?>
<?php require "database/connection.php"  ?>

<?php

           $id = $_GET['id'] ?? null;
 
        $query = $conn->prepare("SELECT * FROM auto WHERE id = :id");
        $query->execute([':id' => $id]);
        $car = $query->fetch(PDO::FETCH_ASSOC);
        if (!$car) {
        echo "<p>Geen auto gevonden voor id: " . htmlspecialchars($id) . "</p>";
        exit;   
        }
        ?>

<main class="car-detail">
    <div class="grid">
        <div class="row">
            <div class="advertorial">
                <h2>Sport auto met het beste design en snelheid</h2>
                <p>Veiligheid en comfort terwijl je rijd in een futiristische en elante auto </p>
                <img src="assets/images/products/<?= $car['merk'] ?>.jpg" alt="">
                <img src="assets/images/header-circle-background.svg" alt="" class="background-header-element">
            </div>
        </div>
        <div class="row white-background">
            <h2><?= $car['merk'] ?></h2>
            <div class="rating">
                <span class="stars stars-4"></span>
                <span>440+ reviewers</span>
            </div>
            <p>RYDR – waar kracht, luxe en rijervaring samenkomen in één platform.</p>
            <div class="car-type">
                <div class="grid">
                    <div class="row"><span class="accent-color">Type Auto</span><span><?= $car['type'] ?></span></div>
                    <div class="row"><span class="accent-color">Capaciteit</span><span><?= $car['capaciteit'] ?></span></div>
                </div>
                <div class="grid">
                    <div class="row"><span class="accent-color">Transmissie</span><span><?= $car['bestuurssysteem'] ?></span></div>
                    <div class="row"><span class="accent-color">Tankinhoud</span><span><?= $car['tankinhoud'] ?></span></div>
                </div>
                <div class="call-to-action">
                    <div class="row"><b>€</b><span class="font-weight-bold"><?= $car['prijs'] ?></span> / dag</div>
                    <div class="row"><a href="" class="button">Huur nu</a></div>
                </div>

            </div>
        </div>
    </div>
</main>



<?php
require "includes/footer.php"; ?>