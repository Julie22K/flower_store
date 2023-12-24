<?php
session_start();
$name_page="Статистика";
?>
<?php require 'blocks/header.php'; ?>
<?php require 'blocks/menu.php'; ?>
<!--code-->
<div class="container">
    <h1><?=$name_page?></h1>
    <?php
    function calcDef($current,$prev){
        $res=100-(($prev*100)/$current);
        //echo "100-((" . $prev . "*100)/" . $current . ")\n";
        return round($res,1);
    }

    $data=mysqli_fetch_all(mysqli_query($db, "SELECT (SELECT sum(p.price) as res1 from sales as s JOIN products as p ON s.product_id=p.id WHERE MONTH(s.date) = MONTH(CURRENT_DATE()) AND YEAR(s.date) = YEAR(CURRENT_DATE())) as res1,
    (SELECT sum(e.zarplata) as res2 FROM employee as e) as res2,
    (SELECT sum(m.price) as res3 FROM materials as m WHERE MONTH(m.date) = MONTH(CURRENT_DATE()) AND YEAR(m.date) = YEAR(CURRENT_DATE())) as res3 FROM sales;"))[0];
    //d - дохід, v - витрати, p - прибуток
    $data_current_month=["all_d"=>$data[0],"all_v"=>($data[1]+ $data[2]),"all_p"=>($data[0]-($data[1]+ $data[2])),"d_sales"=>$data[0],"v_zarplata"=>$data[1],"v_materials"=>$data[2]];
    $data=mysqli_fetch_all(mysqli_query($db, "SELECT (SELECT sum(p.price) as res1 from sales as s JOIN products as p ON s.product_id=p.id WHERE MONTH(s.date) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH) AND YEAR(s.date) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH)) as res1,
    (SELECT sum(e.zarplata) as res2 FROM employee as e) as res2,
    (SELECT sum(m.price) as res3 FROM materials as m WHERE MONTH(m.date) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH) AND YEAR(m.date) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH)) as res3 FROM sales;"))[0];
    
    $data_previous_month=["all_d"=>$data[0],"all_v"=>($data[1]+ $data[2]),"all_p"=>($data[0]-($data[1]+ $data[2])),"d_sales"=>$data[0],"v_zarplata"=>$data[1],"v_materials"=>$data[2]];
    $results=[
        "d"=>calcDef($data_current_month["all_d"],$data_previous_month["all_d"]),
        "v"=>calcDef($data_current_month["all_v"],$data_previous_month["all_v"]),
        "p"=>calcDef($data_current_month["all_p"],$data_previous_month["all_p"]),
    ];
    ?>
    <div class="col">
        <div class="row">
            <div class="card m-2" style="width: 23rem;">
                <div class="card-body">
                    <h5 class="card-title">Дохід</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?=$results["d"]<0?$results["d"]:"+" . $results["d"]?>%</h6>
                    <p class="card-text">За поточний місяць: <?=$data_current_month["all_d"]?> грн</p>
                    <p class="card-text">За минулий місяць: <?=$data_previous_month["all_d"]?> грн</p>
                </div>
            </div>
            <div class="card m-2" style="width: 23rem;">
                <div class="card-body">
                    <h5 class="card-title">Витрати</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?=$results["v"]<0?$results["v"]:"+" . $results["v"]?>%</h6>
                    <p class="card-text">За поточний місяць: <?=$data_current_month["all_v"]?> грн</p>
                    <p class="card-text">За минулий місяць: <?=$data_previous_month["all_v"]?> грн</p>
                </div>
            </div>
            <div class="card m-2" style="width: 22rem;">
                <div class="card-body">
                    <h5 class="card-title">Прибуток</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?=$results["p"]<0?$results["p"]:"+" . $results["p"]?>%</h6>
                    <p class="card-text">За поточний місяць: <?=$data_current_month["all_p"]?> грн</p>
                    <p class="card-text">За минулий місяць: <?=$data_previous_month["all_p"]?> грн</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card m-2 з-4" style="width: 36rem;" id="chart"></div>
            <div class="card m-2 p-4" style="width: 33rem;">
            <h5>За поточний місяць:</h5>
                <ul style="list-style:none">Дохід:
                    <li>Продажі: <?=$data_current_month["all_d"]?> грн</li>
                </ul>
                <ul style="list-style:none">Витрати:
                    <li>Матеріали: <?=$data_current_month["v_materials"]?>грн</li>
                    <li>Зарплати: <?=$data_current_month["v_zarplata"]?> грн</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--code-->
<script>
    <?php
    $data=mysqli_fetch_all(mysqli_query($db, "SELECT count(s.id) as number, sum(p.price)as v,DAY(s.date),MONTH(s.date) from sales as s JOIN products as p ON s.product_id=p.id WHERE YEAR(s.date) = YEAR(CURRENT_DATE()) AND MONTH(s.date) = MONTH(CURRENT_DATE()) GROUP BY s.date;"));
    $res1=[];
    $res2=[];
    $res3=[];
    foreach($data as $item){
        array_push($res1,$item[0]);
        array_push($res2,$item[1]);
        array_push($res3,$item[2]);
    }
    $res1_=join(", ",$res1);
    $res2_=join(", ",$res2);
    $res3_=join(", ",$res3);
    ?>
     var options = {
          series: [{
          name: 'Продані товари(к-сть)',
          data: [<?=$res1_?>]
        }, {
          name: 'Виручка',
          data: [<?=$res2_?>]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: [<?=$res3_?>],
        },
        yaxis: {
          title: {
            text: ''
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val + " грн"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
      
</script>
<?php require 'blocks/footer.php'; ?>