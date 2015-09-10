<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class UserLogs extends Model
{
    protected $table = "user_logs";
    protected $primaryKey = "log_id";
    public $timestamps = FALSE;
    protected $fillable = [
        "email_address",
        "browser",
        "ip_address",
        "date_logged"
    ];
}
?>
