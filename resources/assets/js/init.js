
(function (){
    'use strict';
    $(document).foundation();


    $(document).ready(function () {
        
        //Switch Pages
        switch ($("body").data("page-id")) {
            case 'home':
                break;
            case 'adminProduct':
                ACMESTORE.admin.changeEvent();
                break;
            case 'adminCategories':
                ACMESTORE.admin.update();
                ACMESTORE.admin.delete();
                ACMESTORE.admin.create();
                break;
            default:
                // do nothing
        }
    })
})();