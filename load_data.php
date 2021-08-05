 <?php  
define( 'BLOCK_LOAD', true );

define('nom_site','cartepvctwo');
require_once( $_SERVER['DOCUMENT_ROOT'] . '/'.nom_site.'/wp-config.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] .'/'.nom_site.'/wp-includes/wp-db.php' );
$wpdb = new wpdb( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
$data = array();
if(isset($_POST["nombre"]))  
 {  
      if($_POST["nombre"] != '')  
      {   
          $nbr = $_POST['nombre'];
          $requete = "SELECT * FROM ".$_POST["table"]." WHERE nombre=$nbr";
          $result = $wpdb->get_results($requete);
          foreach($result as $k=>$v):
            $data[$k]=$v;
          endforeach;
      }
 }  
 print_r($data[0]->tarif); 
 ?>  
