/*
 * Plugin Name: MyThemeShop Connect
 * Plugin URI: http://www.mythemeshop.com
 * Description: Update MyThemeShop themes & plugins, get news & exclusive offers right from your WordPress dashboard
 * Author: MyThemeShop
 * Author URI: http://www.mythemeshop.com
 */
jQuery(document).ready(function($) {
    var closed_notices = 0;
    function dismiss_notices(ids) {
        $.each(ids, function(index, id) {
            var $notice = $('#notice_'+id);
            $notice.fadeOut('slow', function() {
                if (closed_notices >= 2) {
                    $('.mts-notice-dismiss-all-icon').fadeIn();
                }
            });
        });
        
        $.ajax({
            url: ajaxurl,
            method: 'post',
            data: {'action': 'mts_connect_dismiss_notice', 'ids': ids}
        });

        closed_notices++;
    }
    
    $('.mts-notice-dismiss-icon', this).click(function(e) {
        e.preventDefault();
        var id = $(this).closest('.mts-connect-notice').prop('id').replace('notice_', '');
        dismiss_notices([id]);
    });
                
    var notices = [];
    $('.mts-connect-notice').each(function() {
        notices.push(this.id.replace('notice_', ''));
    });
    
    $('.mts-notice-dismiss-all-icon', this).click(function(e) {
        e.preventDefault();
        dismiss_notices(notices);
    });
    
    // Admin menu
    jQuery('#adminmenu .toplevel_page_mts-connect .dashicons-update').addClass(mtsconnect.icon_class_attr);
    
    // Extra buttons
    if (jQuery('body').hasClass('themes-php')) {
        jQuery('.page-title-action').after(' <a href="'+mtsconnect.check_themes_url+'" id="mts-connect-check-theme-updates" class="page-title-action">'+mtsconnect.l10n_check_themes_button+'</a>');
    } else if (jQuery('body').hasClass('plugins-php')) {
        jQuery('.page-title-action').after(' <a href="'+mtsconnect.check_plugins_url+'" id="mts-connect-check-theme-updates" class="page-title-action">'+mtsconnect.l10n_check_plugins_button+'</a>');
    }
    if ( jQuery('#mts-connect-modal').length ) {
        jQuery('#mts-connect-modal').show().find('p a.button:last-child').click(function(event) {
            event.preventDefault();
            jQuery('#mts-connect-modal').hide();
        });
    }

    // Connect form
    $('#mts_connect_form').submit(function(e) {
        e.preventDefault();
        var $this = $(this);
        $this.find('.mtsc-error').remove();
        if ( $this.find('#mts_agree').prop('checked') == false ) {
            $this.append('<p class="mtsc-error">'+mtsconnect.l10n_accept_tos+'</p>');
            return false;
        }
        // get_key
        $.ajax({
            url: ajaxurl,
            method: 'post',
            data: $this.serialize(),
            dataType: 'json',
            beforeSend: function( xhr ) {
                $this.addClass('loading');
            },
            success: function( data ) {
                $this.removeClass('loading');
                if (data !== null && typeof data.login !== 'undefined') {
                    $this.html(mtsconnect.l10n_ajax_login_success);
                    jQuery('#mts-connect-modal').find('p').first().hide();
                    jQuery('#adminmenu .toplevel_page_mts-connect .dashicons-update').removeClass('disconnected').addClass('connected');
                    if ( jQuery('#mts-connect-modal').length ) {
                        jQuery('#mts-connect-modal').find('.button-secondary').last().hide();
                    }
                    // check_themes
                    $.get(ajaxurl, 'action=mts_connect_check_themes').done(function() {
                        $this.append(mtsconnect.l10n_ajax_theme_check_done);
                        setTimeout(function() {
                            // check_plugins
                            $.get(ajaxurl, 'action=mts_connect_check_plugins').done(function() {
                                $this.append(mtsconnect.l10n_ajax_plugin_check_done);
                                if ( $('#mts-connect-modal').length ) {
                                    $('#mts-connect-modal').remove();
                                } else {
                                    $this.append(mtsconnect.l10n_ajax_refreshing);
                                    setTimeout(function() {
                                        window.location.href = mtsconnect.pluginurl+'&updated=1';
                                    }, 100);
                                }
                            });
                        }, 1000);
                    });
                } else { // status = fail
                    var errors = '';
                    /* $.each(data.errors, function(i, msg) {
                        errors += '<p class="mtsc-error">'+msg+'</p>';
                    }); */
                    errors = '<p class="mtsc-error">'+data.message+'</p>';
                    $this.find('.mtsc-error').remove();
                    $this.append(errors);
                }
            }
        });
    });
});