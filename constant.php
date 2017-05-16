<?php
include_once 'config/dbconfig.php';
$raMembers = array(
	"name1" => "W. K. Chan",
	"name2" => "Liang Kan Fat",
	"" => ""
);
$raDesignations = array(
	"name1" => "Manager",
	"name2" => "Foreman",
	"" => ""
);
$raSinatures = array(
	"name1" => "chan.png",
	"name2" => "fat.png",
);

$harzard = $crud->queryToObject("SELECT * FROM lkup_hazard");
$injury =array(
				"0"=>"Fatality",
				"1"=>"Multiple major injuries",
				"2"=>"Damaged to surrounding property",
				"3"=>"Serious bodily injuries",
				"4"=>"Occupational disease",
				"5"=>"Life-threatening occupational disease",
				"6"=>"Minor fractures",
				"7"=>"Deafness",
				"8"=>"Sprains",
				"9"=>"Irritation",
				"10"=>"Minor cuts"
);
$severity = array(
				"0"=>"5",
				"1"=>"5",
				"2"=>"5",
				"3"=>"4",
				"4"=>"4",
				"5"=>"4",
				"6"=>"3",
				"7"=>"3",
				"8"=>"3",
				"9"=>"2",
				"10"=>"2"
);

$existing_risk_control=array();
foreach ($harzard as $key => $value) {
	$existing_risk_control[$key] = $crud->queryToObject("SELECT * FROM risk_control where hazard_id=". $key);
}
