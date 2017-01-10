<?php 
include("./geoip/geoipcity.inc");
include("./geoip/geoipregionvars.php");
$gi = geoip_open("./geoip/GeoLiteCity.dat",GEOIP_STANDARD);
$record = geoip_record_by_addr($gi,"202.226.91.228");
if(!empty($record))
{
	print $record->city;
}
geoip_close($gi);

?>