<?php

session_start();

require_once 'Repository.php';
require_once __DIR__.'/../models/Meme.php';
require_once __DIR__.'/../models/User.php';

class MemeRepository extends Repository
{
    public function getMeme() : array{
        $stmt = $this->database->connect()->prepare('
            SELECT meme.id id_meme, * FROM public."Meme" meme INNER JOIN public."User" ON meme."ID_User" = "User".id Inner JOIN "Community" C on meme."ID_Community" = C.id ORDER BY meme."id" DESC;
        ');
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $r){
            $stmt_rate = $this->database->connect()->prepare('
                SELECT sum(rate_value) rate FROM "RateMeme" WHERE "ID_Meme" = ?;
            ');

            $stmt_rate->execute([$r['id_meme']]);
            $result_rate = $stmt_rate->fetch(PDO::FETCH_ASSOC);

            if($r['ID_Community']==0){
                $array[] = new Meme($r['id_meme'], $r['file_name'], $r['text'], "", $r['login'], (int)$result_rate['rate']);
            }
            else{
                $array[] = new Meme($r['id_meme'], $r['file_name'], $r['text'], $r['nickname'], $r['login'], (int)$result_rate['rate']);
            }
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

    public function removeMeme(int $id){
        $stmt = $this->database->connect()->prepare('
        DELETE FROM "Meme" where ID = ?;
        ');

        $stmt->execute([$id]);
    }

    public function like(int $id, int $user_id){
        if($this->checkIfUserRateMeme($id, $user_id)>=1){
            $stmt = $this->database->connect()->prepare('
                UPDATE "RateMeme" SET rate_value=1 where "ID_User" = ? AND "ID_Meme" = ?;
        ');
        }
        else{
            $stmt = $this->database->connect()->prepare('
                INSERT INTO "RateMeme" ("ID_User", "ID_Meme", "rate_value") VALUES (?, ?, 1);
        ');
        }

        $stmt->execute([$user_id, $id]);
    }

    public function dislike(int $id, int $user_id){
        if($this->checkIfUserRateMeme($id, $user_id)>=1){
            $stmt = $this->database->connect()->prepare('
                UPDATE "RateMeme" SET rate_value=-1 where "ID_User" = ? AND "ID_Meme" = ?;
        ');
        }
        else{
            $stmt = $this->database->connect()->prepare('
                INSERT INTO "RateMeme" ("ID_User", "ID_Meme", "rate_value") VALUES (?, ?, -1);
        ');
        }

        $stmt->execute([$user_id, $id]);
    }

    public function checkUserRate(int $id, int $user_id){
        $stmt = $this->database->connect()->prepare('
            SELECT "rate_value" rate FROM "RateMeme" WHERE "ID_User" = ? AND "ID_Meme" = ?
        ');

        $stmt->execute([$user_id, $id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['rate'];
    }

    private function getLastID(): string{
        $stmt = $this->database->connect()->prepare('
            SELECT max(ID) maxid FROM public."Meme";
        ');

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['maxid'];
    }

    public function checkRate($id_meme) : int{
        $stmt_rate = $this->database->connect()->prepare('
                SELECT sum(rate_value) rate FROM "RateMeme" WHERE "ID_Meme" = ?;
            ');

        $stmt_rate->execute([$id_meme]);
        $result_rate = $stmt_rate->fetch(PDO::FETCH_ASSOC);

        return $result_rate['rate'];
    }

    public function getMemeByCommunity(string $nickname){
        $stmt = $this->database->connect()->prepare('
            SELECT meme.id id_meme, * FROM public."Meme" meme INNER JOIN public."User" ON meme."ID_User" = "User".id Inner JOIN "Community" C on meme."ID_Community" = C.id WHERE c.nickname = ? ORDER BY meme."id" DESC;
        ');
        $stmt->execute([$nickname]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $r){
            $stmt_rate = $this->database->connect()->prepare('
                SELECT sum(rate_value) rate FROM "RateMeme" WHERE "ID_Meme" = ?;
            ');

            $stmt_rate->execute([$r['id_meme']]);
            $result_rate = $stmt_rate->fetch(PDO::FETCH_ASSOC);

            if($r['ID_Community']==0){
                $array[] = new Meme($r['id_meme'], $r['file_name'], $r['text'], "", $r['login'], (int)$result_rate['rate']);
            }
            else{
                $array[] = new Meme($r['id_meme'], $r['file_name'], $r['text'], $r['nickname'], $r['login'], (int)$result_rate['rate']);
            }
        }

        return $array;
    }

    public function checkIfUserRateMeme(int $id, int $user_id) : int{
        $stmt = $this->database->connect()->prepare('
            SELECT count(*) amount FROM "RateMeme" WHERE "ID_User" = ? AND "ID_Meme" = ?
        ');

        $stmt->execute([$user_id, $id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['amount'];
    }
}