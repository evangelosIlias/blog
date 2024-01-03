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

    private function deleteUserPosts(User $user): int
    {
        return $user->posts()->where('created_at', '<', now()->subYear())->delete();
    }

    public function handle()
    {   
        // Continue processing only the users that meet additional constraints
        User::whereHas('posts', fn($query) => $query
            ->whereDoesntHave('comments')
            ->where('created_at', '<', now()->subYear()))
            ->get()
            ->load('posts')
            ->each(fn(User $user) => $user
                ->notify(new OldPostDeletedNotification($this->deleteUserPosts($user))));

        $this->info('Inactive posts have been soft deleted.');
    }
}