<?php

namespace App\Controller;

use App\Entity\Article;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="article_lista")
     */
    public function index()
    {
        //return new Response('aaa');
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('articles/index.html.twig',[
            'articles' => $articles
        ]);
    }

    /**
     * @Route(/article/{id}, name="article_show")
     */
    public function show($id)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        return $this->render('articles/show.html.twig', array('article' => $article));
    }

    /**
     * @Route("/article/save")
     */
    public function save()
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        // Teste com alto acoplamento, o teste com DI será feito posteriormente
        $article = new Article();
        $article->setTitle('Title 1');
        $article->setBody('Body 1');

        $entityManager->persist($article);
        $entityManager->flush();

        return Response('Artigo salvo com id: ' . $article->getId());
    }
}