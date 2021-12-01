<?php

namespace App\Models;

class Pouzivatel extends \App\Core\Model
{
    public int $id;
    public ?string $email;
    public ?string $heslo;
    public bool $admin;

    public function __construct()
    {

    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getHeslo(): ?string
    {
        return $this->heslo;
    }

    /**
     * @param string|null $heslo
     */
    public function setHeslo(?string $heslo): void
    {
        $this->heslo = $heslo;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->admin;
    }

    /**
     * @param bool $admin
     */
    public function setAdmin(bool $admin): void
    {
        $this->admin = $admin;
    }

    static public function setDbColumns()
    {
        return ['id', 'email', 'heslo', 'admin'];
    }

    static public function setTableName()
    {
        return "pouzivatelia";
    }
}