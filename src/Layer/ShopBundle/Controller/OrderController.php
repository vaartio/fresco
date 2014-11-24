<?php

namespace Layer\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function createAction()
    {
        return $this->render('LayerShopBundle:Default:index.html.twig', array('name' => ''));
    }

    public function readAction($orderId) {
        $response = new JsonResponse();
        $response->setData(array(
            'order' => array(
                'id' => $orderId
            )
        ));
        return $response;
    }

    public function updateAction($orderId) {

        return $this->render('LayerShopBundle:Default:index.html.twig', array('name' => $orderId));
    }

    public function deleteAction($orderId) {

        return $this->render('LayerShopBundle:Default:index.html.twig', array('name' => $orderId));
    }

    public function formAction() {

    }
}
