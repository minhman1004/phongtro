// Số điện thoại
!function(factory) {
    "function" == typeof define && define.amd ? define([ "../inputmask" ], factory) : "object" == typeof exports ? module.exports = factory(require("../inputmask")) : factory(window.Inputmask);
}(function(Inputmask) {
    return Inputmask.extendAliases({
        phone: {
            alias: "abstractphone",
            phoneCodes: [ {
                mask: "0## #### ####",
                cc: "VN",
                cd: "Vietnam",
                desc_en: "",
                name_ru: "Вьетнам",
                desc_ru: ""
            }, {
                mask: "+84(###)####-####",
                cc: "VN",
                cd: "Vietnam",
                desc_en: "",
                name_ru: "Вьетнам",
                desc_ru: ""
            }]
        }
    }), Inputmask;
});


// Chứng minh nhân dân
!function(factory) {
    "function" == typeof define && define.amd ? define([ "../inputmask" ], factory) : "object" == typeof exports ? module.exports = factory(require("../inputmask")) : factory(window.Inputmask);
}(function(Inputmask) {
    return Inputmask.extendAliases({
        cmnd: {
            alias: "abstractphone",
            phoneCodes: [ {
                mask: "#########",
                cc: "VN",
                cd: "Vietnam",
                desc_en: "",
                name_ru: "Вьетнам",
                desc_ru: ""
            }]
        }
    }), Inputmask;
});