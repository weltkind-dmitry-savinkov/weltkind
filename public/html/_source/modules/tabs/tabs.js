// hpr895: 2017-1-17
// For IE9+

// Equivalent Tabs Plugin
(function( $ ) {
    $.fn.eqTabs = function(options) {
        // Settings
        var eq_default = $.extend( {
            'tab_init'         : 1,
            'nav'              : '.eqNav',
            'main'             : '.eqMain',
            'tab'              : '.eqTab',
            'content'          : '.eqContent',
            'activeTab'        : 'eqActive',
            'activeContent'    : 'eqActive',
        }, options);
        // Set 'this'
        var el = this;
        // Shorten variables
        var act_tab     = eq_default.activeTab;
        var act_cont    = eq_default.activeContent;
        var sel_nav     = eq_default.nav;
        var sel_main    = eq_default.main;
        var tab         = eq_default.tab;
        var content     = eq_default.content;
        // Protecting from wrong 'tab_init' value
        if ( eq_default.tab_init > el.find( sel_nav + ' ' + tab ).length || eq_default.tab_init < 0 ) {
            eq_default.tab_init = 1;
        };
        // Set 'tab_init' tab to active
        if (eq_default.tab_init != 0) {
            var defTab = eq_default.tab_init - 1;
            el.find( sel_nav + ' ' + tab ).eq( defTab ).addClass( act_tab );
            el.find( sel_main + ' ' + content ).eq( defTab ).addClass( act_cont );
        }
        // Changing classes on click
        el.find( sel_nav + ' ' + tab ).click(function(e) {
            e.preventDefault();
            var active_tab = $(this).index(tab);
            $(this).closest( el ).find( sel_nav + ' ' + tab ).removeClass( act_tab );
            $(this).addClass( act_tab );
            $(this).closest( el ).find( sel_main + ' ' + content ).removeClass( act_cont );
            $(this).closest( el ).find( sel_main + ' ' + content ).eq( active_tab ).addClass( act_cont );
            // Call user Function on tab Change
            if($.isFunction(options.onChange)){
                options.onChange.call(el);
            }
        });
    };
})(jQuery);
