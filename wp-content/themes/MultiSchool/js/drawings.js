(function(){
    $('document').ready(function(){
        var canvasList = $('canvas');
    /*var color = '#0085A1';
    var max = 100;*/
    
    var gauge=canvasList.filter('.gauge');
    var skillbar=canvasList.filter('.skillbar');
    var circle=canvasList.filter('.circle');
    
    gauge.each(function(i,canvas){
        drawGauge(canvas, $(this).data('max'), $(this).data('color'));
    });
    
    skillbar.each(function(i,canvas){
        drawSkillBar(canvas, $(this).data('max'), $(this).data('color'));
    });
    
    circle.each(function(i,canvas){
        drawCircle(canvas, $(this).data('max'), $(this).data('color'));
    });
    
        function drawCircle(canvas, max, color){
            var mainGauge = canvas.getContext('2d');
            var currentEndAngle = 1;
            var currentStartAngle = 1;
            var gauge = setInterval(draw, 15);
            var counter = 0;
            function draw(){
                if( counter > max ){

                } else {
                    mainGauge.clearRect(0, 0, canvas.width, canvas.height);     
                    mainGauge.beginPath();
                    mainGauge.arc(107,107,75,1*Math.PI*2,0);
                    mainGauge.lineWidth = 50;
                    mainGauge.strokeStyle = '#333333';
                    mainGauge.stroke();
                    mainGauge.font = "24px OpenSans-Bold";
                    mainGauge.fillStyle = '#333333';
                    mainGauge.fillText(counter + '%', 88, 107);

                    var startAngle = currentStartAngle * Math.PI*2;
                    var endAngle = currentEndAngle * Math.PI*2;
                    currentEndAngle += 0.01;
                    var counterClockwise = false;
                    var innerGauge = canvas.getContext('2d');
                    innerGauge.beginPath();
                    innerGauge.arc(107,107,75,startAngle,endAngle);
                    innerGauge.lineWidth = 50;
                    innerGauge.strokeStyle = color;
                    innerGauge.stroke();
                }
                counter++;            
            }
        }    
        
        function drawGauge(canvas, max, color){

            var mainGauge = canvas.getContext('2d');
            var currentEndAngle = 1;
            var currentStartAngle = 1;
            var gauge = setInterval(draw, 15);
            var counter = 0;
            function draw(){
                if( counter > max ){

                } else {
                    mainGauge.clearRect(0, 0, canvas.width, canvas.height);     
                    mainGauge.beginPath();
                    mainGauge.arc(107,107,75,1*Math.PI,0);
                    mainGauge.lineWidth = 50;
                    mainGauge.strokeStyle = '#333333';
                    mainGauge.stroke();
                    mainGauge.font = "24px OpenSans-Bold";
                    mainGauge.fillStyle = '#333333';
                    mainGauge.fillText(counter + '%', 88, 107);

                    var startAngle = currentStartAngle * Math.PI;
                    var endAngle = currentEndAngle * Math.PI;
                    currentEndAngle += 0.01;
                    var counterClockwise = false;
                    var innerGauge = canvas.getContext('2d');
                    innerGauge.beginPath();
                    innerGauge.arc(107,107,75,startAngle,endAngle);
                    innerGauge.lineWidth = 50;
                    innerGauge.strokeStyle = color;
                    innerGauge.stroke();
                }
                counter++;            
            }
        }
    
        function drawSkillBar(canvas, max, color){

            var mainBar = canvas.getContext('2d');
            var currentEnd = 0;
            var bar = setInterval(draw, 15);
            var counter = 0;
            function draw(){
                if( counter > max ){

                } else {
                    mainBar.clearRect(0, 0, canvas.width, canvas.height);
                    mainBar.beginPath();
                    mainBar.moveTo(0, 15);
                    mainBar.lineTo(300, 15);
                    mainBar.lineWidth = 25;
                    mainBar.strokeStyle = '#333333';
                    mainBar.stroke();


                    var innerBar = canvas.getContext('2d');
                    innerBar.beginPath();
                    innerBar.moveTo(0, 15);
                    innerBar.lineTo(currentEnd, 15);
                    currentEnd += 3;
                    innerBar.lineWidth = 25;
                    innerBar.strokeStyle = color;
                    innerBar.stroke();
                    innerBar.font = "24px OpenSans-Bold";
                    innerBar.fillStyle = 'white';
                    innerBar.fillText(counter + '%', 10, 23);
                }
                counter++;
            }
        }   
    });
})();