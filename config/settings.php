<?php
/* ====== General ====== */

/* Salesforce ORG Sites URL */
define("SALESFORCE_URL", "{YOUR SALESFORCE SITES URL}"); // Please enter your Salesforce Sites URL here
define("SF_SECURITY_TOKEN", "{YOUR SECURITY TOKEN}"); // Please enter your security token from LeanParameters here

/* ====== Listing ====== */

/* Salesforce VisualForce Pages for Weblisting */
define("QUERY_PAGE", "XMLSitesInventoryResult");

/* Listing fields separated by comma */
define("LISTING_FIELDS",'Id'.
	',Name'.
	',pb__IsForSale__c'.
	',pb__IsForLease__c'.
	',pb__ItemDescription__c'.
	',pb__PurchaseListPrice__c'.
	',CurrencyIsoCode'.
	',pb__UnitBedrooms__c'.
	',pb__UnitType__c'.
	'');

/* Sort Order for the Listing, SOQL Format */
define("LISTING_ORDER_BY", "pb__PurchaseListPrice__c ASC");

/* Detail page fields separated by comma */
define("DETAIL_FIELDS",'Id'.
	',pb__IsForSale__c'.
	',pb__IsForLease__c'.
	',pb__ItemCompletionDate__c'.
	',pb__ItemCompletionStatus__c'.
	',pb__ItemDescription__c'.
	',pb__ItemName__c'.
	',Name'.
	',pb__PurchaseListPrice__c'.
	',CurrencyIsoCode'.
	',pb__UnitFloorNumber__c'.
	',pb__UnitBedrooms__c'.
	',pb__UnitType__c'.
	',pb__TotalAreaSqft__c'.
	'');

/* Maximum number of bedrooms in salesforce picklist */
define("MAXIMUM_BEDROOMS", 5);

?>