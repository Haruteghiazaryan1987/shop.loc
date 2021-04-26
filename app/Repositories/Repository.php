<?php

namespace App\Repositories;

use Config;
use Illuminate\Database\Eloquent\Collection\Model;

abstract class Repository {
  /**
   * @var Model
   */
  protected $model;

  /**
   * Repository constructor
   */
  public function __construct() {
    $this->model = app($this->getModelClass());
  }

  /**
   * @return mixed
   */
  abstract protected function getModelClass();

  /**
   * @return Model | Illuminate\Foundation\Application|mixed
   */
  protected function startConditions(){
    return clone $this->model;
  }
}
