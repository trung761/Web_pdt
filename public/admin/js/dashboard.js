    const ctx = document.getElementById('Pageviews').getContext('2d');
    const Pageviews = new Chart(ctx,{
        type: 'bar',
        data: {
            labels:['Thứ 2', 'Thứ 3','Thứ 4','Thứ 5','Thứ 6','Thứ 7','Chủ nhật'],
            datasets:[{
                label: 'Lượng truy cập',
                data: [10, 20, 30, 15, 25, 40, 55],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    
                    ticks: {
                        precision: 0,
                        callback: function(value) {
                        return value; 
                        }
                    }
                }
            },  
            animation: {
                duration: 2000,
                easing: 'easeOutBounce'
            },
            responsive: true,
            maintainAspectRatio: false,
            barPercentage: 0.7,
            categoryPercentage: 0.9
        }
    })
    console.log(Pageviews.options.scales.y);
    // Pageviews.update();
    window.addEventListener('resize', function() {
        Pageviews.resize();
    });
