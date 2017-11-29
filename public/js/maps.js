/* global google */
/* global _ */
/**
 * scripts.js
 *
 * Computer Science 50
 * Problem Set 8
 *
 * Global JavaScript.
 */



// Google Map
var map;

// markers for map
var markers = [];

// info window
var info = new google.maps.InfoWindow();

var start;

var end;
// execute when the DOM is fully loaded
$(function()  {

    // styles for map
    // https://developers.google.com/maps/documentation/javascript/styling
    var styles = [

        // hide Google's labels
        {
            featureType: "all",
            elementType: "labels",
            stylers: [
                {visibility: "on"}
            ]
        },

        // hide roads
        {
            featureType: "road",
            elementType: "geometry",
            stylers: [
                {visibility: "on"}
            ]
        }

    ];

    // options for map
    // https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    var options = {
        center: {lat: 42.3770, lng: -71.1256}, // Cambridge
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        maxZoom: 14,
        panControl: true,
        styles: styles,
        zoom: 13,
        zoomControl: true
    };

    // get DOM node in which map will be instantiated
    var canvas = $("#map-canvas").get(0);

    // instantiate map
    map = new google.maps.Map(canvas, options);

    // configure UI once Google Map is idle (i.e., loaded)
    google.maps.event.addListenerOnce(map, "idle", configure);

    // PERSONAL TOUCH

    // insert traffic layer on map
    var trafficLayer = new google.maps.TrafficLayer();
        trafficLayer.setMap(map);

    // object for displaying traffic legends
    var legends = {
          green: {
            name: 'Green',
            value: 'No traffic delays.'
          },
          orange: {
            name: 'Orange',
            value: 'Medium amount of traffic.'
          },
          red: {
            name: 'Red',
            value: 'Traffic delays. The darker the red, the slower the speed of traffic on the road.'
          }
    };

    var legend = document.getElementById('legend');
    var div = document.createElement('div');
    div.setAttribute("id", "ul");
    div.style.width="250px";
    div.style.height="70px";
    //div.style.paddingRight="20px";

    // starting unordered list
    //div.innerHTML = '<ul>';
    //legend.appendChild(div);

        // iterating legends object and rendering keyvalue pairs as html to _.template()
        /*for (var key in legends) {
            var type = legends[key];
            var name = type.name;
            var value = type.value;
            div = document.createElement('div');
            var template = _.template("<li><strong><%-name%></strong><%=value %></li>");
            div.innerHTML = template({name:name, value: ":" + " " + value});
            legend.appendChild(div);
        }*/
        div1 = document.createElement('ul');

        for (var key in legends) {
            var type = legends[key];
            var name = type.name;
            var value = type.value;
            //var template = _.template("<li><strong><%-name%></strong><%=value %></li>");
            //div1.innerHTML = template({name:name, value: ":" + " " + value}) + "</ul>";
            var node = document.createElement("li");
            var textnode = document.createTextNode(name+":"+" " + value);
            node.appendChild(textnode);
            div1.appendChild(node);
            console.log(div1);
            div.appendChild(div1);
        }
        legend.appendChild(div);
    //div = document.createElement('div');

    // end of unordered list
    //div.innerHTML = '</ul>';
    //legend.appendChild(div);

    // legend at top-right
    map.controls[google.maps.ControlPosition.RIGHT_TOP].push(legend);

    // GET DIRECTIONS
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var directionsService = new google.maps.DirectionsService;
    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById('right-panel'));

    /*var control = document.getElementById('floating-panel');
    control.style.display = 'block';
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);*/

    var onChangeHandler = function() {
        $.ajax({
          url: "contactinfo_self.php"
        }).done(function(data) {
            start = data[0].Address;
            //alert("hi");
            console.log(start);
            end = document.getElementById('Address').innerHTML;
            console.log(end);
            div_hide_1();
            calculateAndDisplayRoute(directionsService, directionsDisplay);
        }).fail(function(result) {
            console.log("Hello1");
            console.log(result);
            alert( "Failed: ");
    });
    /*end = document.getElementById('Address').innerHTML;
    console.log(end);
    div_hide_1();
    calculateAndDisplayRoute(directionsService, directionsDisplay);*/
  };
    document.getElementById('get').addEventListener('click', onChangeHandler);
    //document.getElementById('end').addEventListener('change', onChangeHandler);


});

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
    //var start = document.getElementById('').value;
    //var end = document.getElementById('Address').value;
    //console.log(end);
    directionsService.route({
      origin: String(start),
      destination: String(end),
      travelMode: 'DRIVING'
    }, function(response, status) {
      if (status === 'OK') {
        directionsDisplay.setDirections(response);
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
}
/**
 * HTML for displaying articles.
 */
function html(data)
{
    var ul = "<p class = 'head'>Headlines</p><ul>";

    // using underscore library to render html
    var listitem = _.template("<li><a href='<%- link %>' target='_blank'><%- title %></a></li>");

    var datalen = data.length;

    // creating an unordered list by inserting the articles' links and titles
    for (var i = 0; i < datalen; i++)
    {
        ul += listitem({
            link: data[i].link,
            title: data[i].title
        });
    }

    // end of the unordered list
    ul += "</ul>";

    // return html content
    return ul;

}

/**
 * Adds marker for place to map.
 */
function addMarker(place)
{
    var location = {lat: parseFloat(place["latitude"]) , lng:parseFloat(place["longitude"]) };
    var labels = place["place_name"] + "," + " " + place["admin_name1"];
    var image = 'https://maps.google.com/mapfiles/kml/pal2/icon31.png';

    // creating a marker
    var marker = new MarkerWithLabel({
        position: location,
        labelContent: labels,
        labelAnchor: new google.maps.Point(22, 0),
        labelClass: "label",
        map: map,
        icon: image
    });

    // add marker to markers array
     markers.push(marker);

    // triggers info window to open when the marker is clicked
    google.maps.event.addListener(marker,'click', function(){

        // PERSONAL TOUCH - marker bounces once on click
        marker.setAnimation(google.maps.Animation.BOUNCE);
        setTimeout(function(){ marker.setAnimation(null); }, 375);

        // triggers ajax loading gif
        showInfo(marker);

        var parameters0 = {
            geo: place["postal_code"]
        };

        // receive requested articles
        // get news for the current postal code
        $.getJSON("articles.php", parameters0)
        .done(function(data, textStatus, jqXHR) {

            // if no news available get news with the place name
            if (data.length == 0)
            {
                var parameters1 = {
                    geo: place["place_name"]
                };

                $.getJSON("articles.php", parameters1)
                .done(function(data, textStatus, jqXHR) {

                    // if still no news
                    if (data.length == 0)
                    {
                        showInfo(marker, "Slow news day!");

                    }
                    else
                    {
                        // convert to html and put up articles
                        ul = html(data);
                        showInfo(marker,ul);
                    }
                })
                .fail(function(jqXHR, textStatus, errorThrown) {

                    // log error to browser's console
                    console.log(errorThrown.toString());
                });
            }
            else
            {
                var ul = html(data);
                showInfo(marker,ul);
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {

            // log error to browser's console
            console.log(errorThrown.toString());
        });
    });
}


/**
 * Configures application.
 */
function configure()
{
    // update UI after map has been dragged
    google.maps.event.addListener(map, "dragend", function() {
        update();
    });

    // update UI after zoom level changes
    google.maps.event.addListener(map, "zoom_changed", function() {
        update();
    });

    // remove markers whilst dragging
    google.maps.event.addListener(map, "dragstart", function() {
        removeMarkers();
    });

    // configure typeahead
    // https://github.com/twitter/typeahead.js/blob/master/doc/jquery_typeahead.md
    /*$("#address").typeahead({
        autoselect: true,
        highlight: true,
        hint:true,
        minLength: 1
    },
    {
        source: search,
        templates: {
            empty: "no places found yet",
            suggestion: _.template("<p><%- place_name %>, <%- admin_name1 %> <span class = 'text-muted'><%-postal_code %></span></p>")
        }
    });

    // re-center map after place is selected from drop-down
    $("#address").on("typeahead:selected", function(eventObject, suggestion, name) {

        var result = suggestion.place_name + ',' + ' ' + suggestion.admin_name1 + ' ' +  suggestion.postal_code;
         document.getElementById('address').value = result;


         // ensure coordinates are numbers
        var latitude = (_.isNumber(suggestion.latitude)) ? suggestion.latitude : parseFloat(suggestion.latitude);
        var longitude = (_.isNumber(suggestion.longitude)) ? suggestion.longitude : parseFloat(suggestion.longitude);

        // set map's center
        map.setCenter({lat: latitude, lng: longitude});

        // update UI
        update();


    });


    // hide info window when text box has focus
    $("#address").focus(function(eventData) {
        hideInfo();
    });*/

    // re-enable ctrl- and right-clicking (and thus Inspect Element) on Google Map
    // https://chrome.google.com/webstore/detail/allow-right-click/hompjdfbfmmmgflfjdlnkohcplmboaeo?hl=en
    document.addEventListener("contextmenu", function(event) {
        event.returnValue = true;
        event.stopPropagation && event.stopPropagation();
        event.cancelBubble && event.cancelBubble();
    }, true);

    // update UI
    update();

    // give focus to text box
    //$("#address").focus();


}

/**
 * Hides info window.
 */
function hideInfo()
{
    info.close();
}

/**
 * Removes markers from map.
 */
function removeMarkers()
{
    // set each marker in markers array to null
    _.each(markers, function(marker){
        marker.setMap(null);
    });

    // empty markers array
    markers = [];
}

/**
 * Searches database for typeahead's suggestions.
 */
/*function search(query, cb)
{
    // get places matching query (asynchronously)
    var parameters = {
        geo: query
    };
    $.getJSON("search.php", parameters)
    .done(function(data, textStatus, jqXHR) {

        // call typeahead's callback with search results (i.e., places)
        cb(data);
    })
    .fail(function(jqXHR, textStatus, errorThrown) {

        // log error to browser's console
        console.log(errorThrown.toString());
    });
}*/

/**
 * Shows info window at marker with content.
 */
function showInfo(marker, content)
{
    // start div
    var div = "<div id='info'>";
    if (typeof(content) === "undefined")
    {
        // http://www.ajaxload.info/
        div += "<img alt='loading' src='img/ajax-loader.gif'/>";
    }
    else
    {
        div += content;
    }

    // end div
    div += "</div>";

    // set info window's content
    info.setContent(div);

    // open info window (if not already open)
    info.open(map, marker);
}

/**
 * Updates UI's markers.
 */
function update()
{
    // get map's bounds
    var bounds = map.getBounds();
    var ne = bounds.getNorthEast();
    var sw = bounds.getSouthWest();

    // get places within bounds (asynchronously)
    var parameters = {
        ne: ne.lat() + "," + ne.lng(),
        //q: $("#address").val(),
        sw: sw.lat() + "," + sw.lng()
    };
    $.getJSON("update.php", parameters)
    .done(function(data, textStatus, jqXHR) {

        // remove old markers from map
        removeMarkers();

        // add new markers to map
        for (var i = 0; i < data.length; i++)
        {
            addMarker(data[i]);
        }
     })
     .fail(function(jqXHR, textStatus, errorThrown) {

         // log error to browser's console
         console.log(errorThrown.toString());
     });
}