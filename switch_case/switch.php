<form action="switch.php" method="POST">
	Entre com um número de 1 a 7
	<input type="number" name="num" min="1" max="7">
	<button type="submit">Enviar</button>
</form>
<?php
	switch (@$_POST['num']) {
		case 1:
			print "Domingo";
			break;
		case 2:
			print "Segunda-feira";
			break;
		case 3:
			print "Terça-feira";
			break;
		case 4:
			print "Segunda-feira";
			break;
		case 5:
			print "Quinta-feira";
			break;
		case 6:
			print "Sexta-feira";
			break;
		case 7:
			print "Sábado";
			break;
	}