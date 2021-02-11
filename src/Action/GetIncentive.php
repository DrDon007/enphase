<?php

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
require "../config/db.php";

final class GetIncentive
{
    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {
        
        // Get DB Object
        $db = new db();
                    // Connect
        $db = $db->connect();
            
        $stmt = $db->query($sql);
        $response = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        if($response){
            echo json_encode($response);
        }
                    
                
         
    }
}