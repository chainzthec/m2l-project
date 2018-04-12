<?php

namespace Bundles\AppBundle\Controller;

use App;
use Bundles\AppBundle\Form\FormEntity;
use Bundles\UserBundle\Entity\UserEntity;
use Core\Controller\Controller;
use Core\Form\Form;
use Core\Form\FormEntityTraitement;
use Core\Request\Request;
use Core\Session\Session;

Class EquipeController extends Controller {

    public function __construct()
    {
        parent::__construct();

        if(!App::getUser()){
            App::redirectToRoute('login');
        }
    }

    /**
     * @RouteName list_equipe
     * @RouteUrl /admin/equipe/{:id}
     * @RouteParam id ([0-9]+)
     */
    public function showChefEquipeAction($params){
        $equipe = App::getTable('appBundle:equipe')->findById($params['id']);

        $this->render('appBundle:chef:equipe', [
            'employes' => $equipe->getEmploye()->all()
        ]);
    }

    /**
     * @RouteName list_equipes
     * @RouteUrl /admin/equipes
     */
    public function showEquipeAction(){

        $equipes = App::getTable('appBundle:equipe')->findAll();

        $this->render('appBundle:admin:equipes', [
            'equipes' => $equipes
        ]);
    }

    /**
     * @RouteName add_equipe
     * @RouteUrl /admin/equipes/add
     */
    public function addEquipeAction(){
        $form = $this->getEntityForm('appBundle:equipe', Request::all());

        $this->render('appBundle:includes:form', [
            'pageTitle' => "Ajout d'un nouveau equipe",
            'pageDesc' => "",
            'previousUrl' => "list_equipes",
            'previousParams' => [],
            'btnText' => "Retour à la liste des equipes",
            'form' => $form->render(),
        ]);
    }

    /**
     * @RouteName update_equipe
     * @RouteUrl /admin/equipes/update/{:id}
     * @RouteParam :id ([0-9]+)
     */
    public function updateEquipeAction($params){
        $entity = App::getTable('appBundle:equipe')->findById($params['id']);

        $form = $this->getEntityForm('appBundle:equipe', Request::all());
        $form->inject($entity);

        $this->render('appBundle:includes:form', [
            'pageTitle' => "Modification du equipe #" . $entity->getId(),
            'pageDesc' => "",
            'previousUrl' => "list_equipes",
            'previousParams' => [],
            'btnText' => "Retour à la liste des equipes",
            'form' => $form->render(),
        ]);
    }

    /**
     * @RouteName delete_equipe
     * @RouteUrl /admin/equipes/delete/{:id}
     * @RouteParam :id ([0-9]+)
     */
    public function deleteEquipeAction($params){
        App::getTable('appBundle:equipe')->remove($params['id']);
        Session::success('Le equipe à bien été supprimé !');
        App::redirectToRoute('list_equipes');
    }

}