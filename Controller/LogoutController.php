<?php

class LogoutController
{

    public function Logout()
    {
        session_start();
        session_destroy();

        header('Location: index.php?url=login');
        exit();
    }
}

// if ($_GET['url'] === 'logout') {
//     $logoutController = new LogoutController();
//     $logoutController->Logout();
// }
