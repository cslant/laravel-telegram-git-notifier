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

        $user = $this->argument('user') ?: $this->getDefaultUserGroup();
        $group = $this->argument('group') ?: $this->getDefaultUserGroup();

        if (!is_string($user) || !is_string($group)) {
            $this->error('Failed to retrieve default user and group');

            return;
        }

        $this->changeOwner($user, $group);
    }

    /**
     * @param  string  $user
     * @param  string  $group
     * @return void
     */
    private function changeOwner(string $user, string $group): void
    {
        $jsonsPath = config('telegram-git-notifier.data_file.storage_folder');
        if (is_string($jsonsPath) && file_exists($jsonsPath)) {
            shell_exec('chown -R '.escapeshellarg($user).':'.escapeshellarg($group).' '.escapeshellarg($jsonsPath));
        } else {
            $this->error('The path to the jsons folder is not valid');
        }
    }

    /**
     * Get the default user and group for the chown command.
     *
     * @return string
     */
    private function getDefaultUserGroup(): string
    {
        $defaultUserGroup = exec('ps aux | egrep "(apache|httpd|nginx)" | grep -v "root" | head -n1 | cut -d\  -f1');
        if ($defaultUserGroup === false) {
            $this->error('Failed to retrieve default user and group');

            return '';
        }

        return $defaultUserGroup;
    }
}
