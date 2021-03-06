<?php

namespace Witty\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Witty\ProjectBundle\Entity\Comment;

class ProjectController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction($mode_affichage = 'focus_one_project')
    {
		$em = $this->getDoctrine()->getEntityManager();
		$members_count = $em->getRepository('WittyUserBundle:User')->getMembersNumber();
	
		return $this->render('WittyProjectBundle:Project:projects.html.twig', 
			array(
				'mode_affichage' => $this->container->getParameter('witty.design.project.list.mode_affichage'),
				'members_count' => $members_count
			)
		);
    }
	
	//L'argument "slug" peut être un slug ou un id
    public function displayAction($slug)
    {
		$em = $this->getDoctrine()->getEntityManager();
		
		if (!is_numeric($slug) == 'string')
			$project = $em->getRepository('WittyProjectBundle:Project')->findOneBySlug($slug);
		else
			$project = $em->getRepository('WittyProjectBundle:Project')->findOneById($slug);

		$edinautes = array();
		foreach($project->getEdinautes() as $id)
		{
			$edinautes[] = $em->getRepository('WittyUserBundle:User')->find($id);
		}
		
		$news = $em->getRepository('WittyProjectBundle:News')->findAllOrderedByCreationDate($project->getId());

		return $this->render('WittyProjectBundle:Project:project.html.twig', 
			array(
				'project' => $project, 
				'edinautes' => $edinautes,
				'news' => $news
			));
    }
	
    public function projectsListAction($projects_type = 'not_funded', $mode_affichage = 'focus_one_project')
    {
		$em = $this->getDoctrine()->getEntityManager();
		$fundsRaised = 0;
		
		switch($projects_type)
		{
			case 'not_funded':
				$projects = $em->getRepository('WittyProjectBundle:Project')->findNotFundedOrderedByPriority();
				break;
				
			case 'funded':
				$projects = $em->getRepository('WittyProjectBundle:Project')->findFundedOrderedByPriority();
				foreach($projects as $project)
				{
					$fundsRaised += $project->getFunding();
				}
				break;
				
			case 'coming_soon':
				$projects = $em->getRepository('WittyProjectBundle:Project')->findComingSoonOrderedByPriority();
				break;
				
			default:
				$projects = $em->getRepository('WittyProjectBundle:Project')->findNotFundedOrderedByPriority();
				break;
		}
		
		return $this->render('WittyProjectBundle:Project:projects_list.html.twig', 
			array(
				'projects' => $projects,
				'projects_type' => $projects_type,
				'mode_affichage' => $mode_affichage,
				'fundsRaised' => $fundsRaised
			)
		);
    }
	
	/**
     * @Secure(roles="ROLE_USER")
     */
    public function confirmationAction($id)
    {
		$em = $this->getDoctrine()->getEntityManager();
		$reward = $em->getRepository('WittyProjectBundle:Reward')->findOneById($id);
		
		return $this->render('WittyProjectBundle:Project:confirmation.html.twig', array(
					'reward' => $reward
					)
				);
    }	
	
    public function blocRewardsAction($project, $rewardId = null)
    {
		$em = $this->getDoctrine()->getEntityManager();
		$rewards = $em->getRepository('WittyProjectBundle:Reward')->findAllOrderedByCost($project->getId());
	
		$parametres = array(
						'project' => $project,
						'rewards' => $rewards,
						'linking' => ($project->getFunded() == 0) && ($project->getState() != 'coming_soon'),
						'texte_contreparties' => ($project->getFunded() == 0)? 'Sélectionnez votre contrepartie' : 'Aperçu des contreparties',
						'rewardId' => $rewardId
					);

		if ($rewardId) $parametres['rewardId'] = $rewardId;
	
		return $this->render('WittyProjectBundle:Project:blocRewards.html.twig', $parametres);
    }
	
    public function blocRecapRewardAction($rewardId)
    {
		$reward = $this->getDoctrine()->getEntityManager()->getRepository("WittyProjectBundle:Reward")->find($rewardId);

		return $this->render('WittyProjectBundle:Project:blocRecapReward.html.twig', array(
						'reward' => $reward
					)
				);
    }
	
	//Ajoute le commentaire passé en POST au projet
    public function addCommentAction()
    {
		$request = $this->get('request');	

		if ($request->getMethod() === 'POST')
		{
			$em = $this->getDoctrine()->getEntityManager();
			
			$project = $em->getRepository('WittyProjectBundle:Project')->find($request->request->get('projectId'));

			$comment = new Comment();
			$comment->setProject($project);
			$comment->setUser($this->getUser());
			$comment->setContent($request->request->get('content')); //Pour que les sauts de lignes soient visibles à l'affichage, il faut convertir les "new line" en balises <br/>
			
			if ($this->container->get('validator')->validate($comment))
			{
				$project->addComment($comment);
				$this->getUser()->addProjectComment($comment);
			
				//Ajout du commentaire
				$em->persist($comment);
				$em->persist($project);
				$em->persist($this->getUser());
				$em->flush();
			
				return $this->blocCommentsAction($project->getId());
			}
			else throw new \Exception("Erreur d'ajout du commentaire");
		}
		else throw new \Exception("Vous ne pouvez pas ajouter ce commentaire");
    }
	
    public function blocCommentsAction($projectId)
    {
		$em = $this->getDoctrine()->getEntityManager();
		$comments = $em->getRepository('WittyProjectBundle:Comment')->findAllOrderedByCreationDate($projectId);

		return $this->render('WittyProjectBundle:Project:blocComments.html.twig', array(
						'comments' => $comments
					)
				);
    }
}
