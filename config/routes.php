<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Slim\Http\Response as Response;

// require "../config/db.php";
require_once ("../config/db.php");

return function (App $app) {
    
    
    $app->get('/', \App\Action\HomeAction::class)->setName('home');
    //$app->get('/incentives', \App\Action\GetIncentive::class)->setName('insentive');

    // $app->get('/incentives', function ($request, $response, $args) {
    //     $sql = "SELECT * FROM app_incentives_data_v2";
    //     try{
    //         // Get DB Object
    //         $db = new db();
    //         // Connect
    //         $db = $db->connect();
    
    //         $stmt = $db->query($sql);
    //         $response = $stmt->fetchAll(PDO::FETCH_OBJ);
    //         $db = null;
    //         if($response){
    //             echo json_encode($response);
    //         }
            
    //     } catch(PDOException $e){
    //         echo '{"error": {"text": '.$e->getMessage().'}';
    //     }
    // });
    $app->get('/incentives', function() {
        
        $db = new db();
        $db = $db->connect();
        $query = "SELECT * FROM app_incentives_data_v2";
        $result = $db->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        //echo json_encode($data);
        header("Content-Type: application/json");
        echo json_encode($data);
        exit;       
        
    });
};