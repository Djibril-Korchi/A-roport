<?php

namespace modele;

class Pillot extends Perssone {
    private $id_pillot;
    private $date_debut;
    private $date_fin;
    private $nb_repos;
    private $ref_compagnie;
    private $mdp_provisoire;
    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }
    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getDaten()
    {
        return $this->daten;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $daten
     */
    public function setDaten($daten)
    {
        $this->daten = $daten;
    }

    /**
     * @param mixed $rue
     */
    public function setRue($rue)
    {
        $this->rue = $rue;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }
    /**
     * @return mixed
     */
    public function getIdPillot()
    {
        return $this->id_pillot;
    }

    /**
     * @param mixed $id_pillot
     */
    public function setIdPillot($id_pillot)
    {
        $this->id_pillot = $id_pillot;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->date_debut;
    }

    /**
     * @param mixed $date_debut
     */
    public function setDateDebut($date_debut)
    {
        $this->date_debut = $date_debut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * @param mixed $date_fin
     */
    public function setDateFin($date_fin)
    {
        $this->date_fin = $date_fin;
    }

    /**
     * @return mixed
     */
    public function getNbRepos()
    {
        return $this->nb_repos;
    }

    /**
     * @param mixed $nb_repos
     */
    public function setNbRepos($nb_repos)
    {
        $this->nb_repos = $nb_repos;
    }

    /**
     * @return mixed
     */
    public function getRefCompagnie()
    {
        return $this->ref_compagnie;
    }

    /**
     * @param mixed $ref_compagnie
     */
    public function setRefCompagnie($ref_compagnie)
    {
        $this->ref_compagnie = $ref_compagnie;
    }

    /**
     * @return mixed
     */
    public function getMdpProvisoire()
    {
        return $this->mdp_provisoire;
    }

    /**
     * @param mixed $mdp_provisoire
     */
    public function setMdpProvisoire($mdp_provisoire)
    {
        $this->mdp_provisoire = $mdp_provisoire;
    }
    public function inscription(){

        $bdd = new Bdd();
        $req=$bdd->getBdd()->prepare("SELECT * FROM pillot WHERE email=:email");
        $req->execute(array(
            'email'=>$this->getEmail()
        ));
        $verif=$req->fetchAll();
        if ($verif){
            header("Location: ../../vue/inscription.html");
        }else{
            $inscription=$bdd->getBdd()->query("INSERT INTO pillot(nom,prenom,email,daten,rue,ville,cp,mdp,nb_repos,mdp_provisoire,ref_compagnie) VALUES (:n,:p,:e,:d,:r,:v,:cp,:mdp,:nb,mdpp,:ref)");
            $inscription->execute(array(
                'n'=>$this->getNom(),
                'p'=>$this->getPrenom(),
                'e'=>$this->getEmail(),
                'd'=>$this->getDaten(),
                'r'=>$this->getAdresse(),
                'v'=>$this->getVille(),
                'cp'=>$this->getCp(),
                'mdp'=>$this->getMdp(),
                "nb"=>30,
                "mdpp"=>$this->getMdpProvisoire(),
                "ref"=>$this->getRefCompagnie()
            ));
            header("Location: ../../vue/connection.html");
        }
    }
    public function connexion(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT * FROM pillot WHERE email=:email and mdp=:mdp');
        $req->execute(array(
            "email" =>$this->getEmail(),
            "mdp" =>$this->getMdp(),
        ));
        $res = $req->fetch();
        if (is_array($res)){
            $this->setNom($res["nom"]);
            $this->setPrenom($res["prenom"]);
            $this->setDaten($res["daten"]);
            $this->setAdresse($res['addresse']);
            $this->setCp($res['cp']);
            $this->setVille($res['ville']);
            $this->setMdp($res['mdp']);
            $this->setRefCompagnie($res['ref_copagnie']);
            session_start();

            $_SESSION["user"] = $this;
            header("Location: ../../vue/accueil.php");
        }else{
            header("Location: ../../vue/connexion.php");
        }
    }

    public function editer(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE pillot SET nom=:n,prenom=:p,email=:e,daten=:d,rue=:r,ville=:v,cp=:cp,mdp=:mdp,nb_repos=:nb,mdp_provisoire=:mdpp,ref_compagnie=:ref WHERE id_pillot=:id_pillot');
        $res = $req->execute(array(
            'n'=>$this->getNom(),
            'p'=>$this->getPrenom(),
            'e'=>$this->getEmail(),
            'd'=>$this->getDaten(),
            'r'=>$this->getAdresse(),
            'v'=>$this->getVille(),
            'cp'=>$this->getCp(),
            'mdp'=>$this->getMdp(),
            "nb"=>30,
            "mdpp"=>$this->getMdpProvisoire(),
            "ref"=>$this->getRefCompagnie(),
            "id_pillot"=>$this->getIdPillot()
        ));

        if ($res){
            header("Location: ../../vue/accueil.php");
        }else{
            header("Location: ../../vue/edition.php");
        }
    }
    public function supprimer(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('DELETE FROM pillot WHERE id_pillot=:id_pillot');
        $res = $req->execute(array(
            "id_pillot" =>$this->getIdPillot(),
        ));

        if ($res){
            header("Location: ../../vue/accueil.php");
        }else{
            header("Location: ../../vue/connexion.php");
        }
    }
    public function vacance(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE pillot SET date_debut=:date_debut, date_in=:date_fin, nb_repos=nb_repos-:nb WHERE id_pillot=:id_pillot');
        $res = $req->execute(array(
            "date_debut"=>$this->getDateDebut(),
            "date_fin"=>$this->getDateFin(),
            "nb"=>$this->getNbRepos(),
            "id_pillot" =>$this->getIdPillot(),
        ));
    }

}