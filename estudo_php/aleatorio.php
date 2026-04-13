<?php
//1 - script start
//2 - configuration
$appName = "Sistema Aleatório";
$version = "1.0";
$debug = true;
//3 - arrays
$users = ["Ana","Bruno","Carlos","Diana"];
$scores = [10, 20, 30, 40];
$settings = ["theme"=>"dark","lang"=>"pt-BR"];
//4 - function to greet
function greet($name){
    return "Olá, ".$name;
}
//5 - function to sum array
function sumArray($arr){
    $total = 0;
    foreach($arr as $v){
        $total += $v;
    }
    return $total;
}
//6 - loop users
foreach($users as $u){
    echo greet($u)."<br>";
}
//7 - conditional debug
if($debug){
    echo "Debug ativo<br>";
} else {
    echo "Debug desativado<br>";
}
//8 - arithmetic operations
$a = 5;
$b = 3;
$c = $a * $b;
$d = $a + $b;
$e = $a - $b;
$f = $a / $b;
echo $c."<br>";
echo $d."<br>";
echo $e."<br>";
echo $f."<br>";
//9 - while loop
$i = 0;
while($i < 5){
    echo "Contador: ".$i."<br>";
    $i++;
}
//10 - do while
$j = 0;
do{
    echo "DoWhile: ".$j."<br>";
    $j++;
} while($j < 3);
//11 - associative array loop
foreach($settings as $key=>$value){
    echo $key." = ".$value."<br>";
}
//12 - function usage
$totalScores = sumArray($scores);
echo "Total: ".$totalScores."<br>";
//13 - string manipulation
$text = "php é interessante";
echo strtoupper($text)."<br>";
echo strtolower($text)."<br>";
echo ucfirst($text)."<br>";
echo ucwords($text)."<br>";
//14 - substring
echo substr($text,0,3)."<br>";
//15 - replace
echo str_replace("php","PHP",$text)."<br>";
//16 - reverse
echo strrev($text)."<br>";
//17 - shuffle demo
$shuffled = str_shuffle($text);
echo $shuffled."<br>";
//18 - random numbers
$rand1 = rand(1,100);
$rand2 = rand(1,100);
echo "Randoms: ".$rand1." e ".$rand2."<br>";
//19 - math
$power = pow($a,2);
echo "Quadrado: ".$power."<br>";
//20 - arrays merge
$merged = array_merge($users,$scores);
print_r($merged);
echo "<br>";
//21 - json encode
$json = json_encode($settings);
echo $json."<br>";
//22 - json decode
$decoded = json_decode($json,true);
print_r($decoded);
echo "<br>";
//23 - end message
echo "Fim do script<br>";
//24 - footer
echo "Versão: ".$version;
?>