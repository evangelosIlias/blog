<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Notifications\OldPostDeletedNotification;

class PostsDeleteInactive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:delete-inactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletion of old inactive posts';

    /**
     * Execute the console command.
     */
    public function handle()
    {   
        // Please make sure you have solve the N + 1 problem
        User::whereHas('posts', fn($query) => $query->whereDoesntHave('comments')->where('created_at', '<', now()->subYear()))
            ->get()
            ->each(fn(User $user) => $user->notify(new OldPostDeletedNotification($this->deleteUserPosts($user))));

        $this->info('Inactive posts have been soft deleted.');
    }

    private function deleteUserPosts(User $user): int
    {
        return $user->posts()->where('created_at', '<', now()->subYear())->delete();
    }
}
