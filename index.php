<?php

header('Content-Type: application/json');

include 'conn.php';
include 'article.php';

$connect = new Conn();
// if($connect->conn){
//     echo "Connected Successfully";
// }else{
//     echo "Failed : " . $connect->conn->connect_error;
// }
$db = $connect->conn;

$article = new Article($db);

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['article_id'])) {
        $article_id = $_GET['article_id'];

        $article->article_id = $article_id;
        $articleDetail = $article->getArticleDetail();

        if($articleDetail){
            echo json_encode($articleDetail);
        } else {
            echo json_encode(message('1'));
        }
    }elseif(isset($_GET['keyword'])) {
            $keyword = "%" . $_GET['keyword'] . "%";
    
            $article->title = $keyword;
            $article->content = $keyword;
            $seacrh_data = $article->searchDataArticle();
            if($seacrh_data){
                echo json_encode($seacrh_data);
            } else {
                echo json_encode(message('1'));
            }
    }else{
        $result = $article->getDataArticle();
        if($result->num_rows > 0){
            $dataArticle = array();
            while($row = $result->fetch_assoc()){
            $dataArticle[] = $row;
            }
            echo json_encode($dataArticle);
        }else{
            echo json_encode(message('1'));
        }
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = json_decode(file_get_contents("php://input"));
    $article->user_id = $data->user_id;
    $article->title = $data->title;
    $article->content = $data->content;
    if($article->addArticle()){
        echo json_encode(message('2'));
    }else{
        echo json_encode(message('3'));
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'PUT'){
    $data = json_decode(file_get_contents("php://input"));
    $article->article_id = $data->article_id;
    $article->user_id = $data->user_id;
    $article->title = $data->title;
    $article->content = $data->content;
    if($article->updateArticle()){
        echo json_encode(message('4'));
    }else{
        echo json_encode(message('5'));
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    $data = json_decode(file_get_contents("php://input"));
    $article->article_id = $data->article_id;
    if($article->deleteArticle()){
        echo json_encode(message('6'));
    }else{
        echo json_encode(message('7'));
    }
}

function message($mid){
    if ($mid == '1'){
        $msg = [
            'Message' => 'Article Not Found'
        ];
    }
    if ($mid == '2'){
        $msg = [
            'Message' => 'Article Added Successfully'
        ];
    }
    if ($mid == '3'){
        $msg = [
            'Message' => 'Failed to Add Article'
        ];
    }
    if ($mid == '4'){
        $msg = [
            'Message' => 'Article Updated Successfully'
        ];
    }
    if ($mid == '5'){
        $msg = [
            'Message' => 'Failed to Update Article'
        ];
    }
    if ($mid == '6'){
        $msg = [
            'Message' => 'Article Deleted Successfully'
        ];
    }
    if ($mid == '7'){
        $msg = [
            'Message' => 'Failed to Delete Article'
        ];
    }
    return $msg;
}

?>