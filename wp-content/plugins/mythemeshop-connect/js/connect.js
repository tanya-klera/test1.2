/*
 * Plugin Name: MyThemeShop Connect
 * Plugin URI: http://www.mythemeshop.com
 * Description: Update MyThemeShop themes & plugins, get news & exclusive offers right from your WordPress dashboard
 * Author: MyThemeShop
 * Author URI: http://www.mythemeshop.com
 */
jQuery(document).ready(function($) {

    // Tabs
    $('.mtsc-nav-tab-wrapper a').click(function(event) {
        event.preventDefault();
        window.location.hash = this.href.substring(this.href.indexOf('#')+1);
    });
    $(window).on('hashchange', function() {
        var tab = window.location.hash.substr(1);
        if ( tab == '' ) {
            tab = 'mtsc-connect';
        }
        $('#mtsc-tabs').children().hide().filter('#'+tab).show();
        $('#mtsc-nav-tab-wrapper').children().removeClass('nav-tab-active').filter('[href="#'+tab+'"]').addClass('nav-tab-active');
    }).trigger('hashchange');

    // Settings form
    $('#mtsc-ui-access-role').focus(function(event) {
        $(this).parent().find('input[type="radio"]').prop('checked', true);
    });
    $('#mtsc-ui-access-user').focus(function(event) {
        $(this).parent().find('input[type="radio"]').prop('checked', true);
    });
    $('#mts_connect_settings_form').submit(function(e) {
        e.preventDefault();
        var $this = $(this);
        $.ajax({
            url: ajaxurl,
            method: 'post',
            data: $this.serialize(),
            beforeSend: function( xhr ) {
                $this.addClass('loading');
            },
            success: function( data ) {
                $this.removeClass('loading');
            }
        });
    });
    $('#mtsc-clear-notices').click(function(event) {
        event.preventDefault();
        $('.mts-connect-notice').hide();
        $.ajax({
            url: ajaxurl,
            type: 'GET',
            data: {action: 'mts_connect_reset_notices'},
        });

        $('#mtsc-clear-notices-success').show();
        setTimeout(function() { $('#mtsc-clear-notices-success').hide(); }, 2000);
    });
    $('#mtsc-clear-notices-success').hide();
});