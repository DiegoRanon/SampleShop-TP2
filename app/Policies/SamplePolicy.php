<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;    
use App\Models\Sample;

class SamplePolicy
{
    use HandlesAuthorization;

    public function editSample(User $user, Sample $sample)
    {
        return $user->id === $sample->id_utilisateur;
    }
}
