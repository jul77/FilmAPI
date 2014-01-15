<?php
require("C:/wamp/www/filmapi/bddQuery.php");
class FilmController
{
	public function __construct(){}

	public function actionAllFilms(){
		$base = new baseFilm;
		$data = $base->allFilms();
		Api::response(200,$data);
	}

	public function actionAllUsers(){
		$data = $base->allUsers();
		Api::response(200,$data);
	}


	public function actionCreateUser(){
		if(isset($_POST['mail']) && isset($_POST['mdp']))
		{
			$data = array('create user with mail : '.$_POST['mail'].' and password '.$_POST['mdp']);
			$req = $base->creerUtil($_POST['mail'],$_POST['mdp']);
			Api::response(200,$data);
		}
		else
		{
			Api::response(400,array('error' => 'mail or password missing'));
		}
	}

	public function actionUpdateUser(){
		if(isset($_POST['Umail']) && isset($_POST['Umdp']))
		{
			$data = array('update user with mail : '.$_POST['mail'].' and password '.$_POST['mdp']);
			$req = $base->creerUtil($_POST['mail'],$_POST['mdp']);
			Api::response(200,$data);
		}
		else
		{
			Api::response(400,array('error' => 'mail or pasword missing'));
		}
	}

	public function actionDeleteUser(){
		if(isset($_POST['Dmail']))
		{
			$data = array('delete user with mail : '.$_POST['Dmail']);
			$req = $base->supprUtil($_POST['Dmail']);
			Api::response(200,$data);
		}



	}





}
?>