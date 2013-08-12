<?php

require_once APPPATH.'facebook.php';

$facebook = new Facebook(array(
  'appId' => '515649145162571',
  'secret' => '46c7fe25ef7c1c7e03059024049d676f',
));

$user = $facebook->getUser();
$gamelist = array();
$ttvclientid = '<563pl149qc2s3obor1d7rmm2xuu2io0>';

if ($user){

	$user_games = $facebook->api('/me/games');
    
    foreach($user_games["data"] as $game ){
    	array_push($gamelist, $game["name"]);
    }
    
	//var_dump($gamelist);
}else{
	Response::redirect('home');
}


?>

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<a class="brand" href="../home/index"><?php echo Asset::img('LTVlogo.png', array("alt" => "LikesTV","width"=>"90"));?></a>
		<ul class="nav">
			<li class='<?php echo Arr::get($subnav, "home" ); ?>'><?php echo Html::anchor('home/index','Home');?></li>
			<li class='<?php echo Arr::get($subnav, "channels" ); ?>'><?php echo Html::anchor('channels/index','Channels');?></li>
			<li class='<?php echo Arr::get($subnav, "preferences" ); ?>'><?php echo Html::anchor('preferences/index','Preferences');?></li>
			<li class='<?php echo Arr::get($subnav, "about" ); ?>'><?php echo Html::anchor('about/index','About Us');?></li>
			<li class='<?php echo Arr::get($subnav, "testimonials" ); ?>'><?php echo Html::anchor('testimonials/index','Testimonials');?></li>
			<li class='<?php echo Arr::get($subnav, "contact" ); ?>'><?php echo Html::anchor('contact/index','Contact Us');?></li>
		</ul>
	</div>
</div>
<p style="color:white">Don’t like a particular game? Filter it out! If you want to see it again, you can always manage your filter at the preferences page. </p>

<?php
//https://api.twitch.tv/kraken/streams?game=Minecraft
//$data = json_decode(file_get_contents("https://api.twitch.tv/kraken/search/games?q=Minecraft&type=suggest"));
//https://api.twitch.tv/kraken/search/games?q=Minecraft&type=suggest
//var_dump($data);
$apiparams = array(
  'http'=>array(
    'method' => 'GET',
    'header' => "Client ID: ".$ttvclientid
  )
);
// run gamelist through search API game search and output it to another array
$refinelist = array();
$counter = 0;

foreach($gamelist as $gamename){
	if ($counter > 10){break;}
	$gamename = str_replace(" ","+",$gamename);
	$data = json_decode(file_get_contents('https://api.twitch.tv/kraken/search/games?q='.$gamename.'&type=suggest', false, stream_context_create($apiparams)));

	foreach($data->games as $game){
		array_push($refinelist, $game->name);
	}

	//usleep(300000);
	$counter++;
}

$streams = array();

foreach($refinelist as $game){
	$game = str_replace(" ","+",$game);
	$data = json_decode(file_get_contents('https://api.twitch.tv/kraken/streams?game='.$game, false, stream_context_create($apiparams)));

	foreach($data->streams as $stream){
		array_push($streams, $stream);
	}
	//usleep(300000);
}
// run new array through twitch API streams search by game


//display stream list

//var_dump($streams);

echo    '<ul class="thumbnails">';
foreach($streams as $stream){
	echo    '<li>';
	echo	   '<div class="thumbnail">';
	echo	   '<img src="'.$stream->preview->medium.'" alt="preview" width=275>';
	echo	   '<h3>'.$stream->game.'</h3>';
	echo   '<h4>played by '.$stream->channel->display_name.'</h4>';
	echo   '<a href='.$stream->channel->url.' class="btn btn-warning" target="_blank">Watch Now</a>';
	echo   '</div>';
	echo   '</li>';
}
echo 	'</ul>';


?>