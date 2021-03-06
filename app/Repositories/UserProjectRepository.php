<?php

namespace App\Repositories;

use App\Models\UserProject;
use App\Repositories\BaseRepository;

/**
 * Class UserProjectRepository
 * @package App\Repositories
 * @version April 20, 2021, 5:39 am WIB
*/

class UserProjectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'project_id'
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
