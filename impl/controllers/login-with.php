<?php
/**
 * Created by PhpStorm.
 * User: donic
 * Date: 6/4/2016
 * Time: 12:26 AM
 */

//session_start();
include('../impl/controllers/config.php');
include('../impl/hybridauth/Hybrid/Auth.php');
$_SESSION['verific']="Am ajuns aici";
if(isset($_GET['provider']))
{
    $provider = $_GET['provider'];
    try{
        $hybridauth = new Hybrid_Auth( $config );
        $authProvider = $hybridauth->authenticate($provider);
        $user_profile = $authProvider->getUserProfile();
        if($user_profile && isset($user_profile->identifier))
        {
            $_SESSION['name'] = $user_profile->displayName;
            $_SESSION['id'] = $user_profile->identifier;
            $_SESSION['email'] = $user_profile->email;
            $_SESSION['provider'] = $provider;
            $_SESSION['picture'] = $user_profile->photoURL;
        }

    }
    catch( Exception $e )
    {
        switch( $e->getCode() )
        {
            case 0 : echo "Unspecified error."; break;
            case 1 : echo "Hybridauth configuration error."; break;
            case 2 : echo "Provider not properly configured."; break;
            case 3 : echo "Unknown or disabled provider."; break;
            case 4 : echo "Missing provider application credentials."; break;
            case 5 : echo "Authentication failed The user has canceled the authentication or the provider refused the connection.";
                break;
            case 6 : echo "User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.";
                $authProvider->logout();
                break;
            case 7 : echo "User not connected to the provider.";
                $authProvider->logout();
                break;
            case 8 : echo "Provider does not support this feature."; break;
        }

        echo "<br /><br /><b>Original error message:</b> " . $e->getMessage();
        $_SESSION['error'] = $e->getMessage();

        echo "<hr /><h3>Trace</h3> <pre>" . $e->getTraceAsString() . "</pre>";
    }
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
?>