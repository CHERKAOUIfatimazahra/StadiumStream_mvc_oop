<?php
namespace Controllers;
require_once 'model/TeamModel.php';
class TeamController
{
    function indexAction() {
        $teams = latest();
        require_once 'views/liste_teams.php';
    }

    function createAction()
    {
        require_once 'views/create.php';
    }

    function storeAction()
    {
        create();

        header('location:index.php');
    }

    function editAction()
    {
        $id_team = $_GET['id_team'];
        $team = view($id_team);
        require_once 'views/edit.php';
    }

    function updateAction()
    {
        extract($_POST);
        edit($id_team, $name, $discription);
        
        header('location:index.php');
    }

    function deleteAction()
    {
        $id_team = $_GET['id_team'];
        require_once 'views/delete.php';
    }

    function destroyAction()
    {
        destroy($_GET['id_team']);

        header('location:index.php');
    }
}
