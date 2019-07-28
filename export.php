<?php
// Connexion to the database with unix socket to allow peer identification
// refer to readme to have connexion working
$connexion = new PDO('pgsql:dbname=caldav;user=postgres');

// Get vcards from database
$query = 'SELECT vcard_text FROM addressbook_object';
$resultset = $connexion->prepare($query);
$resultset->execute();

$vcard_list="";
while ($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
		// Add all vcard with proper \r\n coding
		$vcard_list.=str_replace('\r\n', "\r\n" , $row['vcard_text'])."\r\n\r\n";		
}

//vcard list upload
header('Content-Type: text/x-vcard');
header('Content-Disposition: attachment; filename="AddressBook.vcf"');
header('Content-Length', strlen($vcard_list));
echo $vcard_list;

?>
