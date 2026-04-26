<?php

namespace App\Policies;

use App\Models\JobApps;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobAppsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JobApps $jobApps): bool
    {
        return $user->id === $jobApps->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobApps $jobApps): bool
    {
        return $user->id === $jobApps->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobApps $jobApps): bool
    {
        return $user->id === $jobApps->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JobApps $jobApps): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JobApps $jobApps): bool
    {
        return false;
    }
}
