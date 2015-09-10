<?php
namespace App\Http\Controllers;
use View;
use Session;
class Encryptor extends Controller 
{
    public function index()
    {
    	if (!Session::has('user_info')) {
    	    return redirect(url('/'));
        }
        $data = Session::get('user_info');
    	return View::make('encryptor', ['name' => $data['given_name']]);
    }

    public function logout()
    {
    	Session::forget('user_info');
    	return redirect(url("/"));
    }
}

?>
