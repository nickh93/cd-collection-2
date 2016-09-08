<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/CD.php';
    require_once __DIR__.'/../src/Artist.php';
    date_default_timezone_set("America/New_York");

    //check to see if an array of cds exists and if it does not it creates a blank list_of_cds array
    session_start();
    if (empty($_SESSION['list_of_cds'])) {
      $_SESSION['list_of_cds'] = array();
    }

    //set up silex for app
    $app = new Silex\Application();

    //set up twig for views
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'
    ));

    $app->get('/', function() use ($app) {
      return
      $app['twig']->render('home.html.twig', array('cds' => CD::getAll()));
    });

    if(isset($_POST['form-submit'])) {
      $app->post('/', function() use ($app){
        $cd = new CD($_POST['band'], $_POST['album'], $_POST['year'], $_POST['image']);
        $cd->save();
        return $app['twig']->render('home.html.twig', array('cds' => CD::getAll()));
      });
    }
    else {
      $app->post('/', function() use ($app) {

        CD::deleteAll();

        return $app['twig']->render('home.html.twig');
      });
    }
    return $app;
?>
