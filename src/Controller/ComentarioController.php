<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Comentario; //Usamos la entidad Comentario
use App\Entity\Usuario; //Usamos la entidad Usuario

class ComentarioController extends AbstractController
{
    public function index(): Response
    {
        //Prueba de entidades y relaciones
        $em = $this->getDoctrine()->getManager();

        /*
        $comentario_repo = $this->getDoctrine()->getRepository(Comentario::class);
        $comentarios = $comentario_repo->findAll();
        //Recorremos todos los comentarios y lo guardamos en comentario
        foreach ($comentarios as $comentario){
            //Obtenemos el nombre del usuario que ha echo el comentario a travez de su id y lo imprimimos junto a su comentario
            echo $comentario->getCoidusuariofk()->getUusuario().' : '.$comentario->getCocomentario()."<br/>";
        }
        */
        $task_repo = $this->getDoctrine()->getRepository(Comentario::class);
        $usuario_repo = $this->getDoctrine()->getRepository(Usuario::class);
        $usuarios = $usuario_repo->findAll();

        //Recorremos los usuarios
        foreach ($usuarios as $usuario){
            //Obtenemos el nombre del usuario que ha echo el comentario a travez de su id y lo imprimimos junto a su comentario
            echo "<h1>{$usuario->getUnombre()} {$usuario->getUapellidos()}</h1>";

            //Optenemos los comentarios del usuario
            foreach ($usuario->getComentarios2() as $comentario){
                echo $comentario->getCocomentario()."<br/>";  
            }
        }

        return $this->render('comentario/index.html.twig', [
            'controller_name' => 'ComentarioController',
        ]);
    }
}
