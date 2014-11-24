<?php

namespace Layer\ShopBundle\Controller;

use Layer\ShopBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function createAction()
    {
        return $this->render('LayerShopBundle:Default:index.html.twig', array('name' => ''));
    }

    public function readAction($ProductId) {
        $response = new JsonResponse();
        $response->setData(array(
            'product' => array(
                'id' => $ProductId
            )
        ));
        return $response;
    }

    public function updateAction($productId) {

        return $this->render('LayerShopBundle:Default:index.html.twig', array('name' => $productId));
    }

    public function deleteAction($productId) {

        return $this->render('LayerShopBundle:Default:index.html.twig', array('name' => $productId));
    }

    public function formAction(Request $request, $productId = null) {
        if ($productId) {
            $product = $this->getDoctrine()
                ->getRepository('LayerShopBundle:Product')
                ->find($productId);

            if (!$product) {
                throw $this->createNotFoundException('No product found for id '.$productId);
            }
        }
        else {
            $product = new Product();
        }

        $form = $this->createForm('product', $product);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirect($this->generateUrl('layer_product_form_edit', array(
                'productId' => $product->getId()
            )));
        }

        return $this->render('LayerShopBundle:Product:create.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
