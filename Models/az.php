<?php

// DB table to use
$table = 'article';
 
// Table's primary key
$primaryKey = 'idArticle';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'created_at', 'dt' => 'created_at_1' ),
    array( 'db' => 'idArticle', 'dt' => 'idArticle' ),
    array( 'db' => 'titre', 'dt' => 'titre' ),
    array( 'db' => 'description', 'dt' => 'description' ),
    array( 'db' => 'liens', 'dt' => 'liens' ),
    array( 'db' => 'nbrMots', 'dt' => 'nbrMots' ),
    array( 'db' => 'etat', 'dt' => 'etat' ),
    array(
        'db'        => 'redacteur',
        'dt'        => 'redacteur',
        'formatter' => function( $d, $row ) {
            if(isset($d)) {
                $red = (new RedacteurManager())->find($d);
                $user = (new UsersManager())->find($red->getIdUser());
                $nom = $user->getNom();
                $prenom = $user->getPrenom();
                return array($red->getIdUser(), $nom." ".$prenom);
            }
            return "";
        }
    ),
    array(
        'db'        => 'delai',
        'dt'        => 'delai_h',
        'formatter' => function( $d, $row ) {
            return $d."H";
        }
    ),
    array( 'db' => 'delai', 'dt' => 'delai' ),
    array(
        'db'        => 'created_at',
        'dt'        => 'created_at',
        'formatter' => function( $d, $row ) {
            $date1 = new DateTime($d);
            return $date1->format('d/m/Y à H:i:s');
        }
    ),
    array(
        'db'        => 'updated_at',
        'dt'        => 'updated_at',
        'formatter' => function( $d, $row ) {
            $date2 = new DateTime($d);
            return $date2->format('d/m/Y à H:i:s');
        }
    ),
    array( 'db' => 'urgence', 'dt' => 'urgence' )

);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'feedred',
    'host' => '127.0.0.1'
);
 
require( '../Classes/SSP.php' );

$datas = SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns );
echo '<pre>'; print_r($datas);

// echo json_encode(
//     SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns ),
//     JSON_UNESCAPED_UNICODE
// );

?>