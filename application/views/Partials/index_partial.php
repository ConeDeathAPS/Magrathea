
	<div class="row">
<!--This looks super nasty, but all it does is loop through the products array, starting a new row every 4th product. That is why there is a counter, and an if statement checking for when counter modulo 4 is 0.-->
<?php
if (isset($products)) {
$count = 0;
foreach ($products as $key => $value) {
?>
 	<div class="col s3">
		<a href="/Planets/show_planet/<?= $value['id']; ?>/<?= $value['type_id']; ?>"><img src="/img/<?= $value['name']; ?>1.jpg" alt="<?= $value['name']; ?>"><h4><?= $value['name']; ?></h4><p>$<?= $value['price']; ?></p></a>
	</div>
	<?php
	$count++;
		if ($count % 4 == 0) {
			?>
			</div>
			<div class="row">
			<?php
		}
	}	
}
?>
	</div>