<?php
/**
 * class Home
 * 
 * use to show the home page
 */
class UsersController {

    public function login($params) {

        $login = new Login('Users/login');
        $login->render();
    }

    public function showUsers($params) {

        $manager = new UsersManager();
        $users = $manager->findAll();
        //echo '<pre>'; print_r($users); exit;

        $view = new View('Users/show');
        $view->render(array(
            "titrePage" => "Utilisateurs",
            'users' => $users
        ));

    }

    public function profilUsers($params) {

        if(isset($params)) {
            extract($params);
            $idUser = $id;
        }
        else {
            $idUser = $_SESSION['idUser'];
        }
        
        $manager = new UsersManager();
        $user = $manager->find($idUser);

        $view = new View('Users/profil');
        $view->render(array(
            "titrePage" => "Profil utilisateur",
            'user' => $user
        ));

    }

    public function detailUsers($params) {

        if(isset($params)) {
            extract($params);
            $idUser = $id;
        }
        else {
            $idUser = $_SESSION['idUser'];
        }
        
        $manager = new UsersManager();
        $user = $manager->find($idUser);

        $view = new View('Users/detail');
        $view->render(array(
            "titrePage" => "Details utilisateur",
            'user' => $user
        ));

    }

    public function saveUsers($params) {

        extract($params);
        $manager = new UsersManager();

        //Si l'utilisateurexiste déjà, s'il s'agit donc d'une modification, et que le profil à changé, il faut modifier cela
        if(isset($values['idUser'])) {
            
            $old_profil = ($manager->find($values['idUser']))->getProfil();

            if($old_profil != $values['profil']) {

                if($old_profil == 1) {
                    $manage = new AdminManager();
                    $manage->deleteUser($values['idUser']);
                }
                else if($old_profil == 2) {
                    $manage = new ModerateurManager();
                    $manage->deleteUser($values['idUser']);
                }
                else if($old_profil == 3) {
                    $manage = new RedacteurManager();
                    $manage->deleteUser($values['idUser']);
                }
                else if($old_profil == 4) {
                    $manage = new ClientManager();
                    $manage->deleteUser($values['idUser']);
                }

                if($values['profil'] == 1) {
                    $manage = new AdminManager();
                    $manage->save($values);
                }
                else if($values['profil'] == 2) {
                    $manage = new ModerateurManager();
                    $manage->save($values);
                }
                else if($values['profil'] == 3) {
                    $manage = new RedacteurManager();
                    $manage->save($values);
                }
                else if($values['profil'] == 4) {
                    $manage = new ClientManager();
                    $manage->save($values);
                }

            }
        }

        $manager->save($values);

        //Si c'est un nouvel utilisateur, on va enregistrer son profil
        if(!isset($values['idUser'])) {
            $user = end($manager->findAll());
            $values['idUser'] = $user->getIdUser();
            $profil = $user->getProfil();

            if($profil == 1) {
                $manage = new AdminManager();
                $manage->save($values);
            }
            else if($profil == 2) {
                $manage = new ModerateurManager();
                $manage->save($values);
            }
            else if($profil == 3) {
                $manage = new RedacteurManager();
                $manage->save($values);
            }
            else if($profil == 4) {
                $manage = new ClientManager();
                $manage->save($values);
            }
        }

        $view = new View();
        $view->redirect('users.html');

    }

    public function saveSelf($params) {

        extract($params);
        $manager = new UsersManager();

        $manager->save($values);

        $view = new View();
        $view->redirect('profil.html');

    }

    public function showNotif($params) {

        $manager = new UsersManager();
        $manager->showNotif($params);

        $view = new View();
        $view->redirect('home.html');

    }

    public function hideNotif($params) {

        $manager = new UsersManager();
        $manager->hideNotif($params);
        
        $view = new View();
        $view->redirect('home.html');

    }

    public function activeUsers($params) {

        $manager = new UsersManager();
        $manager->activeUsers($params);
        $view = new View();
        $view->redirect('users.html');

    }

    public function inactiveUsers($params) {

        $manager = new UsersManager();
        $manager->inactiveUsers($params);
        $view = new View();
        $view->redirect('users.html');

    }

    public function certifiedUsers($params) {

        $manager = new UsersManager();
        $manager->certifiedUsers($params);
        $view = new View();
        $view->redirect('users.html');

    }

    public function uncertifiedUsers($params) {

        $manager = new UsersManager();
        $manager->uncertifiedUsers($params);
        $view = new View();
        $view->redirect('users.html');

    }

    public function delUsers($params) {

        extract($params);

        $manager = new UsersManager();
        $manager->delete($id);

        $view = new View();
        $view->redirect('users.html');

    }

    public function log($params) {

        if(!empty($params)) {
            extract($params);
            $manager = new UsersManager();
            $manager->log($values);
        }

        $view = new View();
        if(isset($_SESSION['email'])) {
            $view->redirect('home.html');
        }
        else {
            // exit;
            if(isset($_SESSION['etat']) && $_SESSION['etat'] == 1) {
                // $view->redirect('suspension.html');
                $view = new Alert();
                $view->render();
            }
            else
                $view->redirect('login.html');
        }

    }

    public function suspension() {

        $view = new Alert();
        $view->redirect('suspension.html');

    }

    public function logout() {

        $_SESSION = array();
        session_destroy();

        setcookie("users_login_tokken", "", time()-1, '/');
        setcookie("users_login_email", "", time()-1, '/');
        unset($_COOKIE["users_login_tokken"]);
        unset($_COOKIE["users_login_email"]);

        $view = new View();
        $view->redirect('accueil.html');

    }

}