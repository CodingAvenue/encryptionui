<?php
namespace App\Http\Controllers;
use View;
use Session;
use App\Encryptions;
class Encryptor extends Controller 
{
    public function index()
    {
    	if (!Session::has('user_info')) {
    	    return redirect(url('/'));
        }
        $data = Session::get('user_info');
    	return View::make('encryptor', ['data' => $data]);
    }

    public function track()
    {
    	if (\Input::get('encrypted_data')) {
            $encryptions = new Encryptions();
            $encryptions->encrypted_data = \Input::get('encrypted_data');
      	    $encryptions->author = \Input::get('author');
      	    $encryptions->save();
      	    $id = $encryptions->encryption_id;
      	    $encryption_code = \Hash::make($id);
      	    $encryptions = Encryptions::find($id);
      	    $encryptions->encryption_code = $encryption_code;
      	    $encryptions->save();
      	    echo \Hash::make($encryption_code);
        }
    }

    public function logout()
    {
    	Session::forget('user_info');
    	return redirect(url("/"));
    }
}

?>
