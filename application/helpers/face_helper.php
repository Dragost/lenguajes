<?php


if(!function_exists("time_elapsed")) {


function time_elapsed($time) {
	sscanf($time,"%u-%u-%uT%u:%u:%u+0000",$year,$month,$day,$hour,$min,$sec);
    $time_seconds = time() - ((int)substr(date('O'),0,3)*60*60) - mktime($hour,$min,$sec,$month,$day,$year);
    
    if($time_seconds < 1) return '0 segundos';
    
    $arr = array(12*30*24*60*60	=> 'año',  // year
                30*24*60*60		=> 'mes',  // month
                24*60*60		=> 'dia',  // day
                60*60			=> 'hora',  // hour
                60				=> 'minuto',  // minute
                1				=> 'segundo'  // second
                );
    
    foreach($arr as $secs => $str){
        $d = $time_seconds / $secs;
        if($d >= 1){
            $r = floor($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '');
        }
    }
}

}



?>