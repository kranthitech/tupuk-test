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
    document.addEventListener('tupuk_elapsed_5',function(){
    	console.log('5 seconds elapsed')
    })
    document.addEventListener('tupuk_elapsed_10',function(){
    	console.log('10 seconds elapsed')
    })
    document.addEventListener('tupuk_elapsed_30',function(){
    	console.log('30 seconds elapsed')
    })
    document.addEventListener('tupuk_elapsed_60',function(){
    	console.log('60 seconds elapsed')
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