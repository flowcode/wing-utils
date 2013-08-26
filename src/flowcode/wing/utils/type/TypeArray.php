<?php

namespace flowcode\wing\utils\type;

/**
 * Utility Class with arrays tools.
 *
 * @author Juan Manuel Agüero <jaguero@flowcode.com.ar>
 */
class TypeArray {

    /**
     * Convert any type to array.
     * @param type $obj
     * @return array $array. 
     */
    public static function toArray($obj) {
        $arr = array();

        if (is_array($obj)) {
            foreach ($obj as $value) {
                $arr[] = self::toArray($value);
            }
        }
        if (is_object($obj)) {
            $arObj = (array) $obj;
            foreach ($arObj as $key => $value) {
                $attribute = trim(str_replace(get_class($obj), "", $key));
                if (is_object($value) || is_array($value)) {
                    $value = self::toArray($value);
                }
                $arr[$attribute] = $value;
            }
        }
        return $arr;
    }

}
?>
