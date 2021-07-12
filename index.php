<?php
include("templates/navbar.php")
?>

<br>
<br>
<br>

<div class="text-center">

    <?php
        $arr=array(array("nombre"=>"CETES", "porcentaje"=>3, "inversion"=>9000, "meses"=>8),
            array("nombre"=>"Pagare", "porcentaje"=>5, "inversion"=>12000, "meses"=>8),
            array("nombre"=>"CEDES", "porcentaje"=>2.5, "inversion"=>13500, "meses"=>8),
            array("nombre"=>"Inversion Inteligente", "porcentaje"=>3.5, "inversion"=>15000, "meses"=>8));
    ?>

    <table class="table">
        <thead class="">
            <tr>
                <th scope="col">
                    MES
                </th>

                <th scope="col">
                    Plan de Inversio
                </th>

                <th scope="col">
                    Rendimiento Mensual
                </th>

                <th scope="col">
                    Cantidad Invertida
                </th>

                <th scope="col">
                    Meses
                </th>

                <th scope="col">
                    Total Rendimiento
                </th>

                <th scope="col">
                    Total a cobrar
                </th>
            </tr>
        </thead>

        <?php
        $totalRendimientos=0;
        $totalCobrar=0;
        $tCobrar=0;
        $totalrendimiento=0;

        for($i=0;$i<count($arr);$i++){
            $mes=$i+1;
            $cantidadinvertida=$arr[$i]['inversion'];
            $calculo=$arr[$i]['porcentaje'] * 0.01;

            for($p=0;$p<$arr[$i]['meses'];$p++){
                if ($arr[$i]['inversion']==$cantidadinvertida){
                    $totalrendimiento=$arr[$i]['inversion']*$calculo;
                    $tCobrar=$arr[$i]['inversion']+$totalrendimiento;
                    $cantidadinvertida=$tCobrar;
                }else{
                    $totalrendimiento=$cantidadinvertida*$calculo;
                    $tCobrar=$cantidadinvertida+$totalrendimiento;
                    $cantidadinvertida=$tCobrar;
                }
            }
            
            $totalRendimientos=$totalRendimientos+$totalrendimiento;
            $totalCobrar=$totalCobrar+$tCobrar;
            
            if ($i==0){
            $valori=$totalrendimiento;
            $mayor=$arr[$i]['nombre'];
            }else if($totalrendimiento>$valori){
            $valori=$totalrendimiento;
            $mayor=$arr[$i]['nombre'];
            }

            if ($i==0){
                $valorp=$tCobrar;
                $mayori=$arr[$i]['nombre'];
            }else if($tCobrar>$valorp){
                $valorp=$tCobrar;
                $mayori=$arr[$i]['nombre'];
            }
                echo "<tr>
                    <td>".$mes."</td>
                    <td>".$arr[$i]['nombre']."</td>
                    <td>".$arr[$i]['porcentaje']."%</td>
                    <td>".$arr[$i]['inversion']."</td>
                    <td>".$arr[$i]['meses']."</td>
                    <td>".round($totalrendimiento,3)."</td>
                    <td>".round($tCobrar,3)."</td>
                </tr>";
        }
        echo "<tr><td> Totales:</td><td></td><td></td><td></td><td></td><td>" .round($totalRendimientos,3). "</td><td>" .round($totalCobrar,3). "</td></tr>";
        echo "</table><br>";
        echo "¿Cuál inversión reportó mayor rendimiento? <br>  Inversión:  ".$mayor." Ganancia:".round($valori,3)."<br>";
        echo "¿Con cuál inversión se cobró más ? <br> Inversión: ".$mayori." Cantidad:".round($valorp,3)."";

        ?>
    </table>
</div>

<br>
<br>
<br>

<?php
include("templates/footer.php")
?>