<?php
// src/Controller/SecurityController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $encoder, AuthenticationUtils $authenticationUtils)
    {
        $lastUsername = $authenticationUtils->getLastUsername();

        $username = $request->get("_username");
        $testedUser = $userRepository->findOneByUserName($username);
        $error = $authenticationUtils->getLastAuthenticationError();

            return $this->render("security/login.html.twig", array(
                "last_password" => $request->get("_password"),
                "last_username" => $request->get("_username"),
                "error" => $error,
            ));
        }




    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        return $this->redirect("/home");
    }


}
