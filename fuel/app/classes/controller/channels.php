<?php
require_once APPPATH.'facebook.php';
class Controller_Channels extends Controller_Template
{

	public function action_index()
	{

		/*	URL TEMPLATES (delete later)
		//https://api.twitch.tv/kraken/streams?game=Minecraft
		//$data = json_decode(file_get_contents("https://api.twitch.tv/kraken/search/games?q=Minecraft&type=suggest"));
		//https://api.twitch.tv/kraken/search/games?q=Minecraft&type=suggest */

		$facebook = new Facebook(array(
	  	'appId' => '515649145162571',
	  	'secret' => '46c7fe25ef7c1c7e03059024049d676f',
		));

		// Twitch TV Client ID
		$ttvclientid = '563pl149qc2s3obor1d7rmm2xuu2io0';
		
		// API parameters for Twitch API calls
		$apiparams = array(
		  'http'=>array(
		    'method' => 'GET',
		    'header' => "Client ID: ".$ttvclientid
		  )
		);

		// Grabs facebook user, if it exists. This is a check to see if user is logged in
		$user = $facebook->getUser();

		$gamelist = array();	// The list of games after it has been filtered.
		$filter = array();		// This is the filter.
		$refinelist = array();	// The list of games after $gamelist is run through Twitch's game search
		$streams = array();		// Contains the streams after refinelist is run through Twitch's Stream search
		$data = array();
		$sessionlogout = 'http://likestv.gopagoda.com/logout';
		
		if ($user){

			$data['logoutUrl'] = $facebook->getLogoutUrl( array('next' => $sessionlogout));

		try {

		// Retrieve profile information since user is logged in
			$user_profile = $facebook->api('/me');
			$user_games = $facebook->api('/me/games');
		  
		  
		} catch (FacebookApiException $e) {

		  error_log($e);
		  $user = null;

		}


		// Retrieves list of games the logged in user has in their filter from the database
		$preferences = Model_Preference::find('all', array(
		    'where' => array(array('username', $user_profile["username"]),),
		    'order_by' => array('updated_at' => 'desc'),));

		// Creates the filter variable - an array of strings - from $preferences which is an array of objects
		foreach($preferences as $pref){
			array_push($filter, $pref->filter);
			
		}

		// Checks the filter against the list of "liked" games from facebook to create the list that will be used to retrieve streams
		foreach($user_games["data"] as $game ){
    	if (!(count($filter) > 0 && in_array($game["name"], $filter)))
    		{
    		array_push($gamelist, $game["name"]);
    		
    		}
    	}
  
		$counter = 0;

		// Creates $refinedlist using $gamelist. Each game in gamelist is checked through Twitch's suggested game search. This is to correct any discrepancies with capitalization, since Twitch's API is case sensitive. Spelling/punctuation is not necessarily corrected, which is a limitation of the API.

		foreach($gamelist as $gamename){

			// This is a temporary throttle to the data for testing. Performance enhancements coming to improve this in the future.
			if ($counter > 15){break;}

			// Spaces are replaced with pluses
			$gamename = str_replace(" ","+",$gamename);

			// Finds games similar to those from the filtered list from facebook within Twitch (not 100% accurate due to API limitations)

			$apidata = json_decode(file_get_contents('https://api.twitch.tv/kraken/search/games?q='.$gamename.'&type=suggest', false, stream_context_create($apiparams)));

			// Each game returned from the above call is pushed into $refinelist
			foreach($apidata->games as $game){
				if (!in_array($game->name, $filter)&& !in_array($game->name,$refinelist)) {
					array_push($refinelist, $game->name);
				}
			}

			
			$counter++;
		}

		

		foreach($refinelist as $game){

			$game = str_replace(" ","+",$game);

			// Finds Twitch live streams of the games within $refinelist
			$strdata = json_decode(file_get_contents('https://api.twitch.tv/kraken/streams?game='.$game, false, stream_context_create($apiparams)));

			// Each stream returned from the above call is pushed into $streams
			foreach($strdata->streams as $stream){
				array_push($streams, $stream);
				

			}
			
		}
    }

	else{
		Response::redirect('home');
	}
		$data['streams'] = $streams;	
		$data["subnav"] = array('channels'=> 'active' );
		$this->template->title = 'Your Recommended Channels';
		$this->template->content = View::forge('channels/index', $data);
	}

	public function action_filter()
	{
		if (Input::post()){
			if (Input::post('filter')){
				$facebook = new Facebook(array(
			  	'appId' => '515649145162571',
			  	'secret' => '46c7fe25ef7c1c7e03059024049d676f',
				));

				try {

				// Retrieve profile information since user is logged in
					$user_profile = $facebook->api('/me');
				  
				  
				} catch (FacebookApiException $e) {

				  error_log($e);
				  $user = null;

				}
				$addfilter = Input::post('filter');
				$preference = Model_Preference::forge(array(
					'username' => $user_profile["username"],
					'filter' => $addfilter,
				));
				$preference and $preference->save();
				$this->template->title = 'Channel Filter';
				$this->template->content = View::forge('channels/filter');
				Response::redirect('channels/');
			}
		}
		else{
			Response::redirect('channels/');
		}
	}

}
