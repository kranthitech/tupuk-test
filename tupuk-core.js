function defineTupukEvents() {
    //page load
    if (window.addEventListener) {
        window.addEventListener('load', emitPageLoaded, false); //W3C
    } else {
        window.attachEvent('onload', emitPageLoaded); //IE
    }

    function emitPageLoaded() {
    	emitEvent('tupuk_page_loaded')
    }
    document.addEventListener('tupuk_page_loaded',function(){
    	console.log('received a page load event')
    })

    function emitEvent(eventName) {        
        //only emit if this event was not already emitted
        if(!tupuk_events_emitted[eventName]){
        	var event; // The custom event that will be created
        	if (document.createEvent) {
	            event = document.createEvent("HTMLEvents");
	            event.initEvent(eventName, true, true);
	        } else {
	            event = document.createEventObject();
	            event.eventType = eventName;
	        }

	        event.eventName = eventName;

	        if (document.createEvent) {
	            document.dispatchEvent(event);
	        } else {
	            document.fireEvent("on" + event.eventType, event);
	        }
	        tupuk_events_emitted['tupuk_'+eventName] = true
        }
        
    }
}

//this is to ensure that even if the user uses multiple tupuk plugins, 
//the event emitting happens only once
if (typeof tupuk_events_defined === 'undefined') {
    var tupuk_events_defined = false
    var tupuk_events_emitted = {}
    defineTupukEvents()
    tupuk_events_defined = true
}