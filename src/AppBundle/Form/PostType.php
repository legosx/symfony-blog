<?php

namespace AppBundle\Form;

use AppBundle\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Defines the form used to create and manipulate blog posts.
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 * @author Yonel Ceruto <yonelceruto@gmail.com>
 */
class PostType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleEn', TextType::class, ['label' => 'Title'])
            ->add('slugEn', TextType::class, ['label' => 'Slug'])
            ->add('authorNameEn', TextType::class, ['label' => 'Author Name'])
            ->add('authorEmailEn', TextType::class, ['label' => 'Author Email'])
            ->add('postTextEn', TextareaType::class, ['label' => 'Post Text'])
            ->add('titleDe', TextType::class, ['label' => 'Title'])
            ->add('slugDe', TextType::class, ['label' => 'Slug'])
            ->add('authorNameDe', TextType::class, ['label' => 'Author Name'])
            ->add('authorEmailDe', TextType::class, ['label' => 'Author Email'])
            ->add('postTextDe', TextareaType::class, ['label' => 'Post Text'])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
