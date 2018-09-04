<?php

namespace App\Controller;

use App\Entity\Article;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function index()
    {
        //return new Response('aaa');
        $articles = ['Artigo 1', 'Artigo 2'];
        return $this->render('articles/index.html.twig',[
            'articles' => $articles
        ]);
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