<?php

namespace App\Domain;

class User
{

    public static function create(
        UserId $id,
        UserName $name,
        UserPassword $password,
        UserUserId $userId,
        UserCreatedAt $createdAt,
        UserUpdatedAt $updatedAt
    ) {
        $user = new User($id, $name, $password, $userId, $createdAt, $updatedAt);
        return $user;
    }

    private $id;
    private $name;
    private $password;
    private $userId;
    private $createdAt;
    private $updatedAt;

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getName(): UserName
    {
        return $this->name;
    }

    public function setName(UserName $name)
    {
        $this->name = $name;
    }

    public function getPassword(): UserPassword
    {
        return $this->password;
    }

    public function setPassword(UserPassword $password)
    {
        $this->password = $password;
    }

    public function getUserId(): UserUserId
    {
        return $this->userId;
    }

    public function setUserId(UserUserId $userId)
    {
        $this->userId = $userId;
    }

    public function getCreatedAt(): UserCreatedAt
    {
        return $this->createdAt;
    }

    public function setCreatedAt(UserCreatedAt $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): UserUpdatedAt
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(UserUpdatedAt $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    private function __construct(
        UserId $id,
        UserName $name,
        UserPassword $password,
        UserUserId $userId,
        UserCreatedAt $createdAt,
        UserUpdatedAt $updatedAt
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->userId = $userId;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
}
