<?php

namespace App\Controller;

use App\Model\Grant;
use App\Model\Account;
use App\Repository\AccountRepository;
use App\Utils\Tools;

class RegisterController
{
    private AccountRepository $accountRepository;

    public function __construct()
    {
        $this->accountRepository = new AccountRepository();
    }

    /**
     * Méthode pour rendre une vue avec un template
     * @param string $template Le nom du template à inclure
     * @param string|null $title Le titre de la page
     * @param array $data Les données à passer au template
     * @return void
     */
    public function render(string $template, ?string $title, array $data = []): void
    {
        include __DIR__ . "/../../template/template_" . $template . ".php";
    }

    //Méthode pour ajouter un compte en BDD
    public function addAccount()
    {
        $data = [];
        //Verifier si le formulaire est submit
        if (isset($_POST["submit"])) {
            //vérifier si les champs sont remplis
            if (
                !empty($_POST["firstname"]) &&
                !empty($_POST["lastname"]) &&
                !empty($_POST["email"]) &&
                !empty($_POST["password"]) &&
                !empty($_POST["confirm-password"])
            ) {

                //vérifier si les 2 password sont identiques
                if ($_POST["password"] === $_POST["confirm-password"]) {
                    //vérifier si le compte n'existe pas
                    if (!$this->accountRepository->isAccountExistsByEmail($_POST["email"])) {
                        //Objet Account
                        $account = new Account();
                        $account->setFirstname(Tools::sanitize($_POST["firstname"]));
                        $account->setLastname(Tools::sanitize($_POST["lastname"]));
                        $account->setEmail(Tools::sanitize($_POST["email"]));
                        //Hashage du password
                        $hash = password_hash(Tools::sanitize($_POST["password"]), PASSWORD_DEFAULT);
                        $account->setPassword($hash);
                        //Création et ajout du droit
                        $grant = new Grant("ROLE_USER");
                        $grant->setId(1);
                        $account->setGrant($grant);
                        //Ajout du compte en BDD
                        $this->accountRepository->saveAccount($account);
                        $data["valid"] = "Le compte : " . $account->getEmail() . " a été ajouté en BDD";
                        //redirection dans 2 sec sur accueil
                        header("Location: /");
                    }
                    //Message d'erreur le compte existe déja
                    else {
                        $data["error"] = "Le compte existe déja";
                    }
                } 
                //Si différent on affiche un message d'erreur
                else {
                    $data["error"] = "Les mots de passe sont différents";
                }
                //Sinon on affiche un message d'erreur
            } else {
                $data["error"] = "Veuillez renseigner tous les champs du formulaire";
            }
        }
        return $this->render("register_account", "Inscription", $data);
    }

    //Méthode pour se connecter
    public function login()
    {
        $data = [];
        //vérifier si le formulaire est soumis
        if (isset($_POST["submit"])) {
            //vérifier si les 2 champs sont remplis
            if (!empty($_POST["email"]) && !empty($_POST["password"])) {
                //nettoyer les informations (email + password)
                $email = Tools::sanitize($_POST["email"]);
                $password = Tools::sanitize($_POST["password"]);
                //Récupérer le compte
                $account = $this->accountRepository->findAccountByEmail($email);
                //dd($account);
                //vérifier si le compte existe
                if ($account) {
                    //vérifier si le password est valide
                    if (password_verify($password, $account["password"])) {
                        //établir la connexion (créer les super de SESSION)
                        $_SESSION["firstname"] = $account["firstname"];
                        $_SESSION["lastname"] = $account["lastname"];
                        $_SESSION["email"] = $account["email"];
                        $_SESSION["id"] = $account["id"];
                        $_SESSION["connected"] = true;
                        //Afficher un message pour indiquer que l'on est connecté
                        $data["valid"] = $account["email"] . " est connecté";
                    } 
                    //Sinon on affiche un message d'erreur (erreur password)
                    else {
                        $data["error"] = "Les informations de connexion sont incorrectes";
                    }    
                }
                //Sinon on affiche un message d'erreur (erreur du mail)
                else {
                    $data["error"] = "Les informations de connexion sont incorrectes";
                }  
            }
            //Si les champs ne sont pas remplis
            else {
                $data["error"] = "Veuillez renseigner tous les champs du formulaire";
            }
        }
            
        return $this->render("login", "Connexion", $data);
    }

    public function logout()
    {
        session_destroy();
        header('Location: /');
    }
}
