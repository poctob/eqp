<?php

namespace App\EQP\Repositories;

abstract class Repository
{
    abstract protected function getEntityName();
    abstract protected function createEntityFromArray($data);
    abstract protected function updateEntityFromArray(&$entity, $data);  

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

    public function saveFromArray($data)
    {
        $entity = $this->createEntityFromArray($data);

        if(isset($entity) && $entity->save())
        {
            return $entity;
        }
        else
        {
            return false;
        }
    }

    public function updateFromArray($data, $id)
    {
        $entity = $this->getById($id);

        if(isset($entity))
        {
            $this->updateEntityFromArray($entity, $data);                      
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