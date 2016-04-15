/**
 * Created by WYLLIAM on 15/04/2016.
 */

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

    console.log(price);
    this.elTotal.value = price + ' $';
};

var newCart = new Cart(document.getElementsByClassName('price'), document.getElementsByClassName('quantity'));
