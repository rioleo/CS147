$(function () {
    var totalString = "";
    var canvas;
    var allInts = new Array();
    var mouseDown;
    var touchstart = 'mousedown';
    var touchmove = 'mousemove';
    var touchend = 'mouseup';
    var total = 0;
    
    if ('ontouchstart' in window) {
        touchstart = 'touchstart';
        touchmove = 'touchmove';
        touchend = 'touchend';
    }
    
    $("#clear").click(function () {
        totalString = "";
        $("#key").html("");
    });
    $("#backspace").click(function () {
        totalString = totalString.slice(0, -1);
        $("#key").html(totalString);
    });
    $("#space").click(function () {
        totalString = totalString + " ";
        $("#key").html(totalString);
    });
    
    Array.prototype.unique = function () {
        var o = {}, i, l = this.length,
            r = [];
        for (i = 0; i < l; i += 1) o[this[i]] = this[i];
        for (i in o) r.push(o[i]);
        return r;
    };

    canvas = document.getElementById('content');
    canvas.width = document.body.clientWidth;
    canvas.height = document.body.clientHeight;
    ctx = canvas.getContext('2d');
    
    // What happens when you put your fingers on the screen
    canvas.addEventListener(touchstart, function (e) {
        if (e) {
            e.preventDefault();
            var myAudio = document.getElementById("myAudio");
            myAudio.play();
            for (var i = 0; i < e.touches.length; i++) {
                var touch = e.touches[i];
                allInts.push(parseInt($("." + Math.round((touch.pageY) / 95)).attr("id")));
                $("." + Math.round((touch.pageY) / 95)).addClass("selected");
            }
        }
    });

    // What happens when you lift your fingers off the screen
    canvas.addEventListener(touchend, function (e) {
        $(".box").removeClass("selected");

        allInts.unique().forEach(function (entry) {
            total += entry;
        });
        if (total > 0) {
            var stri = String.fromCharCode(parseInt(96 + total));
            if (stri == "|") {
                stri = " ";
            }
            totalString = totalString + stri;
            $("#key").html(totalString);
        }
        allInts = new Array();
        total = 0;

    });
});