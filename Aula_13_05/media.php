<?php require_once 'cabecalho.php'; 

$media=0;
$contador=1;
do{
	$media=$media+$contador;
	$contador++;
}while ($contador<=100);
$media=$media/100;
echo "<h2>A média dos números de 1 a 100 é $media</h2>";
?>
</body>
</html>