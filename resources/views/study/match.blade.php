<x-theme title="">
    <section>
        <div class="container">
            <br>
            <br>
            <div class="section-header text-center">
                <h1 class="h2">หลักสูตรในคณะวิทยาศาสตร์ที่เหมาะกับคุณ</h1>
            </div>
            <div>

                <div style="max-width: 600px; margin:auto;">
                    <canvas id="radarChart"></canvas>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    // Sample data for the radar chart
                    var codes = JSON.parse(`<?php echo json_encode($codes); ?>`);
                    var values = JSON.parse(`<?php echo json_encode($values); ?>`);
                    var majors = JSON.parse(`<?php echo json_encode($majors); ?>`);



                    var data = {
                        // labels: ["Label 1", "Label 2", "Label 3", "Label 4", "Label 5"],
                        labels: codes.map(function(item) {
                            return majors[item]
                        }),
                        datasets: [{
                            label: "",
                            backgroundColor: "rgba(179,181,198,0.2)",
                            borderColor: "rgba(179,181,198,1)",
                            pointBackgroundColor: "rgba(179,181,198,1)",
                            pointBorderColor: "#fff",
                            pointHoverBackgroundColor: "#fff",
                            pointHoverBorderColor: "rgba(179,181,198,1)",
                            // data: [65, 59, 90, 81, 56],
                            data: values,
                        }],
                    };

                    // Options for the radar chart
                    var options = {
                        scales: {
                            r: {
                                beginAtZero: true,
                                min: 0,
                                max: 3,
                                ticks:{
                                    stepSize: 1
                                }
                            },
                        }
                    };

                    // Get the context of the canvas element we want to select
                    var ctx = document.getElementById("radarChart").getContext("2d");

                    // Create the radar chart
                    var myRadarChart = new Chart(ctx, {
                        type: "radar",
                        data: data,
                        options: options,
                    });
                </script>



            </div>
            <div class="text-center">
                <a href="{{ route('study-question') }}" class="btn btn-outline-primary mb-0">
                    กลับไปยังคำถาม
                </a>
                <a href="http://ent.vru.ac.th/Webregister/pages/index_insert_nm.php?fct_id=1" target="_blank"
                    class="btn btn-primary mb-0">
                    สมัครเรียน
                </a>
            </div>
        </div>
    </section>
</x-theme>