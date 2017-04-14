<?php /* Smarty version 3.1.24, created on 2016-12-18 19:46:02
         compiled from "/var/www/html/kioscogestion/templates/productos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:451315274585711aa461652_99744969%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9cd371d78f4e2809c4baf0bbae79617679b8310' => 
    array (
      0 => '/var/www/html/kioscogestion/templates/productos.tpl',
      1 => 1482076303,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '451315274585711aa461652_99744969',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_585711aa46ca45_62940225',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_585711aa46ca45_62940225')) {
function content_585711aa46ca45_62940225 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '451315274585711aa461652_99744969';
?>
<!DOCTYPE>
<html>
<head>

    <title>Agregar productos</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="estilos/estilos.css">
    
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"><?php echo '</script'; ?>
>
    
    <?php echo '<script'; ?>
>
        
        $(document).ready(function(){
            
            $("#btnNuevoProd, #btnEditarProd").click(function(){return false});
                
            var modal = document.getElementById('divNuevoProducto');

            var span = document.getElementsByClassName("cerrar")[0];
            
            var btnNuevoProd = document.getElementById("btnNuevoProd");
            
            btnNuevoProd.onclick = function(){
                
                modal.style.display = "block";
                
            }

            span.onclick = function() {

                modal.style.display = "none";

            }
            
            window.onclick = function(event) {
                
                if (event.target == modal) {

                    modal.style.display = "none";

                }

            }
            
            $("#crearProducto").click(function(){
                
                var idProd = $("#codProd").val();
                var nombreProd = $("#nombreProd").val();
                var cantPorBult = $("#cantPorBult").val();
                var costo = $("#costoUnitario").val();
                
                if (idProd == "" || idProd == 0 || nombreProd == "" || cantPorBult == "" || costo == 0){
                    
                    alert("Faltan completar datos.")
                    
                } else {
                    
                    idProd = $("#codProd").serialize();
                    
                    validarCodigoExistente(idProd);
                
                }
                
            });
            
            
        });
        
        function validarCodigoExistente(idProd){
            
            //Devuelve true si el codigo de producto existe, caso contrario false.
            
            $.get("AJAX.validarCodigoExistente.php", idProd, crearProducto);

        }
            
        function crearProducto(yesNo){
            
            if(yesNo == 0){
                
                var datos = $("#codProd, #nombreProd, #cantPorBult, #costoUnitario").serialize();
                
                $.get("AJAX.crearProducto.php", datos, alertEstadoCreacionProd);
                
            } else {
                
                alert("Codigo de producto existente.");
                
            }
                
        }
        
        function alertEstadoCreacionProd(respuesta){
            
            if(respuesta == 0){
                        
                alert("Error al crear producto.");

            } else {

                alert("Producto creado correctamente.");

            }
                    
        }
            
    
    <?php echo '</script'; ?>
>
    
</head>
<body>

<header><h1 class="encabezado">Gestión Kiosco</h1></header>

<nav>
    
    <table class="menuPrincipal">
        <tr>
            <td class = "menuItem"><a href="generarPedidos.php" class = "menuLink">Generar pedidos</a></td>
            <td class = "menuItem"><a href="listas.php" class = "menuLink">Generar listas</a></td>
            <td class = "menuItem"><a href="precios.php" class = "menuLink">Precios</a></td>
            <td class = "menuItem"><a href="productos.php" class = "menuLink">Productos</a></td>
            <td class = "menuItem"><a href="clientes.php" class = "menuLink">Clientes</a></td>
            <td class = "menuItem"><a href="listadoConsultas.php" class = "menuLink">Reportes / consultas</a></td>
        </tr>
    </table>
    
</nav>

<div class="separador"></div>

<section class="query">
<div id="consultas">

<table>
    <tr><td><a href = '' id="btnNuevoProd">Nuevo producto</a></td></tr>
    <tr><td><a href = '' id="btnEditarProd">Editar producto</a></td></tr>
    <tr><td><a href = "main.php">Volver</a></td></tr>
</table>

</div>

<div id="divNuevoProducto" class="modal">
   
    <div class="modalConteiner">
        
        <span class="cerrar">x</span>
        <table>
            <tr>
                <td><label for="codProd">Código de producto</label></td>
                <td><input type="number" id="codProd" name="codProd"></td>
            </tr>
            <tr>
                <td><label for="nombreProd">Nombre</label></td>
                <td><input type="text" id="nombreProd" name="nombreProd"></td>
            </tr>
            <tr>
                <td><label for="cantPorBult">Cant. por bulto</label></td>
                <td><input type="number" id="cantPorBult" name="cantPorBult"></td>
            </tr>
            <tr>
                <td><label for="costoUnitario">Costo unitario</label></td>
                <td><input type="number" id="costoUnitario" name="costoUnitario"></td>
            </tr>
            <tr>
                <td colspan="2"><button id="crearProducto">Crear producto</button></td>
            </tr>
        </table>
    </div>
    
</div>

</section>

<div class="separador"></div>

<footer id="pie">Desarrollado por Luciano Moral</footer>

</body>
</html><?php }
}
?>