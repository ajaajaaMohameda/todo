<?php
namespace App\Controller;

use App\Entity\Task;
use App\Form\Type\TaskType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
class TaskController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function new()
    {
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new DateTime('tomorrow'));

        $form = $this->createForm(TaskType::class, $task);

        return $this->render('task/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}