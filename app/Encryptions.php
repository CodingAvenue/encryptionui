<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Encryptions extends Model
{
    protected $table = "encryptions";
    protected $primaryKey = "encryption_id";
    public $timestamps = FALSE;
    protected $fillable = [
        "author",
        "encrypted_date",
        "date_logged",
        "encryption_code"
    ];
}
?>
