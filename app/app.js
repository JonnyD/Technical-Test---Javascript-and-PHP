$(document).ready(function() {

    // app html
    app_html = "";

    app_html += "<div class='container'>";

    	app_html += "<div class='page-header'>";
    		app_html += "<h1 id='page-title'>Employees</h1>";
    	app_html += "</div>";

    	// this is where the contents will be shown.
    	app_html += "<div id='page-content'></div>";

    app_html += "</div>";

    // inject to 'app' in index.html
    $("#app").html(app_html);

});

// change modal title
function changeModalTitle(title) {
	$('.modal-title').text(title);
}

// function to make form values to json format
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
