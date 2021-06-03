<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Reporting</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Reporting</h3>
                <hr>
            </div>
            <div class="col-3 mb-2">
                <div class="card">
                    <div class="card-body">
                      <small class="card-title">Customers</small>
                      <p class="card-text">{{$total_number_of_customer}}</p>
                      
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                      <small class="card-title">Customers using app</small>
                      <p class="card-text">{{$total_number_of_customer_mobile_app}}</p>
                      
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                      <small class="card-title">Customer using Browers</small>
                      <p class="card-text">{{$total_number_of_customer_mobile_browser}}</p>
                      
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                      <small class="card-title">Female customer</small>
                      <p class="card-text">{{$female_customer}}</p>
                      
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                      <small class="card-title">Male customer</small>
                      <p class="card-text">{{$male_customer}}</p>
                      
                    </div>
                </div>
            </div>
            
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                      <small class="card-title">Adult customers</small>
                      <p class="card-text">{{$age['adult']}}</p>
                    
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                      <small class="card-title">Adolescence customers</small>
                      <p class="card-text">{{$age['adolescence']}}</p>
                    
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                      <small class="card-title">Child customers</small>
                      <p class="card-text">{{$age['child']}}</p>
                    
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                      <small class="card-title">Senior customers</small>
                      <p class="card-text">{{$age['senior']}}</p>
                    
                    </div>
                </div>
            </div>
            <div class="col-9"></div>
            <div class="col-3">
                <canvas id="bydevice" width="100px" height="100px"></canvas>
            </div>
            <div class="col-3">
                <canvas id="bygender" width="100px" height="100px"></canvas>
            </div>
            <div class="col-3">
                <canvas id="byage" width="100px" height="100px"></canvas>
            </div>
            <div class="col-3">
                <canvas id="bycountry" width="100px" height="100px"></canvas>
            </div>
        </div>
    </div>



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<script> 
    var myChart = new Chart(document.getElementById('bydevice').getContext('2d'), {
        type: 'pie',
        data: {
            labels: [
                'App',
                'Browser' 
            ],
            datasets: [{ 
                data: [
                    {{ $total_number_of_customer_mobile_app }}, 
                    {{ $total_number_of_customer_mobile_browser }}
                ],
                backgroundColor: [
                    'darkyellow',
                    'lightblue' 
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Customers by Device'
                }
            }
        }
    });
</script>
<script> 
    var myChart = new Chart(document.getElementById('bygender').getContext('2d'), {
        type: 'pie',
        data: {
            labels: [
                'Male',
                'Female' 
            ],
            datasets: [{ 
                data: [
                    {{ $female_customer }}, 
                    {{ $male_customer }}
                ],
                backgroundColor: [
                    'blue',
                    'pink' 
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Customers by Gender'
                }
            }
        }
    });
</script>
<script> 
    var myChart = new Chart(document.getElementById('byage').getContext('2d'), {
        type: 'pie',
        data: {
            labels: [
                'child',
                'adolescence' ,
                'adult',
                'senior'
            ],
            datasets: [{ 
                data: [
                    {{ $age['child'] }}, 
                    {{ $age['adolescence'] }},
                    {{ $age['adult'] }},
                    {{ $age['senior'] }}
                ],
                backgroundColor: [
                    'pink',
                    'blue',
                    'gray',
                    'red'
                    
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Customers by Age'
                }
            }
        }
    });
</script>
<script> 
    var myChart = new Chart(document.getElementById('bycountry').getContext('2d'), {
        type: 'pie',
        data: {
            labels: [
                'ASIA',
                'EUROPE',
                'US',
                'AUSTRALIA'
            ],
            datasets: [{ 
                data: [
                    {{ $country['ASIA'] }}, 
                    {{ $country['EUROPE'] }},
                    {{ $country['US'] }},
                    {{ $country['AUSTRALIA'] }}
                ],
                backgroundColor: [
                    'purple',
                    'blue',
                    'gray',
                    'red'
                    
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Customers by Country'
                }
            }
        }
    });
</script>
</body>
</html>