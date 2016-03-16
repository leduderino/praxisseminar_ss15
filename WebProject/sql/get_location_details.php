<?php
$db = new PDO('mysql:host=localhost;dbname=hoerburger;charset=utf8mb4', 'hoerburger', 'hoerburger');
$base_url_images = "http://localhost/Praxisseminar/WebProject/content/";
$base_url_songs = "http://localhost/Praxisseminar/WebProject/content/";
$base_url_videos = "http://localhost/Praxisseminar/WebProject/content/";

if (isset($_GET['station_id'])) {
    $station_id = $_GET['station_id'];
}

$db->query("SET group_concat_max_len = 4096");

$query = $db -> prepare("SELECT stations.*, GROUP_CONCAT(DISTINCT images.id) AS images, GROUP_CONCAT(DISTINCT songs.id) AS songs, GROUP_CONCAT(DISTINCT videos.id) AS videos FROM stations LEFT JOIN images ON images.station_id = stations.id LEFT JOIN songs ON songs.station_id = stations.id LEFT JOIN videos ON videos.station_id = stations.id WHERE stations.id = '$station_id'");
$query -> execute();
$station = $query->fetch();

$image_ids = $station['images'];
$query = $db -> prepare("SELECT url, id FROM images WHERE id IN (" . $image_ids . ") AND url is not null");
$query -> execute();
$images = $query->fetchAll(PDO::FETCH_ASSOC);

$song_ids = $station['songs'];
$query = $db -> prepare("SELECT url, id FROM songs WHERE id IN (" . $song_ids . ") AND url is not null");
$query -> execute();
$songs = $query->fetchAll(PDO::FETCH_ASSOC);

$video_ids = $station['videos'];
$query = $db -> prepare("SELECT url, id FROM videos WHERE id IN (" . $video_ids . ") AND url is not null");
$query -> execute();
$videos = $query->fetchAll(PDO::FETCH_ASSOC);

$location_id = $station['location_id'];
$query = $db -> prepare("SELECT * FROM locations WHERE id = '$location_id'");
$query -> execute();
$location = $query->fetch();

$names = explode("/", $location['location']);
$name = trim($names[0]);

if (isset($names[1])) {
	$alt_name = trim($names[1]);
} else {
	$alt_name = NULL;
}

for ($i = 0; $i < count($images); $i++) {
    $images[$i]['url'] = $base_url_images.$images[$i]['url'];
}

for ($i = 0; $i < count($songs); $i++) {
    $songs[$i]['url'] = $base_url_songs.$songs[$i]['url'];
}

for ($i = 0; $i < count($videos); $i++) {
    $videos[$i]['url'] = $base_url_videos.$videos[$i]['url'];
}

$response = [
	"id" => $station['id'],
    "name" => $name,
    "date" => $station['date'],
    "travel" => $station['travel_id'],
    "altname" => $alt_name,	
    "latitude" => $location['latitude'],
    "longitude" => $location['longitude'],
    "images" => $images,
    "songs" => $songs,
    "videos" => $videos
];

echo json_encode($response);
?>
