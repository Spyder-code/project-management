<?php

namespace App\Repositories;

use App\Models\UserProject;
use App\Repositories\BaseRepository;

/**
 * Class UserProjectRepository
 * @package App\Repositories
 * @version April 8, 2021, 3:55 am UTC
*/

class UserProjectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'task_id',
        'user_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserProject::class;
    }
}
