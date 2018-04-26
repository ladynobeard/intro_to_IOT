<?php
	$conn = new MongoClient("mongodb://admin:admin@ds157089.mlab.com:57089/andys_ambilamp");
	$db = $conn->andys_ambilamp;
	$collection = $db->iot_ambilamp;
	$newData = array( 'num' => 131, 'val' => 57, 'time' =>'8pm');
	$collection->insert($newData);

	$cursor = $collection->find();
	echo "First loop: <br>";
	foreach ($cursor as $doc) {
		 echo $doc['num'] . "<br>";
	}
	echo "<br>";
	
	$cursor = $collection->find(array('num' => 131));
	echo "Second loop: <br>";	
	foreach ($cursor as $doc) {
		echo $doc['num'] . "<br>";
  	}
?>
