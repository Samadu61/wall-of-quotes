<?php

namespace WallOfQuotes\Bundle\AppBundle\Controller;

use DateTime;
use function Symfony\Bridge\Twig\Extension\twig_is_root_form;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Intl\DateFormatter\DateFormat\QuarterTransformer;
use WallOfQuotes\Bundle\AppBundle\Entity\Quote;
use WallOfQuotes\Bundle\AppBundle\Form\Type\QuoteType;

class QuoteController extends Controller
{
    public function indexAction(): Response
    {
        $quoteRepository = $this->getDoctrine()->getRepository(Quote::class);

        $quotes = $quoteRepository->findAll();

        return $this->render('@WallOfQuotesApp/Quote/index.html.twig', [
            'quotes' => $quotes
        ]);
    }

    public function addAction(Request $request): Response
    {
        $quote = new Quote;

        $form = $this->createForm(QuoteType::class, $quote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $quote->setCreatedAt(new DateTime);
            $quote->setUpdatedAt(new DateTime);

            $em->persist($quote);
            $em->flush();

            return $this->redirectToRoute('wallofquotes_quote_index');
        }

        return $this->render('@WallOfQuotesApp/Quote/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function updateAction(Request $request, int $id): Response
    {
        $repository = $this->getDoctrine()->getRepository(Quote::class);
        $quote = $repository->find($id);

        $form = $this->createForm(QuoteType::class, $quote, [
            'method' => 'PUT'
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $quote->setUpdatedAt(new DateTime);

            $em->persist($quote);
            $em->flush();

            return $this->redirectToRoute('wallofquotes_quote_index');
        }

        return $this->render('@WallOfQuotesApp/Quote/update.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function deleteAction(Request $request, int $id): Response
    {
        $repository = $this->getDoctrine()->getRepository(Quote::class);

        $quote = $repository->find($id);
        if (null !== $quote) {
            $em = $this->getDoctrine()->getManager();

            $em->remove($quote);
            $em->flush();
        }

        return $this->redirectToRoute('wallofquotes_quote_index');
    }
}
