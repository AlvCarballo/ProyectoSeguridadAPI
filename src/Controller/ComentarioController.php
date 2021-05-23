<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Comentario; //Usamos la entidad Comentario
use App\Entity\Usuario; //Usamos la entidad Usuario
//Usar request http fundation
use Symfony\Component\HttpFoundation\Request;


class ComentarioController extends AbstractController
{
    public function index(): Response
    {
        //Prueba de entidades y relaciones
        $em = $this->getDoctrine()->getManager();
       
        $comentario_repo = $this->getDoctrine()->getRepository(Comentario::class);
        $comentarios = $comentario_repo->findAll();
        /*
        //Recorremos todos los comentarios y lo guardamos en comentario
        foreach ($comentarios as $comentario){
            //Obtenemos el nombre del usuario que ha echo el comentario a travez de su id y lo imprimimos junto a su comentario
            echo $comentario->getCoidusuariofk()->getUusuario().' : '.$comentario->getCocomentario()."<br/>";
        }
        */
    

        return $this->render('comentario/index.html.twig', [
            'comentarios' => $comentarios,
        ]);
    }
    public function indexuser(): Response
    {
        //Prueba de entidades y relaciones
        $em = $this->getDoctrine()->getManager();
       
        $comentario_repo = $this->getDoctrine()->getRepository(Comentario::class);
        $comentarios = $comentario_repo->findAll();
        return $this->render('comentario/indexuser.html.twig', [
            'comentarios' => $comentarios,
        ]);
    }
    public function indexpagina(Request $request, string $copagina = null)
    {
        $var=$request->query->get("copagina");
        // var_dump("GET:".$copagina);
        
        //Prueba de entidades y relaciones
        $em = $this->getDoctrine()->getManager();
       
        $comentario_repo = $this->getDoctrine()->getRepository(Comentario::class);
        $comentarios = $comentario_repo->findAll();
        return $this->render('comentario/indexpagina.html.twig', [
            'comentarios' => $comentarios, 'copagina' => $copagina,
        ]);
    }
    public function listarUsuariosComentarios(){
        $em = $this->getDoctrine()->getManager();
        $usuario_repo = $this->getDoctrine()->getRepository(Usuario::class);
        $usuarios = $usuario_repo->findAll();

        //Recorremos los usuarios
        foreach ($usuarios as $usuario){
            //Obtenemos el nombre del usuario que ha echo el comentario a travez de su id y lo imprimimos junto a su comentario
            echo "<h1>{$usuario->getUnombre()} {$usuario->getUapellidos()}</h1>";

            //Optenemos los comentarios del usuario
            foreach ($usuario->getComentarios() as $comentario){
                echo $comentario->getCocomentario()."<br/>";  
            }
        }
        return $this->render('comentario/index.html.twig', [
            'controller_name' => 'ComentarioController',
        ]);
    }
    public function listarUsuarios(){
        $em = $this->getDoctrine()->getManager();
        $usuario_repo = $this->getDoctrine()->getRepository(Usuario::class);
        $usuarios = $usuario_repo->findAll();

        //Recorremos los usuarios
        foreach ($usuarios as $usuario){
            //Obtenemos el nombre del usuario que ha echo el comentario a travez de su id y lo imprimimos junto a su comentario
            echo "<h1>{$usuario->getUnombre()} {$usuario->getUapellidos()}</h1>";
        }
        return $this->render('comentario/index.html.twig', [
            'controller_name' => 'ComentarioController',
        ]);
    }
    public function detail(Comentario $comentario){
		if(!$comentario){
			return $this->redirectToRout('comentarios');
		}
		
		return $this->render('comentario/detail.html.twig',[
			'comentario' => $comentario
		]);
	}
//     public function creation(Request $request, UserInterface $user){
// 		$task = new Task();
// 		$form = $this->createForm(TaskType::class, $task);
		
// 		$form->handleRequest($request);
		
// 		if($form->isSubmitted() && $form->isValid()){
// 			$task->setCreatedAt(new \Datetime('now'));
// 			$task->setUser($user);
			
// 			$em = $this->getDoctrine()->getManager();
// 			$em->persist($task);
// 			$em->flush();
			
// 			return $this->redirect($this->generateUrl('task_detail', ['id' => $task->getId()]));
// 		}
		
// 		return $this->render('task/creation.html.twig',[
// 			'form' => $form->createView()
// 		]);
// 	}
	
// 	public function myTasks(UserInterface $user){
// 		$tasks = $user->getTasks();
				
// 		return $this->render('task/my-tasks.html.twig',[
// 			'tasks' => $tasks 
// 		]);	
// 	}
	
// 	public function edit(Request $request, UserInterface $user, Task $task){
// 		if(!$user || $user->getId() != $task->getUser()->getId()){
// 			return $this->redirectToRoute('tasks');
// 		}
		
// 		$form = $this->createForm(TaskType::class, $task);
		
// 		$form->handleRequest($request);
		
// 		if($form->isSubmitted() && $form->isValid()){
// 			//$task->setCreatedAt(new \Datetime('now'));
// 			//$task->setUser($user);
			
// 			$em = $this->getDoctrine()->getManager();
// 			$em->persist($task);
// 			$em->flush();
			
// 			return $this->redirect($this->generateUrl('task_detail', ['id' => $task->getId()]));
// 		}
		
// 		return $this->render('task/creation.html.twig',[
// 			'edit' => true,
// 			'form' => $form->createView()
// 		]);
// 	}
	
// 	public function delete(UserInterface $user, Task $task){
// 		if(!$user || $user->getId() != $task->getUser()->getId()){
// 			return $this->redirectToRoute('tasks');
// 		}
		
// 		if(!$task){
// 			return $this->redirectToRout('tasks');
// 		}
		
// 		$em = $this->getDoctrine()->getManager();
// 		$em->remove($task);
// 		$em->flush();
		
// 		return $this->redirectToRoute('tasks');
// 	}
}
