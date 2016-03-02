<?php
/**
 * Created by PhpStorm.
 * User: Pizylon8
 * Date: 01/03/2016
 * Time: 22:01
 */
include_once('settings.php');
if(!isset($_SESSION))session_start();
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}
$_POST = json_decode(file_get_contents('php://input'), true);

if(isset($_POST['query']))
{
    if(isset($_POST['queryType']))
    {
       switch($_POST['queryType'])
       {
           case 'select':
               echo json_encode(getSelectResult($_POST['query']));

               break;

           default:
               echo json_encode(getOtherResult($_POST['query']));

               break;
       }


    }else echo 'no code';

}else echo 'no query';


function getSelectResult($query)
{
    $db=new DB();
    $conn=$db->getConnection();
    $res=$conn->query($query);
    $arr=array();
    while($row=$res->fetch_assoc())
    {
        array_push($arr,$row);
    }
    $conn->close();

    return $arr;

}

function getOtherResult($query)
{
    $db=new DB();
    $conn=$db->getConnection();
    $res=$conn->query($query);
    $arr=array();
    if($row=$res)
    {
        array_push($arr,$conn->affected_rows);
    }
    $conn->close();

    return $arr;

}