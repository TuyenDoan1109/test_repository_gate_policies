<?php

namespace App\Repositories\Permission;

use App\Repositories\BaseRepository;
use App\Models\Permission;

/**
 * Class Permission.
 */
class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function getModel()
    {
        return Permission::class;
    }


}


