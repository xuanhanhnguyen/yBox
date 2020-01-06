<?php 

namespace App\Helper;
 

 
class Helper 
{
    /**
     * Huy4429dev
     */

    public static function getTimeAgo($created_at){
        $time = round(((strtotime(date('Y-m-d h:i:sa')) -  strtotime($created_at))/(60)));

        if($time < 60){
            $time = $time . ' phút trước';
        }
        else if($time < 120){
            $time = '1 giờ trước';
        }
        else if($time < 180)
        {
            $time = '2 giờ trước';
        }
        else if($time < 60*4)
        {
            $time = '3 giờ trước';
        }
        else if($time < 60*5)
        {
            $time = '4 giờ trước';
        }
        else if($time < 60*5)
        {
            $time = '4 giờ trước';
        }
        else if($time < 60*5)
        {
            $time = '5 giờ trước';
        }
        else {
            $time = date('d m Y',strtotime($created_at));
        }
        return $time;
    }
    
    public static function getDescription($content){
        $array = explode(' ',$content);
        $i = 0;
        $description = '';
        foreach($array as $value){
             if($i == 0){
                $description = $value;
             }
             else if($i == count($array)){
                return $description;
             }
             else if($i <= 50){
                 $description .= ' '.$value;
             }
             else {
                 return $description;
             }
             $i ++; 
        
        }
        $description .= ' ...';
        return $description;  
    }
}