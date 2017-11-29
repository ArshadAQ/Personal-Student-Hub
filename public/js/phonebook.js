/*
 * 3#. Adress book - "Design it & Code it"
 * Author: Idered <http://idered.pl>, IderedPL[at]gmail[dot]com
 *
 * Please don't repost source of this on websites, instead give a link.
 * Thanks for Nijikokun <http://forr.st/-Nijikokun>, added 'provider function'
 * try this in input: provider:gmail
 */
/*(function($) {

  // Search function for search input
  $.fn.liveSearch = function(list, exclude) {
    var input = $(this),
      regexp = {
        provider: /provider:([a-zA-Z0-9\.\-\_]+)/i,
        email: /\@([a-zA-z0-9\-\_\.]+)/i
      },
      elements = list.children().not(exclude),
      filter = function() {
        var term = input.val().toLowerCase();

        elements.show().filter(function() {
          var text = $(this).text().toLowerCase(),
            open = term.replace(regexp.provider, '').trim(),
            found = term.match(regexp.provider);

          if (found) {
            if (text.indexOf('@' + found[1]) != -1 && !open) {
              return false;
            } else {
              if (open && text.indexOf('@' + found[1]) != -1) return text.replace(regexp.email, '').toLowerCase().indexOf(open) == -1;
            }
          }

          return text.replace(regexp.email, '').toLowerCase().indexOf(term) == -1;
        }).hide();
      };

    input.on('keyup select', filter);

    return this;
  };

  //$('#search').liveSearch($('.list'), ':last-child');

})(jQuery);*/
$(function() {

console.log("Hi");

/*$('#select-beast').selectize({
                preload: true,
                valueField: 'EmailID',
                labelField: 'Name',
                searchField: ['Name', 'EmailID'],
                options: [],
                create: false,
                load: function(query, callback) {
                    if (!query.length) return callback();
                    $.ajax({
                        url: 'sharebookmark.php',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            name: query,
                        },
                        error: function() {
                            console.log('Y');
                            callback();
                        },
                        success: function(res) {
                            //alert(res[0].Name);
                            //v.selectize.addOption({value:13,text:'foo'});
                            //console.log(res);
                            callback(res);
                        }
                    });
                },
                render: {
                    item: function(item, escape) {
                        return '<div>' +
                            (item.Name ? '<span class="name">' + escape(item.Name) + '</span>' : '') +
                            (item.EmailID ? '<span class="email">' + escape(item.EmailID) + '</span>' : '') +
                        '</div>';
                    },
                    option: function(item, escape) {
                        var label = item.Name || item.EmailID;
                        var caption = item.Name ? item.EmailID : null;
                        return '<div>' +
                            '<span class="label">' + escape(label) + '</span>' +
                            (caption ? '<span class="caption">' + escape(caption) + '</span>' : '') +
                        '</div>';
                    }
                },
                sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: 'body'
            });*/

$("#search").typeahead({
        autoselect: true,
        highlight: true,
        hint:true,
        minLength: 1
    },
    {
        source: search1,
        templates: {
            empty: "no contacts found yet",
            suggestion: _.template("<p><%- Name %></p>")
        }
    });


$("#search").on("typeahead:selected", function(eventObject, suggestion, name) {

    result1 = suggestion.Name;
    $("#search").typeahead('val',result1);
    result1 = $("#search").val();
    //$result1 = preg_replace('/\s+/', '', $result1);
    result1=result1.replace(/\s/g,'');
    //console.log(result1);
    var id = '#index-' + result1;
    result1.href=id;
    console.log(id);
    var id = $(id);
    console.log(id);
    //console.log(eventObject);
    console.log(name);
    //document.getElementById(id);
    //$(id).focus();});
    /*var goal = $(id).position().top-20;
    aim = goal+$('#forcheckbox').scrollTop();
    console.log(aim);
    $('#forcheckbox').scrollTop(aim);*/
    /*var id1 = 'index-'+result1;
    var myElement = document.getElementById(id1);
    var topPos = myElement.offsetTop;
    document.getElementById('forcheckbox').scrollBottom = topPos;
    console.log("Hi");*/
    var id1 = 'index-'+result1;
    document.getElementById(id1).scrollIntoView();

    });
});

    /*$('html, body').animate({
        scrollTop: id.offset().top
    }, 2000);*/

/*$.fn.scrollView = function () {
  return this.each(function () {
    $('html, body').animate({
      scrollTop: $(this).offset().top
    }, 1000);
  });
};*/



//});

/**
 * Searches database for typeahead's suggestions.
 */
function search1(query, cb)
{
    // get places matching query (asynchronously)
    var parameters = {
        geo1: query
    };
    $.getJSON("search_contact.php", parameters)
    .done(function(data, textStatus, jqXHR) {

        // call typeahead's callback with search results (i.e., places)
        cb(data);
    })
    .fail(function(jqXHR, textStatus, errorThrown) {

        // log error to browser's console
        console.log(errorThrown.toString());
    });
    console.log("Hi");
}

function update(name)
{
  var parameters = {
        cname: name
    };
    $.getJSON("update_map.php", parameters)
    .done(function(data, textStatus, jqXHR) {

         // ensure coordinates are numbers
        var result = data[0];
        var latitude = (_.isNumber(result.latitude)) ? result.latitude : parseFloat(result.latitude);
        var longitude = (_.isNumber(result.longitude)) ? result.longitude : parseFloat(result.longitude);

        //var location = {lat: parseFloat(place["latitude"]) , lng:parseFloat(place["longitude"]) };

        // set map's center
        map.setCenter({lat: latitude, lng: longitude});
        addMarker(result);
        /*for (var i = 0; i < data.length; i++)
        {
            addMarker(data[i]);
        }*/
    });
    /*.fail(function(jqXHR, textStatus, errorThrown) {

        // log error to browser's console
        console.log(errorThrown.toString());
    }); */
}

/**
 * Goes to the appropriate contact.
 */
 /*
function link(result1)
{
    // get map's bounds
    var bounds = map.getBounds();
    var ne = bounds.getNorthEast();
    var sw = bounds.getSouthWest();

    // get places within bounds (asynchronously)
    var parameters = {
        ne: ne.lat() + "," + ne.lng(),
        q: $("#address").val(),
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
}*/
//});