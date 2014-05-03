<?php
class DateHelper{
	public static function toYmd($dmy){
		$ar = explode('-', $dmy);
		return $ar[2].'-'.$ar[1].'-'.$ar[0];
	}
}