<?php

namespace Acme\TaskBundle\Controller;

use Acme\TaskBundle\Entity\Task;
use Acme\TaskBundle\Form\Type\ListType;
use Acme\TaskBundle\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeTaskBundle:Default:index.html.twig', array('name' => $name));
    }

    public function newAction(Request $request) {
      $task = new Task();
      $task->setTask('Write a blog post');
      $task->setDueDate(new \DateTime('tomorrow'));

      /*
      $form = $this->createFormBuilder($task)
        ->add('task', 'text')
        ->add('dueDate', 'date')
        ->add('save', 'submit', array('label' => 'Create a task'))
        ->add('savaAndAdd', 'submit', array('label' => 'Save and add'))
        ->getForm();
      */
      $form = $this->createForm('task', $task);
      //$form = $this->createForm(new ListType());

      $form->handleRequest($request);

      if ($form->isValid()) {
        $nextAction = 'acme_task_success';

        $nextAction = $form->get('saveAndAdd')->isClicked()
          ? 'acme_task_new'
          : 'acme_task_success';

        $em = $this->getDoctrine()->getManager();
        $em->persist($task);
        $em->flush();

        return $this->redirect($this->generateUrl($nextAction));
      }

      return $this->render('AcmeTaskBundle:Default:new.html.twig', array(
        'form' => $form->createView(),
      ));
    }

    public function successAction() {
      return new Response('Kiitos!');
    }
}
