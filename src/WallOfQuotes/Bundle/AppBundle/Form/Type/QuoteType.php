<?php

namespace WallOfQuotes\Bundle\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WallOfQuotes\Bundle\AppBundle\Entity\Quote;

class QuoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', TextType::class, ['required' => true])
            ->add('nickNameAuthor', TextType::class, ['required' => true])
            ->add('date', DateType::class, ['required' => true])
            ->add('author', AuthorChoiceType::class, [
//                'multiple' => false,
//                'expanded' => false,
                'label' => 'wallofquotes.authors.author',
//                'placeholder' => 'wallofquotes.form.author_choose',
                'required' => true
            ])
            ->add('save', SubmitType::class, ['label' => 'wallofquotes.ui.add'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Quote::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id' => 'quote_item'
        ]);
    }
}
