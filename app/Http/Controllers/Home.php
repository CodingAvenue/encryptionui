<?php
namespace App\Http\Controllers;
use OAuth;

class Home extends Controller
{
    public function store(Request $request)
    {
        $code = $request->get('code');

        $google_service = OAuth::consumer('Google');


        if ( ! is_null($code)) {
            $token = $google_service->requestAccessToken($code);

            $result = json_decode($google_service->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);

            dd($result);
        } else {
            $url = $google_service->getAuthorizationUri();

            return redirect((string)$url);
        }
    }
}
?>
