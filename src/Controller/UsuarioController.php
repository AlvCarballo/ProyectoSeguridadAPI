<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Usuario;
use App\Form\RegisterType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UsuarioController extends AbstractController
{
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        // Crear formulario
		$usuario = new Usuario();
		$form = $this->createForm(RegisterType::class, $usuario);
		
        // Rellenar el objeto con los datos del form
		$form->handleRequest($request);
		
		// Comprobar si el form se ha enviado
		if($form->isSubmitted() && $form->isValid()){
			// Modificando el objeto para guardarlo
			$usuario->SetUrole(2);
			$usuario->SetUcreatedAt(new \Datetime('now'));
            $usuario->SetUdeleteAt(new \Datetime('1900-01-01 00:00:00'));
			
			// Cifrar contraseña
			$encoded = $encoder->encodePassword($usuario, $usuario->getUpassword());
			$usuario->setPassword($encoded);
			
			// Guardar usuario
			$em = $this->getDoctrine()->getManager();
			$em->persist($usuario);
			$em->flush();
			
			//Redirige a otra web de routes
			//return $this->redirectToRoute('Comentario');
		}
		
		
        return $this->render('usuario/register.html.twig', [
			'form' => $form->createView()
        ]);
    }
    public function login(AuthenticationUtils $autenticationUtils){
		$error = $autenticationUtils->getLastAuthenticationError();
		
		$lastUsername = $autenticationUtils->getLastUsername();
		
		return $this->render('usuario/login.html.twig', array(
			'error' => $error,
			'last_username' => $lastUsername
		));
	}
}
