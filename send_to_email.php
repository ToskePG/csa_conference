<?php
require 'slanjemejla/class.phpmailer.php';
require 'slanjemejla/class.pop3.php';

$pop = new POP3();
$pop->Authorise('mail.ac.me', 110, 30, 'MSAconference2014', 'MSA2014', 1);

$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';

$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->IsHTML(true);

$mail->Host     = 'mail.ac.me';

$mail->From     = 'MSAconference2014@ac.me';
$mail->FromName = 'MSAconference registration';

$mail->Subject  =  'New Conference 2014 Registration!';

//$Body="Ime i prezime : $T1 <br><br>e-mail : $T2<br><br>Poruka : <br>";
//$Body=$Body.nl2br($T3);

$abstracttitle=nl2br($abstracttitle);
$authors=nl2br($authors);
$studytopic=nl2br($studytopic);
$abstracttext=nl2br($abstracttext);

$Body="THANK YOU VERY MUCH FOR SUBMITTING YOUR ABSTRACT.<br><br>
Info submited:<br>
First Name: $firstname<br>
Last Name: $lastname<br>
Title: $title<br>
Sex: $sex<br>
Institution: $institution<br>
Department: $department<br>
Address: $address<br>
City: $city<br>
Postal Code: $postalcode<br>
Country: $country<br>
Telephone: $telephone<br>
Fax: $fax<br>
Mobile: $mobile<br>
E-mail: $email<br><br>
Title of the Abstract: <br>$abstracttitle<br><br>
Authors with Affiliations: <br>$authors<br><br>
Study Topic: $studytopic<br><br>
Text of the Abstract: <br>$abstracttext<br><br>
Type of Presentation: $presentationtype<br><br>
___________________________________________________________<br><br>
All authors will be informed about the acceptance of their submission on the 1st of February 2014.<br><br>
Registration fee must be paid by the 15th of March 2014 at the latest to secure the presentation during the conference and the publication in the Book of Abstracts.<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
";





$mail->Body     =  $Body;

$mail->AddAddress("MSAconference2014@ac.me", "MSAconference2014");
$mail->AddAddress($email, $firstname." ".$lastname);


if (!$mail->Send())
{
				echo 'error !!! <br>';
				echo $mail->ErrorInfo;
}
else
{
//				echo "Uspjesno poslana poruka.";
				echo "<META    HTTP-EQUIV=\"Refresh\"            Content= \"0;    URL=registration-success.html\">";

}

?>