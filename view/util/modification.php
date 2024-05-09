<?php 
    require_once '../../config.php'; // Include the database connection
    require_once '../../model/utilisateur.php'; // Include the database connection
    session_start();

    // If the variables exist and are not empty
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {

        // Check if the user exists
        $db = config::getConnexion();
        $check = $db->prepare('SELECT pseudo, email FROM utilisateurs WHERE id = ?');
        $check->execute(array($_SESSION['user_id']));
        $data = $check->fetch();
        $row = $check->rowCount();

        // If the query returns 0, the user does not exist
        if ($row === 0) {
            header('Location: ../../view/usermodif.php?reg_err=user_not_found');
            die();
        }

        $user = new Utilisateur(null,null,null,null,null,null,);
        $user->setPseudo($_POST['pseudo']);
        $user->setEmail(strtolower($_POST['email']));
        $user->setPassword($_POST['password']);
        $user->setPasswordRetype($_POST['password_retype']);

        // Check for different modification cases
        if ($user->getPseudo() === $data['pseudo'] && $user->getEmail() === $data['email'] && empty($user->getPassword())) {
            header('Location: ../../view/usermodif.php?reg_err=pasmodif');
            die();
        }

        if ($user->getPseudo() !== $data['pseudo'] || $user->getEmail() !== $data['email']) {
            // Update username if changed
            if ($user->getPseudo() !== $data['pseudo']) {
                $pseudo = $user->getPseudo();
                if (strlen($pseudo) <= 100) {
                    $modefy = $db->prepare("UPDATE `utilisateurs` SET `pseudo` = :pseudo WHERE id = :id");
                    $modefy->execute(array(
                        'pseudo' => $pseudo,
                        'id' => $_SESSION['user_id']
                    ));
                } else {
                    header('Location: ../../view/usermodif.php?reg_err=pseudo_length');
                    die();
                }
            }

            // Update email if changed
            if ($user->getEmail() !== $data['email']) {
                $email = $user->getEmail();
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $modefy = $db->prepare("UPDATE `utilisateurs` SET `email` = :email WHERE id = :id");
                    $modefy->execute(array(
                        'email' => $email,
                        'id' => $_SESSION['user_id']
                    ));
                } else {
                    header('Location: ../../view/usermodif.php?reg_err=email');
                    die();
                }
            }

            header('Location: ../../view/usermodif.php?reg_err=emailandp');
            die();
        }

        // Update password if provided
        if (!empty($user->getPassword())) {
            if ($user->getPassword() === $user->getPasswordRetype()) {
                $password = $user->getPassword();
                if (strlen($password) >= 8) {
                    $cost = ['cost' => 12];
                    $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                    $modefy = $db->prepare("UPDATE `utilisateurs` SET `password` = :password WHERE id = :id");
                    $modefy->execute(array(
                        'password' => $password,
                        'id' => $_SESSION['user_id']
                    ));

                    header('Location: ../../view/usermodif.php?reg_err=success');
                    die();
                } else {
                    header('Location: ../../view/usermodif.php?reg_err=password_length');
                    die();
                }
            } else {
                header('Location: ../../view/usermodif.php?reg_err=password');
                die();
            }
        }
    }

    // If something went wrong or the request method is not POST
    header('Location: ../../view/usermodif.php');
    die();
?>
