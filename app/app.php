<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/CD.php';
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
        $app['twig']->render('home.html.twig', array('CDs' => CD::getAll()));
    });
    return $app;
?>
