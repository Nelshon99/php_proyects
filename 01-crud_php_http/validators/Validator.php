<?php

namespace app\validators;

use app\interfaces\ValidatorInterface;


class Validator implements ValidatorInterface{
    private string $error;

    public function getError():string{
        return $this->error ;
    }

    public function validateAdd($data): bool
    {
        if (empty($data['name'])) {
            $this->error = 'Nombre  es obligatiorio';
            return false;

        }

        return true;

    }

    public function validateUpdate($data): bool
    {
         if (empty($data['name'])) {
            $this->error = 'Nombre  es obligatiorio';
            return false;

        }

        if (empty($data['id'])) {
            $this->error = 'Id  es obligatiorio';
            return false;

        }

        return true;
    }
}