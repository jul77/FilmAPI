<?php
require("C:/wamp/www/filmapi/api/components/bddQuery.php");
class FilmController
{
	private $base;

	public function __construct(){$this->base = new baseFilm;}

//Fonctions pour la table user
	public function actionAllUsers(){
		$data = $this->base->allUsers();
		Api::response(200,$data);
	}


	public function actionCreateUser(){
		$mail = F3::get("POST.userMAIL");
		$mdp = F3::get("POST.userMDP");
		if(isset($mail) && isset($mdp))
		{
			$mdp = md5($mdp);
			$data = array('create user with mail : '.$mail.' and password : '.$mdp);
			$req = $this->base->creerUtil($mail,$mdp);
			Api::response(200,$data);
		}
		else
		{
			Api::response(400,array('error' => 'user mail or password is missing'));
		}
	}

	public function actionUpdateUser(){
		if(isset($_POST['Umail']) && isset($_POST['Umdp']))
		{
			$data = array('update user with mail : '.$_POST['mail'].' and password : '.$_POST['mdp']);
			$req = $base->creerUtil($_POST['mail'],$_POST['mdp']);
			Api::response(200,$data);
		}
		else
		{
			Api::response(400,array('error' => 'mail or pasword missing'));
		}
	}

	public function actionDeleteUser(){
		if(isset(/*$f3::get("PARAMS.id")*/$mail))
		{
			$data = array('delete user with mail : '.$_POST['Dmail']);
			$req = $base->supprUtil($_POST['Dmail']);
			Api::response(200,$data);
		}
//Fonctions pour la table film
	public function actionAllFilms(){	
		$data = $base->allFilms();
		Api::response(200,$data);
	}
/*	public function actionOneFilm(){
		if(isset($_POST['']))
	}*/



	}





}
?>