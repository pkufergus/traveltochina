<?php
$q = strtolower($_GET["q"]);
if (!$q) return;
$items = array(
	"Peter Pan"=>"peter@pan.de",
"Peter Pan1"=>"peter@pan.de",
"Peter Pan2"=>"peter@pan.de",
"Peter Pan3"=>"peter@pan.de",
"Peter Pan4"=>"peter@pan.de",
"Peter Pan5"=>"peter@pan.de",
"Peter Pan6"=>"peter@pan.de",
"Peter Pan7"=>"peter@pan.de",
"Peter Pan8"=>"peter@pan.de",
"Peter Pan9"=>"peter@pan.de",
"Peter Pan10"=>"peter@pan.de",
"Peter Pan11"=>"peter@pan.de",
"Peter Pan12"=>"peter@pan.de",
"Peter Pan13"=>"peter@pan.de",
"Peter Pan14"=>"peter@pan.de",
"Peter Pan15"=>"peter@pan.de",
"Peter Pan16"=>"peter@pan.de",
"Peter Pan17"=>"peter@pan.de",
"Peter Pan18"=>"peter@pan.de",
"Peter Pan19"=>"peter@pan.de",
"Peter Pan20"=>"peter@pan.de",
"Peter Pan21"=>"peter@pan.de",
	"Molly"=>"molly@yahoo.com",
	"Forneria Marconi"=>"live@japan.jp",
	"Master Sync"=>"205bw@samsung.com",
	"Dr. Tech de Log"=>"g15@logitech.com",
	"Don Corleone"=>"don@vegas.com",
	"Mc Chick"=>"info@donalds.org",
	"Donnie Darko"=>"dd@timeshift.info",
	"Quake The Net"=>"webmaster@quakenet.org",
	"Dr. Write"=>"write@writable.com"
);

$result = array();
foreach ($items as $key=>$value) {
	if (strpos(strtolower($key), $q) !== false) {
		array_push($result, array(
			"name" => $key,
			"to" => $value
		));
	}
}
echo json_encode($result);
?>