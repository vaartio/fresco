<?php
/**
 * Created by PhpStorm.
 * User: lari
 * Date: 10/11/14
 * Time: 13:03
 */

namespace Acme\TaskBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Category {

  /**
   * @Assert\NotBlank()
   */
  public $name;
}