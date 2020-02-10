<?php
    session_start();
    function Message(){
        if(isset($_SESSION["Message"])){
            $output = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>'.$_SESSION['Message'].'</strong>
                  <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            ';
            $_SESSION['Message']=null;
            return $output;
        }
    }

    // function successMessage(){
    //     if(isset($_SESSION["SuccessMessase"])){
    //         $output = '
    //             <div class="alert alert-danger alert-dismissible fade show" role="alert">
    //               <strong>You have successfully registered '.$_SESSION["SuccessMessage"].' </strong>
    //               <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
    //                 <span aria-hidden="true">&times;</span>
    //               </button>
    //             </div>
    //         ';
    //     }
    // }

?>