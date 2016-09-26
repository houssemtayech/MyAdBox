<?php

use Workerman\Worker;
use Workerman\WebServer;
use PHPSocketIO\SocketIO;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\Client;


include __DIR__ . '\autoload.php';
// listen port 2021 for socket.io client
$io = new SocketIO(2021);
session_start();

$_SESSION["bid_array"] = array();
$_SESSION["sockets"]   = array();

$io->on('connection', function($socket) use ($io)
{
    $_SESSION["sockets"][$socket->id]=$socket;

    $socket->on('register', function($msg) use ($io,$socket)
    {
        echo "registring ... ".$socket->id."\n";
        $obj    = json_decode($msg);
        $bid    = $obj->bid;
        $client = $obj->client;
        if (!isset($_SESSION["bid_array"]["$bid"])) {
            $_SESSION["bid_array"]["$bid"] = array();
        }
        $data = array(
            "client" => $client,
            "socket" => $socket->id
        );
        array_push($_SESSION["bid_array"]["$bid"], $data);
    });
    $socket->on('disconnect', function($msg) use ($io,$socket)
    {
        echo "disconnect".$socket->id."\n";
        foreach ($_SESSION["bid_array"] as $key => $value) {
          foreach ($value as $ind=>$sub_key ) {
                if ($sub_key["socket"] == $socket->id) {
                    unset($_SESSION["bid_array"][$key][$ind]);
                }
            }
        }
        unset($_SESSION["sockets"][$socket->id]);
    });
    $socket->on('bidding',function($data) use ($io,$socket)
    {
      echo "bidding \n";
      // TODO: broadcast to client new price
      $obj=json_decode($data);
      $res=json_encode(array("price"=>$obj->price,"timestamp"=>$obj->timestamp,"name"=>$obj->name));
      $socket->broadcast->emit("update",$res);


    });
});

Worker::runAll();
