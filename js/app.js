(function () {
    var app = angular.module('store', []);

    app.controller('StoreController', ['$http', function ($http) {
        var store = this;
        store.products = [];
        $http.get('./js/store-products.json').success(function (data) {
            store.products = data;
        });
    }]);

    app.controller('TabController', function () {
        this.tab = 1;

        this.isSet = function (checkTab) {
            return this.tab === checkTab;
        };

        this.setTab = function (activeTab) {
            this.tab = activeTab;
        };
    });

    app.controller('ReviewController', /*['$http', */function (/*$http*/) {
        this.comment = {};
        console.log('prout');
        //$http.get('./js/store-products.json').success(function(data){
        //    review.comment = data["comment"];
        //    console.log(data["comment"]);
        //});

        this.addComment = function (product) {
            product.comment.push(this.comment);

            console.log('prout');

            product.comment = {};
        };
    }/*]*/);

})();