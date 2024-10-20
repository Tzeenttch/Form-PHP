<?php
file_put_contents("csv/paises.csv","id_pais,nombre
1,España
2,Francia
3,Italia
4,Alemania
5,Portugal
6,Reino Unido
7,Bélgica
8,Suiza
9,Países Bajos
10,Austria
");
header("Location: ../indecx.php");
?>

<?php
file_put_contents("csv/comunidades.csv","id_comunidad,nombre_comunidad,id_pais
1,Madrid,1
2,Cataluña,1
3,Andalucía,1
4,Île-de-France,2
5,Provenza-Alpes-Costa Azul,2
6,Nueva Aquitania,2
7,Lombardía,3
8,Lacio,3
9,Piamonte,3
10,Baviera,4
11,Baden-Wurtemberg,4
12,Renania del Norte-Westfalia,4
13,Lisboa,5
14,Porto,5
15,Algarve,5
16,Inglaterra,6
17,Escocia,6
18,Gales,6
19,Flandes,7
20,Valonia,7
21,Zúrich,8
22,Ginebra,8
23,Ámsterdam,9
24,Rotterdam,9
25,Viena,10
26,Salzburgo,10
");
header("Location: ../index.php");
?>