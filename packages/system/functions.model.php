<?php

require_once("../../packages/database/database.class.php");

class functions {

    public $total;

    public function searchAll($data, $page = 1) {
        $db = new Includes\Db();
        $select = $db->query("select * from content where type <> 'P' and title like :title or description like :description limit :page, 5", array(
            "title" => '%' . $data . '%',
            "description" => '%' . $data . '%',
            'page' => (($page - 1) * 5),
        ));
        $this->total = $db->single("select count(*) from content where type <> 'P' and title like :title or description like :description", array(
            "title" => '%' . $data . '%',
            "description" => '%' . $data . '%',
        ));
        return $select;
    }
	
	public function searchAllPages($data, $page = 1) {
        $db = new Includes\Db();
        $select = $db->query("select * from content where type = 'P' and title like :title or description like :description limit :page, 5", array(
            "title" => '%' . $data . '%',
            "description" => '%' . $data . '%',
            'page' => (($page - 1) * 5),
        ));
        $this->total = $db->single("select count(*) from content where type = 'P' and title like :title or description like :description", array(
            "title" => '%' . $data . '%',
            "description" => '%' . $data . '%',
        ));
        return $select;
    }

    public function search($type, $search, $page = 1, $order = "postDate", $data, $data2) {
        $db = new Includes\Db();

        if ($type <> 'A') {
            $select = $db->query("select * from content where type = :type and (title like :title or description like :description) and (postDate between :data and :data2) order by :order limit :page, 5", array(
                "type" => $type,
                "title" => '%' . $search . '%',
                "description" => '%' . $search . '%',
                "page" => (($page - 1) * 5),
                "order" => $order,
                "data" => $data,
                "data2" => $data2,
            ));

            $this->total = $db->single("select count(*) from content where type = :type and (title like :title or description like :description) and (postDate between :data and :data2)", array(
                "type" => $type,
                "title" => '%' . $search . '%',
                "description" => '%' . $search . '%',
                "data" => $data,
                "data2" => $data2,
            ));
        } else {
            $select = $db->query("select * from content where (title like :title or description like :description) and (postDate between :data and :data2) order by :order limit :page, 5", array(
                "title" => '%' . $search . '%',
                "description" => '%' . $search . '%',
                "page" => (($page - 1) * 5),
                "order" => $order,
                "data" => $data,
                "data2" => $data2,
            ));

            $this->total = $db->single("select count(*) from content where (title like :title or description like :description) and (postDate between :data and :data2)", array(
                "title" => '%' . $search . '%',
                "description" => '%' . $search . '%',
                "data" => $data,
                "data2" => $data2,
            ));
        }
        return $select;
    }

    public function pagination($total, $page = 1, $limit = 5) {
        $num_page = ceil($total / $limit);
        echo '<ul class="pagination">';
        error_reporting(error_reporting() & ~E_NOTICE);
        for ($i = 1; $i <= $num_page; $i++) {
            if ($i == $page) {
                echo '<li class="active"><a class="page" id="banana">' . $i . '</a></li>';
            } else {
                //todo fazer com ifisset o echo dos inputs
                echo '<li><a class="page">' . $i . '</a></li>';
            }
        }
        echo'</ul>';
    }

}

?>
