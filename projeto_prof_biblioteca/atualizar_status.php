<?php

// Se passou da data e ainda está emprestado, vira atrasado
$sql_atrasado = "UPDATE emprestimo
                 SET status_emprestimo = 'ATRASADO'
                 WHERE devolucao_emprestimo < CURDATE()
                 AND status_emprestimo = 'EMPRESTADO'";

$conn->query($sql_atrasado);


// Se a data foi renovada para hoje ou futuro, volta para emprestado
$sql_emprestado = "UPDATE emprestimo
                   SET status_emprestimo = 'EMPRESTADO'
                   WHERE devolucao_emprestimo >= CURDATE()
                   AND status_emprestimo = 'ATRASADO'";

$conn->query($sql_emprestado);