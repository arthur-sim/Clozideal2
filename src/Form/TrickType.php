<?php

namespace App\Form;

use App\Entity\Trick;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\VideoType;
use App\Form\ImageType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TrickType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title')
                ->add('content', TextareaType::class)
                ->add('images', CollectionType::class, array(
                    'entry_type' => ImageType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'attr' => [
                        'class' => 'collection',
                    ],
                ))
                ->add('videos', CollectionType::class, array(
                    'entry_type' => VideoType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'attr' => [
                        'class' => 'collection',
                    ],
                ))
        ;
        /*$builder->addEventListener(FormEvents::POST_SET_DATA, function(FormEvent $event){
            $form=$event->getForm();
            foreach($form->get('images')->all() as $imageForm){
                $imageForm->getConfig()->setRequired(false);
            }
        });*/
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }

}
