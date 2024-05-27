<?php

namespace App\Policies;

use App\Models\CariKomunitas;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CariKomunitasPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CariKomunitas $cariKomunitas): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CariKomunitas $cariKomunitas): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CariKomunitas $cariKomunitas): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CariKomunitas $cariKomunitas): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CariKomunitas $cariKomunitas): bool
    {
        //
    }
}
