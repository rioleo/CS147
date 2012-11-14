// This code has been modified from James Long's code at 
// http://jlongster.com/2012/09/12/web-apps.html

var ctx;
var canvas;
var touch;
var audioCtx = null;
var soundBuffer = null;
var effect;
var theArray = [261.63, 293.66, 329.63, 349.23, 392, 440, 493.88, 523.25];
var mouseNote = null;
var mouseDown = false;
var touchstart = 'mousedown';
var touchmove = 'mousemove';
var touchend = 'mouseup';
var soundaudio = 'guitar.mp3';

function playSound(x, y, quick) {
    if (soundBuffer) {
        var sound = audioCtx.createBufferSource();
        var gain = audioCtx.createGainNode();
        sound.buffer = soundBuffer;
        sound.playbackRate.value = x / canvas.width * 2;
        sound.connect(gain);
        gain.connect(audioCtx.destination);

        var volume = 0.5;
        gain.gain.value = volume;

        if (quick) {
            sound.noteGrainOn(0., .2, .4);
        } else {
            sound.noteOn(0);
        }
    }
}

function Note() {
    if (audioCtx) {
        this.node = audioCtx.createJavaScriptNode(1024, 1, 1);
        this.incr = 0;

        this.gain = audioCtx.createGainNode();
        this.node.connect(this.gain);
    }
}

Note.prototype.setFrequency = function (x, y) {
    if (audioCtx) {
        var freq = x / canvas.width * 2000 + 100;
        this.incr = 2 * Math.PI * freq / audioCtx.sampleRate;

        var volume = 0.5;
        this.gain.gain.value = volume;
    }
};

Note.prototype.playNote = function () {
    if (this.playing) {
        this.stopNote();
    }

    if (audioCtx) {
        var x = 0;

        var _this = this;
        this.node.onaudioprocess = function (e) {
            var data = e.outputBuffer.getChannelData(0);
            for (var i = 0; i < data.length; i++) {
                data[i] = Math.sin(x);
                x += _this.incr;
            }
        };

        this.gain.connect(audioCtx.destination);
        this.playing = true;
    }
};

Note.prototype.stopNote = function () {
    if (audioCtx) {
        this.node.disconnect();
        this.gain.disconnect();
        this.playing = false;
    }
};

var lastX = 0;
var lastY = 0;
var lastTime = 0;
var sticky = null;

function bufferSound(event) {
    var request = event.target;
    soundBuffer = audioCtx.createBuffer(request.response, false);
}

function resetAudio(soundaudio) {
    soundBuffer = null;
    audioCtx = new webkitAudioContext();

    var request = new XMLHttpRequest();
    request.open('GET', soundaudio, true);
    request.responseType = 'arraybuffer';
    request.addEventListener('load', bufferSound, false);
    request.send();
}


function init() {

    canvas = document.getElementById(id);
    canvas.width = document.body.clientWidth;
    ctx = canvas.getContext('2d');

    function handle(x, y, touch) {

        var note = new Note();
        var closesti = null;
        var bestindex = null;
        var goal = x + Math.min.apply(null, theArray);
        $.each(theArray, function (index) {
            if (Math.abs(this - goal) < closesti || closesti == null) {
                closesti = Math.abs(this - goal);
                closest = this;
                bestindex = index;
            }
        });
        var set = Math.round(y / 50);

        if (sticky == true) {
            $("." + set + ".bar" + bestindex).toggleClass("selected");
        } else {
            $("." + set + ".bar" + bestindex).addClass("selected");
        }
        $(".note").html(closest.toString());
        playSound(closest.toString(), y);

        if (touch) {
            touch.note = note;
        } else {
            mouseNote = note;
        }

    }

    if ('ontouchstart' in window) {
        touchstart = 'touchstart';
        touchmove = 'touchmove';
        touchend = 'touchend';
    }


    canvas.addEventListener(touchstart, function (e) {
        if (e.changedTouches) {
            for (var i = 0; i < e.changedTouches.length; i++) {
                var touch = e.changedTouches[i];
                handle(touch.pageX, touch.pageY, touch);
            }
        } else {
            mouseDown = true;
            handle(e.pageX, e.pageY);
        }

    });

    canvas.addEventListener(touchmove, function (e) {
        e.preventDefault();

        if (e.changedTouches) {
            for (var i = 0; i < e.changedTouches.length; i++) {
                var touch = e.changedTouches[i];
                handle(touch.pageX, touch.pageY, touch);
            }
        } else if (mouseDown) {
            handle(e.pageX, e.pageY);
        }

    }, true);

    canvas.addEventListener(touchend, function (e) {

        if (e.changedTouches) {
            for (var i = 0; i < e.changedTouches.length; i++) {
                var touch = e.changedTouches[i];
                touch.note.stopNote();
            }
        } else if (mouseDown) {
            mouseNote.stopNote();
        }
        if (sticky != true) {
            $(".bar").removeClass("selected");
        }

        mouseDown = false;
    });


    if ('webkitAudioContext' in window) {
        resetAudio(soundaudio);
    }

    window.onresize = function () {
        canvas.width = document.body.clientWidth;
    };

    window.onhashchange = function () {
        effect = window.location.hash.slice(1);
    };

}

$(function () {
    id = 'content2';
    init();
    id = 'content';
    init();
    id = 'content3';
    init();
    id = 'content4';
    init();
    id = 'content5';
    init();
    id = 'content6';
    init();
    id = 'content7';
    init();
    id = 'content8';
    init();

    for (var j = 0; j < theArray.length - 1; j++) {
        $(".bar" + j).css("width", theArray[j + 1] - theArray[j] + "px");
        $(".bar" + j).attr("freq", theArray[j]);
    }
    
    $("#tempo").slider({
        min: 1,
        value: 500,
        max: 2000
    });

    $(".bar" + (theArray.length - 1)).css("width", "20px");
    $(".bar" + (theArray.length - 1)).attr("freq", theArray[(theArray.length - 1)]);

    $("#minor").click(function() {
        theArray = [277.18, 311.13, 329.63, 369.99, 415.3, 440, 493.88];
        for (var j = 0; j < theArray.length - 1; j++) {
            $(".bar" + j).css("width", theArray[j + 1] - theArray[j] + "px");
            $(".bar" + j).attr("freq", theArray[j]);
        }
        $(".bar" + (theArray.length - 1)).css("width", "20px");
        $(".bar" + (theArray.length - 1)).attr("freq", theArray[(theArray.length - 1)]);
    });

    $("#major").click(function() {
        theArray = [261.63, 293.66, 329.63, 349.23, 392, 440, 493.88, 523.25];
        for (var j = 0; j < theArray.length - 1; j++) {
            $(".bar" + j).css("width", theArray[j + 1] - theArray[j] + "px");
            $(".bar" + j).attr("freq", theArray[j]);
        }
        $(".bar" + (theArray.length - 1)).css("width", "20px");
        $(".bar" + (theArray.length - 1)).attr("freq", theArray[(theArray.length - 1)]);
    });


    $("#guitar").click(function () {
        soundaudio = 'guitar.mp3';
        resetAudio(soundaudio);
    });

    $("#piano").click(function () {
        soundaudio = 'piano.mp3';
        resetAudio(soundaudio);
    });

    $("#violin").click(function () {
        soundaudio = 'violin.mp3';
        resetAudio(soundaudio);
    });

    $("#sticky").click(function () {
        sticky = true;
    });

    var counter = 0;
    var myVar = null;

    function myTimer() {

        counter++;
        if (counter > 8) {
            counter = 1;
        }
        for (var i = 0; i <= 9; i++) {
            if ($("." + counter + ".bar" + i).hasClass("selected")) {
                $("." + counter + ".bar" + i).effect("highlight", {}, 10);
                playSound($("." + counter + ".bar" + i).attr("freq"), 400);
            }
        }
    }
    
    $("#tempo").bind("slide", function (event, ui) {
        clearInterval(myVar);
        myVar = setInterval(function () {
            myTimer()
        }, $("#tempo").slider("option", "value"));
    });
    
    $("#clear").click(function () {
        $(".bar").removeClass("selected");
        clearInterval(myVar);
    });
    
    $("#start").click(function () {
        counter = 0;
        myVar = setInterval(function () {
            myTimer()
        }, $("#tempo").slider("option", "value"));
    });
});