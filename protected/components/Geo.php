<?php
class Geo{
	public static function getKota($lat,$long){
		$url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&sensor=false";
		$result = file_get_contents("$url");
		$json = json_decode($result);
		if(!$json){
			return "";
		}
		$kota = '';
		$country = '';
		foreach ($json->results as $result){
			foreach($result->address_components as $addressPart) {
				if((in_array('administrative_area_level_1', $addressPart->types)) && (in_array('political', $addressPart->types))){
					$kota = $addressPart->long_name;
				}
				if((in_array('country', $addressPart->types)) && (in_array('political', $addressPart->types))){
					$country = $addressPart->long_name;
				}
			}
		}
		if($kota and $country){
			return $kota.', '.$country;
		}
		else if($country){
			return $country;
		}
		else if($kota){
			return $kota;
		}
		else{
			return '';
		}
	}
}