<link rel="stylesheet" type="text/css" href="assets/css/header.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<!-- HEADER -->
<header>
    <ul>
        <li><img src="lightbox-base-3.jpg"></li>
        <li><a href="index.php">AmbiLamp</a></li>
        <li><a href="details.php">Details</a></li>
    </ul>
</header>

<?php
	function connectMongo() {
		$connection = new MongoClient("mongodb://admin:admin@ds157089.mlab.com:57089/andys_ambilamp");
		$db = $connection->andys_ambilamp;
		return $db;
	}
?>
