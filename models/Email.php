<?php

  require '../include/vendor/autoload.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

    require_once("../config/conexion.php");
    require_once("../models/Producto.php");
    require_once("../models/Usuario.php");

    class Email extends PHPMailer{

        protected $gCorreo = 'antonymilian19@outlook.com'; //variable que contiene el correo destinatario antonymilian19@outlook.com
        protected $gContrasena = '@nton&m&il&an19071993'; //varibale que tiene la contraseña distanatario jorgemilian190793

        public function enviar_correo(){

            $producto = new Producto();
            $datos = $producto->get_producto();
            $tbody = "";
            foreach ($datos as $row) {
                $tbody.=
                '

                <tr style="border-collapse:collapse">
                <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:40px;padding-right:40px"><!--[if mso]><table style="width:820px" cellpadding="0" 
                          cellspacing="0"><tr><td style="width:390px" valign="top"><![endif]-->
                 <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                   <tr style="border-collapse:collapse">
                    <td class="es-m-p20b" align="left" style="padding:0;Margin:0;width:390px">
                     <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                       <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0;font-size:0"><a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#3D5CA3;font-size:14px"><img class="adapt-img" src="'.$row["prod_img"].'" alt="Art and Graphic Design" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" title="Art and Graphic Design" width="320"></a></td>
                       </tr>
                     </table></td>
                   </tr>
                 </table><!--[if mso]></td><td style="width:40px"></td><td style="width:390px" valign="top"><![endif]-->
                 <table class="es-right" cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                   <tr style="border-collapse:collapse">
                    <td align="left" style="padding:0;Margin:0;width:390px">
                     <editor-squiggler style="height:0px;width:0px">
                      <div class="ms-editor-squiggler"></div> 
                     </editor-squiggler><editor-squiggler style="height:0px;width:0px">
                      <div class="ms-editor-squiggler"></div> 
                     </editor-squiggler>
                     <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                       <tr style="border-collapse:collapse">
                        <td align="left" spellcheck="false" data-ms-editor="true" style="padding:0;Margin:0;padding-top:10px"><h3 class="product-name" style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#333333">'.$row["prod_nom"].'</h3></td>
                       </tr>
                       <tr style="border-collapse:collapse">
                        <td class="es-m-txt-c" align="left" spellcheck="false" data-ms-editor="true" style="padding:0;Margin:0;padding-top:5px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px" class="product-description">'.$row["prod_descrip"].'</p></td>
                       </tr>
                       <tr style="border-collapse:collapse">
                        <td class="es-m-txt-c" align="left" style="padding:0;Margin:0;padding-top:20px"><span class="es-button-border" style="border-style:solid;border-color:#aa0f16;background:#ffffff;border-width:2px;display:inline-block;border-radius:4px;width:auto"><a href="'.$row["prod_url"].'" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#aa0f16;font-size:14px;display:inline-block;background:#FFFFFF;border-radius:4px;font-family:arial, "helvetica neue", helvetica, sans-serif;font-weight:normal;font-style:normal;line-height:17px;width:auto;text-align:center;padding:5px 10px;mso-padding-alt:0;mso-border-alt:10px solid #FFFFFF">Ver Detalles</a></span></td>
                       </tr>
                     </table></td>
                   </tr>
                 </table><!--[if mso]></td></tr></table><![endif]--></td>
               </tr>


                '
                ;
            }

            $usuario = new Usuario();
            $datos2 = $usuario->get_usuario();

            $this-> isSMTP();
            $this->Host = 'smtp.office365.com';
            $this->Port = 587;
            $this -> SMTPAuth = true;
            $this->SMTPSecure = 'tls';

            $this->Username = $this->gCorreo;
            $this->Password = $this->gContrasena;
            $this->From = $this->gCorreo;
            $this->FromName = "Fe y Alegría del Perú";
            $this->CharSet = 'UTF8';
            

            foreach($datos2 as $row2){
              $this->ClearAllRecipients();
              $this->addAddress($row2["usu_correo"]);
              $this->WordWrap = 50;
              $this->IsHTML(true);
              $this->Subject = "Fe y Alegría del Perú";
              $cuerpo = file_get_contents('../public/Template_FyA.html');
              $cuerpo = str_replace('$tbldetalle', $tbody, $cuerpo);
              $cuerpo = str_replace('$xemaildesuscribirse', 'http://localhost/EnvioMasivoCorreos_Admin/view/desuscribirse/?email='.$row2["usu_correo"], $cuerpo);
              $this->Body = $cuerpo;
              $this->AltBody = strip_tags("Descuento");
              $this->Send();
            }

            // $this->addAddress("antonymilian19@outlook.com");
        } 

    }


?>