<?php

namespace Acme\TaskBundle\Controller;

use Acme\TaskBundle\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

      $form = $this->createFormBuilder($task)
        ->add('task', 'text')
        ->add('dueDate', 'date')
        ->add('save', 'submit', array('label' => 'Create a task'))
        ->getForm();

      return $this->render('AcmeTaskBundle:Default:new.html.twig', array(
        'form' => $form->createView(),
      ));
    }
}
