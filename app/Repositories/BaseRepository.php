<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{

  /* A variable that will be used to store the model that is being used. */
  protected $model;


  /**
   * The function __construct() is a magic method that is called when a new object is created
   */
  public function __construct()
  {
    $this->setModel();
  }


  /* A function that is used to get the model that is being used. */
  abstract public function getModel();


  /**
   * It sets the model for the controller.
   */
  public function setModel()
  {
    $this->model = App::make(
      $this->getModel()
    );
  }

  /**
   * It returns all the rows in the table
   * 
   * @return All the data from the model.
   */
  public function getAll()
  {
    return $this->model->all();
  }

  /**
   * It returns the model with the given id
   * 
   * @param id The id of the model you want to find.
   * 
   * @return The model object.
   */
  public function find($id)
  {
    return $this->model->find($id);
  }

  /**
   * It creates a new model instance and saves it to the database
   * 
   * @param attributes The attributes you want to create the model with.
   * 
   * @return The model is being created.
   */
  public function create($attributes = [])
  {
    return $this->model->create($attributes);
  }

  /**
   * It updates the attributes of a model.
   * 
   * @param id The id of the record you want to update.
   * @param attributes An array of attributes to update the model with.
   * 
   * @return The updated record.
   */
  public function update($id, $attributes = [])
  {
    $result = $this->find($id);
    if ($result) {
      $result->update($attributes);
      return $result;
    }

    return false;
  }

  /**
   * It deletes the record from the database.
   * 
   * @param id The id of the record to delete.
   * 
   * @return The result of the find method.
   */
  public function delete($id)
  {
    $result = $this->find($id);
    if ($result) {
      $result->delete();

      return true;
    }

    return false;
  }
}
