<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Encryptions extends Model
{
    protected $table = "encryptions";
    protected $primaryKey = "encryption_id";
    public $timestamps = FALSE;
    protected $filleable = [
        "author",
        "encrypted_date",
        "date_logged"
    ];
}
?>
