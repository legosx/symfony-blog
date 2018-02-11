<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Form\PostType;
use AppBundle\Repository\PostRepository;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    /**
     * @Route("/", defaults={"page": "1"}, name="homepage")
     * @Route("/", defaults={"page": "1"}, name="post_list")
     * @Route("/list/page/{page}", requirements={"page": "[1-9]\d*"}, name="post_list_paginated")
     */
    public function listAction(Request $request, $page)
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository(Post::class);
        /** @var PostRepository $rep */
        $posts = $rep->findLatest($page);

        return $this->render('post/list.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/show/{slug}", name="post_show")
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository(Post::class)->findOneBy([
            'slugEn' => $slug
        ]);

        if (!$post) {
            throw new NotFoundHttpException('Post does not exist');
        }

        return $this->render('post/show.html.twig', [
            'post' => $post
        ]);
    }

    /**
     * @Route("/add", name="post_add")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function addAction(Request $request)
    {
        $post = new Post;
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            $this->addFlash('success', 'New post successfully created');

            return $this->redirectToRoute('post_show', ['slug' => $post->getSlugEn()]);
        }

        return $this->render('post/edit.html.twig', [
            'post' => $post,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}", requirements={"id": "\d+"}, name="post_edit")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editAction(Request $request, Post $post)
    {
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Post $post */
            $post = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            $this->addFlash('success', 'Post successfully updated');

            return $this->redirectToRoute('post_show', ['slug' => $post->getSlugEn()]);
        }

        return $this->render('post/edit.html.twig', [
            'post' => $post,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/remove/{id}", name="post_remove")
     * @Security("has_role('ROLE_ADMIN')")
     * @Method("POST")
     */
    public function removeAction(Request $request, Post $post)
    {
        if (!$this->isCsrfTokenValid('remove', $request->request->get('token'))) {
            return $this->redirectToRoute('post_list');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($post);
        $em->flush();

        $this->addFlash('success', 'Post successfully removed');

        return $this->redirectToRoute('post_list');
    }
}
