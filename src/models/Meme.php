<?php

class Meme
{
    private $text;
    private $filename;
    private $rate;
    private $post_date;
    private $community_nickname;
    private $user_login;

    //1 - vote up, -1 - vote down, 0
    private $rate_typ;

    const UPLOAD_DIRECTORY = '/../public/uploads/';

    public function __construct(string $filename, string $text, string $community_nickname, string $user_login){
        $this->filename = $filename;
        $this->text = $text;
        $this->community_nickname = $community_nickname;
        $this->user_login = $user_login;
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

    public function getPath(){
        return self::UPLOAD_DIRECTORY.$this->filename;
    }
}