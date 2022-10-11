
    jQuery(function($){
        $('.side-menu ul li a').filter(function() {
        var locationUrl = window.location.href;
        var currentItemUrl = $(this).prop('href');

        return currentItemUrl === locationUrl;
        }).parent('li a').addClass('active');
    });

