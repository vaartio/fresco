<?php
/**
 * Created by PhpStorm.
 * User: lari
 * Date: 10/11/14
 * Time: 11:23
 */

namespace Acme\TaskBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaskType extends AbstractType {
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder
      ->add('task')
      ->add('dueDate', null, array('widget' => 'single_text'))
      ->add('category', new CategoryType())
      ->add('saveAndAdd', 'submit', array('label' => 'Save and add'))
      ->add('save', 'submit');
  }

  public function getName() {
    return 'task';
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver) {
    $resolver->setDefaults(array(
      'data_class' => 'Acme\TaskBundle\Entity\Task'
    ));
  }
}