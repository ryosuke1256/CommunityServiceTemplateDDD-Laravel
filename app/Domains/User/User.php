<?php
declare(strict_types=1);

namespace App\Domains\User;

class User
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    final public function getId(): int
    {
        return $this->id;
    }
}
