<?php

class Form{

    public static $sports = [["squash", "Squash"], ["tennis", "Tennis"], ["jogging", "Jogging"], ["table_tennis", "Table tennis"], ["paddington", "Paddingon"], ["gym", "Gym"]];

    public static function selection()
    {
        $elementsNumber = count(self::$sports);

        echo "<option selected='selected' value="."choose".">";
        echo "Choose";
        echo "</option>";

        for ($i = 0; $i < $elementsNumber; $i++) {
            $pair = self::$sports[$i];
            echo "<option value=".$pair[0].">";
            echo $pair[1];
            echo "</option>";
        }
    }


    public static function onSubmit(){
        if(isset($_POST['submit'])){
            $name = htmlspecialchars( $_POST['name']);
            $venue = htmlspecialchars( $_POST['venue']);
            $sports = htmlspecialchars($_POST['sports']);

            if(isset($name) && isset($venue) && isset($sports)){
             //write to database;
            }
        }
    }
}