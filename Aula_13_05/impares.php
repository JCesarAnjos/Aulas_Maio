<?php require_once 'cabecalho.php'; 

$impares=0;
$contador=0;

do{
	if($contador%2!=0){
		$impares++;
	}
	$contador++;
}while ($contador<=100);

echo "<h2>A quantidade de números ímpares de 0 a 100 é $impares</h2>";
?>
</body>
</html>