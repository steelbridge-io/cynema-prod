
  setTimeout(function() {

    if (window.WebKitPlaybackTargetAvailabilityEvent) {
    var video = document.getElementById('video');
    video.addEventListener('webkitplaybacktargetavailabilitychanged',
      function (event) {
          switch (event.availability) {
              case "available":
                  airPlayButton.hidden = false;
                  airPlayButton.disabled = false;
                  break;
              case "not-available":
                  airPlayButton.hidden = true;
                  airPlayButton.disabled = true;
                  break;
          }
      });
    }

    if (!window.WebKitPlaybackTargetAvailabilityEvent)
      return;
    var airPlayButton = document.getElementById("airPlayButton");
    var video = document.getElementById("video");
    airPlayButton.addEventListener('click', function(event) {
      video.webkitShowPlaybackTargetPicker();
    });

    if (!window.WebKitPlaybackTargetAvailabilityEvent)
      return;
    var video = document.getElementById("video");
    video.addEventListener('webkitcurrentplaybacktargetiswirelesschanged',
      function(event) {
          updateAirPlayButtonWirelessStyle();
          updatePageDimmerForWirelessPlayback();
      });

    }, 2000);





