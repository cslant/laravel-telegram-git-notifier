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
                {user? : The user to change owner}
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
        if (PHP_OS_FAMILY !== 'Linux') {
            $this->error('This command only works on Linux');
            return;
        }

        $user = (string) ($this->argument('user') ?? '');
        $group = (string) ($this->argument('group') ?? $user);

        if (empty($user) || empty($group)) {
            $group = $user = (string) exec('ps aux | egrep "(apache|httpd|nginx)" | grep -v "root" | head -n1 | cut -d\  -f1');
        }

        $jsonsPath = config('telegram-git-notifier.data_file.storage_folder');
        if (is_string($jsonsPath) && file_exists($jsonsPath)) {
            shell_exec("chown -R " . escapeshellarg($user) . ":" . escapeshellarg($group) . " " . escapeshellarg($jsonsPath));
        } else {
            $this->error('The path to the jsons folder is not valid');
        }
    }
}
