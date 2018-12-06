<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;    
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
/**
 * Description of UserType
 *
 * @author Somesh Jagarapu
 */
class RegistrationType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
    
        $builder->add('firstname', TextType::class, array(    
            'label' => 'Firstname',
            'required' => true,
            'attr' => array('class' => 'large_text'),
        ));
        
        $builder->add('lastname', TextType::class, array(    
            'label' => 'Lastname',
            'required' => true,
            'attr' => array('class' => 'large_text'),
        ));  
        
        //Email Address
        $builder->add('email', EmailType::class, array(
            'attr' => array('class' => 'large_text'),
            'label' => 'Email address',
            'required' => true
        ));
        
        //Username
        $builder->add('username', TextType::class , array(
            'label' => 'Username',
            'attr' => array('class' => 'large_text'),
            'required' => true
        ));
                     
        //Password
        $builder->add('plainPassword', RepeatedType::class, array(
            'type' => PasswordType::class,
            'first_name' => 'pass',
            'second_name' => 'confirm',
            'invalid_message' => 'Password not match',
            'options' => array('attr' => array('class' => 'password-field')),
            'required' => true,
            'error_bubbling' => false,
        ));
        
        // Contact details
         $builder->add('mobile', TextType::class, array(
                     'attr' => array('class' => 'large_text'),
                 ));
         
         $builder->add('dateofbirth', DateType::class, array(
            'data'=> new \DateTime("Now"),
            'required' => true,
        ));
        
          
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => User::class,
            'csrf_protection' => false,
            'validation_groups' => array('registration'),
        ));
    }

}  