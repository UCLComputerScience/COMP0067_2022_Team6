
<?php 
$userRole = Auth::user()->role;


if ($userRole == 1) {

echo "admin" ;
// Authentication was successful...
} elseif ($userRole == 2 ) {

return redirect('user/user-subscribe');
// Authentication was successful...
} elseif ($userRole == 3 ) {

echo "user with sub!" ;
// Authentication was successful...
} else  {

echo "hi" ;
// Authentication was successful...
}
?>


