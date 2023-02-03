<?php

require_once 'Repository.php';
require_once __DIR__."/../models/Community.php";

class CommunityRepository extends Repository
{
    public function getUserCommunity(int $userID = 0){
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

    public function getCommunityByName(string $searchString){
        $searchString = '%'.strtolower($searchString).'%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "Community" WHERE LOWER(nickname) LIKE :search OR LOWER(name) LIKE :search
        ');

        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCommunityToFavourite(int $id, int $user_id){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO "LikedCommunity"("ID_User", "ID_Community") VALUES (?, ?);
        ');

        $stmt->execute([$user_id, $id]);
    }

    public function removeCommunityFromFavourite(int $id, int $user_id){
        $stmt = $this->database->connect()->prepare('
            DELETE FROM "LikedCommunity" WHERE "ID_User" = ? AND "ID_Community" = ?
        ');

        $stmt->execute([$user_id, $id]);
    }

    public function toggleCommunityStatus(int $id, int $user_id){
        $stmt = $this->database->connect()->prepare('
            SELECT count(*) amount FROM "LikedCommunity" WHERE "ID_User" = ? AND "ID_Community" = ?
        ');

        $stmt->execute([$user_id, $id]);
        $result = $stmt->fetch();

        if($result['amount']>0){
            $this->removeCommunityFromFavourite($id, $user_id);
        }
        else{
            $this->addCommunityToFavourite($id, $user_id);
        }
    }

    public function convertNicknameToID(string $nickname) : int {
        $stmt = $this->database->connect()->prepare('
            SELECT ID FROM "Community" WHERE "Community".nickname = ?;
        ');

        $stmt->execute([$nickname]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['id'];
    }

    public function convertNicknameToName(string $nickname) : string {
        $stmt = $this->database->connect()->prepare('
            SELECT Name FROM "Community" WHERE "Community".nickname = ?;
        ');

        $stmt->execute([$nickname]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['name'];
    }

    public function addNewCommunity(string $name, string $shortname){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO "Community"(name, nickname) VALUES (?, ?);
        ');

        $stmt->execute([$name, $shortname]);
    }
}