$=jQuery,$(document).ready(function(){function e(){$(window).width()<=790?$(".featured-widget").insertAfter(".intro-image"):$(window).width()>790&!$("aside .featured-widget").length&&$(".featured-widget").insertBefore("#ati-latest-news-widget-2")}function t(e){return e%2===0}$(".fac-accordion").accordion({transitionSpeed:300,transitionEasing:"ease",controlElement:"[data-control]",contentElement:"[data-content]",singleOpen:!0}),$("a").each(function(){var e=$(this).attr("href");""===e&&$(this).removeAttr("href")}),$.fn.slideFadeToggle=function(e,t,a){return this.animate({opacity:"toggle",height:"toggle"},e,t,a)},$("#hideshow").addClass("js"),$("#navmenu").click(function(){$(this).html(function(e,t){return"CLOSE"===t?"MENU":"CLOSE"}),$("#hideshow").slideFadeToggle()}),e(),$(window).resize(function(t){e()}),$(".partner-card").click(function(){if($(this).siblings(".partner-card").removeClass("active"),$(this).addClass("active"),$(this).find(".partner-bio").length){var e=$(this).find(".partner-bio").html(),t="<aside class='partner-bio-aside'>"+e+"</aside>";if($(this).parent().find(".partner-bio-aside").remove(),$(window).width()<=660){var a=$(this).index()+1,r=1*Math.ceil(a/1);$(this).parent().find(".partner-card").eq(r-1).length?$(this).parent().find(".partner-card").eq(r-1).after(t):$(this).parent().find(".partner-card").last().after(t)}else if($(window).width()<=790){var a=$(this).index()+1,r=2*Math.ceil(a/2);$(this).parent().find(".partner-card").eq(r-1).length?$(this).parent().find(".partner-card").eq(r-1).after(t):$(this).parent().find(".partner-card").last().after(t)}else{var a=$(this).index()+1,r=3*Math.ceil(a/3);$(this).parent().find(".partner-card").eq(r-1).length?$(this).parent().find(".partner-card").eq(r-1).after(t):$(this).parent().find(".partner-card").last().after(t)}}}),$(".partner-cards").each(function(e,t){$(t).children(".partner-card").first().click()}),$(".tablepress tr td:contains('2015')").parents("tr").addClass("old"),$(".single-events").length&&$(".menu-item-1201").addClass("current_page_item active"),$.extend($.fn.dataTableExt.oSort,{"date-uk-pre":function(e){if(null==e||""==e)return 0;var t=e.split("/");return 1*(t[2]+t[1]+t[0])},"date-uk-asc":function(e,t){return t>e?-1:e>t?1:0},"date-uk-desc":function(e,t){return t>e?1:e>t?-1:0}}),$("#all-events-table").DataTable({dom:'<"#table-controls" fi>rt<"bottom" l p><"clear">',order:[[5,"asc"]],columnDefs:[{targets:"no-sort",orderable:!1}]}),$("#all-events-table-old").DataTable({dom:'<"#table-controls" fi>rt<"bottom" l p><"clear">',order:[[5,"desc"]],columnDefs:[{targets:"no-sort",orderable:!1}]}),$(".dataTables_filter input").attr("placeholder","Search for titles, lecturers, locations or dates"),$("th.event-date").addClass("sorting_desc"),$.urlParam=function(e){var t=new RegExp("[?&]"+e+"=([^&#]*)").exec(window.location.href);return null==t?null:t[1]||0};var a=$.urlParam("search");a&&(a=decodeURIComponent(a),$("#all-events-table").DataTable().search(a).draw()),$("#filter-buttons").on("click","li",function(e){var t=$(this).data("filter");"*"==t?$("#all-events-table").DataTable().search("").draw():$("#all-events-table").DataTable().search(t).draw()})});