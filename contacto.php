<?php 
if (isset($_GET["send"])) {
	
	$Nombre 	= $_POST["Nombre"];
	$Mail		= $_POST["Mail"];
	$Telefono 	= $_POST["Telefono"];
	$Como	 	= $_POST["Como"];
	$Mensaje 	= $_POST["Coment"];
	$Pass		= $_POST["Pass"];
	
	if ($Pass == date("Y", time())) {
	$headers = "MIME-Version: 1.0\r \n";
	$headers .= "Content-type: text/html; charset=utf-8 \r \n"; 
	$headers .= "Return-Path: ".$Nombre." <".$Mail."> \r \n";
	$headers .= "From: ".$Nombre." <".$Mail."> \r \n"; 
	$headers .= "Reply-To: ".$Nombre." <".$Mail."> \r \n";
	
	$asunto = "Contacto Sitio Savant";
	$mensage = '<table width="500" border="0" align="center" cellpadding="3" cellspacing="0" style="font-family:Calibri, Arial, sans-serif; font-size:14px;"><tr><td colspan="2" align="left" bgcolor="#3F464E" style="padding:20px 10px;"><img src="http://savant.com.mx/imagenes/savant-logo-simple.png" width="175" height="29" alt=""></td></tr><tr><td width="85" align="right" bgcolor="#F3F3F3" style="font-size:11px; color:#999; padding-right:10px;">NOMBRE</td><td width="403" bgcolor="#F3F3F3">'.$Nombre.'</td></tr><tr><td width="85" align="right" bgcolor="#F3F3F3" style="font-size:11px; color:#999; padding-right:10px;">E-MAIL</td><td width="403" bgcolor="#F3F3F3">'.$Mail.'</td></tr><tr><td width="85" align="right" bgcolor="#F3F3F3" style="font-size:11px; color:#999; padding-right:10px;">TELEFONO</td><td width="403" bgcolor="#F3F3F3">'.$Telefono.'</td></tr><tr><td align="right" bgcolor="#F3F3F3" style="font-size:11px; color:#999; padding-right:10px;">MEDIO CONTAC</td><td bgcolor="#F3F3F3">'.$Como.'</td></tr><tr><td colspan="2" bgcolor="#FFFFFF" style="padding:15px;"><span style="font-size:11px; color:#999;">COMENTARIOS</span><br>'.$Mensaje.'</td></tr></table>';
	
	mail ("info@savant.com.mx", $asunto, $mensage, $headers);
	mail ("sitios@haroconsultores.com.mx", $asunto, $mensage, $headers);
	mail ("developer@haroconsultores.com.mx", $asunto, $mensage, $headers);
	
	header("Location: contacto.php?Enviado");
	} else { 
	header("Location: contacto.php?Fail");
	}

}

?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<title>Contacto Savant</title>
<link rel="stylesheet" type="text/css" href="estilos/base.css">
<link rel="stylesheet" media="screen and (min-width: 980px)" href="estilos/escritorio.css" />
<link rel="stylesheet" media="screen and (max-width: 979px)" href="estilos/mobiles.css" />
<script src="scripts/jquery-1.11.0.min.js"></script>
<script src="scripts/google-services.js"></script>
<?php include ("includes/google-analytics.php");?>
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>
<body>
<?php include ("includes/header.php");?>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3596.4060555713572!2d-100.37067100000003!3d25.657831000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8662bdf2586795c9%3A0x6a5be41d59b4813e!2sSAVANT!5e0!3m2!1ses-419!2smx!4v1426017796458" width="100%" height="400" frameborder="0" style="border:0"></iframe>
<section id="Contacto" class="WhiteContent warp">
	<div class="infoContacto">
    <h2><small>Contáctanos</small>Horarios de atención</h2>
    <p class="intro">Estamos para resolver cualquier duda con respecto al tratamiento y escucharemos sus comentarios.</p>
    <p class="horario">
    Lunes de Viernes de <strong>8:30am a 6:00pm</strong><br>
    Sabados con <strong>Previa Cita</strong><br>
    <?php /*Domingos de <strong>9:00am a 1:00pm</strong> <small>(solo procedimientos)</small> */ ?></p>
    
    <br>
    <hr>
    <h2><small>Contáctanos</small>Dirección y contacto</h2>
    <p class="intro">Calzada San Pedro No.100, Piso 4, Colonia del Valle. San Pedro Garza Garcia, Nuevo León, México.</p>
    <p class="intro"><big>Teléfonos: (81) 1935 2011 y (81) 1935 2012</big></p>
    <p class="intro">Si lo prefieres, escribenos un correo a:<br><img src="imagenes/mail-negro.png" width="135" height="14" alt=""/></p>
    </div>
    
	<form action="contacto.php?send" method="post" id="ContactoPrincipal" onSubmit="return Validate()">
    <h2><small>Contáctanos</small>Envíenos un correo</h2>
    <p class="intro">Llene el siguiente formulario de contacto y  nosotros nos comunicaremos a la brevedad. Estamos para resolver cualquier duda con respecto al tratamiento y escucharemos sus comentarios.</p>
    <div class="FormField"><label for="Nombre"	>Nombre:					</label><input type="text" 	name="Nombre" 	id="Nombre"		></div>
    <div class="FormField"><label for="Mail"	>Correo electronico:		</label><input type="email" name="Mail" 	id="Mail"		></div>    
    <div class="FormField"><label for="Telefono">Teléfono:					</label><input type="tel" 	name="Telefono" id="Telefono"	></div>
    <div class="FormField"><label for="Como"	>Como se entero de nosotros:</label>
    <select name="Como" id="Como">
        <option value="[Sin respuesta]"			>Seleccione una opcion						</option>
        <option value="Cliente Savant"			>Soy cliente Savant							</option>
        <option value="Recomendacion"			>Recomendacion personal						</option>
        <option value="Buscador internet"		>Buscador de internet (Google, Bing, etc)	</option>
        <option value="Publicidad internet"		>Publicidad en internet						</option>
        <option value="Publicidad otra"			>Publicidad en otro medio					</option>
        <option value="Redes sociales"			>Redes sociales (Facebook, Twitter, etc)	</option>
        <option value="Otro"					>Otro										</option>
    </select>
    </div>
    <div class="FormField"><label for="Coment"	>Comentarios: </label>
    <textarea  name="Coment" id="Coment"></textarea>
    <input type="submit">
    <input name="Pass" type="hidden" id="Pass" value="">
	<script type="text/javascript">
    function validateEmail(email)	{
    var splitted = email.match("^(.+)@(.+)$");
    if(splitted == null) return false;
    if(splitted[1] != null )
    {
      var regexp_user=/^\"?[\w-_\.]*\"?$/;
      if(splitted[1].match(regexp_user) == null) return false;
    }
    if(splitted[2] != null)
    {
      var regexp_domain=/^[\w-\.]*\.[A-Za-z]{2,4}$/;
      if(splitted[2].match(regexp_domain) == null) 
      {
        var regexp_ip =/^\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\]$/;
        if(splitted[2].match(regexp_ip) == null) return false;
      }// if
      return true;
    }
    return false;
    }
    function isNumberKey(evt)		{
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
    
         return true;
      }
    function Validate()				{
    var Nom = $('#Nombre').val();
    var Mai = $('#Mail').val();
    var Tel = $('#Telefono').val(); 
    var Com = $('#Como').val();
    var Men = $('#Coment').val();
    var d = new Date();
    var n = d.getFullYear();
    
    var Err = 0;
    var MEr = 'Completa los siguientes campos: \n';	
    if (Nom == "") 						{ Err = Err + 1; MEr = MEr + "• Su nombre no puede estar vacio. \n" }
    if (validateEmail(Mai) == false )	{ Err = Err + 1; MEr = MEr + "• La dirección de correo no es válida. \n" }	
    if (Tel == "")						{ Err = Err + 1; MEr = MEr + "• El campo de Teléfono es obligatorio. \n" }
    if (Tel.length != 10)				{ Err = Err + 1; MEr = MEr + "• El campo de Teléfono debe contener 10 Dígitos (Lada)+(Numero). \n" }
    if (isNaN(Tel))						{ Err = Err + 1; MEr = MEr + "• El campo de Teléfono solo puede contener Números. \n" }
    if (Com == "NC" || Com == null)		{ Err = Err + 1; MEr = MEr + "• Indíquenos como se entero de nosotros. \n" }
    if (Men == "")						{ Err = Err + 1; MEr = MEr + "• El campo de Comentarios es obligatorio. \n" }
    if (Err == 0) 						{ $("#Pass").val(n); return true; } else { alert (MEr); return false; }
    }
    </script>  
    <?php if (isset($_GET["Enviado"])) { ?>
    <script type="text/javascript">
    $(document).ready(function(e) {
    alert("Tu comentario fue envido satisfactoriamente. Nos pondremos en contacto contigo a la brevedad.");
    });
    </script>
    <?php } ?>
    <?php if (isset($_GET["Fail"])) { ?>
    <script type="text/javascript">
    $(document).ready(function(e) {
    alert("Ha ocurrido un error al enviar el correo. Por favor comunícate al Tel. (81)4040 7412 para poder atenderte.");
    });
    </script>
    <?php } ?>
    </div>
    </form>
</section>
<?php include ("includes/footer.php");?>
</body>
</html>