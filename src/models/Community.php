<?php

class Community
{
    private $name;
    private $nickname;
    private $id;

    public function __construct(string $name, string $nickname, int $id){
        $this->name=$name;
        $this->nickname=$nickname;
        $this->id = $id;
    }

    public function getID(){
        return $this->id;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getNickname(): string{
        return $this->nickname;
    }
}