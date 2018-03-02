<?php
/****** Por: Hugo David Calderon Vilca				*****
******* Universiad Nacional Micaela Bastidas de Apurímac	*****
******* Carrito de compras para Comercio Electrónico            ******/
session_start();
if (isset($_SESSION['SESIONCARRITO']))
    $CARRITO=$_SESSION['SESIONCARRITO']; 
if (isset($_POST['idprod'])) {		
    $id=$_POST['idprod'];
    $producto=$_POST['nombreprod']; 
    $costo=$_POST['costoprod'];  
    $cantidad=$_POST['cantidadprod'];				
    $encontrado=0;			
     if (!isset($CARRITO)){
        $CARRITO[$id][1]=$id; 
        $CARRITO[$id][2]=$producto; 
        $CARRITO[$id][3]=$costo; 
        $CARRITO[$id][4]=$cantidad;
        $CARRITO[$id][5]=$costo*$cantidad;
        }
    else {	
        foreach($CARRITO as $k => $v)  
            if ($id==$k) {  
                $CARRITO[$id][4]+=$cantidad; 
                $CARRITO[$id][5]+=$CARRITO[$id][3]*$cantidad;
                $encontrado=1; 						 
                } 
        if ($encontrado==0) {
            $CARRITO[$id][1]=$id; 
            $CARRITO[$id][2]=$producto; 
            $CARRITO[$id][3]=$costo; 
            $CARRITO[$id][4]=$cantidad; 
            $CARRITO[$id][5]=$costo*$cantidad;
            }  
        } 
    }
$_SESSION['SESIONCARRITO']=$CARRITO; 
if (isset($CARRITO))	
    foreach($CARRITO as $k => $v) {
        echo "id : ".$v[1]."<br>";
        echo "Producto : ".$v[2]."<br>"; 
        echo "Costo : ".$v[3]."<br>"; 
        echo "Cantidad : ".$v[4]."<br>"; 
        echo "Costo total : ".$v[5]."<br>";
	} 
?>
<a href="carritodecompras1.php"> Seguir comprando </a>