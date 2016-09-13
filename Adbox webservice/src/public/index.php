<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// config
require '../vendor/autoload.php';
spl_autoload_register(function ($classname) {
    require ("../classes/" . $classname . ".php");
});

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$config['db']['host']   = "localhost";
$config['db']['user']   = "root";
$config['db']['pass']   = "";
$config['db']['dbname'] = "myadbox_ws";
$app = new \Slim\App(["settings" => $config]);
$container = $app->getContainer();
// setting up logging
$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler("../logs/app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};
// setting up database connection
$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
        $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

// route declarations
$app->get('/hello/{name}', "sayHello" ) ;
$app->post('/api/shop/journal/', "getJournalByShop" );
$app->post('/api/shop/', "getShopByID" );
$app->post('/api/shopOwner/journal', "getJournalByOwner" );
$app->post('/api/shopOwner/shop/', "getShopsByOwner" );

// route error handling

$c = $app->getContainer();
$c['errorHandler'] = function ($c) {
    return function ($request, $response, $exception) use ($c) {
      $error_res = array('status' => false,"error"=>500 );
      $response=$response->withJson($error_res,500 );
        return $response;
    };
};
$c['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
      $error_res = array('status' => false,"error"=>404);
      $response=$response->withJson($error_res,404);
        return $response;
    };
};
// implementing callbacks
function sayHello(Request $request, Response $response)
{
  $name = $request->getAttribute('name');
  $response->getBody()->write("Hello, $name");
  $GLOBALS['container']->logger->addInfo($name." said Hello");
  return $response;
}

function getJournalByShop(Request $request, Response $response)
{
      $GLOBALS['container']->logger->addInfo("Someone said Hello");
      $data = $request->getParsedBody();
      if (!isset($data['id']) || !isset($data['date'])){
        $error_res = array('status' => false);
        $response=$response->withJson($error_res,500);

      }
      else {
        $id=filter_var($data['id'], FILTER_SANITIZE_STRING);
        $date=filter_var($data['date'], FILTER_SANITIZE_STRING);
        $statement =   $GLOBALS['container']->db->prepare("SELECT pub.id,media.*,TIME(timelaps.date_start) as time from pub"
                . " inner join media on pub.id_media=media.id "
                . "inner join timelaps on pub.id_timelaps=timelaps.id "
                . "where pub.id_shop=:id_shop AND timelaps.date_start Like :date");
        $statement->bindParam('id_shop', $id);
        $date=$date."%";
        $statement->bindParam('date', $date);
        $statement->execute();
        $results = $statement->fetchAll();
        $success_res = array("status" => "true","data"=>$results);
        $response=$response->withJson($success_res,200);
      }
}
function getShopByID(Request $request, Response $response)
{

}

function getJournalByOwner(Request $request, Response $response)
{

}

function getShopsByOwner(Request $request, Response $response)
{
      
}
$app->run()
?>
