<?php

namespace App\Policies;

use App\Models\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Product $product)
    {
//        dd($user->role==0);
        return $user->role == 0;
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Product $product)
    {
//        return $user->id === $product->user_id;
        return $user->role == 0;
    }

    public function delete(User $user, Product $product)
    {
        //
    }

    public function restore(User $user, Product $product)
    {
        //
    }

    public function forceDelete(User $user, Product $product)
    {
        //
    }
}
