<?php
require "includes/header.php";
require_once "database/connection.php";
 
 
$type = $_GET['type'] ?? [];
$merk = $_GET['merk'] ?? [];
$bestuur = $_GET['bestuurssysteem'] ?? [];
$prijs = $_GET['prijs'] ?? null;
 
 
$sql = "SELECT * FROM auto WHERE 1=1";
$params = [];
$zoek = $_GET['zoek'] ?? '';
if (!empty($zoek)) {
    $sql .= " AND (merk LIKE ? OR model LIKE ?)";
    $params[] = "%$zoek%";
    $params[] = "%$zoek%";
 
}
 
 
if (!empty($type)) {
    $placeholders = implode(',', array_fill(0, count($type), '?'));
    $sql .= " AND type IN ($placeholders)";
    $params = array_merge($params, $type);
}
 
 
if (!empty($merk)) {
    $placeholders = implode(',', array_fill(0, count($merk), '?'));
    $sql .= " AND merk IN ($placeholders)";
    $params = array_merge($params, $merk);
}
 
 
if (!empty($bestuur)) {
    $placeholders = implode(',', array_fill(0, count($bestuur), '?'));
    $sql .= " AND bestuurssysteem IN ($placeholders)";
    $params = array_merge($params, $bestuur);
}
 
if (isset($_GET['prijs']) && $_GET['prijs'] !== '') {
   
 
    $placeholders = $_GET['prijs'];
    $sql .= " AND prijs <= ($placeholders)";
}
 
 
 
 
$query = $conn->prepare($sql);
 
$query->execute($params);
$autos = $query->fetchAll(PDO::FETCH_ASSOC);
?>
 
<main class="catalog">
 
 
<aside class="sidebar">
<form method="GET">
 
<h3>Type</h3>
<label><input type="checkbox" name="type[]" value="SUV" <?= in_array('SUV', $type) ? 'checked' : '' ?>> SUV</label><br>
<label><input type="checkbox" name="type[]" value="Sport" <?= in_array('Sport', $type) ? 'checked' : '' ?>> Sport</label><br>
<label><input type="checkbox" name="type[]" value="Cabrio" <?= in_array('Cabrio', $type) ? 'checked' : '' ?>> Cabrio</label>
 
<h3>Merk</h3>
<label><input type="checkbox" name="merk[]" value="Audi" <?= in_array('Audi', $merk) ? 'checked' : '' ?>> Audi</label><br>
<label><input type="checkbox" name="merk[]" value="Rolls royce" <?= in_array('Rolls royce', $merk) ? 'checked' : '' ?>>Rolls royce </label><br>
<label><input type="checkbox" name="merk[]" value="Nissan" <?= in_array('Nissan', $merk) ? 'checked' : '' ?>> Nissan</label>
<label><input type="checkbox" name="merk[]" value="Lamborghini " <?= in_array('Lamborghini', $merk) ? 'checked' : '' ?>> Lamborghini</label>
 
<h3>Bestuurssysteem</h3>
<label><input type="checkbox" name="bestuurssysteem[]" value="Automatisch" <?= in_array('Automatisch', $bestuur) ? 'checked' : '' ?>> Automaat</label><br>
<label><input type="checkbox" name="bestuurssysteem[]" value="handgeschakeld" <?= in_array('handgeschakeld', $bestuur) ? 'checked' : '' ?>> Schakel</label>
 
<h3>Prijs (max)</h3>
<input type="range" name="prijs" min="0" max="3000" value="<?= $prijs ?? 3000 ?>">
<p>Max: €<?= $prijs ?? 3000 ?></p>
 
<br>
<button type="submit" class="button">Filter</button>
 
</form>
</aside>
 
 
<section class="content">
    <h2 class="section-title">Ons aanbod</h2>
 
    <div class="cars">
        <?php foreach ($autos as $auto): ?>
            <div class="car-details">
 
                <div class="car-brand">
                    <h3><?= $auto['merk'] ?> <?= $auto['model'] ?></h3>
                    <div class="car-type">
                        <?= $auto['type'] ?>
                    </div>
                </div>
 
               
                <img src="assets/images/products/<?= $auto['merk'] ?>.jpg" alt="">
 
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
                        <b>€<?= $auto['prijs'] ?></b> / dag
                    </span>
                    <a href="/car-detail?id=<?= $auto['id'] ?>" class="button">Bekijk nu</a>
                </div>
 
            </div>
        <?php endforeach; ?>
    </div>
 
</section>
 
</main>
 
<?php require "includes/footer.php"; ?> 