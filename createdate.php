<?php
function secondsToTime($inputSeconds) {
    $then = new DateTime(date('Y-m-d H:i:s', $inputSeconds));
    $now = new DateTime(date('Y-m-d H:i:s', 0));
    $diff = $then->diff($now);
    if($diff->y > 0){
        if($diff->y == 1){
            return $diff->y." year ago";
        }
        else{
            return $diff->y." years ago";
        }
    }
    else if($diff->m > 0){
        if($diff->m == 1){
            return $diff->m." month ago";
        }
        else{
            return $diff->m." months ago";
        }
    }
    else if($diff->d > 0){
        if($diff->d == 1){
            return $diff->d." day ago";
        }
        else{
            return $diff->d." days ago";
        }
    }
    else if($diff->h > 0){
        if($diff->h == 1){
            return $diff->h." hour ago";
        }
        else{
            return $diff->h." hours ago";
        }
    }
    else if($diff->i > 0){
        if($diff->i == 1){
            return $diff->i." minute ago";
        }
        else{
            return $diff->i." minutes ago";
        }
    }
    else{
        if($diff->s == 1){
            return $diff->s." second ago";
        }
        else{
            return $diff->s." seconds ago";
        }
    }
  }
?>