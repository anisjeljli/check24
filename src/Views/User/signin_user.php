<?php
$login = null;
$password = null;
$homePage = "/Home/index.php";
$loginPage = "login.html";

//getting parameters from request
if (isset($_POST['login'])) {
    $login = $_POST['login'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

// fetching USER
/** @var \Doctrine\ORM\EntityManager $em */
$em = new \src\EntityManager\EntityManagerFactory();
$entityRepository = $em->getRepository(\src\Entity\User::class);

$user = $entityRepository->findOneBy(['userName' => $login, 'password' => $password]);


if ($user) {
    //redirecting to Home Page
    header($homePage, true);
} else {
    header($loginPage, true);

}