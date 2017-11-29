<?php

namespace App\Controller;

use App\Article\CountViewUpdater;
use App\Article\NewArticleHandler;
use App\Article\UpdateArticleHandler;
use App\Article\ViewArticleHandler;
use App\Entity\Article;
use App\Form\ArticleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route(path="/article")
 */
class ArticleController extends Controller
{
    /**
     * @Route(path="/show/{slug}", name="article_show")
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository(Article::class);
        $article->findOneBy(array('slug' => $slug));
        return $this->render('Article/show.html.twig',array('Article' => Article::class ));
    }

    /**
     * @Route(path="/new", name="article_new")
     */
    public function newAction()
    {
        // Seul les auteurs doivent avoir access.
    }

    /**
     * @Route(path="/update/{slug}", name="article_update")
     * @Security("is_grander('ROLE_AUTHOR')")
     */
    public function updateAction(Request $request, NewArticleHandler $handle)
    {
        // Seul les auteurs doivent avoir access.
        $article = new Article();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ArticleType::class,$article);
        $form->handleRequest($request);
        if($form->isSubmitted() && ($form->isValid()))
        {
            $handle->handle($article);
            $em->persist($article);
            $em->flush();
        }
        return $this->render('Article/update.html.twig',array('form' => $form->createView()));

        // Seul l'auteur de l'article peut le modifier
    }
}
