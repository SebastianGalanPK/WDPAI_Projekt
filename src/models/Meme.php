<?php

class Meme
{
    private $text;
    private $filename;
    private $rate;
    private $post_date;
    private $community_nickname;
    private $user_login;

    private $id;

    const UPLOAD_DIRECTORY = '/../public/uploads/';

    public function __construct(int $id, string $filename, string $text, string $community_nickname, string $user_login, int $rate = 0){
        $this->id = $id;
        $this->filename = $filename;
        $this->text = $text;
        $this->community_nickname = $community_nickname;
        $this->user_login = $user_login;
        $this->rate = $rate;
    }

    public function getUserName(){
        return $this->user_login;
    }

    public function getCommunityName(){
        return $this->community_nickname;
    }

    public function getText(){
        return $this->text;
    }

    public function getRate(){
        return $this->rate;
    }

    public function getID(){
        return $this->id;
    }

    public function getPath(){
        return self::UPLOAD_DIRECTORY.$this->filename;
    }
}