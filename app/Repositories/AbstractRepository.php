<?php
/**
 * Created by PhpStorm.
 * User: Aeliot
 * Date: 12.02.2017
 * Time: 22:26
 */

namespace App\Repositories;


class AbstractRepository
{
    const OPERATOR_EQUAL = '=';

    /**
     * @var string|\App\Models\AbstractModel
     */
    protected $modelName;

    /**
     * @param array $data
     * @return \App\Models\AbstractModel
     */
    public function create(array $data)
    {
        $className = $this->modelName;

        return $className::create($data);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        $className = $this->modelName;

        return $className::all();
    }

    /**
     * @param int $id
     * @return \App\Models\AbstractModel
     */
    public function findOneById($id)
    {
        $className = $this->modelName;

        return $className::find($id);
    }

    /**
     * @param int $id
     * @return \App\Models\AbstractModel
     */
    public function findOneByIdOrFail($id)
    {
        $className = $this->modelName;

        return $className::findOrFail($id);
    }
}
