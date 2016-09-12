var url_client = "http://localhost/AdBoxi/MyAdBox/web/app_dev.php/adminTest/clients";
var url_event = "http://localhost/AdBoxi/MyAdBox/web/app_dev.php/adminTest/events";
var url_shop = "http://localhost/AdBoxi/MyAdBox/web/app_dev.php/adminTest/shops";
var url_loader = "http://localhost/AdBoxi/MyAdBox/web/app_dev.php/adminTest/ads/Manage/loader";


var clients;
var events;
var shops;

$('select').select2();

function formatStateClient(state) {
    if (!state.id) {
        return state.text;
    }
    for (var i = 0; i < clients.length; i++) {
        if (clients[i].id == state.id) {
            var $state = $(
                '<span>' + state.text + ' - <small>' + clients[i].email + '</small>' + '</span>'
            );
            return $state;
        }
    }

}

function formatStateShop(state) {
    if (!state.id) {
        return state.text;
    }
    for (var i = 0; i < shops.length; i++) {
        if (shops[i].id == state.id) {
            var $state = $(
                '<span>' + '<img src="' + shops[i].logo + '" class="img-shop" style="width:25px;height:25px">' + state.text + '</span>'
            );
            return $state;
        }
    }

}

function formatStateEvent(state) {
    if (!state.id) {
        return state.text;
    }
    for (var i = 0; i < events.length; i++) {
        if (events[i].id == state.id) {
            var $state = $(
                '<span>' + state.text + ' - ' + '<small>' + events[i].eventType + '</small>' + "<br>" + '<small>' + '<i class="icon md-calendar-alt" aria-hidden="true"></i>' + " " + moment(moment.unix(events[i].starttime.timestamp)).format("YYYY-MM-DD HH:mm:ss") + '</span>'
            );
            return $state;
        }
    }
}

$(document).ready(function() {
    $('select').select2();
    // Load clients
    $.ajax({
        method: "POST",
        url: url_client
    }).done(function(data) {
        $("#select_client").html("<option></option>");
        var json_data = JSON.parse(data);
        clients = json_data;
        for (var i = 0; i < json_data.length; i++) {
            $("#select_client").append("<option id='" + json_data[i].id + "' value='" + json_data[i].id + "' >" + json_data[i].username + "</option>");
        }
        $("#select_client").select2({
            templateResult: formatStateClient,
            allowClear: true
        });
    });
    //Load shops
    $.ajax({
        method: "POST",
        url: url_shop
    }).done(function(data) {

        $("#select_shop").html("<option></option>");
        var json_data = JSON.parse(data);
        shops = json_data;

        for (var i = 0; i < json_data.length; i++) {
            $("#select_shop").append("<option id='" + json_data[i].id + "' value='" + json_data[i].id + "' >" + json_data[i].name + "</option>");
        }
        $("#select_shop").select2({
            templateResult: formatStateShop,
            allowClear: true

        });
    });
    // Load events
    $.ajax({
        method: "POST",
        url: url_event
    }).done(function(data) {

        $("#select_event").html("<option></option>");
        var json_data = JSON.parse(data);
        events = json_data;

        for (var i = 0; i < json_data.length; i++) {
            $("#select_event").append("<option id='" + json_data[i].id + "' value='" + json_data[i].id + "' >" + json_data[i].name + "</option>");
        }
        $("#select_event").select2({
            templateResult: formatStateEvent,
            allowClear: true

        });
    });

    $("#select_event").on('select2:select', function(evt) {
      $.ajax({
          method: "POST",
          url: url_loader,
          data:{
            client:$("#select_client option:selected").attr("id"),
            shop:$("#select_shop option:selected").attr("id"),
            event:$("#select_event option:selected").attr("id")
          }
      }).done(function(data) {
        $(".tab-content").html(data);
      });
    });
    $("#select_shop").on('select2:select', function(evt) {
      $.ajax({
          method: "POST",
          url: url_loader,
          data:{
            client:$("#select_client option:selected").attr("id"),
            shop:$("#select_shop option:selected").attr("id"),
            event:$("#select_event option:selected").attr("id")
          }
      }).done(function(data) {
        $(".tab-content").html(data);
      });
    });
    $("#select_client").on('select2:select', function(evt) {
      $("#inputSearch").val("");
      $.ajax({
          method: "POST",
          url: url_loader,
          data:{
            client:$("#select_client option:selected").attr("id"),
            shop:$("#select_shop option:selected").attr("id"),
            event:$("#select_event option:selected").attr("id")
          }
      }).done(function(data) {
        $(".tab-content").html(data);
      });
    });
});
