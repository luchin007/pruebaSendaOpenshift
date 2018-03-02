<?php
/****** Por: Hugo David Calderon Vilca				*****
******* Universiad Nacional Micaela Bastidas de Apurímac	*****
******* Carrito de compras para Comercio Electrónico            *****/
session_start();
 ?>	
<form  action="carritodecompras2.php" method="post">

    Id : 1<input  type="hidden"  name="idprod" value="1"><br>
    Nombre: Producto A <input type="hidden"  name="nombreprod" value="A">		<br>				
    Cantidad: <input type="text"  name="cantidadprod" size="5px"><br>
    Costo: 4 soles <input type="hidden"  name="costoprod" value="4"><br>
    <input type="submit" value="Comprar">
</form>
<form  action="carritodecompras2.php" method="post">

    Id : 2<input  type="hidden"  name="idprod" value="2"><br>
    Nombre: Producto B <input type="hidden"  name="nombreprod" value="B">		<br>				
    Cantidad: <input type="text"  name="cantidadprod" size="5px"><br>
    Costo: 3 soles <input type="hidden"  name="costoprod" value="3"><br>
    <input type="submit" value="Comprar">
</form>
<form  action="carritodecompras2.php" method="post">

    Id : 3<input  type="hidden"  name="idprod" value="3"><br>
    Nombre: Producto C <input type="hidden"  name="nombreprod" value="C">		<br>				
    Cantidad: <input type="text"  name="cantidadprod" size="5px"><br>
    Costo: 4 soles <input type="hidden"  name="costoprod" value="4"><br>
    <input type="submit" value="Comprar">
</form>
