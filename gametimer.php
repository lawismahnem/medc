<?php
date_default_timezone_set("Asia/Riyadh");
?>
<?php
function nicetime($date)
{
    if(empty($date)) {
        return "No date provided";
    }
    
    $periods         = array("s", "m", "h", "d", "w", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time();
    $unix_date         = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        @$tense         = "LIVE";
        
    } else {
        $difference     = $unix_date - $now;
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
 
    }
    if(@$tense==NULL)
	{
    return "$difference$periods[$j]".@$tense;
	}
	else
	{
		 return "{$tense}";
	}
}
?>