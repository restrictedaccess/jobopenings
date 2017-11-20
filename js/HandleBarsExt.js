
function HandleBarsExt(){
	this.registerHelpersHB();
}


HandleBarsExt.prototype.populateHandeBarsElement = function(template, target, context){
	//grab template
	var tableTemplate = jQuery(template).html();


	//compile
	var theTemplate = Handlebars.compile(tableTemplate);

	var count = Object.keys(context).length;

	var theCompiledHtml = theTemplate(context);

	//add compiled template to the page
	jQuery(target).html(theCompiledHtml);


};


HandleBarsExt.prototype.registerHelpersHB = function(){


	Handlebars.registerHelper('breaklines', function(text) {
	    text = text.trim();
	    text = Handlebars.Utils.escapeExpression(text);
	    text = text.replace(/(\r\n|\n|\r)/gm, '<br>');
	    return new Handlebars.SafeString(text);
	});

	Handlebars.registerHelper('ifCond', function(v1, operator, v2, options) {
		switch (operator)
	    {
	        case "==":
	            return (v1==v2)?options.fn(this):options.inverse(this);

	        case "!=":
	            return (v1!=v2)?options.fn(this):options.inverse(this);

					case "===":
	            return (v1===v2)?options.fn(this):options.inverse(this);

	        case "!==":
	            return (v1!==v2)?options.fn(this):options.inverse(this);

	        case "&&":
	            return (v1&&v2)?options.fn(this):options.inverse(this);

	        case "||":
	            return (v1||v2)?options.fn(this):options.inverse(this);

	        case "<":
	            return (v1<v2)?options.fn(this):options.inverse(this);

	        case "<=":
	            return (v1<=v2)?options.fn(this):options.inverse(this);

	        case ">":
	            return (v1>v2)?options.fn(this):options.inverse(this);

	        case ">=":
	         return (v1>=v2)?options.fn(this):options.inverse(this);

	        default:
	            return eval(""+v1+operator+v2)?options.fn(this):options.inverse(this);
	    }
	});
};


Handlebars.registerHelper("element_count", function (index){
    return index + 1;
});

Handlebars.registerHelper('if_end_of_array', function(index, length, options) {
	return ((index+1)==length)?options.fn(this):options.inverse(this);
});


Handlebars.registerHelper('if_end_of_associative_array', function(array, key, options) {
	var keys = Object.keys(array);

	var last_key = keys[keys.length - 1];

	console.log(last_key);

	return (last_key == key)?options.fn(this):options.inverse(this);
});

Handlebars.registerHelper('format_decimal', function(decimal, places) {
	return parseFloat(decimal).toFixed(parseInt(places));
});



Handlebars.registerHelper('get_excerpt', function(text, parts) {
	var div = document.createElement("div");
	div.innerHTML = text;
	text = div.textContent || div.innerText || "";
	var substr = text.substring(0, parseInt(parts)) + "...";
	return substr;
});


Handlebars.registerHelper('escape_special', function(text) {

	var str = escape(text);

	return str;
});





Handlebars.registerHelper('if_string_length', function(v1, operator, v2, options) {

	var div = document.createElement("div");
	div.innerHTML = v1;
	v1 = div.textContent || div.innerText || "";
	v1 = v1.length;
	v2 = parseInt(v2);

	switch (operator)
    {
        case "==":
            return (v1==v2)?options.fn(this):options.inverse(this);

        case "!=":
            return (v1!=v2)?options.fn(this):options.inverse(this);

		case "===":
            return (v1===v2)?options.fn(this):options.inverse(this);

        case "!==":
            return (v1!==v2)?options.fn(this):options.inverse(this);

        case "&&":
            return (v1&&v2)?options.fn(this):options.inverse(this);

        case "||":
            return (v1||v2)?options.fn(this):options.inverse(this);

        case "<":
            return (v1<v2)?options.fn(this):options.inverse(this);

        case "<=":
            return (v1<=v2)?options.fn(this):options.inverse(this);

        case ">":
            return (v1>v2)?options.fn(this):options.inverse(this);

        case ">=":
         return (v1>=v2)?options.fn(this):options.inverse(this);

        default:
            return eval(""+v1+operator+v2)?options.fn(this):options.inverse(this);
    }
});

Handlebars.registerHelper('for', function(from, to, incr, block) {
    var accum = '';
    for(var i = from; i < to; i += incr)
        accum += block.fn(i);
    return accum;
});


Handlebars.registerHelper('for_each', function(data, block) {
    var accum = '';

   	var arr = jQuery.parseJSON(data);

   	jQuery.each(arr, function(index, value){
   		accum += block.fn(value);
   	});

   	return accum;
});
//$internet_connections = array("PLDT MyDSL" , "PLDT WeRoam Wireless" , "BayanTel DSL" , "Globelines Broadband" , "Globelines Wireless/WiMax/Tattoo" , "Smart Bro Wireless" , "Sun Broadband Wireless" ,"Others");

Handlebars.registerHelper('strip-scripts', function(context) {
		var html = context;
		// context variable is the HTML you will pass into the helper
		// Strip the script tags from the html, and return it as a Handlebars.SafeString
		return html.replace(/(<([^>]+)>)/ig,"");
	});

	Handlebars.registerHelper('trimString', function(passedString, startstring, endstring) {
	 passedString = passedString.replace(/(<([^>]+)>)/ig,"");
	 var theString = passedString.substring( startstring, endstring );
	 return new Handlebars.SafeString(theString);
	});
