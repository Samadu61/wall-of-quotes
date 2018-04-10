<?php

namespace WallOfQuotes\Bundle\AppBundle\Form\Type;

use Symfony\Bridge\Doctrine\Form\DataTransformer\CollectionToArrayTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WallOfQuotes\Bundle\AppBundle\Doctrine\ORM\AuthorRepositoryInterface;
use WallOfQuotes\Bundle\AppBundle\Entity\AuthorInterface;

class AuthorChoiceType extends AbstractType
{
    public $authorRepository;

    public function __construct(AuthorRepositoryInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if (array_key_exists('multiple', $options) && $options['multiple']) {
            $builder->addModelTransformer(new CollectionToArrayTransformer);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $criteria = [];
        $orderBy = ['name' => 'ASC'];

        $resolver
            ->setDefaults(array(
                'choices' => function (Options $options) use ($criteria, $orderBy): array {
                    $authors = $this->authorRepository->findBy($criteria, $orderBy);
                    $choices = [];

                    /** @var  AuthorInterface $author*/
                    foreach ($authors as $author) {
                        $choices[$author->getName()] = $author;
                    }

                    return $choices;
                },
            ))
        ;
    }

    public function getParent()
    {
        return ChoiceType::class;
    }

    public function getBlockPrefix()
    {
        return 'wallofquotes_author_choice';
    }
}
