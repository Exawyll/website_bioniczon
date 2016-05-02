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

    app.controller('ReviewController', function() {
        this.review = {};

        this.addReview = function(product) {
            product.comment.push(this.review);

            this.review = {};
        };
    });

})();