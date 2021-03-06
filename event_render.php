<?php
	function render_event ($event) {
		$m = new MongoClient();
		$val = "<div class='individual-events' style='color:black'>";
                
		if(isset($_SESSION['fb_user_id']) && $event['user_id'] != $_SESSION['fb_user_id']) {
		  $val .= "<a href='payment.php?id=".((string)$event['_id'])."'>";
		}
		$val .= "<img class='facebook-profilepic img-rounded' src=\"http://graph.facebook.com/v2.5/".$event['user_id']."/picture\"></img>";
		$val .= $m->sports->users->findOne(array("id" => $event['user_id']))['name'];
		$val .= " is looking for ".$event['maxpeople'];
		$val .= $m->sports->sport->findOne(array("internal" => $event['sport']))['name'];
  		$val .= " ".plural("buddy", $event['maxpeople'])." on ";
		$val .= '<strong>'.$event['sessiondate'].'</strong>';
  		$val .= " at ";
		$val .= '<strong>'.$event['sessiontime'].'</strong>';
		if($event['eventfee'] > 0) {
			$val .= " for &pound;".$event['eventfee'];
		}
		if(isset($_SESSION['fb_user_id']) && $event['user_id'] != $_SESSION['fb_user_id']) {
			$val .= "</a>";
		}
		$val .= "<div class='clear'></div></div>";
		return $val;
	}
	function plural($str, $num) {
		if($num == 1) return $str;
		else return "buddies";
	}
?>
