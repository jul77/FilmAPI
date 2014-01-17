<?php
class baseFilm
{
	private $db;
	public function __construct(){
		$this->db= new DB\SQL('mysql:host=localhost;port=3306;dbname=films','root','');
	}

//Fonctions pour la table users
	public function allUsers()
	{
		$resultat=$this->db->query("select * from users");
		$tableau=$resultat->fetchAll();
		return $tableau;
	}
	
	public function creerUtil($mail,$mdp){
		$resultat=$this->db->query("insert into users(mail,mdp) values('".$mail."','".$mdp."')");
	}

	public function updateUtil($id,$mail,$mdp){
		$resultat=$this->db->query("update users set mail='".$mail."',mdp='".$mdp."' where id_user=".$id);
	}

	public function supprUtil($id){
		$resultat=$this->db->query("delete from users where id_user=".$id);
	}

//Fonctions pour la table film
	public function allFilms(){
		$resultat=$this->db->query("select * from films");
		$tableau=$resultat->fetchAll();
		return $tableau;
	}

	public function ajoutFilm($titre,$date,$resume){
		$resultat=$this->db->query("insert into films(nom_film,date_sortie,resume) values ('".$titre."','".$date."','".$resume."')");
		print_r($resultat);exit;
	}
}
?>