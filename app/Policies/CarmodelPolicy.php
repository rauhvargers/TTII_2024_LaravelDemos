<?php

namespace App\Policies;

use App\Models\Carmodel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CarmodelPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return true; //Anyone may view any car model
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Carmodel $carmodel): bool
    {
        //
        return true; //Anyone may view any car model
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        
        //TODO: replace with actual implemetation, this placeholder just checks if user has ID of 1
       return $user->id == 1;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Carmodel $carmodel): bool
    {
        //
        return $user->id == 1 && $carmodel->title != ""; //TODO: replace with actual implemetation, this placeholder just checks if user has ID of 1
        
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Carmodel $carmodel): bool
    {
        //
        return $user->id == 1; //TODO: replace with actual implemetation, this placeholder just checks if user has ID of 1
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Carmodel $carmodel): bool
    {
        //
        return $user->id == 1; //TODO: replace with actual implemetation, this placeholder just checks if user has ID of 1
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Carmodel $carmodel): bool
    {
        //
        return $user->id == 1; //TODO: replace with actual implemetation, this placeholder just checks if user has ID of 1
    }
}
