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

    this.elTotal.value = price + ' $';
    this.elHt.value = this.ht(price) + ' $';
    this.elVat.value = this.vat(price) + ' $';
    this.elTtc.value = this.ttc(price) + ' $';
    this.elFreight.value = this.freight_charges(price) + ' $';

    return price;
};

var newCart = new Cart(document.getElementsByClassName('price'), document.getElementsByClassName('quantity'));

var SumCart = function () {
    this.elHt = document.getElementById('ht');
    this.elVat = document.getElementById('vat');
    this.elTtc = document.getElementById('ttc');
    this.elFreight = document.getElementById('freight_charges');
    this.elPay = document.getElementById('toPay');
};

SumCart.prototype.ht = function (price) {
    return price - (0.196 * price);
};

SumCart.prototype.vat = function (price) {
    return 0.196 * price;
};

SumCart.prototype.freight_charges = function (price) {
    return (0.01 * price);
};

SumCart.prototype.ttc = function (price) {
    return price + this.freight_charges(price);
};