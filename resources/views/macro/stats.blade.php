@extends('layouts.main')
@section('content')


    <div id="canvas-holder" style="width:100%">
        <center><span id="preview-textfield"></span><span> Voltios</span></center>
        <canvas id="chart"></canvas>
        
    </div>

    @push('scripts')
    <script src="https://bernii.github.io/gauge.js/dist/gauge.min.js"></script>
         
        <script>

    var opts = {
        angle: -0.01, // The span of the gauge arc
        lineWidth: 0.20, // The line thickness
        radiusScale: 1, // Relative radius
        pointer: {
          length: 0.35, // // Relative to gauge radius
          strokeWidth: 0.035, // The thickness
          color: '#00000' // Fill color
        },
        limitMax: false,     // If false, max value increases automatically if value > maxValue
        limitMin: false,     // If true, the min value of the gauge will be fixed
        colorStart: '#6F6EA0',   // Colors
        colorStop: '#C0C0DB',    // just experiment with them
        strokeColor: '#EEEEEE',  // to see which ones work best for you
        generateGradient: true,
        highDpiSupport: true,     // High resolution support
        // renderTicks is Optional
        
        staticZones: [
          {strokeStyle: "red", min: 0, max: 2},
          {strokeStyle: "yellow", min: 2, max: 3}, 
          {strokeStyle: "green", min: 3, max: 5}, 
          {strokeStyle: "yellow", min: 5, max: 6}, 
          {strokeStyle: "red", min: 6, max: 8},
          
        ],
        staticLabels: {
            font: "10px sans-serif",  // Specifies font
            labels: [0, 2, 3,  5, 6, 8],  // Print labels at these values
            color: "#000000",  // Optional: Label text color
            fractionDigits: 2  // Optional: Numerical precision. 0=round off.
            },
      };
      var target = document.getElementById('chart'); // your canvas element
      var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
      gauge.maxValue = 8; // set max gauge value
      gauge.setMinValue(0);  // Prefer setter over gauge.minValue = 0
      gauge.animationSpeed = 10; // set animation speed (32 is default value)
      gauge.set(3); // set actual value
      gauge.setTextField(document.getElementById("preview-textfield"));

            
        </script>
    @endpush
@endsection
