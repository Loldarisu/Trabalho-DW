<?php

    if(isset($_GET['success'])){

        echo '<script>
            window.onload = (event)=> {
            let myAlert = document.querySelector(".toast");
            let bsAlert = new  bootstrap.Toast(myAlert);
            bsAlert.show();
            }
        </script>';

        if($_GET['success']==1){

            echo '<div class="position-fixed top-3 end-0 p-3" style="z-index: 11">
                <div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            Operação realizada com sucesso!
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>';

        }else{

            echo '<div class="position-fixed top-3 end-0 p-3" style="z-index: 11">
                <div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            Operação realizada sem sucesso!
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>';

        }

    }

?>

