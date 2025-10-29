<?php

require_once "Ebook.php";

$sachgiay= new Book ("Doraemon","Fujiko F.Fujio",1970);
$sachonline = new Ebook("Namama","sa",1270,5,"PDF");
$sachgiay->save();
$sachonline->save();
$sachgiay->getBookInfo();
$sachonline->getBookInfo();
?>