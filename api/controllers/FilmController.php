<?php
require("C:/wamp/www/filmapi/api/components/bddQuery.php");
require("C:/wamp/www/filmapi/api/components/Put.php");
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
		$id = F3::get('PARAMS.id');
		$put = PUT::get();
		$mail = $put['userMAIL'];
		$mdp = md5($put['userMDP']);

		if(isset($mail) && isset($mdp))
		{
			$data = array('update user with ID : ' => $id,
							'new mail :' =>$mail,
							'new pasword' => $mdp);
			$req = $this->base->updateUtil($id,$mail,$mdp);
			Api::response(200,$data);
		}
		else
		{
			Api::response(400,array('error' => 'new mail or new pasword missing'));
		}
	}

	public function actionDeleteUser(){
		$id=F3::get("PARAMS.id");
			$data = array('ID deleted' => $id );
			$req = $this->base->supprUtil($id);
			Api::response(200,$data);
		}

//Fonctions pour la table film
	public function actionAllFilms(){	
		$data = $this->base->allFilms();
		Api::response(200,$data);
	}

	public function actionCreateFilm(){
		$titre = F3::get("POST.titre");
		$date = F3::get("POST.date");
		$resume = F3::get("POST.resume");
		if (isset($titre) && isset($date) && isset($resume))
		{
			$data = array("Title :" => $titre,
							"Date :" =>$date,
							"Resume :" =>$resume );
			$req = $this->base->ajoutFilm($titre,$date,$resume);
			Api::response(200,$data);
		}

		else
		{
			$date = array("Error" => "Title, date or resume is missing");
			Api::response(400,$data);
		}
	}
	public function actionOneFilm(){
		
	}



}
?>