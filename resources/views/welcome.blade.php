<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AlgoTrade</title>

  <!-- Add Bootstrap CSS in the head section -->
  <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" />
  <link rel="stylesheet" href="{{asset('front/css/style.css')}}" />
  <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="https://widgets.coingecko.com/coingecko-coin-list-widget.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <style>
     .cstm-badge{
    bottom: 43px;
    left: 13px;
  }
  .bell_icon{
    top:13px;
  }
  </style>
</head>

<body >

  <div id="app" >
    <mainapp />
  </div>


  <script src="{{asset('js/app.js')}}"></script>


</body>

</html>