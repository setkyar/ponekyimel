<?php

namespace App\Http\Controllers;

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
    	$data = $request->all();

	    try {
	    	$images = $this->fb->get($data['page'] . '/photos?fields=images&type=uploaded&limit=25', $this->accessToken)->getDecodedBody();
	    } catch (Facebook\Exceptions\FacebookResponseException $e) {
		    $graphError = $e->getPrevious();
		    echo 'Graph API Error: ' . $e->getMessage();
		    echo ', Graph error code: ' . $graphError->getCode();
		    exit;
		} catch (Facebook\Exceptions\FacebookSDKException $e) {
		    echo 'SDK Error: ' . $e->getMessage();
		    exit;
		}
		
		$page = $data['page'];

	    return view('welcome', compact('images', 'page'));
    }
}
