<?php

namespace App\EQP\Repositories;

abstract class Repository
{
    abstract protected function getEntityName();
    abstract protected function createEntityFromJSON($json);
    abstract protected function updateEntityFromJSON(&$entity, $json);  

    public function getAll()
    {
        return $this->getEntityName()::all();
    }

    public function getById($id)
    {
        return $this->getEntityName()::find($id);
    }

    public function save($entity)
    {
        return $entity->save();
    }

    public function saveFromJSON($json)
    {
        $entity = $this->createEntityFromJSON($json);

        if(isset($entity) && $entity->save())
        {
            return $entity;
        }
        else
        {
            return false;
        }
    }

    public function updateFromJSON($json, $id)
    {
        $entity = $this->getById($id);

        if(isset($entity))
        {
            $this->updateEntityFromJSON($entity, $json);                      
            return $entity->save();            
        }               
    }

    public function delete($id)
    {
        $entity = $this->getById($id);

        if(isset($entity))
        {
            return $entity->delete();
        }    
    }

}