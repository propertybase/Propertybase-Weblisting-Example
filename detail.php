<?php

/* Import the settings*/
require('config/settings.php');

if ($_REQUEST) {
	/* Build query */	
	$data = array('Id'=>$_REQUEST['Id'],
		'fields'=>DETAIL_FIELDS,
		'token'=>SF_SECURITY_TOKEN);

	$query = SALESFORCE_URL . QUERY_PAGE . '?' . http_build_query($data, '', '&');
	
	/* Connecting Salesforce - Load Data */
	$xml = simplexml_load_file($query);

	/* Display the property details */
	__displayProperty($xml);
	
} else {
	die("No detail values...");
}

/**
 * HTML-Output function to display the property details
 *
 * @param object $xml XML Object with the property
 *
 */
function __displayProperty($xml) {
	$inventoryItem = $xml->InventoryList->pb__InventoryItem__c;
	include('templates/header.php');
	?>
	
	<div id="pb_listingDetail">
		<div id="head">
			<div class="left">
				<h1>Property Details</h1>
			</div>
			<div class="right">
				<h2>more pictures</h2>
			</div>
		</div>
		<div id="body">
			<div class="left">
				<img src="<?php print($inventoryItem->pb__InventoryImage__c[0]->pb__MidResUrl__c); ?>" width="400" alt="<?php print($inventoryItem->pb__InventoryImage__c[0]->pb__ExternalId__c); ?>" />
				<p><?php print($xml->ItemName__c); ?></p>
				<input class="formButton" name="back" id="back" value="Back to results" onclick="history.go(-1);" type="submit">
				<input class="formButton" name="new_search" id="new_search" value="New search" onclick="document.location='search.php'" type="submit">
			</div>
			<div class="right">
				<div class="thumb_images">
					<?php $i = 0; ?>
					<?php foreach ($inventoryItem->pb__InventoryImage__c as $image): ?>
					<?php if ($i % 2 == 0): ?>
					     <div class="cut img_left"><a class="lightwindow" href="<?php print($image->pb__HighResUrl__c); ?>"><img src="<?php print($image->pb__ThumbnailUrl__c); ?>" width="113" alt="<?php print($image->pb__ExternalId__c); ?>" /></a></div>
					<?php else: ?>
						<div class="cut img_right"><a class="lightwindow" href="<?php print($image->pb__HighResUrl__c); ?>"><img src="<?php print($image->pb__ThumbnailUrl__c); ?>" width="113" alt="<?php print($image->pb__ExternalId__c); ?>" /></a></div>
					<?php endif; ?>
					<?php $i++; ?>
					<?php endforeach; ?>
					<?php if ($i % 2 != 0): ?>
						<div class="cut img_right"></div>
					<?php endif; ?>
				</div>
				<div class="details">
					<h3>Details</h3>
					<ul>
						<li>Price: <?php echo number_format((float)$inventoryItem->pb__PurchaseListPrice__c,2,'.',',') ?> <?php print($inventoryItem->CurrencyIsoCode); ?></li>
						<li>Bedrooms: <?php print($inventoryItem->pb__UnitBedrooms__c); ?></li>
						<li>Type: <?php print($inventoryItem->pb__UnitType__c); ?></li>
						<li>Reference Number: <?php print($inventoryItem->Name); ?></li>
						<li>Total Area (sqft): <?php print($inventoryItem->pb__TotalAreaSqft__c); ?></li>
					</ul>
				</div>
				<div class="details">
					<h3>Description</h3>
					<p><?php print($inventoryItem->pb__ItemDescription__c); ?></p>
				</div>
			</div>
		</div>
	</div>
	
	<?php
	include('templates/footer.php');
}

?>