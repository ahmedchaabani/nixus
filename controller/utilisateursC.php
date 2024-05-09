<?php
require 'C:\xampp\htdocs\web\view\vendor\autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

class utilisateursC
{
    protected $db;

    public function __construct()
    {
        $this->db = config::getConnexion();
    }

    function registerUser($user)
    {
        $email = strtolower($user->getEmail());

        $check = $this->db->prepare('SELECT pseudo, email FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if ($row > 0) {
            return 'exists';
        }

        $password = $user->getPassword();
        $passwordRetype = $user->getPasswordRetype();

        if (!empty($user->getPseudo()) && !empty($email) && !empty($password) && !empty($passwordRetype)) {
            if ($password === $passwordRetype) {
                if (strlen($password) >= 8) {
                    $cost = ['cost' => 12];
                    $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                    $insert = $this->db->prepare("INSERT INTO utilisateurs (pseudo, email, password, role) VALUES (:pseudo, :email, :password, :role)");
                    $insert->execute(
                        array(
                            'pseudo' => $user->getPseudo(),
                            'email' => $email,
                            'password' => $password,
                            'role' => $user->getRole()
                        )
                    );

                    return 'success';
                } else {
                    return 'password_length';
                }
            } else {
                return 'password';
            }
        } else {
            return 'missing_fields';
        }
    }

    public function loginUser($user)
    {
        // Check if the user exists
        $check = $this->db->prepare('SELECT id, pseudo, email, password, role FROM utilisateurs WHERE email = ?');
        $check->execute(array($user->getEmail()));
        $data = $check->fetch();

        if (!$data) { // If user does not exist
            return 'not_exist';
        }

        // Verify password
        if (password_verify($user->getPassword(), $data['password'])) {
            // Start a new session and store user data
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['pseudo'] = $data['pseudo'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['role'] = $data['role'];

            // Redirect based on user role
            switch ($data['role']) {
                case 'admin':
                    return 'admin';
                case 'user':
                    return 'user';
                default:
                    return 'unknown_role';
            }
        } else {
            return 'wrong_password';
        }
    }


    function GetUSER($user_id)
    {
        $query = $this->db->prepare("SELECT * FROM utilisateurs WHERE id = ?");
        $query->execute([$user_id]);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    function getAllUsers()
    {
        $query = $this->db->query("SELECT * FROM utilisateurs");
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    function deleteUser($user_id)
    {
        $query = $this->db->prepare("DELETE FROM utilisateurs WHERE id = ?");
        $query->execute([$user_id]);
    }

    function updateUserToAdmin($user_id)
    {
        $query = $this->db->prepare("UPDATE utilisateurs SET role = 'admin' WHERE id = ?");
        $query->execute([$user_id]);
    }

    function makeUserAdmin($user_id)
    {
        $query = $this->db->prepare("UPDATE utilisateurs SET role = 'user' WHERE id = ?");
        $query->execute([$user_id]);
    }

    public function searchUsers($keyword)
    {
        // Utilisez une requête SQL pour rechercher les utilisateurs par pseudo, email ou rôle
        $query = "SELECT * FROM utilisateurs WHERE pseudo LIKE :keyword OR email LIKE :keyword OR role LIKE :keyword";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getUsersRoleStats()
    {
        $query = "SELECT role, COUNT(*) AS count FROM utilisateurs GROUP BY role";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private static function generateVerificationCode()
    {
        return substr(md5(uniqid(mt_rand(), true)), 0, 6); // Générer un code de 6 caractères
    }


    public static function sendVerificationCode()
    {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];

            // Générer un code de vérification
            $verificationCode = self::generateVerificationCode();

            // Stocker l'e-mail dans la variable de classe
            setcookie('reset_email', $email, time() + (86400 * 30), "/"); // 86400 = 1 jour

            // Appel de la fonction pour envoyer l'e-mail avec PHPMailer
            self::sendVerificationCodeByEmail($email, $verificationCode);
        } else {
            // Gérer le cas où l'e-mail n'est pas défini dans le formulaire
        }
    }
    private static function sendVerificationCodeByEmail($email, $verificationCode)
    {
        // Créer un nouvel objet PHPMailer
        $mail = new PHPMailer(true);

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=userbd", "root", "");

            // Vérifier si l'utilisateur existe dans la base de données
            $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Paramètres SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'oussema.bouabdallah1@gmail.com'; // Votre adresse e-mail Gmail
                $mail->Password = 'zhzr jirm fxkj fiej'; // Votre mot de passe Gmail
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Destinataire, sujet, corps de l'e-mail
                $mail->setFrom('oussema.bouabdallah1@gmail.com', 'oussama'); // Votre nom et adresse e-mail
                $mail->addAddress($email); // Adresse e-mail du destinataire
                $mail->Subject = 'Verification Code'; // Sujet de l'e-mail
                $mail->Body = 'Your verification code is: ' . $verificationCode; // Corps de l'e-mail

                // Envoi de l'e-mail
                $mail->send();
                $stmt = $pdo->prepare("UPDATE utilisateurs SET verification_code = ? WHERE email = ?");
                $stmt->execute([$verificationCode, $email]);

                // Ajouter l'e-mail à la cookie
                $_COOKIE['reset_email'] = $email;

                // Rediriger vers la page verifiercode.php
                header("Location: ../view/verifiercode.php");
                exit(); // Assurez-vous de terminer le script après la redirection
            } else {
                // L'utilisateur n'existe pas dans la base de données, affichez un message d'erreur
                echo "<script>alert('User not found.');</script>";
            }
        } catch (Exception $e) {
            echo 'Failed to send verification code: ', $e->getMessage();
        }
    }


    public static function verifycode()
    {
        if (isset($_POST['verification_code'])) {
            // Récupérer le code de vérification saisi par l'utilisateur
            $userVerificationCode = $_POST['verification_code'];

            // Comparer le code saisi par l'utilisateur avec celui enregistré dans la base de données
            $pdo = new PDO("mysql:host=localhost;dbname=userbd", "root", "");
            $stmt = $pdo->prepare("SELECT verification_code FROM utilisateurs WHERE verification_code = ?");
            $stmt->execute([$userVerificationCode]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Le code de vérification saisi par l'utilisateur correspond au code enregistré dans la base de données
                // Supprimer le code de vérification de la base de données
                $stmt = $pdo->prepare("UPDATE utilisateurs SET verification_code = NULL WHERE verification_code = ?");
                $stmt->execute([$userVerificationCode]);

                // Afficher un message de succès à l'utilisateur
                header("Location: ../view/reset.php");
            } else {
                // Le code de vérification saisi par l'utilisateur ne correspond pas au code enregistré dans la base de données
                // Afficher un message d'erreur à l'utilisateur
                echo "<script>alert('Verification code does not match.');</script>";
            }
        } else {
            // Gérer le cas où le code de vérification n'est pas défini dans le formulaire
            // Afficher un message d'erreur à l'utilisateur
            echo "<script>alert('Verification code is not set.');</script>";
        }
    }

    public static function resetPassword()
    {
        if (isset($_POST['password'])) {
            // Vérifier si l'e-mail est défini dans la variable de classe
            if (isset($_COOKIE['reset_email'])) {
                // Récupérer l'e-mail à partir de la variable de classe
                $email = $_COOKIE['reset_email'];
                $cost = ['cost' => 12];
                $newPassword = $_POST['password'];
                $password = password_hash($newPassword, PASSWORD_BCRYPT, $cost);

                // Connexion à la base de données
                $pdo = new PDO("mysql:host=localhost;dbname=userbd", "root", "");

                // Préparer et exécuter la requête SQL pour mettre à jour le mot de passe en fonction de l'e-mail
                $stmt = $pdo->prepare("UPDATE utilisateurs SET password = ? WHERE email = ?");
                $stmt->execute([$password, $email]);

                // Vérifier si la mise à jour a été effectuée avec succès
                if ($stmt->rowCount() > 0) {
                    // Afficher un message de succès
                    echo "<script>alert('Password reset successfully.');</script>";
                    // Rediriger l'utilisateur vers une page de confirmation
                    header("Location: ../view/login.php");
                } else {
                    // Gérer le cas où la mise à jour a échoué
                    echo "<script>alert('Failed to reset password.');</script>";
                }
            } else {
                // Gérer le cas où l'e-mail n'est pas défini dans la variable de classe
                echo "<script>alert('Email is missing.');</script>";
            }
        } else {
            // Gérer le cas où le nouveau mot de passe n'est pas défini dans le formulaire
            echo "<script>alert('Password is missing.');</script>";
        }
    }




}
?>