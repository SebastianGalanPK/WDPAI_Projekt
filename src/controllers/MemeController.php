<?php

require_once 'AppController.php';
require_once __DIR__."/../repository/MemeRepository.php";

class MemeController extends AppController{

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png','image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $memeRepository;

    private $messages = [];

    private $memes;

    public function __construct()
    {
        parent::__construct();
        $this->memeRepository = new MemeRepository();
    }

    public function addNewMeme(){
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){
            $repository = new MemeRepository();

            $filename = $repository->addMeme($_POST['text'], $_FILES['file']['name'], $_POST['id_community']);
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$filename
            );

            header("Location: /../../index.php");
            exit();
        }

        header("Location: /../../index.php");
        exit();
    }

    public function like(int $id){
        if(isset($_SESSION['user_session'])) {
            $user = unserialize($_SESSION['user_session']);

            $this->memeRepository->like($id, $user->getID());
            http_response_code(200);
        }
    }

    public function dislike(int $id){
        if(isset($_SESSION['user_session'])) {
            $user = unserialize($_SESSION['user_session']);

            $this->memeRepository->dislike($id, $user->getID());
            http_response_code(200);
        }
    }

    public function checkRate(int $id){
        $value = $this->memeRepository->checkRate($id);
        http_response_code(200);

        return $value;
    }

    public function community(string $community_nickname){
        $_SESSION['selected_community'] = $community_nickname;
        $this->memes = $this->memeRepository->getMemeByCommunity($community_nickname);

        $this->render('home', ['memes'=> $this->getMeme()]);
    }

    public function favourite(){
        if(isset($_SESSION['user_session'])) {
            $user = unserialize($_SESSION['user_session']);
            $this->memes = $this->memeRepository->getFavouriteMeme($user->getID());

            $this->render('home', ['memes'=> $this->getMeme()]);
        }
    }

    public function top(){
        $this->memes = $this->memeRepository->getTopMeme();

        $this->render('home', ['memes'=> $this->getMeme()]);
    }

    public function last(){
        $this->memes = $this->memeRepository->getLastMeme();

        $this->render('home', ['memes'=> $this->getMeme()]);
    }

    public function getMeme(){
        if($this->memes==null){
            return "null";
        }
        return $this->memes;
    }

    public function remove(int $id){
        if(isset($_SESSION['user_session'])) {
            $user = unserialize($_SESSION['user_session']);
            if($user->getRank()==1){
                $this->memeRepository->removeMeme($id);
                http_response_code(200);
            }
        }
    }

    public function changeFavouriteStatus(int $id){
        if(isset($_SESSION['user_session'])) {
            $user = unserialize($_SESSION['user_session']);

            $this->memeRepository->changeFavouriteStatus($id, $user->getID());
            http_response_code(200);
        }
    }

    private function validate(array $file): bool{
        if($file['size']>self::MAX_FILE_SIZE){
            $this->messages[] = 'File is too large for destination file system.';
            return false;
        }

        if(!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)){
            $this->messages[] = 'File type is not supported';
            return false;
        }

        return true;
    }
}