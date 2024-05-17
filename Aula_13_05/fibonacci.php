<?php require_once 'cabecalho.php'; 

$a=0;
$b=1;
$contador=1;
echo "<p class='resposta'>$a - $b";
echo "$a - $b -";
while($contador<=20){
	$proximo=$a+$b;
	echo "$proximo - ";
	$a=$b;
	$b=$proximo;
	$contador++;
}
echo "</p>";

?>
</body>
</html>