<?php

namespace WallOfQuotes\Bundle\AppBundle\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WallOfQuotes\Bundle\AppBundle\Entity\Author;
use WallOfQuotes\Bundle\AppBundle\Form\Type\AuthorType;

class AuthorController extends Controller
{
    public function indexAction(): Response
    {
        $authorRepository = $this->getDoctrine()->getRepository(Author::class);

        $authors = $authorRepository->findAll();

        return $this->render('@WallOfQuotesApp/Author/index.html.twig', [
            'authors' => $authors
        ]);
    }

    public function addAction(Request $request): Response
    {
        $author = new Author;

        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $author->setCreatedAt(new DateTime);
            $author->setUpdatedAt(new DateTime);

            $em->persist($author);
            $em->flush();

            return $this->redirectToRoute('wallofquotes_author_index');
        }

        return $this->render('@WallOfQuotesApp/Author/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function updateAction(Request $request, int $id): Response
    {
        $authorRepository = $this->getDoctrine()->getRepository(Author::class);
        $author = $authorRepository->find($id);

        $form = $this->createForm(AuthorType::class, $author, ['method' => 'PUT']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $author->setUpdatedAt(new DateTime);

            $em->persist($author);
            $em->flush();

            return $this->redirectToRoute('wallofquotes_author_index');
        }

        return $this->render('@WallOfQuotesApp/Author/update.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function deleteAction(int $id): Response
    {
        $authorRepository = $this->getDoctrine()->getRepository(Author::class);
        $author = $authorRepository->find($id);

        if (null !== $author) {
            $em = $this->getDoctrine()->getManager();

            $em->remove($author);
            $em->flush();
        }

        return $this->redirectToRoute('wallofquotes_author_index');
    }
}
