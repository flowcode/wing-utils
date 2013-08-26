<?php

namespace flowcode\wing\utils\type;

/**
 * Description of TypeJson
 *
 * @author Juan Manuel Agüero <jaguero@flowcode.com.ar>
 */
class TypeJson {

    /**
     * Convert any type to json.
     * @param type $object
     * @return json json. 
     */
    public static function toJson($object) {
        $array = TypeArray::toArray($object);
        return str_replace('\\u0000', "", json_encode($array));
    }

}

?>
