<?php
class baseFilm
{
	public function __construct(){
		$this->db= new DB\SQL('mysql:host=localhost;port=3306;dbname=film','root','');
	}

	public function allFilms(){
		$resultat=$this->query("select titre from films");
		die(var_dump($resultat));
	}

	public function ajoutFilm($titre,$date){
		$resultat=$this->query("insert into films(nom_film,date_sortie) values (".$titre.",".$date.")");
	}

	public function creerUtil($mail,$mdp){
		$resultat=$this->query("insert into users(mail,mdp) values(".$mail.",".$mdp.")");
	}

	public function updateUtil($prevMail,$mail,$mdp){
		$resultat=$this->query("update users set mail = ".$mail."and mdp = ".$mdp." where mail=".$prevMail);
	}

	public function supprUtil($mail){
		$resultat=$this->query("delete from users where mail=".$mail);
	}
}
?>