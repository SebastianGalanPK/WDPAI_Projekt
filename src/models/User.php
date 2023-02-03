<?php

require_once __DIR__."/../repository/CommunityRepository.php";

class User{
    private $id;
    private $login;
    private $password;
    private $email;
    private $rank;
    private $community;

    public function __construct(string $login, string $password, string $email, int $rank, int $id = 0)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->rank = $rank;

        $this->refreshCommunity();
    }

    public function getID(){
        return $this->id;
    }

    public function getLogin(){
        return $this->login;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getRank(){
        return $this->rank;
    }

    public function getCommunity(){
        return $this->community;
    }

    public function refreshCommunity(){
        $cr = new CommunityRepository();
        $this->community = $cr->getUserCommunity($this->id);
    }

    public function checkIfPlayerLikesMeme(int $id_meme) : bool{
        $mr = new MemeRepository();
        return $mr->checkIfPlayerLikesMeme($this->id, $id_meme);
    }
}

?>