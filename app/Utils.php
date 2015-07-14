<?php
namespace App;
/**
 * 
 * @param Array $array
 * @param String $starts_with
 * @return Array
 */
class Utils{
	public static function array_starts_with($array, $starts_with){
		$target = [];
		foreach ($array as $elem){
			if (starts_with($elem, $starts_with)){
				$target[] = $elem;
			}
		}
		return $target;
	}
}

