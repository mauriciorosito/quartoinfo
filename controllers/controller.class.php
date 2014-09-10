<?php

abstract class Controller {

    abstract protected function selectOne($obj);

    abstract protected function selectAll();

    abstract protected function insert($obj);

    abstract protected function update($obj);

    abstract protected function delete($obj);

    public function actionControl($action, $obj = false) {
        switch ($action) {
            case "insert":
                return $this->insert($obj);
                break;
            case "update":
                return $this->update($obj);
                break;
            case "delete":
                return $this->delete($obj);
                break;
            case "selectOne":
                return $this->selectOne($obj);
                break;
            case "selectPreviewNews":
                return $this->selectPreviewNews();
                break;
            case "selectPreviewEvents":
                return $this->selectPreviewEvents();
                break;
            case "selectPreviewOportunities":
                return $this->selectPreviewOportunities();
                break;

            case "selectAllEvents":
                return $this->selectAllEvents($obj);
                break;

            case "selectAllNews":
                return $this->selectAllNews($obj);
                break;

            case "selectAllOportunities":
                return $this->selectAllOportunities($obj);
                break;

            case "selectAll":
                return $this->selectAll($obj);
                break;

            case "selectMaxId":
                return $this->selectMaxId();
                break;

            case "selectIdMedia":
                return $this->selectIdMedia($obj);
                break;

            case "selectMedias":
                return $this->selectMedias($obj);
                break;
            case "generatePassword":
                return $this->generatePassword();
                break;
            case "checkEmail":
                return $this->checkEmail($obj);
                break;
            case "updatePassword":
                return $this->updatePassword($obj);
                break;
            case "selectAllCategories":
                return $this->selectAllCategories($obj);
                break;
            case "updateProfileCategory":
                return $this->updateProfileCategory($obj);
                break;
        }
    }

}
