<?php
class baseFilm
{
	public function __construct(){
		$this->db= new DB\SQL('mysql:host=localhost;port=3306;dbname=films','root','');
	}

//Fonctions pour la table users
	public function allUsers()
	{
		$resultat=$this->db->query("select * from users");
	}
	public function creerUtil($mail,$mdp){
		$resultat=$this->db->query("insert into users(mail,mdp) values(".$mail.",".$mdp.")");
	}

	public function updateUtil($prevMail,$mail,$mdp){
		$resultat=$this->bd->query("update users set mail = ".$mail."and mdp = ".$mdp." where mail=".$prevMail);
	}

	public function supprUtil($id){
		$resultat=$this->bd->query("delete from users where id=".$id);
	}

//Fonctions pour la table film
	public function allFilms(){
		$resultat=$this->bd->query("select titre from films");
	}

	public function ajoutFilm($titre,$date){
		$resultat=$this->bd->query("insert into films(nom_film,date_sortie) values (".$titre.",".$date.")");
	}
}
?>