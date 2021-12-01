<?php

$user=new \src\Entity\User();
if ($name=$_POST['fullName'])
{
    $user->setFullName($name);
}

if ($userName=$_POST['userName'])
{
    $user->setUsername($userName);
}

if ($email=$_POST['email'])
{
    $user->setEmail($email);
}

if ($name=$_POST['fullName'])
{
    $user->setFullName($name);
}
if($password=$_POST['password'])
{
    $user->setPassword($password);
}

$entityManager=new src\EntityManager\EntityManagerFactory();

$entityManager->flush($user);