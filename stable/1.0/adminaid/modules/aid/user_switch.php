<?php

$http = eZHTTPTool::instance();

$Module = $Params['Module'];
$user_id = intval( $Params['user_id'] );
$user = eZUser::currentUser();
$ini = eZINI::instance( 'aid.ini' );
$user_limit = $ini->variable( 'Aid', 'UserSwitchIDLimit' );

if ( !empty( $user_id ) AND in_array( $user->attribute( 'contentobject_id' ), $user_limit ) )
{
    $new_user = eZUser::fetch( $user_id );
    if ( $new_user )
    {
        eZUser::setCurrentlyLoggedInUser( $new_user, $user_id );
        eZHTTPTool::redirect( $http->sessionVariable( 'LastAccessesURI' ) );
        eZExecution::cleanExit();
        exit();
    }
    else
    {
        return $Module->handleError( eZError::KERNEL_ACCESS_DENIED, 'kernel' );
    }
}
else
{
    return $Module->handleError( eZError::KERNEL_ACCESS_DENIED, 'kernel' );
}

?>
