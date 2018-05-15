(function ($) {
    $(function () {
        $('.header-main-menu a').each(function () {
            var location = window.location.href
            var link = this.href
            var result = location.match(link);
            if (result != null) {
                $(this).addClass('current-menu-link-item');
            }
        });
    });
})(jQuery);