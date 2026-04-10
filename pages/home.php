<?php require "includes/header.php" ?>
<?php require "database/connection.php" ?>
    <header>
        <div class="advertorials">
            <div class="advertorial">
                <h2>Het platform om een auto te huren</h2>
                <p>Snel en eenvoudig een auto huren. Natuurlijk voor een scherpe prijs.</p>
                <a href="/ons-aanbod" class="button">Huur nu een auto</a>
                <img src="assets/images/car-rent-header-image-1.png" alt="">
                <img src="assets/images/header-circle-background.svg" alt="" class="background-header-element">
            </div>
            <div class="advertorial">
                <h2>Wij verhuren ook supercars</h2>
                <br>
                <p>Voor een vaste scherpe prijs met prettige voordelen.</p>
                <a href="/ons-aanbod" class="button">Huur een supercar</a>
                <img src="assets/images/car-rent-header-image-2.png" alt="">
                <img src="assets/images/header-block-background.svg" alt="" class="background-header-element">

            </div>
        </div>
    </header>

    <main>
        <div class="booking-form">
  
  <div class="booking-group">
    <label>Pick-up</label>
    <input type="text" placeholder="Locatie">
    <input type="date">
    <input type="time">
  </div>

  <div class="booking-group">
    <label>Drop-off</label>
    <input type="text" placeholder="Locatie">
    <input type="date">
    <input type="time">
  </div>

  <button class="booking-btn">Zoeken</button>

</div>
    <h2 class="section-title">Populaire auto's</h2>
    <a href="/ons-aanbod" class="view-all">Toon Alle</a>
    <div class="cars">
        <?php
            $query = $conn->prepare("SELECT * FROM auto WHERE id IN (1, 2, 3, 4)");
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
                    <a href="/car-detail?id=<?= $row['id'] ?>" class="button">Bekijk nu</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <h2 class="section-title">Aanbevolen auto's</h2>
    <div class="cars">
        <?php for ($i = 4; $i <= 11; $i++) : ?>
            <div class="car-details">
                <div class="car-brand">
                    <h3>Koenigegg</h3>
                    <div class="car-type">
                        Sport
                    </div>
                </div>
                <img src="assets/images/products/car%20(<?= $i ?>).svg" alt="">
                <div class="car-specification">
                    <span><img src="assets/images/icons/gas-station.svg" alt="">90l</span>
                    <span><img src="assets/images/icons/car.svg" alt="">Schakel</span>
                    <span><img src="assets/images/icons/profile-2user.svg" alt="">2 People</span>
                </div>
                <div class="rent-details">
                    <span><span class="font-weight-bold">€249,00</span> / dag</span>
                    <a href="/car-detail" class="button-primary">Bekijk nu</a>
                </div>
            </div>
        <?php endfor; ?>
    </div>
    <div class="show-more">
        <a class="button" href="/ons-aanbod">Toon alle</a>
    </div>
    </main>

<?php require "includes/footer.php" ?>