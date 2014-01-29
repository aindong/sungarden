<?php
	set_time_limit(0);

	$ip = "127.0.0.1";
	$port = "12345";

	if(!$socket = socket_create(AF_INET, SOCK_STREAM, 0))
	{
		showError($socket);
	}

	if(!socket_bind($socket,$ip,$port))
	{
		showError($socket);
	}

	if( !socket_listen($socket) ){
        showError($socket);
    }



	do{
        $client = socket_accept($socket);
        echo "new connection with client established !! \n";
        // welcome the user
        $message = "\n Hey! Welcome to another exciting talk! \n\n";
        socket_write($client, $message, strlen($message));
        
        // check for any message sent by the user
        do{
            if( ! $clientMssg = socket_read($client,2048,PHP_NORMAL_READ) ){
                showError();
            }
            
            // say something back
            $messageForUser = "Thanks for your input. Will think about it.";
            socket_write($client,$messageForUser,strlen($messageForUser));
            
            // was it actually words?
            if( !$clientMssg = trim($clientMssg) ){
                continue;
            }
            if( $clientMssg == 'close' ){
                // close their connection as requested
                socket_close($client);
                echo "\n\n-------------------------------- \n" .
                    "The user has left the connection\n";
                // break out of the loop
                break 2;    
            }
            
        }while(true);
    }while(true);    
    // end the socket
    echo "Ending the socket \n";
    socket_close($socket);



	// show error details
    function showError( $theSocket = null ){
        $errorcode = socket_last_error($theSocket);
     	$errormsg = socket_strerror($errorcode);
     
     	die("Couldn't create socket: [$errorcode] $errormsg");
    }

?>