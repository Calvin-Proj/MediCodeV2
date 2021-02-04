<div class="flex-1 text-right md:text-center">


    <h2 class="font-mono text-xl not-italic font-semibold  p-2  text-gray-700 text-opacity-80">Date</h2>
    <div class=" flex flex-col space-y-6">
        <div class="relative rounded  ">
            <p id="date"></p>

        </div>
    </div>

    <h2 class="font-mono text-xl not-italic font-semibold  p-2 pt-10 text-gray-700 text-opacity-80">Time</h2>
    <div class=" flex flex-col space-y-6">
        <div class="relative rounded">
            <p id="clock"></p>

        </div>
    </div>
</div>
<script>
    setInterval(displayclock,1000)
    function displayclock(){
        var time = new Date();
        var hrs = time.getHours();
        var min = time.getMinutes();
        var sec = time.getSeconds();
        var en = 'AM';
        var d = time.getDay();
        var m = time.getMonth();
        var y = time.getFullYear();

        if (hrs > 12)
        {   en= 'PM'
            hrs = hrs -12;
        }

        if (hrs == 0)
        {
            hrs = 12;
        }

        if (hrs < 10)
        {
            hrs = '0' + hrs;
        }

        if (min < 10)
        {
            min = '0' + min;
        }

        if (sec < 10)
        {
            sec = '0' + sec;
        }

        document.getElementById("clock").innerHTML = hrs +':' + min + ':' + sec + ' ' +en ;
        document.getElementById("date").innerHTML =  (("0"+time.getDate()).slice(-2))+"/"+ (("0"+(time.getMonth()+1)).slice(-2)) +"/"+ (time.getFullYear())
    }
</script>
