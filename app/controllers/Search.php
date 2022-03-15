<?php
    namespace app\controllers;

        class Search extends \app\core\Controller {

            private $publication;
            private $publicationsArray;

            private function updatePublications() {
                $this->publication = new \app\models\Publication();
                $this->publicationsArray = $this->publication->getAllPublic();
            }

            public function searchByTitle() {
                $this->updatePublications();
                $matchingPubs = array();
                if (isset($_POST['action'])) {
                    for ($i = 0; $i < count($this->publicationsArray); $i++) {
                        if (str_contains(strtolower($this->publicationsArray[$i]->publication_title), strtolower($_POST['search'])))
                            array_push($matchingPubs, $this->publicationsArray[$i]);
                    }
                    $this->view('subviews/search', $matchingPubs);
                }
            } 

            public function searchByContent() {
                $this->updatePublications();
                $matchingPubs = array();
                if (isset($_POST['action'])) {
                    for ($i = 0; $i < count($this->publicationsArray); $i++) {
                        if (str_contains(strtolower($this->publicationsArray[$i]->publication_text), strtolower($_POST['search'])))
                            array_push($matchingPubs, $this->publicationsArray[$i]);
                    }
                    $this->view('subviews/search', $matchingPubs);
                }
            }
        }