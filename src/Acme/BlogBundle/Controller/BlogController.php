<?php

namespace Acme\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function showAction($slug)
    {
        return $this->render('AcmeBlogBundle:Blog:show.html.twig', array('slug' => $slug));
    }
}
