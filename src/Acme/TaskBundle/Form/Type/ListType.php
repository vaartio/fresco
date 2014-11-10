<?php
/**
 * Created by PhpStorm.
 * User: lari
 * Date: 10/11/14
 * Time: 11:42
 */

namespace Acme\TaskBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ListType extends AbstractType {

  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder->add('someTask', 'task');
  }

  public function getName() {
    return 'list';
  }
} 