<?php

require_once 'Repository.php';
require_once __DIR__."/../models/Community.php";

class CommunityRepository extends Repository
{
    public function getUserCommunity(int $userID = 0) : array{
        $stmt = $this->database->connect()->prepare('
            SELECT "Community".id, name, nickname from "Community" INNER JOIN "LikedCommunity" LC on "Community".id = LC."ID_Community" WHERE "ID_User" = ?;
        ');
        $stmt->execute([$userID]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $r){
            $array[] = new Community($r['name'], $r['nickname'], $r['id']);
        }

        return $array;
    }
}