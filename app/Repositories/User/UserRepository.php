<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function getModel()
    {
        return User::class;
    }

}


