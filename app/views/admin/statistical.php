<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f8f9fa;
        text-align: center;
    }

    .chart-container {
        width: 80%;
        margin: 20px auto;
        padding: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #333;
    }
</style>

<div class="page-content">

    <!-- Start Container Fluid -->
    <div class="container-xxl">

        <h2 class="mb-2">Thống Kê Doanh Thu</h2>

        <!-- Biểu đồ doanh thu theo ngày -->
        <div class="chart-container">
            <h3>Doanh Thu Theo Ngày</h3>
            <canvas id="dailyRevenue"></canvas>
        </div>

        <!-- Biểu đồ doanh thu theo tháng -->
        <div class="chart-container">
            <h3>Doanh Thu Theo Tháng</h3>
            <canvas id="monthlyRevenue"></canvas>
        </div>

        <!-- Biểu đồ doanh thu theo năm -->
        <!-- <div class="chart-container">
            <h3>Doanh Thu Theo Năm</h3>
            <canvas id="yearlyRevenue"></canvas>
        </div> -->
    </div>

</div>
<?php 
    $dataDaily = [];
    foreach($totalPriceDate as $priceDaily){
        $dataDaily[] = $priceDaily['price'];
    }
    $jsonDataDaily = json_encode($dataDaily); 
    
    $dataMonth = [];
    foreach($totalPriceMonth as $priceMoth){
        $dataMonth[] = $priceMoth['price'];
    }
    $jsonDataMoth = json_encode($dataMonth); 
   
?>
<script>
    // Dữ liệu giả lập
    const dailyData = <?=$jsonDataDaily?>;
    const monthlyData = <?=$jsonDataMoth?>;
    const yearlyData = [75000, 82000, 89000, 96000, 103000];

    // Biểu đồ Doanh Thu Theo Ngày
    new Chart(document.getElementById('dailyRevenue'), {
        type: 'bar',
        data: {
            labels: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "CN"],
            datasets: [{
                label: "Doanh thu (VND)",
                backgroundColor: "#4CAF50",
                data: dailyData
            }]
        }
    });

    // Biểu đồ Doanh Thu Theo Tháng
    new Chart(document.getElementById('monthlyRevenue'), {
        type: 'line',
        data: {
            labels: ["T1", "T2", "T3", "T4", "T5", "T6", "T7", "T8", "T9", "T10", "T11", "T12"],
            datasets: [{
                label: "Doanh thu (VND)",
                borderColor: "#007BFF",
                fill: false,
                data: monthlyData
            }]
        }
    });

    // Biểu đồ Doanh Thu Theo Năm
    // new Chart(document.getElementById('yearlyRevenue'), {
    //     type: 'pie',
    //     data: {
    //         labels: ["2020", "2021", "2022", "2023", "2024"],
    //         datasets: [{
    //             backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF"],
    //             data: yearlyData
    //         }]
    //     }
    // });
</script>