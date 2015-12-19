<?php
session_start();
if($_SESSION['id'] != NULL)
{
    echo "
		<div class='ui success message'>
                      <i class='close icon'></i>
                      <div class='header'>
                        Log-in successfully.
                      </div>
                      <p>You can use our service now.</p>
                    </div>";
}
else{echo"<div class='ui negative message'>
                          <i class='close icon'></i>
                          <div class='header'>
                            Username or password Error!!
                          </div>
                          <p>Please try again.</p>
                          </div>";
}

?>