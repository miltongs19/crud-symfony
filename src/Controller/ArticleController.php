<?php

namespace App\Controller;

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
}