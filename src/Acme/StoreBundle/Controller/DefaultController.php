<?php

namespace Acme\StoreBundle\Controller;

use Acme\StoreBundle\Entity\Category;
use Acme\StoreBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeStoreBundle:Default:index.html.twig', array('name' => $name));
    }

    public function createAction($name) {
      $product = new Product();
      $product->setName($name);
      $product->setPrice('19.99');
      $product->setDescription('big brother and the holding company record.');

      $em = $this->getDoctrine()->getManager();
      $em->persist($product);
      $em->flush();

      return new Response('Created product id ' . $product->getId());
    }

    public function showAllAction() {
      $em = $this->getDoctrine()->getManager();
      $products = $em->getRepository('AcmeStoreBundle:Product')->findAllOrderedByName();

      return $this->render('AcmeStoreBundle:Default:all.html.twig', array('products' => $products, 'category' => null));
    }

    public function showAction($id) {
      $product = $this->getDoctrine()
        ->getRepository('AcmeStoreBundle:Product')
        ->findOneByIdJoinedToCategory($id);
        //->find($id);

      if (!$product) {
        throw $this->createNotFoundException('No product found for id '.$id);
      }

      //$categoryNameTest = $product->getCategory()->getId();

      $categoryName = $product->getCategory()->getName();
      //$categoryName = "testi";

      return $this->render('AcmeStoreBundle:Default:index.html.twig', array('product' => $product, 'category' => $categoryName));
    }

    public function updateAction($id) {
      $em = $this->getDoctrine()->getManager();
      $product = $em->getRepository('AcmeStoreBundle:Product')->find($id);

      if (!$product) {
        throw $this->createNotFoundException('No product found for id '.$id);
      }

      $product->setName('New product name');
      $em->flush();

      return $this->redirect($this->generateUrl('_welcome'));
    }

    public function deleteAction($id) {
      $em = $this->getDoctrine()->getManager();
      $product = $em->getRepository('AcmeStoreBundle:Product')->find($id);
      $em->remove($product);
      $em->flush();

      return $this->redirect($this->generateUrl('_welcome'));
    }

    public function createProductAction($name) {
      $category = new Category();
      $category->setName('Main products');

      $product = new Product();
      $product->setName($name);
      $product->setPrice(19.99);
      // relate this product to the (main) category.
      $product->setCategory($category);

      $em = $this->getDoctrine()->getManager();
      $em->persist($category);
      $em->persist($product);
      $em->flush();

      return new Response('created product id: '.$product->getId().' and category id: '.$category->getId());
    }
}
