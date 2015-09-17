<?php 
namespace App\Console\Commands;
use Illuminate\Console\Command;
use DB;

class DeleteEncryptions extends Command 
{

    protected $name = 'encryptions:delete';
    protected $description = "Deletes old encryption data";

    public function handle()
    {
        $this->comment("Deleting old encryptions");
        DB::delete("DELETE FROM encryptions WHERE date_logged <= CURRENT_TIMESTAMP");
    }

}
?>
