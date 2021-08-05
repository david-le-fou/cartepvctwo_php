 <?php  
$servername = "localhost";
$username = "root";
$password = "root";
$db = "xxxx";
 die();
try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if(isset($_POST["nombre"]))  
 {  
      if($_POST["nombre"] != '')  
      {   
          $nbr = $_POST['nombre'];
          $q =$conn->prepare("SELECT * FROM ".$_POST["table"]." WHERE nombre=$nbr");
          $q->execute();
          foreach($q->fetchAll() as $k=>$v):
            $data[$k]=$v;
          endforeach;
      }
 }  
 print_r($data[0][2]); 
 ?>  
