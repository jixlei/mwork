<?php

namespace App\Admin\Auth\Database;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    /**
     * Settings constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $connection = config('admin.database.connection') ?: config('database.default');
        $this->setConnection($connection);
        $this->setTable(config('admin.database.config_table'));

        parent::__construct($attributes);
    }
}
