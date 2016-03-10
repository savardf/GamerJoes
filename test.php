 
<?php
$jour=date("d");
$mois=date("n");
$annee=date("Y");
$heure=date("H");
$minute=date("i");
$seconde=date("s");
$d_fa=$annee."-".$mois."-".$jour." ".$heure.":".$minute.":".$seconde;
 
$id_client = $_POST['id_client'];
$id_fam = $_POST['id_fam'];
$id_art = $_POST['id_art'];
$qte = $_POST['qte'];
$n_facture = $_POST['n_facture']; 
 
mysql_connect("localhost","root", "");
mysql_select_db("bdd");
$requette = mysql_query("SELECT * FROM article WHERE id_art='$id_art' ");
mysql_close();
 
while ($ligne = mysql_fetch_array($requette))
{
  $n_art_ex = $ligne['n_art'];
  $p_u_art = $ligne['p_u_art'];
}
?>
<table border="0" cellspacing="0" cellpadding="0">
<form method="post" action="etablissement_facture3.php">
<tr><td>Client :</td>
    <td>
    <select name="id_client">
    <option selected="selected">Sélectionner le client :</option>
    <?php
    mysql_connect("localhost","root", "");
    mysql_select_db("bdd");
    $requette = mysql_query("SELECT * FROM client ORDER BY n_cli");
    mysql_close();
 
    while ($ligne = mysql_fetch_array($requette))
    {
      $n_cli = $ligne['n_cli'];
      $id_client_ex = $ligne['id_client'];
 
      if ($id_client==$id_client_ex)
      {
        ?>
        <option value="<?php echo $id_client_ex; ?>" selected="selected"><?php echo $n_cli; ?></option>
        <?php
      }
 
      else
      {
        ?>
        <option value="<?php echo $id_client_ex; ?>"><?php echo $n_cli; ?></option>
        <?php
      }
    }
    ?>
    </select>
    </td>
</tr>
 
<tr><td colspan="2"><br /></td></tr>
 
<tr><td>Famille article :</td>
    <td>
    <select name="id_fam">
    <option selected="selected">Sélectionner la formation :</option>
    <?php
    mysql_connect("localhost","root", "");
    mysql_select_db("bdd");
    $requette = mysql_query("SELECT * FROM famillearticle ORDER BY code_fart");
    mysql_close();
 
    while ($ligne = mysql_fetch_array($requette))
    {
      $li_art = $ligne['li_art'];
      $id_fam_ex = $ligne['id_fam'];
 
      if ($id_fam==$id_fam_ex)
      {
        ?>
        <option value="<?php echo $id_fam_ex; ?>" selected="selected"><?php echo $li_art; ?></option>
        <?php
      }
 
      else
      {
        ?>
        <option value="<?php echo $id_fam_ex; ?>"><?php echo $li_art; ?></option>
        <?php
      }
    }
    ?>
    </select>
    </td>
</tr>
 
<tr><td colspan="2"><br/></td></tr>
 
<tr><td>article :</td>
    <td>
    <select name="id_art">
    <option selected="selected">Sélectionner l'article :</option>
    <?php
    mysql_connect("localhost","root", "");
    mysql_select_db("bdd");
    $requette = mysql_query("SELECT * FROM article WHERE id_fam='$id_fam' ORDER BY n_art");
    mysql_close();
 
    while ($ligne = mysql_fetch_array($requette))
    {
      $id_art_ex = $ligne['id_art'];
      $n_art = $ligne['n_art'];
 
      if ($id_art==$id_art_ex)
      {
        ?>
        <option value="<?php echo $id_art_ex; ?>" selected="selected"><?php echo $n_art; ?></option>
        <?php
      }
 
      else
      {
        ?>
        <option value="<?php echo $id_art_ex; ?>"><?php echo $n_art; ?></option>
        <?php
      }
    }
    ?>
    </select>
    </td>
</tr>
<tr><td colspan="2"><br /></td></tr>
 
<tr><td>Quantité :</td>
    <td><input name="qte" type="text" /></td>
</tr>
 <tr><td><input name="n_facture" value="<?php echo"$n_facture"; ?>" type="hidden" /></td></tr>
<tr><td colspan="2"><br /></td></tr>
 
<tr><td colspan="2"><input type="submit" value="insérer" /></td>
</tr>
</form>
</table>
 
<?php
mysql_connect("localhost","root", "");
mysql_select_db("bdd");
mysql_query ("INSERT INTO element_facture (id, id_fa, id_art, n_art, qte, p_u_art, tva, p_u_net) VALUES ('', '$n_facture', '$id_art', '$n_art_ex', '$qte', '$p_u_art', '17', '$p_u_art')") or die (mysql_error ());
mysql_close();
?>
 
<table align="center" width="800" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="800">
<img src="facture/facture.png">
</td>
 
 
</tr>
 
<tr>
<td colspan="3">
<br/>
<p style="text-align : right; margin-right : 10px; margin-top : 0px; margin-bottom : 0px">Client : <b><?php echo "$n_cli";?></b></p>
<br/><br/>
</td>
</tr>
 
<tr>
<td colspan="3">
<span style="margin-left : 10px; font-weight : bold; font-size : 20px;">Facture n° <?php echo"$n_facture"; ?></span>
<br/><br/>
</td>
</tr>
</table>
 
<table align="center" width="800" border="1">
<tr>
<td width="25%" align="center" bgcolor="#000000"><span style="color : #FFFFFF;">Date de facturation</span></td>
<td width="25%" align="center" bgcolor="#000000"><span style="color : #FFFFFF;">Code client</span></td>
<td width="25%" align="center" bgcolor="#000000"><span style="color : #FFFFFF;">Vos réferences</span></td>
<td width="25%" align="center" bgcolor="#000000"><span style="color : #FFFFFF;">Nos réferences</span></td>
</tr>
 
<tr>
<td width="25%" align="center"><p style="margin-top : 10px; margin-bottom : 10px; font-size : 20px;"><?php echo "$jour/$mois/$annee";?><br/><span style="font-size : 15px;">à <?php echo $heure; ?>:<?php echo $minute; ?>:<?php echo $seconde; ?></span></p></td>
<td width="25%" align="center"><p style="margin-top : 10px; margin-bottom : 10px;"></p><b><?php echo "$n_cli";?></b></td>
<td width="25%" align="center"><p style="margin-top : 10px; margin-bottom : 10px;">Nos réferences</p></td>
<td width="25%" align="center"><p style="margin-top : 10px; margin-bottom : 10px;">Nos réferences</p></td>
</tr>
</table>
 
<table align="center" width="800" border="1">
<tr>
<td align="center" bgcolor="#000000"><span style="color : #FFFFFF;">Réferences</span></td>
<td align="center" bgcolor="#000000"><span style="color : #FFFFFF;">Désignation</span></td>
<td align="center" bgcolor="#000000"><span style="color : #FFFFFF;">Qté</span></td>
<td align="center" bgcolor="#000000"><span style="color : #FFFFFF;">P.U.(HT)</span></td>
<td align="center" bgcolor="#000000"><span style="color : #FFFFFF;">TVA</span></td>
<td align="center" bgcolor="#000000"><span style="color : #FFFFFF;">P.U. Net (HT)</span></td>
<td align="center" bgcolor="#000000"><span style="color : #FFFFFF;">Montant (HT)</span></td>
</tr>
<?php
mysql_connect("localhost","root", "");
mysql_select_db("bdd");
$requette = mysql_query("SELECT * FROM element_facture WHERE id_fa='$n_facture' ")or die(mysql_error());
mysql_close();
 
$montant_total = 0;
 
While ($ligne = mysql_fetch_array($requette))
{
  $id_art = $ligne['id_art'];
  $n_art = $ligne['n_art'];
  $qte = $ligne['qte'];
  $p_u_art = $ligne['p_u_art'];
  $tva = $ligne['tva'];
  $montant_art = $p_u_art * $qte;
 
  $montant_total = $montant_total + $montant_art;
 
  ?>
  <tr>
  <td align="center" width="130"><p style="font-family : arial; font-size : 10pt; margin-top : 10px; margin-bottom : 10px; font-size : 12px;"><?php echo"$id_art"; ?></p></td>
  <td align="left"><p style="font-family : arial; margin-left : 05px; margin-top : 10px; margin-bottom : 10px;  margin-bottom : 10px; font-size : 12px;"><?php echo"$n_art"; ?></p></td>
  <td align="center" width="50"><p style="font-family : arial; margin-top : 10px; margin-bottom : 10px; font-size : 12px;"><?php echo"$qte"; ?></p></td>
  <td align="center" width="100"><p style="font-family : arial; margin-top : 10px; margin-bottom : 10px; font-size : 12px;"><?php echo"$p_u_art"; ?></p></td>
  <td align="center" width="50"><p style="font-family : arial; margin-top : 10px; margin-bottom : 10px; font-size : 12px;">17 %</p></td>
  <td align="center" width="100"><p style="font-family : arial; margin-top : 10px; margin-bottom : 10px; font-size : 12px;"><?php echo"$p_u_art"; ?></p></td>
  <td align="center" width="100"><p style="font-family : arial; margin-top : 10px; margin-bottom : 10px; font-size : 12px;"><?php echo"$montant_art"; ?></p></td>
  </tr>
  <?php
}
?>
 
 
<tr>
<td align="left" colspan="6"><p style="font-family : arial; margin-top : 20px; margin-bottom : 60px; margin-left : 350px; font-size : 12px;">Total montant hors taxe soumis à TVA 17 %<br/>Total TVA à 17 %</p></td>
<td align="center" width="100"><p style="font-family : arial; margin-top : 20px; margin-bottom : 60px; font-size : 12px;"><?php echo"$montant_total"; ?></p></td>
</tr>
</table>