<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{
    use HandlesAuthorization;

    public function editReview(User $user, Review $review)
    {
        return $user->id === $review->id_utilisateur;
    }
}
