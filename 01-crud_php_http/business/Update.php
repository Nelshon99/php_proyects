<?php

namespace app\business;

use app\interfaces\RepositoryInterface;
use app\interfaces\ValidatorInterface;
use app\exceptions\DataException;
use app\exceptions\ValidationException;

class Update{
    private RepositoryInterface $repository;
    private ValidatorInterface $validator;
    
    public function __construct(RepositoryInterface $repository, ValidatorInterface $validator)
    {
        $this->repository= $repository;
        $this->validator= $validator;
    }

    public function update ($data){
        if (!$this->validator->validateUpdate($data)) {
            throw new ValidationException($this->validator->getError());
        }
        if (!$this->repository->exists((int)$data['id'])) {
            throw new DataException('No existe el dato a actualizar...');
        }
        $this->repository->update($data);
    }
}