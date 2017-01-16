+ function(a) {
    "use strict";
    a(function() {
        var b = !1,
            c = !1;
        if (a(".update-btn").click(function() {
                var d = a(this);
                return c ? !1 : (c = !0, b ? (b = !1, a(".phone-show-section").addClass("circulate-img"), setTimeout(function() {
                    a(".phone-show-section").removeClass("update-img circulate-stitics circulate-img"), c = !1
                }, 1000)) : (b = !0, a(".phone-show-section").addClass("update-img"), setTimeout(function() {
                    a(".phone-show-section").addClass("circulate-stitics"), c = !1
                }, 1000)), d.addClass("active"), void setTimeout(function() {
                    d.removeClass("active"), c = !1
                }, 1000))
            }),  !window.isTouchableDevice) {}
    })
}(jQuery);