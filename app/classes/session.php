<?php

namespace App\classes;


class Session
{
    //create a session
    public static function add($name, $value)
    {
        if ($name != '' && !empty($name) && $value != '' && !empty($value)) {
          return $_SESSION[$name]=$value;
        }

        throw new \Exception("Name and Value required");
        
    }

    //get value from session 
    public static function get($name)
    {
        return $_SESSION[$name];
    }

    //check is session exist
    public static function has($name)
    {
        if($name != '' && !empty($name)){
        return (isset($_SESSION[$name])) ? true:false;
        }

        throw new \Exception("Name is required");
        
    }

    //remove session
    public static function remove($name)
    {
        if(self::has($name)){
            unset($_SESSION[$name]);
        }
    }
    /**
     * flash the message and unset old session
     * @param mixed $name
     * @param mixed $value
     * @return mixed
     */
    public static function flash($name, $value=''){
         
        if(self::has($name)){
            $old_value = self::get($name);
            self::remove($name);

            return $old_value;
        }else{
            self::add($name, $value);
        }

        return null;

    }
}