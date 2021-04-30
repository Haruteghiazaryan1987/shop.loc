<?php

namespace App\Repositories;

use App\Models\Category as Model;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository extends Repository {
  /**
   * @return string
   */
  protected function getModelClass() {
    return Model::class;
  }

  public function getCategories(){
    return $this->startConditions()->all();
  }

}