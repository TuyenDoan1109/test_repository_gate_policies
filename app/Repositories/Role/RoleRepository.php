<?php

namespace App\Repositories\Role;

use App\Repositories\BaseRepository;
use App\Models\Role;

/**
 * Class Role.
 */
class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function getModel()
    {
        return Role::class;
    }


}


