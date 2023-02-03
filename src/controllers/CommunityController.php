<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/CommunityRepository.php';

class CommunityController extends AppController
{
    private $communityRepository;

    public function __construct()
    {
        parent::__construct();
        $this->communityRepository = new CommunityRepository();
    }

    public function search(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if($contentType === "application/json"){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->communityRepository->getCommunityByName($decoded['search']));
        }
    }

    public function toggleCommunityStatus(string $nickname){
        if(isset($_SESSION['user_session'])){
            $user = unserialize($_SESSION['user_session']);

            $id = $this->communityRepository->convertNicknameToID($nickname);

            $this->communityRepository->toggleCommunityStatus($id, $user->getID());
            $user->refreshCommunity();
            $_SESSION['user_session'] = serialize($user);

            http_response_code(200);
        }
    }

    public function addNewCommunity(){
        if($this->isPost()){
            $repository = new CommunityRepository();

            $repository->addNewCommunity($_POST['comm-name'], $_POST['comm-shortname']);

            header("Location: /../../index.php");
            exit();
        }

        header("Location: /../../index.php");
        exit();
    }
}