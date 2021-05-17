<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Comentario;

class ComentarioController extends AbstractController
{
    public function index(): Response
    {
        //Prueba de entidades y relaciones
        $em = $this->getDoctrine()->getManager();
        $comentario_repo = $this->getDoctrine()->getRepository(Comentario::class);
        $comentarios = $comentario_repo->findAll();

        foreach ($comentarios as $comentario){
            echo $comentario->getCocomentario()."<br/>";
        }

        return $this->render('comentario/index.html.twig', [
            'controller_name' => 'ComentarioController',
        ]);
    }
}
