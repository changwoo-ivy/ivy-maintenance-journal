(function ($) {
    function initSkillLevel(widgetId, data) {
        var dataDef = {
            template: '',
            repeatedNodeSelector: '',
            index: 1,
            autoIncrement: true,
            items: []
        };

        var opt = $.extend(dataDef, data, {});

        if (typeof opt.index === 'string') {
            opt.index = parseInt(opt.index);
        }
        if (typeof opt.autoIncrement === 'string') {
            opt.autoIncrement = !!parseInt(opt.autoIncrement);
        }

        // string 'template' is converted to a function.
        opt.template = wp.template(opt.template);

        $(document).ready(function () {
            var repeatable = $('#' + widgetId).muRepeatable(opt);

            $('#' + widgetId + '-tbody').sortable();

            $('button[rel="' + widgetId + '-tbody"').click(function () {
                repeatable.triggerHandler('muRepeatable.insertItem', {});
            });

            repeatable.on('click', 'button.remove-skill-level', function (e) {
                repeatable.triggerHandler('muRepeatable.removeItem', e.currentTarget);
            });
        });
    }

    window.initSkillLevel = initSkillLevel;
})(jQuery);
