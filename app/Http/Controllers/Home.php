<?php
namespace App\Http\Controllers;
use Artdarek\OAuth\Facade\OAuth;
use View;
use App\UserLogs;

class Home extends Controller
{
    public function index()
    {
        if (\Session::has('user_info')) {
            return redirect(url("Encryptor"));
        }

    	return View::make('home', ['url' => url()]);
    }
    public function oauth()
    {
        $code = \Input::get('code');

        $google_service = OAuth::consumer('Google');

        if (\Session::has('user_info')) {
            return redirect(url("Encryptor"));
        }

        if (!is_null($code)) {
            $token = $google_service->requestAccessToken($code);

            $result = json_decode($google_service->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);
            if (preg_match('/.*.codingavenue.com$|.*.illuminateed.net$|.*.illuminateed.com$/', $result['email'])) {

            	$user_log = new UserLogs();
            	$user_log->email_address = $result['email'];
            	$user_log->ip_address = $_SERVER['REMOTE_ADDR'];
            	$user_log->save();

            	\Session::put('user_info', $result);
            	return \Redirect::intended("Encryptor");
            }
        } else {
            $url = $google_service->getAuthorizationUri();

            return redirect((string)$url);
        }
    }
}
?>
