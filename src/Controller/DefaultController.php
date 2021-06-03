<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\User;
use Carbon\Carbon;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {

    // configuration de route avec yaml . . .

        $request = Request::createFromGlobals();
        dd($request);
        $aujourdhui = Carbon ::now();
        var_dump($aujourdhui->format('d/m/y'));
        
        // dump($article->getTitle());
        // dump($article);
        $villes = ['Nantes','Rennes','Paris'];
        
        return $this->render('default/index.html.twig', [
            'villes' => $villes,
        ]);
    }

    /**
     * @Route("/articles", name="articles")
     */
    public function articles(EntityManagerInterface $entityManager): Response
    {
        $articles = $entityManager->getRepository(Article::class)->findAll();
    
        return $this->render('default/articles.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/articles/{id}/{title}", name="article_show")
     */
    public function showArticle(Article $article): Response
    {
        return $this->render('default/article.html.twig', [
            'article' => $article,
        ]);
    }
}
