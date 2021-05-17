<?php
namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RegisterType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        //Añadimos los campos a la variable.
		$builder->add('uNombre', TextType::class, array(
			'label' => 'Nombre'
		))
		->add('uApellidos', TextType::class, array(
			'label' => 'Apellidos'
		))
		->add('uEmail', EmailType::class, array(
			'label' => 'Correo electrónico'
		))
		->add('uPassword', PasswordType::class, array(
			'label' => 'Constraseña'
		))
        ->add('uTelefono', TextType::class, array(
			'label' => 'Teléfono'
		))
        ->add('uDireccion', TextType::class, array(
			'label' => 'Dirección'
		))
		->add('submit', SubmitType::class, array(
			'label' => 'Registrarse'
		));
	}
}