/**
 * scripts.js
 *
 * Computer Science 50
 * Problem Set 7
 *
 * Global JavaScript, if any.
 */

 //change form to id or containment selector
var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

function check_empty() {
    console.log("entered");
if (document.getElementById('name').value == "" || document.getElementById('emailid').value == "" || document.getElementById('address_contact').value == "") {
alert("Fill All required Fields !");
}else if(document.getElementById('mobileno').value.length != 10 && document.getElementById('phoneno')==""){
alert("Mobile no should be 10 digits");
}else if (document.getElementById('emailid').value == "" || !re.test(document.getElementById('emailid').value))
{
    alert('Please enter a valid email address.');
}else if (document.getElementById('phoneno').value == "" && document.getElementById('mobileno').value == "") {
alert("At least one contact no should be filled!");
}else{
document.getElementById("form").submit()
}
}
//Function To Display Popup
function div_show() {
        document.getElementsByClassName("tt-hint")[0].style.background="none";
        document.getElementsByClassName("element-header")[0].style.zIndex=0;
    $('head').append('<style id="temp">.element-content:before{box-shadow:none!important;}</style>');
    setTimeout(function(){
document.getElementById('abc').style.display = "block";},200);
}
//Function to Hide Popup
function div_hide(){
// document.getElementById('abc').style.display = "none";

setTimeout(function(){
document.getElementsByClassName("element-header")[0].style.zIndex=2;
        $('#temp').remove();
    },100)
    setTimeout(function(){
document.getElementById('abc').style.display = "none";
    },100)
}
var name_1;
var name_1_global;
function div_show_1(name_1) {

name_1_global=name_1;
console.log(name_1);
$.ajax({
  url: "contactinfo.php",
  data: { name1: name_1 }
}).done(function(data) {
    $('#Name').html(data[0].Name);
    $('#Mobileno').html(data[0].Mobileno);
    $('#Phoneno').html(data[0].Phoneno);
    $('#EmailID').html(data[0].EmailID);
    $('#Address').html(data[0].Address);
    document.getElementById('abc_1').style.display = "block";
    document.getElementById('txtN_1').value=data[0].Name;
    document.getElementById('txtM_1').value=data[0].Mobileno;
    document.getElementById('txtP_1').value=data[0].Phoneno;
    document.getElementById('txtE_1').value=data[0].EmailID;
    document.getElementById('txtA_1').value=data[0].Address;
}).fail(function(result) {
    console.log("Hello1");
    console.log(result);
    alert( "Failed: ");
});


setTimeout(function(){
        document.getElementsByClassName("element-header")[0].style.zIndex=0;
    // document.getElementsByClassName("element-content")[0].style.boxShadow="none";
    $('head').append('<style id="temp">.element-content:before{box-shadow:none!important;}</style>');
},300)

/*$.get( "contactinfo.php", { name1: name_1 } ).done(function() {
    alert( "Data Loaded: " + data );
    document.getElementById('abc_1').style.display = "block";

});*/

//document.getElementById('abc_1').style.display = "block";
}

function div_show_2() {
    if(name!="")
    {
             window.history.pushState("","", "/history.php?q="+name);
    }
document.getElementById('abc_2').style.display = "block";

}

function div_show_2_1(name) {
console.log("ya");
document.getElementById('abc_2_1').style.display = "block";

$("button[name=modify]").on('click', function () {
        c_name = document.getElementById('course_name').value;
        console.log(c_name);
        $.ajax({
            url: 'modifycourse_name.php',
            //type: 'GET',
            //dataType: 'json',
            data: {
                old_name: name, c_name: c_name}
            }).done(function(data) {
                //location.reload();
                //console.log(name_new);
                //console.log(name_1_e);
                //flag = 1;
                //div_hide_2_1();
                window.location.href="/history.php";
            }).fail(function() {
                console.log("Hello1");
                //console.log(result);
                alert( "Failed: ");
            });
            /*error: function() {
                alert('Y');
                //callback();
            },
            success: function() {
                alert('F');
                //v.selectize.addOption({value:13,text:'foo'});
                //console.log(res);
                //callback(res);
            }
        });*/


    });

}

function div_show_3() {
document.getElementById('abc_3').style.display = "block";
}

function div_show_3_1(link, desc, c_name) {
    document.getElementById('abc_2_1').style.display = "block";
    document.getElementById('link_1').value = link;
    document.getElementById('desc_1').value = desc;
    $("button[name=modify_b]").on('click', function () {
        link_new = document.getElementById('link_1').value;
        desc_new = document.getElementById('desc_1').value;
        console.log(link_new);
        $.ajax({
            url: 'modify_bookmark.php',
            //type: 'GET',
            //dataType: 'json',
            data: {
                link_old: link, desc_old: desc, link_new: link_new, desc_new: desc_new, c_name:c_name}
            }).done(function(data) {
                //location.reload();
                //console.log(name_new);
                //console.log(name_1_e);
                //flag = 1;
                window.location.href="/history_1.php?q="+c_name;
                //div_hide_2_1();

            }).fail(function() {
                console.log("Hello1");
                //console.log(result);
                alert( "Failed: ");
            });
            /*error: function() {
                alert('Y');
                //callback();
            },
            success: function() {
                alert('F');
                //v.selectize.addOption({value:13,text:'foo'});
                //console.log(res);
                //callback(res);
            }
        });*/


    });

}

function div_show_4() {
    var flag = 0;
    var liList = document.getElementById("bookmarks").getElementsByTagName('tr');
    //alert(liList.length);
    var bookmark_list = [];
    for(i=0; i <liList.length ; i++)
    {
        element = liList[i];
        //console.log(element.getAttribute("name"));
        var bookmark = element.getAttribute("name");
        bookmark_list[i] = bookmark;
    }
    for(i=0; i <liList.length ; i++)
    {
        element = liList[i];
        //console.log(element.getAttribute("name"));
        bookmark = element.getAttribute("name");
        var bookmark_id = "a1-" + bookmark;
        console.log(bookmark_id);

        if(document.getElementById(bookmark_id).checked == true)
        {
            flag = 1;
            break;
        }
    }
    if(flag!=0)
    {
        document.getElementById('abc_4').style.display = "block";
        $('#select-to').selectize({
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
                            //alert('Y');
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
                }
                /*options: [],
            create: false,
            delimiter: ',',
            valueField: 'key',
            labelField: 'value',
            load: function (query, callback) {
                callback([
                    {key: 1, value: 'One'},
                    {key: 2, value: 'Two'},
                    {key: 3, value: 'Three'},
                    {key: 4, value: 'Four'},
                    {key: 5, value: 'Five'},
                ]);
            }*/
            });
    }
    else
        alert("Please select a bookmark to share!");

}

function send_email(c_name, bookmarks_checked)
{
    console.log(c_name);
    console.log(bookmarks_checked);
    $("button[name=share]").on('click', function () {
        elements = document.getElementsByClassName('email');
        var names_email = [];
        for(i = 0; i < elements.length; i++)
        {
            names_email[i] = elements[i].innerHTML;
        }

        console.log(names_email);
        $.ajax({
            url: 'send_email.php',
            //type: 'GET',
            //dataType: 'json',
            data: {
                bookmarks_checked: JSON.stringify(bookmarks_checked), email: JSON.stringify(names_email), c_name: c_name}
            }).done(function(data) {
                //location.reload();
                //console.log(name_new);
                //console.log(name_1_e);
                //flag = 1;
            }).fail(function() {
                console.log("Hello1");
                //console.log(result);
                alert( "Failed: ");
            });
            /*error: function() {
                alert('Y');
                //callback();
            },
            success: function() {
                alert('F');
                //v.selectize.addOption({value:13,text:'foo'});
                //console.log(res);
                //callback(res);
            }
        });*/


    });
}

function div_hide_1(){
    setTimeout(function(){
document.getElementsByClassName("element-header")[0].style.zIndex=2;
        $('#temp').remove();
    },100)
    setTimeout(function(){
document.getElementById('abc_1').style.display = "none";
    },100)
    // document.getElementById('abc_1').style.display = "none";
    // document.getElementsByClassName("element-content")[0].style.boxShadow="0 0 5px rgba(0,0,0,0.7)";
    reload++;
    console.log(reload);
    if(reload == 2)
    {
        location.reload();
    }
    else
        reload--;
}

function div_hide_2(){
document.getElementById('abc_2').style.display = "none";
}

function div_hide_2_1(){
document.getElementById('abc_2_1').style.display = "none";
}

function div_hide_3(){
document.getElementById('abc_3').style.display = "none";
}


function div_hide_4(){
document.getElementById('abc_4').style.display = "none";
}

function div_hide_bookmark(){
    // alert("Hi");
    $(function() {
document.getElementById('bookmark').style.display = "none";});
}

function myFunction_edit(txtB, Name){
    //console.log(txtB);
    //console.log(Name);
    document.getElementById(txtB).style.display = "block";
    document.getElementById(txtB).style.height = "50px";
    document.getElementById(txtB).style.width = "250px";
    console.log(txtB);
    if(txtB == "txtA")
    {
        document.getElementById(txtB).getElementsByClassName("twitter-typeahead")[0].style.height = "inherit";
        document.getElementById(txtB).getElementsByClassName("twitter-typeahead")[0].style.width = "235px";
    }
    //document.getElementsByClassName("twitter-typeahead").style.height = "inherit";
    //document.getElementsByClassName("twitter-typeahead").style.width = "inherit";
    document.getElementById(Name).style.display = "none";
}
var counter = 0;
function update_counter(){
    counter = 0;
    console.log(counter);
}
// keep track when to reload
var reload;
function finishedEdit(txtB, txtB_1, Name, flag){
    //counter++;
    reload = 1;
    console.log(reload);
    var name_uniq = document.getElementById('Name').innerHTML;
    var name_old = document.getElementById(Name).innerHTML;
    var name_new = document.getElementById(txtB_1).value;
    document.getElementById(txtB).style.display = "none";
    document.getElementById(Name).style.display = "block";
    console.log(name_old);
    //console.log("hi");
    //console.log(name_new);
    console.log(flag);
    console.log(counter);
    if (flag=='Yes')
    {
    //document.getElementById(name_1_e).innerHTML = name_new;
    //if(name_new !="")
    //{
        counter ++;
        console.log(name_new);
        if(Name=='Mobileno')
        {
            if(name_new != "")
            {
                if(name_new.length == 10)
                {
                    var count=0;
                    for (var i = 0; i < 10; i++)
                    {
                        if(name_new[i].charCodeAt(0)<58 && name_new[i].charCodeAt(0)>47)
                            count++;
                    }
                    if(count == 10)
                    {
                        console.log(name_new);
                        modify(name_uniq, name_new, Name);
                        document.getElementById(Name).innerHTML = name_new;
                        reload++;
                    }
                    else
                        alert("Mobile no can only contain numbers");
                }
                else
                {
                    alert("Mobile no should only be 10 digits");
                }
            }
            else
            {
                if(document.getElementById('Phoneno').innerHTML != "")
                {
                    modify(name_uniq, name_new, Name);
                    document.getElementById(Name).innerHTML = name_new;
                }
                else
                {
                    alert("Both Mobileno and Phoneno cannot be empty!");
                    document.getElementById(txtB_1).value = name_old;
                    counter--;
                }
            }
        }
        else if(Name=='EmailID')
        {
            console.log(Name);
            if(re.test(name_new) || name_new == "")
            {
                console.log(name_uniq);
                console.log(name_new);
                modify(name_uniq, name_new, Name);
                document.getElementById(Name).innerHTML = name_new;
                document.getElementById(txtB_1).value = name_new;
                reload++;
            }
            else if(name_new == "")
                counter--;
        }
        else if(Name=='Phoneno')
        {
            if(name_new != "")
            {
                if(name_new.length > 7)
                {
                    var count_1=0;
                    for (var i = 0; i < name_new.length; i++)
                    {
                        if(name_new[i].charCodeAt(0)<58 && name_new[i].charCodeAt(0)>47)
                            count_1++;
                    }
                    if(count_1 == name_new.length)
                    {
                        modify(name_uniq, name_new, Name);
                        document.getElementById(Name).innerHTML = name_new;
                        reload++;
                    }
                    else
                        alert("Phone no can only contain numbers");
                }
                else
                {
                    alert("Invalid Phoneno!");
                }
            }
            else
            {
                if(document.getElementById('Mobileno').innerHTML != "")
                {
                    modify(name_uniq, name_new, Name);
                    document.getElementById(Name).innerHTML = name_new;
                    reload++;
                }
                else
                {
                    alert("Both Mobileno and Phoneno cannot be empty!");
                    document.getElementById(txtB_1).value = name_old;
                    counter--;
                }
            }
        }
        else if(String(Name) === "Name")
        {
            console.log(reload);
            if(name_new != "")
            {
                $.ajax({
                    url:"contact_names.php"
                }).done(function(data){
                    var i,flag = 0;
                    for(i=0;i<data.length;i++)
                    {
                        if(data[i].Name === name_new)
                        {
                            flag=1;
                        }
                    }
                    if(flag==0)
                    {
                        modify(name_uniq, name_new, Name);
                        document.getElementById(Name).innerHTML = name_new;
                        console.log(reload);
                    }
                }).fail(function(result){
                    alert("Problem");
                });
            }
            else
            {
                alert("Name cannot be empty");
                document.getElementById(txtB_1).value = name_old;
                reload--;
                console.log(reload);
                counter--;

            }

        }
        else if(Name=='Address')
        {
            //if(name_new != "")
            //{
                modify(name_uniq, name_new, Name);
                document.getElementById(Name).innerHTML = name_new;
                document.getElementById(txtB_1).value = name_new;
                reload++;
            //}

        }
    //reload++;
    console.log(reload);
    //alert("Yes");
    }
    else
    {
        if(counter == 0)
            reload--;
    }
//document.getElementById(txtB).style.display = "none";
//document.getElementById(Name).style.display = "block";
//alert("success");
}
function modify(name_uniq, name_new, Name)
{
    $.ajax({

        url: "contactinfo_modify.php",
        data: { name1: name_uniq, name2: name_new, name3: Name}
        }).done(function(data) {
            //console.log(document.getElementById(txtB_1).value);
            /*document.getElementById(Name).innerHTML = document.getElementById(txtB_1).value;
            document.getElementById(txtB).style.display = "none";
            document.getElementById(Name).style.display = "block";*/
            name_1_e = name_1_global.replace(/\s/g, '');
            name_1_e = "index-"+name_1_e;
            //console.log(name_new);
            //console.log(name_1_e);
        }).fail(function(result) {
            console.log("Hello1");
            console.log(result);
            alert( "Failed: ");
    });

}

function checkbox_display(id){
    //x.style.display = "block";
    //document.getElementById(id).style.display = "block";
    document.getElementById(id).style.display = "table-cell";
    //document.getElementsByClassName('check-box')[0].style.height="38px";


    //alert("done");
}

function checkbox_hide(id, id_1){
    //x.style.display = "block";
    if(document.getElementById(id_1).checked == true)
        //document.getElementById(id).style.display = "block";
        document.getElementById(id).style.display = "table-cell";
    else
        document.getElementById(id).style.display = "none";
    //alert("done");
}

function del_contacts(name_list){
    //alert("hi");
    console.log(name_list);
    console.log(name_list["AmyLaudrie"]);
    //$(document).ready(function () {
    // wait until the del button is clicked
        $("button[name=delete]").on('click', function () {
            var liList = document.getElementById("forcheckbox").getElementsByTagName("li");
            //alert(liList.length);
            for(i=0; i <liList.length - 1; i++)
            {
                element = liList[i];
                //console.log(element.getAttribute("name"));
                var name = element.getAttribute("name");
                var name_id = "index_new_1-" + name;
                //console.log(name_id);
                if(document.getElementById(name_id).checked == true)
                {
                    $.each(name_list, function(key, value) {
                        if(key==name)
                        {
                            //use value to remove contact from database
                            //console.log(value);
                            $.ajax({
                              url: "contact_delete.php",
                              data: { name: value}
                            }).done(function(data) {
                                location.reload();
                                //console.log(name_new);
                                //console.log(name_1_e);
                            }).fail(function(result) {
                                console.log("Hello1");
                                console.log(result);
                                alert( "Failed: ");
                            });
                            //break;
                        }
                        //console.log('stuff : ' + key + ", " + value);
                    });
                }
                //if(element.checked)
                   // console.log(element);
            }
            /*$.each(name_list, function(key, value) {

                console.log('stuff : ' + key + ", " + value);
            });*/
        });
    //});
}
/*$.each(name_list, function(key, value) {
                console.log('stuff : ' + key + ", " + value);
            });*/

function del_courses(course_list){
    //alert("hi");
    console.log(course_list);
    var flag = 0;
            var checked = 0;
    //console.log(course_list[0]);
    //console.log(name_list["AmyLaudrie"]);
    //$(document).ready(function () {
    // wait until the del button is clicked
        $("button[name=del_course").on('click', function () {
            var liList = document.getElementById("courses").getElementsByTagName('tr');
            var listlen = liList.length;
            console.log(liList);
            //alert(liList.length);
            for(i=0; i <listlen ; i++)
            {
                element = liList[i];
                //console.log(element.getAttribute("name"));
                var course = element.getAttribute("name");
                var course_id = "a1-" + course;
                console.log(course_id);
                if(document.getElementById(course_id).checked == true)
                {
                    checked++;
                    $.each(course_list, function(key, value) {
                        if(value==course)
                        {
                            //use value to remove contact from database
                            //console.log(value);
                            $.ajax({
                              url: "course_delete.php",
                              data: { c_name: value}
                            }).done(function(data) {
                                console.log("del");
                                flag = 1;
                                //location.reload();
                                //console.log(name_new);
                                //console.log(name_1_e);
                            }).fail(function(result) {
                                console.log("Hello1");
                                console.log(result);
                                alert( "Failed: ");
                            });
                            //break;
                        }
                        //console.log('stuff : ' + key + ", " + value);
                    });
                }
                //if(element.checked)
                   // console.log(element);
            }
            /*$.each(name_list, function(key, value) {

                console.log('stuff : ' + key + ", " + value);
            });*/
            console.log(checked);
            console.log(listlen);
            if(listlen == checked)
            {
                $.ajax({
                  url: "courset_drop.php"
                }).done(function() {
                    console.log("drop");
                    flag = 1;
                    //location.reload();
                    //console.log(name_new);
                    //console.log(name_1_e);
                }).fail(function() {

                    alert( "Failed: ");
                });
            }
            $.when( $.ajax( "course_delete.php" )).done(function()
            {
            console.log(flag);
            location.reload();
            //if(flag == 1)
                //location.reload();

    });
        });
    //});
}

var bookmarks_checked = [];
var j = 0;
function del_bookmarks(c_name, share){
    //alert("hi");
    //console.log(course_list);
    // wait until the del button is clicked
    var flag = 0;
    console.log(c_name);
    console.log(share);
        //$("button[name=del_bookmark]","button[name=share_bookmark]").on('click', function () {
            console.log(share);
            var liList = document.getElementById("bookmarks").getElementsByTagName('tr');
            console.log(liList);
            //alert(liList.length);
            var bookmark_list = [];
            for(i=0; i <liList.length ; i++)
            {
                element = liList[i];
                //console.log(element.getAttribute("name"));
                var bookmark = element.getAttribute("name");
                bookmark_list[i] = bookmark;
            }
            console.log(bookmark_list);
            for(i=0; i <liList.length ; i++)
            {
                element = liList[i];
                //console.log(element.getAttribute("name"));
                bookmark = element.getAttribute("name");
                var bookmark_id = "a1-" + bookmark;
                console.log(bookmark_id);

                if(document.getElementById(bookmark_id).checked == true)
                {
                    console.log(bookmark_id);
                    $.each(bookmark_list, function(key, value) {
                        console.log(value);
                        if(value==bookmark)
                        {
                            bookmarks_checked[j++] = value;
                            //use value to remove contact from database
                            console.log(value);
                            if(share != true)
                            {
                                console.log(share);
                                $.ajax({
                                  url: "bookmark_delete.php",
                                  data: { b_name: value, c_name: c_name}
                                }).done(function(data) {
                                    //location.reload();
                                    //console.log(name_new);
                                    //console.log(name_1_e);
                                    flag = 1;
                                }).fail(function(result) {
                                    console.log("Hello1");
                                    console.log(result);
                                    alert( "Failed: ");
                                });
                            }
                            //break;
                        }
                        //console.log('stuff : ' + key + ", " + value);
                    });
                }
                //if(element.checked)
                   // console.log(element);
            }
            /*$.each(name_list, function(key, value) {

                console.log('stuff : ' + key + ", " + value);
            });*/
        //});
    //});
    //console.log(bookmarks_checked);
    $.when($.ajax("bookmark_delete.php")).done(function(){
        if(share != true)
        {
            //console.log(bookmark_list.length)
            if(bookmarks_checked.length == bookmark_list.length)
            {
                $.ajax({
                  url: "bookmarkt_drop.php",
                  data: {c_name: c_name}
                }).done(function(data) {
                    flag =1;
                    location.reload();
                    //console.log(name_new);
                    //console.log(name_1_e);
                }).fail(function(result) {
                    console.log("Hello1");
                    console.log(result);
                    alert( "Failed: ");
                });
            }
            //if(flag == 1)
            //location.reload();
        }
    });

    send_email(c_name, bookmarks_checked);
}

function post_course(c_name){
    document.getElementById(c_name).href = "history_1.php"+"?"+"q"+"="+c_name;
}

function post_course_1(c_name){
    $.ajax({
            url: "addbookmark.php",
            type: "POST",
            data: { c_name: c_name, },
            success: function(response){
                  //do action

            },
            error: function(){
                  // do action
            }
        });
}

function div_show_dropdown()
{
    document.getElementById("bookmark_contact").style.display = "none";
    document.getElementById("dropdown").style.display = "block";
}


$(function() {

	//$('#select-to').selectize({});
	/*$('#select-to').selectize({
        valueField: 'name',
        labelField: 'name',
        searchField: 'name',
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
                    alert('Y');
                    callback();
                },
                success: function(res) {
                    alert("F");
                    console.log(res);
                    callback(data.res);
                }
            });
        }
    });*/


// document.getElementById("search").onfocus = function(){
//     document.getElementById('header').style.display="none";
//     document.getElementById('search').style.float="left";
//     //document.getElementById('search').style.width="120%";
// };
// document.getElementById("search").onfocusout = function(){
//     document.getElementById('header').style.display="block";
//     document.getElementById('search').style.width="0px";
// };




$("#address_contact").typeahead({
        autoselect: true,
        highlight: true,
        hint:true,
        minLength: 1
    },
    {
        source: search_address,
        templates: {
            empty: "no places found yet",
            suggestion: _.template("<p><%- place_name %>, <%- admin_name1 %> <span class = 'text-muted'><%-postal_code %></span></p>")
        }
    });


$("#address_contact").on("typeahead:selected", function(eventObject, suggestion, name) {

    var result = suggestion.place_name + ',' + ' ' + suggestion.admin_name1 + ' ' +  suggestion.postal_code;
    $("#address_contact").typeahead('val',result);

    });

$("#txtA_1").typeahead({
        autoselect: true,
        highlight: true,
        hint:true,
        minLength: 1
    },
    {
        source: search_address,
        templates: {
            empty: "no places found yet",
            suggestion: _.template("<p><%- place_name %>, <%- admin_name1 %> <span class = 'text-muted'><%-postal_code %></span></p>")
        }
    });


$("#txtA_1").on("typeahead:selected", function(eventObject, suggestion, name) {

    var result = suggestion.place_name + ',' + ' ' + suggestion.admin_name1 + ' ' +  suggestion.postal_code;
    $("#txtA_1").typeahead('val',result);

    });
// display checkbox on hover
/*$("forcheckbox").hover(function(){
    $(this).css("display", "block");
    });*/
});

// $(function(){
//     $("#address_contact").typeahead({
//         autoselect: true,
//         highlight: true,
//         hint:true,
//         minLength: 1
//     },
//     {
//         source: search_address,
//         templates: {
//             empty: "no places found yet",
//             suggestion: _.template("<p><%- place_name %>, <%- admin_name1 %> <span class = 'text-muted'><%-postal_code %></span></p>")
//         }
//     });


// $("#address_contact").on("typeahead:selected", function(eventObject, suggestion, name) {

//     var result = suggestion.place_name + ',' + ' ' + suggestion.admin_name1 + ' ' +  suggestion.postal_code;
//     $("#address_contact").typeahead('val',result);

//     });
// });



/**
 * Searches database for typeahead's suggestions.
 */
function search_address(query, cb)
{
    console.log("man");
    // get places matching query (asynchronously)
    var parameters = {
        geo: query
    };
    $.getJSON("search_address.php", parameters)
    .done(function(data, textStatus, jqXHR) {

        // call typeahead's callback with search results (i.e., places)
        cb(data);
    })
    .fail(function(jqXHR, textStatus, errorThrown) {

        // log error to browser's console
        console.log(errorThrown.toString());
    });
}



//?name=name_1
// Get directions
