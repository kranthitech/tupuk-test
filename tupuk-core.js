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
    	//define other events after the page load event
    	//timeouts after 5,10,30,60 seconds
    	var delay_times = [5,10,30,60]

    	delay_times.forEach(function(d){
    		setTimeout(function(){
	    		emitEvent('tupuk_elapsed_'+d)
	    	},d*1000)
    	})
    })

   	//emit tupuk_page_exit event
    tupuk_listen(document, 'mouseout',function(e){
    	e = e ? e : window.event;
		var from = e.relatedTarget || e.toElement;
		if ((!from || from.nodeName == "HTML") && (!e.clientY || (e.clientY <=0 ))) {
		
			emitEvent('tupuk_page_exit')
		}
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
	        tupuk_events_emitted[eventName] = true
	        console.log('Emitted event - '+eventName)
        }
        
    }

	
}

function tupuk_listen(obj, evt, fn) {
	//some browsers support addEventListener, and some use attachEvent
    if (obj.addEventListener) {
        obj.addEventListener(evt, fn, false);
    }
    else if (obj.attachEvent) {
        obj.attachEvent("on" + evt, fn);
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