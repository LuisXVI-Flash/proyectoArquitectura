<?php 




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once("./models/PHPMailer/Exception.php");
require_once("./models/PHPMailer/PHPMailer.php");
require_once("./models/PHPMailer/SMTP.php");
$idp=0;
$idp=$_GET['id'];
$instancia = conexion::obtenerconexion();
$resultadoa = mysqli_query($instancia, "SELECT  c.correo, c.nombres, c.apellidos FROM  producto p,clientes c,solicitud s WHERE  c.idcliente=s.idcliente and s.idproducto=$idp");
if($row = mysqli_fetch_array($resultadoa)){
   
    $correo=$row[0];
    $pac=$row[1];
    $idpac=$row[2];
}
echo "<script type='text/javascript'>function redirect(){ window.location.href = 'mailto:".$correo."?subject=' + encodeURIComponent('Activacion Dispositivo Teca')  + '&body=' + encodeURIComponent('"."Estimad@ ".$pac."  ".$idpac." su dispositivo a sido activado"."');}redirect();</script>";



// $mail = new PHPMailer(true);
//     try{
//       $mail->SMTPDebug=0;
//       $mail->isSMTP();
//       $mail->Host='smtp.gmail.com;smtp.live.com';
//       $mail->SMTPAuth=true;
//       $mail->Username='teca.peru.web@gmail.com';
//       $mail->Password='3691144f';
//       $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
//       $mail->Port=587;
//       $mail->SetFrom('teca.peru.web@gmail.com','TECA PERU');
//       $mail->addAddress($correo);
//       $mail->isHTML(true);
//       $mail->Subject='TECA-Solicitud de activacion';
//       $mail->Body = `
//       <div style="background-color:rgb(244,244,244)"> 
    
//     <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px;padding:0px;margin:0px;width:100%;height:100%;background-repeat:repeat;background-position:50% 0%"> 
//       <tbody><tr height="0" style="border-collapse:collapse"> 
//        <td style="padding:0px;margin:0px"> 
//         <table cellspacing="0" cellpadding="0" border="0" align="center" style="border-collapse:collapse;border-spacing:0px;width:600px"> 
//           <tbody><tr style="border-collapse:collapse"> 
//            <td cellpadding="0" cellspacing="0" border="0" style="padding:0px;margin:0px;line-height:1px;min-width:600px" height="0"><img src="https://ci3.googleusercontent.com/proxy/mEwrBLRqRs4U3ih0k5bwvexxwbixRuiyxCpDdvF5a6Gs8XIJMxed2-RgcT-zgcGjse9m9272dPTp9X6kSFXHCyMJNFtQN6eivXkDbCfNPHk=s0-d-e1-ft#https://esputnik.com/repository/applications/images/blank.gif" style="display:block;border:0px;outline:none;text-decoration:none;max-height:0px;min-height:0px;min-width:600px;width:600px" alt="" width="600" height="1" class="CToWUd"></td> 
//           </tr> 
//         </tbody></table></td> 
//       </tr> 
//       <tr style="border-collapse:collapse"> 
//        <td valign="top" style="padding:0px;margin:0px"> 
//         <table cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;border-spacing:0px;width:100%;background-color:rgb(124,114,220);background-repeat:repeat;background-position:50% 0%;table-layout:fixed"> 
//           <tbody><tr style="border-collapse:collapse"> 
//            <td style="padding:0px;margin:0px;background-color:rgb(244,244,244)" bgcolor="#F4F4F4" align="center"> 
//             <table cellspacing="0" cellpadding="0" align="center" bgcolor="#fff" style="border-collapse:collapse;border-spacing:0px;background-color:rgb(255,255,255);width:600px"> 
//               <tbody><tr style="border-collapse:collapse"> 
//                <td align="left" style="margin:0px;padding:20px 10px 10px"> 
//                 <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px"> 
//                   <tbody><tr style="border-collapse:collapse"> 
//                    <td valign="top" align="center" style="padding:0px;margin:0px;width:580px"> 
//                     <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px"> 
//                       <tbody><tr style="border-collapse:collapse"> 
//                        <td align="center" style="margin:0px;padding:25px 10px;font-size:0px"><img src="https://ci5.googleusercontent.com/proxy/FWAQwdNyAJNrNVhrFp1FTApwQVlfh0BgBNp5d8obGy0aVxfCj7_2wUbMYRv7nTMVtk9KSoBPfx9uRYbGkm5HQ0ipDIEUQzIbnVcyNO89f3oezI_0qD8u0tDR48CRrusggJMwqoLfQLBzoeHOeY860DWII4um2fioqBeea4R77Pd9=s0-d-e1-ft#https://ngaeci.stripocdn.email/content/guids/dc0f93b5-da0e-4f4b-a6b4-493e366569db/images/71731614359683499.png" alt="" style="display:block;border:0px;outline:none;text-decoration:none" width="275" class="CToWUd"></td> 
//                       </tr> 
//                     </tbody></table></td> 
//                   </tr> 
//                 </tbody></table></td> 
//               </tr> 
//             </tbody></table></td> 
//           </tr> 
//         </tbody></table> 
//         <table cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed"> 
//           <tbody><tr style="border-collapse:collapse"> 
//            <td style="padding:0px;margin:0px;background-color:rgb(244,244,244)" bgcolor="#F4F4F4" align="center"> 
//             <table style="border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" align="center"> 
//               <tbody><tr style="border-collapse:collapse"> 
//                <td align="left" style="padding:0px;margin:0px"> 
//                 <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px"> 
//                   <tbody><tr style="border-collapse:collapse"> 
//                    <td valign="top" align="center" style="padding:0px;margin:0px;width:600px"> 
//                     <table style="border-collapse:separate;border-spacing:0px;background-color:rgb(255,255,255);border-radius:4px" width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff"> 
//                       <tbody><tr style="border-collapse:collapse"> 
//                        <td align="center" style="padding:25px 0px 25px 5px;margin:0px"><h1 style="margin:0px;line-height:25px;font-family:lato,&quot;helvetica neue&quot;,helvetica,arial,sans-serif;font-size:21px;font-style:normal;font-weight:normal;color:rgb(17,17,17)"><strong>Solicitud de modificación de contraseña</strong></h1></td> 
//                       </tr> 
//                       <tr style="border-collapse:collapse"> 
//                        <td bgcolor="#ffffff" align="center" style="margin:0px;padding:5px 20px;font-size:0px"> 
//                         <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;border-spacing:0px"> 
//                           <tbody><tr style="border-collapse:collapse"> 
//                            <td style="padding:0px;border-bottom:1px solid rgb(255,255,255);background:none 0% 0% repeat scroll rgb(255,255,255);height:1px;width:100%;margin:0px"></td> 
//                           </tr> 
//                         </tbody></table></td> 
//                       </tr> 
//                     </tbody></table></td> 
//                   </tr> 
//                 </tbody></table></td> 
//               </tr> 
//             </tbody></table></td> 
//           </tr> 
//         </tbody></table> 
//         <table cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed"> 
//           <tbody><tr style="border-collapse:collapse"> 
//            <td align="center" style="padding:0px;margin:0px"> 
//             <table style="border-collapse:collapse;border-spacing:0px;background-color:rgb(255,255,255);width:600px" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center"> 
//               <tbody><tr style="border-collapse:collapse"> 
//                <td align="left" style="padding:0px;margin:0px"> 
//                 <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px"> 
//                   <tbody><tr style="border-collapse:collapse"> 
//                    <td valign="top" align="center" style="padding:0px;margin:0px;width:600px"> 
//                     <table style="border-collapse:collapse;border-spacing:0px;background-color:rgb(255,255,255)" width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff"> 
//                       <tbody><tr style="border-collapse:collapse"> 
//                        <td bgcolor="#ffffff" align="left" style="margin:0px;padding:20px 30px 15px"><p style="margin:0px;font-size:18px;font-family:lato,&quot;helvetica neue&quot;,helvetica,arial,sans-serif;line-height:27px;color:rgb(102,102,102)">Hemos recibido una solicitud para restablecer tu contraseña de acceso a <a href="http://plataforma.teca.pe" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://plataforma.teca.pe&amp;source=gmail&amp;ust=1627442368413000&amp;usg=AFQjCNEbaIB2Uk8gT1l9uQARIXlq00tccg">plataforma.teca.pe</a></p></td> 
//                       </tr> 
//                     </tbody></table></td> 
//                   </tr> 
//                 </tbody></table></td> 
//               </tr> 
//               <tr style="border-collapse:collapse"> 
//                <td align="left" style="padding:0px 30px 20px;margin:0px"> 
//                 <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px"> 
//                   <tbody><tr style="border-collapse:collapse"> 
//                    <td valign="top" align="center" style="padding:0px;margin:0px;width:540px"> 
//                     <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px"> 
//                       <tbody><tr style="border-collapse:collapse"> 
//                        <td align="center" style="margin:0px;padding:40px 10px"><span style="border-style:solid;border-color:rgb(3,190,237);background:rgb(3,190,237);border-width:1px;display:inline-block;border-radius:2px;width:auto"><a href="https://viewstripo.email/" style="text-decoration:none;font-family:helvetica,&quot;helvetica neue&quot;,arial,verdana,sans-serif;font-size:20px;color:rgb(255,255,255);border-style:solid;border-color:rgb(3,190,237);border-width:15px 25px;display:inline-block;background:rgb(3,190,237);border-radius:2px;font-weight:normal;font-style:normal;line-height:24px;width:auto;text-align:center" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://viewstripo.email/&amp;source=gmail&amp;ust=1627442368413000&amp;usg=AFQjCNEI1WdnSX13c420AMsKCfy1ruuQgw">Cambiar contraseña</a></span></td> 
//                       </tr> 
//                     </tbody></table></td> 
//                   </tr> 
//                 </tbody></table></td> 
//               </tr> 
//             </tbody></table></td> 
//           </tr> 
//         </tbody></table> 
//         <table cellpadding="0" cellspacing="0" align="center" style="border-collapse:collapse;border-spacing:0px;width:100%;background-color:transparent;background-repeat:repeat;background-position:50% 0%;table-layout:fixed"> 
//           <tbody><tr style="border-collapse:collapse"> 
//            <td align="center" style="padding:0px;margin:0px"> 
//             <table cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"> 
//               <tbody><tr style="border-collapse:collapse"> 
//                <td align="left" style="margin:0px;padding:30px"> 
//                 <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px"> 
//                   <tbody><tr style="border-collapse:collapse"> 
//                    <td valign="top" align="center" style="padding:0px;margin:0px;width:540px"> 
//                     <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px"> 
//                       <tbody><tr style="border-collapse:collapse"> 
//                        <td align="center" style="padding:0px;margin:0px"><p style="margin:0px;font-size:14px;font-family:lato,&quot;helvetica neue&quot;,helvetica,arial,sans-serif;line-height:21px;color:rgb(102,102,102)"><strong><a href="https://viewstripo.email" style="font-family:lato,&quot;helvetica neue&quot;,helvetica,arial,sans-serif;font-size:14px;text-decoration:underline;color:rgb(17,17,17)" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://viewstripo.email&amp;source=gmail&amp;ust=1627442368413000&amp;usg=AFQjCNHJmgYhEg2VhETiXPlg-CcUoq8Fmw">Ayuda</a></strong><br>¿Tienes problemas para acceder?<br>Responde a este mail y te ayudaremos a ingresar.</p><p style="margin:0px;font-size:14px;font-family:lato,&quot;helvetica neue&quot;,helvetica,arial,sans-serif;line-height:21px;color:rgb(102,102,102)"><br></p></td> 
//                       </tr> 
//                       <tr style="border-collapse:collapse"> 
//                        <td align="center" style="padding:0px;margin:0px"><p style="margin:0px;font-size:14px;font-family:lato,&quot;helvetica neue&quot;,helvetica,arial,sans-serif;line-height:21px;color:rgb(102,102,102)">Ceej - 1234 Main Street - Anywhere, MA - 56789</p></td> 
//                       </tr> 
//                     </tbody></table></td> 
//                   </tr> 
//                 </tbody></table></td> 
//               </tr> 
//             </tbody></table></td> 
//           </tr> 
//         </tbody></table> 
//         <table cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed"> 
//           <tbody><tr style="border-collapse:collapse"> 
//            <td align="center" style="padding:0px;margin:0px"> 
//             <table style="border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" align="center"> 
//               <tbody><tr style="border-collapse:collapse"> 
//                <td align="left" style="margin:0px;padding:30px 20px"> 
//                 <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px"> 
//                   <tbody><tr style="border-collapse:collapse"> 
//                    <td valign="top" align="center" style="padding:0px;margin:0px;width:560px"> 
//                     <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px"> 
//                       <tbody><tr style="border-collapse:collapse"> 
//                        <td align="center" style="padding:0px;margin:0px;line-height:0px;font-size:0px;color:rgb(204,204,204)"><a href="https://viewstripo.email/?utm_source=templates&amp;utm_medium=email&amp;utm_campaign=software2&amp;utm_content=trigger_newsletter5" style="font-family:lato,&quot;helvetica neue&quot;,helvetica,arial,sans-serif;font-size:12px;text-decoration:underline;color:rgb(204,204,204)" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://viewstripo.email/?utm_source%3Dtemplates%26utm_medium%3Demail%26utm_campaign%3Dsoftware2%26utm_content%3Dtrigger_newsletter5&amp;source=gmail&amp;ust=1627442368413000&amp;usg=AFQjCNHngBc9DDhmzgSZVyDSQ362WatB3A"><img src="https://ci4.googleusercontent.com/proxy/qUkxv_sj4zaeTjGCcvxAq6aSOJcvMyoZVCSXdHeJc7sBDFwe6xNTucrpFDxeaq97JfX8Jgkj3x9IEhmOPSNk_DTUEiMiRBac3oajXc-o0cBZedLLkbFLnCuI0aDNodNxjaeti4CszsM5XfJvAyfw0rUpdl9jlUO0OMz5XWNDLmux=s0-d-e1-ft#https://ngaeci.stripocdn.email/content/guids/dc0f93b5-da0e-4f4b-a6b4-493e366569db/images/16051614361566450.png" alt="" width="125" style="display:block;border:0px;outline:none;text-decoration:none" class="CToWUd"></a></td> 
//                       </tr> 
//                     </tbody></table></td> 
//                   </tr> 
//                 </tbody></table></td> 
//               </tr> 
//             </tbody></table></td> 
//           </tr> 
//         </tbody></table></td> 
//       </tr> 
//     </tbody></table><div class="yj6qo"></div><div class="adL"> 
//    </div></div>`;

//       $mail->send();
//      //El mensaje se envio correctamente';
      
//     }catch(Exception $e){
//        // Hubo un error al enviar el mensaje: ',$mail->ErrorInfo;
//        echo "error al enviar el correo ".$e;
//     }
    
    
    
    ?>