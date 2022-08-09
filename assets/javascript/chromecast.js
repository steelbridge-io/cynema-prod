window.__onGCastApiAvailable = function(isAvailable){
    if(! isAvailable){
        return false;
    }

    var castContext = cast.framework.CastContext.getInstance();

    castContext.setOptions({
        autoJoinPolicy: chrome.cast.AutoJoinPolicy.ORIGIN_SCOPED,
        receiverApplicationId: chrome.cast.media.DEFAULT_MEDIA_RECEIVER_APP_ID
    });

    var stateChanged = cast.framework.CastContextEventType.CAST_STATE_CHANGED;
    castContext.addEventListener(stateChanged, function(event){
        var castSession = castContext.getCurrentSession();
        var media = new chrome.cast.media.MediaInfo('https://www.example.com/my-song.mp3', 'audio/mp3');
        var request = new chrome.cast.media.LoadRequest(media);

        castSession && castSession
            .loadMedia(request)
            .then(function(){
                console.log('Success');
            })
            .catch(function(error){
                console.log('Error: ' + error);
            });
    });
};