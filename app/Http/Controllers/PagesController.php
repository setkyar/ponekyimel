<?php


namespace App\Http\Controllers;

use App\WatchYou;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	protected $fb;
	protected $accessToken;

	public function __construct()
	{
		$this->fb 			= \App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');
		$this->accessToken 	= config('laravel-facebook-sdk.facebook_config')['app_id'] . '|' . config('laravel-facebook-sdk.facebook_config')['app_secret'];
	}
	/**
	 * Display welcome page
	 *
	 * @return mix
	 * @author Set Kyar Wa Lar <setkyar16@gmail.com>
	 **/
    public function welcome(Request $request)
    {
    	$paging_after = $request->get('paging_after');
    	$paging_before = $request->get('paging_before');

    	if (isset($paging_after) || isset($paging_before)) {
	    	try {
	    		if (isset($paging_after)) {
	    			$images = $this->fb->get($request->get('page') . '/photos?fields=images&type=uploaded&limit=25&after=' . $paging_after, $this->accessToken)->getDecodedBody();	
	    		} else if($paging_before) {
					$images = $this->fb->get($request->get('page') . '/photos?fields=images&type=uploaded&limit=25&before=' . $paging_before, $this->accessToken)->getDecodedBody();	
	    		}

		    } catch (Facebook\Exceptions\FacebookResponseException $e) {
			    $graphError = $e->getPrevious();
			    echo 'Graph API Error: ' . $e->getMessage();
			    echo ', Graph error code: ' . $graphError->getCode();
			    exit;
			} catch (Facebook\Exceptions\FacebookSDKException $e) {
			    echo 'SDK Error: ' . $e->getMessage();
			    exit;
			}
			
			$page = $request->get('page');
		}

	    return view('welcome', compact('images', 'page'));
    }

    /**
     * Get images from user requested page
     *
     * @return mix
     * @author Set Kyar Wa Lar <setkyar16@gmail.com>
     **/
    public function getImagesFromFacebook(Request $request)
    {
    	$page = $this->GetUserIDFromUsername($request->page);

    	WatchYou::create(['page_name' => $page]);

    	$data = $request->all();

	    try {
	    	$images = $this->fb->get($page . '/photos?fields=images&type=uploaded&limit=25', $this->accessToken)->getDecodedBody();
	    } catch (Facebook\Exceptions\FacebookResponseException $e) {
		    return view('errors.error');
		} catch (Facebook\Exceptions\FacebookSDKException $e) {
		    return view('errors.error');
		}
		
		$page = $page;

	    return view('welcome', compact('images', 'page'));
    }

    public function GetUserIDFromUsername($username) {
	    // For some reason, changing the user agent does expose the user's UID
	    $options  = array('http' => array('user_agent' => 'some_obscure_browser'));
	    $context  = stream_context_create($options);
	    $fbsite = file_get_contents('https://www.facebook.com/' . $username, false, $context);

	    // ID is exposed in some piece of JS code, so we'll just extract it
	    $fbIDPattern = '/\"entity_id\":\"(\d+)\"/';
	    if (!preg_match($fbIDPattern, $fbsite, $matches)) {
	        throw new Exception('Unofficial API is broken or user not found');
	    }
	    return $matches[1];
	}
}
