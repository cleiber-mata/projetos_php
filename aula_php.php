<?php

header('Content-Type: text/html; charset=utf-8');

$txt = 'Acredite em si proprio e chegara um dia em que os 
outros nao terao outra escolha senao acreditar com voce.'; 


echo strlen($txt); echo '<br>'; 
echo str_word_count($txt); echo '<br>'; 
echo strtoupper($txt); echo '<br>';
echo strtolower($txt); echo '<br>'; 
echo ucfirst($txt); echo '<br>'; 
echo ucwords($txt); echo '<br>'; 
echo substr($txt, 0, 12); echo '<br>'; 
echo str_shuffle($txt); echo '<br>'; 
echo str_replace('Acredite', '******', $txt); echo '<br>'; 
echo str_replace('Acredite', 'xxxxxxx', $txt); echo '<br>'; 
echo strrev($txt); echo '<br>'; 
echo ucwords('================================'); echo '<br>'; echo '<br>';
$palavrao = ['fela', 'feio', 'puta', 'praga', 'trapo']; 
$txt2 = 'Praga, você é muito fela e tbm muito feio e sua mãe é uma puta.'; 
echo ucfirst($txt2); echo '<br>'; 
echo str_ireplace($palavrao, '******', $txt2); echo '<br>'; 
echo ucwords('================================'); echo '<br>'; echo '<br>'; 
$txt3_nome = 'Cleiber'; 
$txt4_sobrenome = 'Mata'; 
$txt5_data_nascimento = '31/01/1979'; 
$Nome_Completo = $txt3_nome. ' '. $txt4_sobrenome. ' - '. $txt5_data_nascimento; 
echo ucfirst($Nome_Completo); echo '<br>'; 
echo str_shuffle($Nome_Completo); 
$senha = str_shuffle($Nome_Completo); echo '<br>'; 
echo substr($senha, 0, 10); echo '<br>'; 
echo ucwords('================================'); echo '<br>'; echo '<br>'; 
$txt6_aleatorio = 'Descubra como usar ferramentas de IA para turbinar sua produtividade.'; 
echo ucfirst($txt6_aleatorio); echo '<br>'; 
echo ucwords($txt6_aleatorio); echo '<br>'; 
echo ucwords('================================'); echo '<br>'; echo '<br>'; 
echo strlen($txt6_aleatorio); echo '<br>'; 
echo('A quatidade de caracteres da frase: ' . $txt6_aleatorio . ' é ' . strlen($txt6_aleatorio) . '.'); 
echo '<p>Teste</p>'; 
echo '<h1>Teste</h1>'; 
echo '<h2>Teste</h2>'; 
echo '<h3>Teste</h3>';

echo '<br>';

$clm = 'Luiz Miguel da Mata';
echo '"echo" mostra na tela'; echo '<br>';
echo 'strlen() conta caracteres: '; echo strlen($clm); echo '<br>';
echo 'str_word_count() conta as palavras: '; echo str_word_count($clm); echo '<br>';
echo 'strtoupper() mostra tudo maiusculo: '; echo strtoupper($clm); echo '<br>';
echo 'strtolower() mostra tudo minusculo: '; echo strtolower($clm);  echo '<br>';



?>