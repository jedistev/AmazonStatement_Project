<?php
// Database Connection
$queryPie = "SELECT  
    CONCAT(settlement_start_date,' - ', settlement_end_date) As Date,
    total_amount
FROM settlements
GROUP BY settlement_id";
$result = mysqli_query($conn, $queryPie);
?>  
<script type="text/javascript">

    
    google.charts.setOnLoadCallback(drawBasic);
    function drawBasic() {

        var data = google.visualization.arrayToDataTable([
            ['City', '2010 Population', ],
            ['New York City, NY', 8175000],
            ['Los Angeles, CA', 3792000],
            ['Chicago, IL', 2695000],
            ['Houston, TX', 2099000],
            ['Philadelphia, PA', 1526000]
        ]);

        var options = {
            title: 'Population of Largest U.S. Cities',
            chartArea: {width: '50%'},
            hAxis: {
                title: 'Total Population',
                minValue: 0
            },
            vAxis: {
                title: 'City'
            }
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

        chart.draw(data, options);
    }
</script>
