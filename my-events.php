<?php
  session_start();
  $m = new MongoClient();
  $user = $m->sports->users->findOne(array("id" => $_SESSION['fb_user_id']));
  $hosted = $m->sports->events->find(array("user_id" => $_SESSION['fb_user_id']));
  foreach($hosted as $event) {
	$users = $m->sports->users->find(array("events" => $event));
	while($users->hasNext()) {
		$users->next();
		var_dump($users->current());
	}
  }
  $evs = $m->sports->events->find(array("_id" => array('$in' => $user['events'])));
  echo "<ul>";
  foreach($evs as $ev) {
    echo "<li>".$m->sports->sport->findOne(array("internal" => $ev['sport']))["name"]." with ".$m->sports->users->findOne(array("id" => $ev['user_id']))['name']."</li>";
  }
  echo "</ul>";
?>
