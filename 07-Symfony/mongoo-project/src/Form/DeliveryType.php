<?php

namespace App\Form;

use App\Entity\Delivery;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class DeliveryType extends AbstractType
{




    private TokenStorageInterface $token;
    public function __construct(TokenStorageInterface $token)
    {
        $this->token = $token;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('status',HiddenType::class,[
                'data' => 'En attente',
            ])
            ->add('userid',EntityType::class,[
                'data' => $this->token->getToken()->getUser(),
                'class' => User::class
            ])
            ->add('Salad')
            ->add('drink')
            ->add('desert');

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Delivery::class,
        ]);
    }


}
