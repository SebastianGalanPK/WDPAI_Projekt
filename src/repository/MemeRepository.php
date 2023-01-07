<?php

session_start();

require_once 'Repository.php';
require_once __DIR__.'/../models/Meme.php';
require_once __DIR__.'/../models/User.php';

class MemeRepository extends Repository
{
    public function getMeme() : array{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Meme" meme INNER JOIN public."User" ON meme."ID_User" = "User".id Inner JOIN "Community" C on meme."ID_Community" = C.id ORDER BY meme."id" DESC;
        ');
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $r){
            $array[] = new Meme($r['file_name'], $r['text'], $r['nickname'], $r['login']);
        }

        return $array;
    }



    //Zwraca ID nowego mema z bazy danych.
    public function addMeme(string $text, string $file, string $id_community): string{
        $date = new DateTime();

        $stmt = $this->database->connect()->prepare('
            INSERT INTO "Meme" ("ID_User", "ID_Community", post_date, text, file_name) 
            VALUES (?, ?, ?, ?, ?);
        ');

        $user = unserialize($_SESSION['user_session']);

        $stmt->execute([
            $user->getID(),
            $id_community,
            $date->format('Y-m-d'),
            $text,
            $file
        ]);

        $lastID = (int) $this->getLastID();

        $file_parts = pathinfo($file);
        $file_name = "meme".$lastID.".".$file_parts['extension'];

        $stmt = $this->database->connect()->prepare('
            UPDATE "Meme" SET file_name = ? WHERE id=?;
        ');

        $stmt->execute([
            $file_name,
            $lastID
        ]);

        return $file_name;
    }

    private function getLastID(): string{
        $stmt = $this->database->connect()->prepare('
            SELECT max(ID) maxid FROM public."Meme";
        ');

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['maxid'];
    }
}