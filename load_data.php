 <?php  
define( 'BLOCK_LOAD', true );
define('nom_site','cartepvctwo');
require_once( $_SERVER['DOCUMENT_ROOT'] . '/'.nom_site.'/wp-config.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] .'/'.nom_site.'/wp-includes/wp-db.php' );
$wpdb = new wpdb( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
if(isset($_POST["nombre"]))  
 {  
      if($_POST["nombre"] != '')  
      {   
          $nbr = $_POST['nombre'];
          $result = $wpdb->get_results("SELECT * FROM ".$_POST['table']."WHERE nombre=$nbr");
          foreach($result as $k=>$v):
            $data[$k]=$v;
          endforeach;
      }
 }  
 print_r($data[0][2]); 
 ?>  
