<?php

namespace App\Repositories\Post;

use App\Repositories\BaseRepository;
use App\Models\Post;

/**
 * Class Post.
 */
class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function getModel()
    {
        return Post::class;
    }


}


