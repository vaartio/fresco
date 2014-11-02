<?php
/**
 * Created by PhpStorm.
 * User: lari
 * Date: 02/11/14
 * Time: 21:48
 */

namespace Acme\DemoBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class RandomController extends Controller {
  public function indexAction($limit)
  {
    $number = rand(1, $limit);

    return $this->render('AcmeDemoBundle:Random:index.html.twig',
      array('number' => $number)
    );

    //return new Response('<html><body>Number: '.rand(1, $limit).'</body></html>');
  }
}