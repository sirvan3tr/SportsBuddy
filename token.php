<html><head>

  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>
<body>
<?php
require_once 'event_render.php';
ini_set('display_errors', 1);
session_start();
require 'vendor/autoload.php'; // include Composer goodies
require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1666203576993752',
  'app_secret' => '08bd94f8c9633e0c13d93b1db60706f5',
  'default_graph_version' => 'v2.5',
  'default_access_token' => 'APP-ID|APP-SECRET'
  ]);
$response = $fb->get('/me?fields=id,name', $_SESSION['fb_access_token']);
$_SESSION['fb_user_id'] = $response->getGraphUser()['id'];
echo "Hello, ".$response->getGraphUser()['name'];

//    $client = new Everyman\Neo4j\Client('127.0.0.1', 7474);
//    print_r($client->getServerInfo());

//$client->makeNode()
//	->setProperty('id', $response->getGraphUser()['id'])
//        ->setProperty('name', $response->getGraphUser()['name'])
//        ->save();

$m = new MongoClient();
$document = array( "id" => $response->getGraphUser()['id'], "name" => $response->getGraphUser()['name'], "events" => array());
if(NULL == $m->sports->users->findOne(array("id" => $response->getGraphUser()['id']))) {
	$m->sports->users->update(array("id" => $response->getGraphUser()['id']), $document, array("upsert" => true));
}
$val = $m->sports->sport->find();
echo "<form action='postActivity.php' method='post'><br>What? <select name='sport'>";
foreach($val as $doc) {
  echo "<option value=".$doc['internal'].">".$doc['name']."</option>";
}
echo "</select>";
echo "<br>When?";
echo "<br><input type='submit'>";
echo "</form>";

$val = $m->sports->events->find();
echo "<ul id='events'>";
foreach($val as $doc) {
  echo render_event($doc);
  //echo "<li>".$doc['sport'];
  //echo " by ".$m->sports->users->findOne(array("id" => $doc['user_id']))['name'];
  //echo "</li>";
}
echo "</ul>";
//$col->update($document);
//$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
//$collection = new MongoDB\Collection($manager, "demo.beers");

//$result = $collection->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );
?>
  <script>
    // Enable pusher logging - don't include this in production
    Pusher.log = function(message) {
      if (window.console && window.console.log) {
        window.console.log(message);
      }
    };

    var pusher = new Pusher('b227f5df488b51be2735', {
      encrypted: true
    });
    var channel = pusher.subscribe('events_channel');
    channel.bind('my_event', function(data) {
	$('#events').append(data);
    });
  </script>
</body>
</html>
