## About
A password validator package which checks during registration if the password has length 8 , uppercase , lowercase , symbol , number   

## package addition 
go to 'app\Http\Controllers\Auth\RegisteredUserController.php' and add   
$request->validate([  
        'password' => [  
            new PasswordValidator  
],
