<?php
    session_start();
    include("../CIRA_FORMS/cira_connect_db_server.php");
    require_once 'dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $cm_no= $_SESSION['rp_cm'];
    $dompdf= new Dompdf();
    $htmlcontent1='<h1><center> Crime Investigation Reporting and Analysis </center></h1></br>
    ';

    $dompdf->loadhtml($htmlcontent1);
 
    $dompdf->setpaper('A4','landscape');    

    $dompdf->render();
    $dompdf->stream('document',array('Attachment'=>0));

?>