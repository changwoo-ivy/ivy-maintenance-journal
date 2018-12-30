(function ($) {
    window.initSelect2Widget = function (initOpts) {
        var opts, select;

        if (typeof $.fn.select2 !== 'function') {
            return;
        }

        opts = $.extend({
            targetSelector: '',
            select2: {}
        }, initOpts);

        if (Array.isArray(opts.select2)) {
            opts.select2 = {};
        }

        return $(opts.targetSelector).select2(opts.select2);
    };
})(jQuery);
