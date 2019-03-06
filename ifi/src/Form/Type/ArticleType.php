<?php
/**
 * Created by IntelliJ IDEA.
 * User: redan
 * Date: 27/02/2019
 * Time: 18:55
 */
namespace App\Form\Type;
use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ArticleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('subtitle', TextType::class)
            ->add('corpus', TextareaType::class)
            ->add('tags', TextType::class, [
                'help' => 'Ex: cuisine actu love',
            ])
            ->add('createdAt', DateType::class, [
                'widget' => 'choice',
            ]);;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}