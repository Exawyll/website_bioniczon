/**
 * Created by WYLLIAM on 15/04/2016.
 */

//Total amount of the cart in JS
var Cart = function (listObjectHTML, listOfQuantities) {
    var self = this;
    this.listObject = listObjectHTML;
    this.elTotal = document.getElementById('totalCart');
    this.elQuantity = listOfQuantities;

    self.init();
};

Cart.prototype.init = function () {
    var price = 0;

    for (i = 0; i < this.listObject.length; i++) {
        price += (parseFloat(this.listObject[i].innerHTML) * parseInt(this.elQuantity[i].innerHTML));
    }

    this.elTotal.value = (Math.round(price * 100) / 100) + ' $';
};

var newCart = new Cart(document.getElementsByClassName('price'), document.getElementsByClassName('quantity'));