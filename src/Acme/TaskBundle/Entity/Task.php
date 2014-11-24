<?php
namespace Acme\TaskBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Task
 *
 * @ORM\Table(name="_task_demo_test")
 * @ORM\Entity()
 */
class Task
{
  /**
   * @var integer
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @var string
   *
   * @Assert\NotBlank()
   *
   * @ORM\Column(name="task", type="string", length=255)
   */
  protected $task;

  /**
   * @Assert\NotBlank()
   * @Assert\Type("\DateTime")
   *
   * @ORM\Column(name="dueDate", type="datetime", nullable=true)
   */
  protected $dueDate;

  /**
   * @var Category
   *
   * @Assert\Type(type="Acme\TaskBundle\Entity\Category")
   * @Assert\Valid()
   */
  protected $category;

  public function getId() {
    return $this->id;
  }

  /**
   * @return string
   */
  public function getTask()
  {
    return $this->task;
  }

  /**
   * @param $task
   * @return Task
   */
  public function setTask($task)
  {
    $this->task = $task;

    return $this;
  }

  /**
   * @return mixed
   */
  public function getDueDate()
  {
    return $this->dueDate;
  }

  /**
   * @param \DateTime $dueDate
   * @return Task
   */
  public function setDueDate(\DateTime $dueDate = null)
  {
    $this->dueDate = $dueDate;

    return $this;
  }

  /**
   * @return Category
   */
  public function getCategory() {
    return $this->category;
  }

  /**
   * @param Category $category
   * @return Task
   */
  public function setCategory(Category $category) {
    $this->category = $category;

    return $this;
  }
}
