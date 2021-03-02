<?php

namespace App\Form;


use App\Entity\Usuario;
use App\Entity\Dispositivos;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Repository\UsuDispRepository;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UsuarioType extends AbstractType
{
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //dd($options);

        $builder
            ->add('dispositivos', EntityType::class, [
                'class' => Dispositivos::Class,
                'choice_label' => 'descripcion',
                'choice_value' => 'descripcion', //esto hace la magia (se llaman iguales)
                'placeholder' => 'Elegir un dispositivo',
                'multiple' => true,
            ]);

        /*$builder
            ->add('dispositivos', CollectionType::class, [
                'entry_type' => Dispositivos::Class,
                'allow_add' => true,
                'allow_delete' => true,
                'required' => false,
            ]);*/


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Usuario::class,
            'default_options' => array(),
        ]);
    }

}
