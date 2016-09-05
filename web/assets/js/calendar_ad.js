window.initMap = function() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                zoom: 8
            });
        }

        // gloabal variables instance
    var map;
    var selectDate;
    var my_events = [];
    var timelaps_calendar = [];
    var myCalendar = $('#calendar');
    var TimelapsCalendar = $('#calendarTimelaps');
    var select_country = $("#select_country");
    var select_city = $("#select_city");
    var select_region = $("#select_region");
    var gallery_media_panel = $('#gallery_media_panel');
    var shop_filter_panel = $('#shop_filter_panel');
    var timelaps_event_panel = $('#timelaps_event_panel');
    var confirm_panel = $("#confirm_panel");
    $("#LoadCalendarBt").hide();

    TimelapsCalendar.hide();
    myCalendar.hide();
    shop_filter_panel.hide();
    timelaps_event_panel.hide();
    confirm_panel.hide();
    $('select').select2();
    select_city.prop('disabled', true);
    select_region.prop('disabled', true);
    //Loading Countries
    $.ajax({
        method: "POST",
        url: "http://localhost{{path('getAvailableCountries')}}"
    }).done(function(data) {
      alert("ok");
        var json_data = JSON.parse(data);
        var html_countries = "<option></option>";
        for (var i = 0; i < json_data.length; i++) {
            html_countries += "<option>" + json_data[i]["pays"] + "</option>";
        }
        select_country.html(html_countries);
    }).fail(function() {
      alert("fail");

        swal("Cancelled", "An error has occured", "error");
    });



    //Loading Cities

    select_country.on('select2:select', function(evt) {
        $.ajax({
            method: "POST",
            url: "http://localhost{{path('getAvailableCities')}}",
            data: {
                country: $(this).val()
            }
        }).done(function(data) {

            var json_data = JSON.parse(data);
            var html_cities = "<option></option>";
            for (var i = 0; i < json_data.length; i++) {
                html_cities += "<option>" + json_data[i]["ville"] + "</option>";
            }
            select_city.prop('disabled', false);
            select_city.html(html_cities);

        }).fail(function() {
            swal("Cancelled", "An error has occured", "error");
        });
    });
    // Loading Regions
    select_city.on('select2:select', function(evt) {
        $.ajax({
            method: "POST",
            url: "http://localhost{{path('getAvailableRegions')}}",
            data: {
                country: select_country.val(),
                city: $(this).val()
            }
        }).done(function(data) {
            var json_data = JSON.parse(data);
            var html_regions = "<option></option>";
            for (var i = 0; i < json_data.length; i++) {
                html_regions += "<option>" + json_data[i]["region"] + "</option>";
            }
            select_region.prop("disabled", false);
            select_region.html(html_regions);

        }).fail(function() {
            swal("Cancelled", "An error has occured", "error");
        });
    });

    select_region.on('select2:select', function(evt) {
        $.ajax({
            method: "POST",
            url: "http://localhost{{path('getAvailableShopsByAdresse')}}",
            data: {
                country: select_country.val(),
                city: select_city.val(),
                region: $(this).val()
            }
        }).done(function(data) {
            var json_data = JSON.parse(data);
            var html_shops = "";
            for (var i = 0; i < json_data.length; i++) {

                html_shops+='<li class="list-group-item col-md-4 " >'+
                '<div class="media">'+
                      '<div class="media-left">' +
                        '<input type="checkbox" class="shopSelectInput" id="shop__'+json_data[i]["id"]+'" class="labelauty"/>'+
                      '</div>'+
                      '<div class="media-body">'+
                          '<a class="avatar" >'+
                          '<img class="img-responsive"  src="'+json_data[i]["logo"]+'"  alt="...">'+
                          '</a>'+
                          '<h4 class="example-title" style="display:inline-block">'+json_data[i]["name"]+'</h4>'+
                      '</div>'+
                  '</div>'+
              '</li>'
              //  html_shops += '<div class="checkbox-custom checkbox-primary"><input type="checkbox" class="shopSelectInput" id="shop__' + json_data[i]["id"] + '" /><label class="shop__' + json_data[i]["id"] + '" for="inputUnchecked">' + json_data[i]["name"] + '</label>  </div>'
            }
            $("#ShopListItems").html(html_shops);
        }).fail(function() {
            swal("Cancelled", "An error has occured", "error");
        });
    });

    // on Shop Ckeckbox selection
    $(document).on("click", ".shopSelectInput", function(event) {
        $.ajax({
            method: "POST",
            url: "http://localhost{{path('getAvailableEventByAdressAndShops')}}",
            data: {
                country: select_country.val(),
                city: select_city.val(),
                region: select_region.val(),
                shop: ($(this).attr('id')).replace("shop__", "")
            }
        }).done(function(data) {
            gallery_media_panel.hide();
            timelaps_event_panel.show();
            shop_filter_panel.hide();
            confirm_panel.hide();

            $("#RessourceTab").attr("class", "step col-md-3 done");
            $("#TargetTab").attr("class", "step col-md-3 done");
            $("#TimelapsTab").attr("class", "step col-md-3 timelaps current");

            $("html, body").animate({
                scrollTop: 0
            }, 600);
            my_events = [];
            var json_data = JSON.parse(data);
            for (var i = 0; i < json_data.length; i++) {
                my_events.push({
                    title: json_data[i]['name'],
                    start: moment(moment.unix(json_data[i]['starttime']['timestamp'])).format("YYYY-MM-DDTHH:mm:ss"),
                    end: moment(moment.unix(json_data[i]['endtime']['timestamp'])).format("YYYY-MM-DDTHH:mm:ss"),
                    description: json_data[i]['eventType'],
                    allDay: false,
                    id_event: json_data[i]['id']
                });
            }
            myCalendar.show();
            myCalendar.fullCalendar({
                events: my_events,
                timeFormat: 'H:mm',
                displayEventEnd: {
                    month: true,
                    basicWeek: true,
                    "default": true
                },
                dayClick: function(date, jsEvent, view) {},
                eventClick: function(calEvent, jsEvent, view) {
                    $.ajax({
                        method: "POST",
                        url: "http://localhost{{path('get_timelaps_by_event')}}",
                        data: {
                            id: calEvent.id_event
                        }
                    }).done(function(data) {
                        var timelapsItems = JSON.parse(data);
                        jQuery.each(timelapsItems, function(i, val) {
                            var date = new Date(val['dateStart']['timestamp'] * 1000);
                            var start = moment(moment.unix(val['dateStart']['timestamp'])).format("YYYY-MM-DDTHH:mm:ss");
                            var end = moment(moment.unix(val['dateEnd']['timestamp'])).format("YYYY-MM-DDTHH:mm:ss");
                            timelaps_calendar.push({
                                title: val['prix'],
                                start: start,
                                end: end,
                                allDay: false,
                                idTimelaps: val['id'],
                                id_event: calEvent.id_event
                            });
                        });

                        myCalendar.hide();
                        TimelapsCalendar.show();
                        $("#LoadCalendarBt").show();
                        $("#LoadCalendarBt").click(function() {
                            TimelapsCalendar.hide();
                            myCalendar.show();
                            $("#LoadCalendarBt").hide();
                        });
                        TimelapsCalendar.fullCalendar({
                            defaultDate: calEvent.start.format("YYYY-MM-DD"),
                            events: timelaps_calendar,
                            timeFormat: 'H:mm',
                            defaultView: 'agendaDay',
                            displayEventEnd: {
                                agendaDay: true,
                                "default": true
                            },
                            eventClick: function(calEvent, jsEvent, view) {
                                gallery_media_panel.hide();
                                timelaps_event_panel.hide();
                                shop_filter_panel.hide();
                                confirm_panel.show();
                                $("#ConfirmTab").attr("class", "step col-md-3 current");
                                $("#TargetTab").attr("class", "step col-md-3 done");
                                $("html, body").animate({
                                    scrollTop: 0
                                }, 600);

                                $("#ConfirmAddAd").modal('show');
                                $("#ConfirmAddAd").on("shown.bs.modal", function(e) {
                                    var timelaps_id = calEvent.idTimelaps;
                                    var media_id = $('input[type="checkbox"][class="selectable-item"]:checked').attr("id");
                                    var media_name = $("#title_" + media_id).html();
                                    var shop_name = $("." + $(".shopSelectInput:checked").attr("id")).html();

                                    $("#modalMedia").html(media_name);
                                    $("#modalshop").html(shop_name);
                                    $("#modalTimeStart").html(calEvent.start.format("YYYY-MM-DD HH:mm:ss"));

                                    //                if (calEvent.end != null)                  $("#modalTimeEnd").html(calEvent.end.format("YYYY-MM-DD HH:mm:ss"));
                                    $("#AddAdBTConfirm").click(function() {
                                        $.ajax({
                                            method: "POST",
                                            url: "http://localhost{ {path('addAd')} }",
                                            data: {
                                                idMedia: media_id.replace("media_", ""),
                                                idTimelaps: timelaps_id
                                            }
                                        }).done(function() {
                                            $("#ConfirmAddAd").modal('hide');
                                            swal("Success!", "Sucess", "success");

                                        }).fail(function() {
                                            $("#ConfirmAddAd").modal('hide');
                                            swal("Cancelled", "An error has occured", "error");
                                        });
                                    });

                                });
                                TimelapsCalendar.fullCalendar('render');

                            }
                        });
                    }).fail(function() {
                        alert("fail search");
                    });
                },
                eventRender: function(event, element) {
                    element.qtip({
                        content: '<b>' + event.title + ' - </b></b><b>' + event.start.format('hh:mma') + ' - </b><b>' + event.end.format('hh:mma') + ' - </b><br><u>' + event.description + '</u>'
                    });
                }
            });
        }).fail(function() {
            swal("Cancelled", "An error has occured", "error");
        });
        $("#ConfirmAddAd").on("shown.bs.modal", function(e) {});

    });

    //on Media select
    $('input[type="checkbox"][class="selectable-item"]').on('change', function() {
        $('input[type="checkbox"][class="selectable-item"]').not($(this)).prop('checked', false);
        gallery_media_panel.hide();
        timelaps_event_panel.hide();
        shop_filter_panel.show();

        $("#RessourceTab").attr("class", "step col-md-3 done");
        $("#TargetTab").attr("class", "step col-md-3 current");
        $("html, body").animate({
            scrollTop: 0
        }, 600);
    });

    //setup top second navbar
    $("#forms").css("padding-top", $("#site-navbar-collapse").height());

    $(".page.animsition").css("padding-top", $("#forms").height());

    // on click skip media (ad without media)
    $("#SkipMediaBt").click(function() {
        gallery_media_panel.hide();
        timelaps_event_panel.hide();
        shop_filter_panel.show();

        $("#RessourceTab").attr("class", "step col-md-3 done");
        $("#TargetTab").attr("class", "step col-md-3 current");
        $("html, body").animate({
            scrollTop: 0
        }, 600);
    });


    TimelapsCalendar.hide();
    myCalendar.show();
    shop_filter_panel.show();
    timelaps_event_panel.show();
    confirm_panel.show();
    $(".labelauty").labelauty({
        label: false
    });
