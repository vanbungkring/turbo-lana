$(function(){$("#side-menu").metisMenu()});$(function(){$(window).bind("load resize",function(){console.log($(this).width());$(this).width()<768?$("div.sidebar-collapse").addClass("collapse"):$("div.sidebar-collapse").removeClass("collapse")})});$(".search-button").click(function(){$(".search-form").toggle();return!1});$(".search-form form").submit(function(){$("#perusahaan-grid").yiiGridView("update",{data:$(this).serialize()});return!1});