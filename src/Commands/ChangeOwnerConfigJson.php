<?php

namespace CSlant\LaravelTelegramGitNotifier\Commands;

use Illuminate\Console\Command;

class ChangeOwnerConfigJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'config-json:change-owner 
                {user : The user to change owner}
                {group? : The group to change owner}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'config-json';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $user = $this->argument('user');
        $group = $this->argument('group') ?? $user;

        $jsonsPath = config('telegram-git-notifier.data_file.storage_folder');
        if (is_string($jsonsPath) && file_exists($jsonsPath)) {
            exec("chown -R $user:$group $jsonsPath");
        }
    }
}
