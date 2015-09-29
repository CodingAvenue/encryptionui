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
        $encrypted_data = NULL;
        if (\Input::get('data')) {
            $encrypted_data = \Input::get('data');
            $encrypted_data = Encryptions::where('encryption_code', $encrypted_data)->first();
            $date_logged = $encrypted_data->date_logged;
            if (date("Y-m-d H:i:s") >= $date_logged) {
            	$encrypted_data = "Data has expired. Will not decrypt";
            } else {
                $encrypted_data = $encrypted_data->encrypted_data;
            }
        }
    	return View::make('encryptor', ['data' => $data, 'encrypted_data' => $encrypted_data]);
    }

    public function track()
    {
    	if (\Input::get('encrypted_data')) {
            $encryptions = new Encryptions();
            $encryptions->encrypted_data = \Input::get('encrypted_data');
      	    $encryptions->author = \Input::get('author');
      	    $encryptions->date_logged = date("Y-m-d H:i:s", strtotime(\Input::get('expiration') . " days"));
      	    $encryptions->save();
      	    $id = $encryptions->encryption_id;
      	    $encryption_code = \Hash::make($id);
      	    $encryptions = Encryptions::find($id);
      	    $encryptions->encryption_code = $encryption_code;
      	    $encryptions->save();
      	    echo $encryption_code;
        }
    }

    public function logout()
    {
    	Session::forget('user_info');
    	return redirect(url("/"));
    }
}

?>
