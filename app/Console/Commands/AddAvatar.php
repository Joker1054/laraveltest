<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class AddAvatar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:avatar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add default avatar to users without avatar.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        if (\Storage::exists('public/avatar-default.jpg')) {
            
            User::where('avatar_url', null)->update(['avatar_url' => 'http://myapp.local/storage/avatar-default.jpg']);
        }
    }
}
