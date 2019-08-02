"use strict";

function raf(fn) {
    window.requestAnimationFrame(function () {
        window.requestAnimationFrame(function () {
            fn();
        });
    });
}


function fadeOut(item) {
    let hendler = function () {
        item.style.display = 'none';
        item.classList.remove('fade-active');
        item.removeEventListener('transitionend', hendler);
    };
    item.classList.add('fade-active');
    item.addEventListener('transitionend', hendler);
}

function fadeIn(item) {
    let hendler = function () {
        item.classList.remove('fade-active');
        item.removeEventListener('transitionend', hendler);
    };
    item.style.display = 'block';
    item.classList.add('fade');

    raf(function () {
        item.classList.add('fade-passive');
        item.classList.remove('fade');
    });

    item.addEventListener('transitionend', hendler);
}

function makeProductItem($template, product) {
    $template.querySelector('.product').setAttribute('productId', product.id);
    $template.querySelector('.product-name').textContent = product.name;
    $template.querySelector('img').setAttribute('src', "images/products/"+ product.picture);
    $template.querySelector('img').setAttribute('alt', product.name);
    $template.querySelector('.product-detail').setAttribute('alt', product.name);
    $template.querySelector('.product-detail a').setAttribute('slug', product.id);
    $template.querySelector('.product-price').textContent = '$'+product.price;
    return $template;
}

function makeProduct($template, product) {
    for (let j=0; j<product['picture'].length; j++) {
        let carouselItem = '.carousel-item--'+(j+1)+' .carousel-item__image';
        $template.querySelector(carouselItem).style.backgroundImage = "url('images/products/"+product.picture[j]+"')";    
    }
    return $template;
}

function updateTotal() {
    var quantities = 0,
    total = 0,
    $cartTotal = document.querySelector('.cart-total span'),
    items = document.querySelector('.cart-items').children;
    Array.from(items).forEach(function (item) {
        total += parseFloat(item.querySelector('.item-prices').textContent);
    });
    $cartTotal.textContent = parseFloat(Math.round(total * 100) / 100).toFixed(2);

}


function saveCart(shoppingCart) {
    // Store data
    localStorage.shoppingCart = JSON.stringify(shoppingCart);
    console.log(JSON.stringify(shoppingCart));
}

function productInCart(template, item) {
    template.querySelector('.productInCart').setAttribute('id', item.Id);
    template.querySelector('.item-quantity').textContent = item.Quantity;
    template.querySelector('.item-name').textContent = item.Product;
    template.querySelector('.item-price').textContent = item.Price;
    template.querySelector('.item-prices').textContent = parseFloat(item.Quantity) * parseFloat(item.Price.trim().substring(1));
    template.querySelector('.item-img img').setAttribute('src', item.Picture);
    return template;
}

function showCart(shoppingCart) {
    if (shoppingCart.length == 0) {
        console.log("Your Shopping Cart is Empty!");
        return;
    }
    document.querySelector(".cart-items").innerHTML = '';
    shoppingCart.forEach(function (item) {
        let template = document.getElementById("cartItem").content;
        productInCart(template, item);
        document.querySelector(".cart-items").append(document.importNode(productInCart(template, item), true));
    });
    updateTotal();
}

function openCart(shoppingCart) {
    showCart(shoppingCart);
    document.querySelector(".aside").classList.add("open");
    document.querySelector(".backdrop").classList.add("backdrop--open");
}

function closeCart() {
    document.querySelector(".aside").classList.remove("open");
    document.querySelector(".backdrop").classList.remove("backdrop--open");
}

function getElement(e) {
    let element = e.parentNode.parentNode;
    
    return {
        id: element.getAttribute("productId"),
        price:e.parentNode.querySelector(".product-price").textContent,
        name:element.querySelector(".product-name").textContent,
        quantity:element.querySelector(".quantity").value,
        picture:element.querySelector("img").getAttribute('src')
	}
    
}

function _translate(img, offset=0){
    let rect = img.getBoundingClientRect();
    let elements = ['translate3D('];
    elements.push(rect.left - offset + 'px,');
    elements.push(rect.top - offset + 'px,0)');
    return elements.join('');
}
class Product {
    constructor(id, name, price, quantity, picture) {
        this.Id = id;
        this.Product = name;
        this.Price = price;
        this.Quantity = quantity;
        this.Picture = picture;
    }
}

var serializeArray = function (form) {

	// Setup our serialized data
	var serialized = [];

	// Loop through each field in the form
	for (var i = 0; i < form.elements.length; i++) {

		var field = form.elements[i];

		// Don't serialize fields without a name, submits, buttons, file and reset inputs, and disabled fields
		if (!field.name || field.disabled || field.type === 'file' || field.type === 'reset' || field.type === 'submit' || field.type === 'button') continue;

		// If a multi-select, get all selections
		if (field.type === 'select-multiple') {
			for (var n = 0; n < field.options.length; n++) {
				if (!field.options[n].selected) continue;
				serialized.push({
					name: field.name,
					value: field.options[n].value
				});
			}
		}

		// Convert field data to a query string
		else if ((field.type !== 'checkbox' && field.type !== 'radio') || field.checked) {
			serialized.push({
				name: field.name,
				value: field.value
			});
		}
	}

	return serialized;

};


// --------------------------------------------------------------------
(function () {
    const $template = document.getElementById("productItem").content;
    const $templateDetail = document.getElementById("productDetail").content;

    const url = '/api/shop';
    
    var shoppingCart = [];

    if (localStorage.shoppingCart) {
        shoppingCart = JSON.parse(localStorage.shoppingCart);
    }

    document.getElementById("cart-toggle").addEventListener('click', () => openCart(shoppingCart));
    document.querySelector(".toggle-sidebar").addEventListener('click', () => closeCart());


    fetch(url)
        .then(
            (response) => {
                if (response.status !== 200) {
                    console.log('Looks like there was a problem. Status Code: ' + response.status);
                    return;
                }
                response.json().then((data) => {

                    data.forEach((index) => {
                        document.querySelector('.main').append(document.importNode(makeProductItem($template, index), true));
                    });

                    let plus = [...document.querySelectorAll('.plus')];

                    plus.forEach(function (elem) {
                        elem.addEventListener('click', function () {
                            let val = parseInt(this.previousElementSibling.getAttribute('value'));
                            this.previousElementSibling.setAttribute('value', val + 1);
                        });
                    });

                    let minus = [...document.querySelectorAll('.minus')];

                    minus.forEach((elem) => {
                        elem.addEventListener('click', function () {
                            let val = parseInt(this.nextElementSibling.getAttribute('value'));
                            this.nextElementSibling.setAttribute('value', val - 1);
                        });
                    });


                    const byes = Array.from(document.getElementsByClassName('buy-now'));
                    byes.forEach(function (buy) {
                        buy.addEventListener('click', function (e) {
                            fadeOut(e.target.parentNode.parentNode.querySelector('.product-name'));
                            fadeOut(e.target.parentNode.parentNode.querySelector('.icon'));
                            e.target.style.display = 'none';
                            e.target.parentNode.querySelector('.product-detail').style.display = 'block';
                            e.target.parentNode.style.top = '40%';
                        });
                    });

                    const cancels = Array.from(document.getElementsByClassName('cancel'));
                    cancels.forEach(function (cancel) {
                        cancel.addEventListener('click', function (e) {
                            fadeIn(e.target.parentNode.parentNode.querySelector('.product-name'));
                            fadeIn(e.target.parentNode.parentNode.querySelector('.icon'));
                            e.target.parentNode.querySelector('.buy-now').style.display = 'block';
                            e.target.parentNode.querySelector('.product-detail').style.display = 'none';
                            e.target.parentNode.style.top = '80%';
                        });
                    });
                    
                    const details = Array.from(document.querySelectorAll('.product-detail a'));
                    details.forEach(function (element) {
                        element.addEventListener('click', function (e) {
                            document.querySelector("#main-content").innerHTML='';

                        fetch('api/detail/'+e.target.getAttribute('slug')).then(
                        (response) => {
                            if (response.status !== 200) {
                                console.log('Looks like there was a problem. Status Code: ' + response.status);
                                return;
                            }
                            response.json().then((data) => {
                                console.log(data);
                                document.querySelector('#main-content').append(document.importNode(makeProduct($templateDetail, data), true));

                                document.querySelector('.carousel-item').classList.add('active');
                                var total = document.querySelectorAll('.carousel-item').length;
                                var current = 0;

                                document.getElementById('moveRight').addEventListener('click', function () {
                                    var next = current;
                                    current = current + 1;
                                    setSlide(next, current);
                                });

                                document.getElementById('moveLeft').addEventListener('click', function () {
                                    var prev = current;
                                    current = current - 1;
                                    setSlide(prev, current);
                                });

                                function setSlide(prev, next) {
                                    var slide = current;
                                    if (next > total - 1) {
                                        slide = 0;
                                        current = 0;
                                    }
                                    if (next < 0) {
                                        slide = total - 1;
                                        current = total - 1;
                                    }
                                    document.querySelectorAll('.carousel-item')[prev].classList.remove('active');
                                    document.querySelectorAll('.carousel-item')[slide].classList.add('active');
                                }
                            });
                        });
                            
                            
    
                        });
                    });
                    // ==================================================================
                    const carts = Array.from(document.getElementsByClassName('add-to-cart'));

                    //===================================================================

                    carts.forEach(function (cart) {
                        cart.addEventListener('click', function (e) {

                            let element = e.target.parentNode.parentNode;
                            let o = getElement(e.target);

                            console.log(shoppingCart);

                            for (let i in shoppingCart) {
                                if (shoppingCart[i].Id == o.id) {
                                    shoppingCart[i].Quantity = parseInt(shoppingCart[i].Quantity) + parseInt(o.quantity);
                                    saveCart(shoppingCart);
                                    return;
                                }
                            }


                            let item = new Product(o.id, o.name, o.price, o.quantity, o.picture);

                            shoppingCart.push(item);
                            saveCart(shoppingCart);

                            // Поиск элемента с заданным номером
                            var imgToDrag = element.querySelector("img");

                            if (imgToDrag) {
                                var imgClone = imgToDrag.cloneNode(true);
                                imgClone.classList.add('offset-img');
                                document.body.appendChild(imgClone);

                                element.parentNode.parentNode.querySelector('.product-wrapper').style.transform = 'rotateY(180deg)';
                                element.parentNode.parentNode.querySelector('.product-back').classList.add('back-is-visible');

                                imgClone.animate([{
                                        transform: _translate(imgToDrag)
                                    },
                                    {
                                        transform: _translate(document.querySelector('#cart-toggle'), 50) + 'perspective(500px) scale3d(0.1, 0.1, 0.2)'
                                    },
                                ], {
                                    duration: 2000,
                                }).onfinish = function () {
                                    imgClone.remove();
                                    element.parentNode.parentNode.querySelector('.product-wrapper').style.transform = 'rotateY(0deg)';
                                    fadeIn(element.querySelector('.product-name'));
                                    fadeIn(element.querySelector('.icon'));
                                    e.target.parentNode.querySelector('.buy-now').style.display = 'block';
                                    e.target.parentNode.querySelector('.product-detail').style.display = 'none';
                                    e.target.parentNode.style.top = '80%';
                                };
                            }
                        });
                    });

                    // =================Очистка всего хранилища================

                    document.querySelector('.clear-cart').addEventListener('click', () => {
                        localStorage.removeItem('shoppingCart');
                        document.querySelector('.cart-items').innerHTML = '';
                        shoppingCart = [];
                        updateTotal();
                    });

                    document.querySelector('.cart-items').addEventListener('click', (e) => {
                        if (e.target && e.target.matches(".remove-item")) {
                            var index = e.target.parentNode.querySelector('.productInCart').getAttribute("id");
                            shoppingCart.splice(shoppingCart.indexOf(shoppingCart.find(x => x.Id === index)), 1);
                            e.target.parentNode.remove();
                            saveCart(shoppingCart);
                            updateTotal();
                        }
                    }, false);
                });
            })
        .catch(function (err) {
            console.log('Fetch Error :-S', err);
        });

    document.querySelector(".checkout__trigger").addEventListener('click', () => {
        fetch('/api/check').then(
            (response) => {
                if (response.status !== 200) {
                    console.log('Looks like there was a problem. Status Code: ' + response.status);
                    return;
                }
                
                response.json().then((d) => {
                  if (d.r == "fail") {
                    window.location.href = d.url;
                  } 
                  else {
                    closeCart();
                    const $templateCheck = document.getElementById("order-form").content;

                    let cart_total = document.querySelector('.cart-total span').textContent;
                    $templateCheck.querySelector("span.price").textContent = '$' + cart_total;
                    $templateCheck.querySelector("#sub_price").textContent = '$' + cart_total;

                    var sub_tax = 2.45;
                    var sub_ship = 4.00;
                    var calculated_total = parseFloat(cart_total) + sub_tax + sub_ship;

                    $templateCheck.querySelector("#sub_tax").textContent = '$' + parseFloat(sub_tax);
                    $templateCheck.querySelector(".sub_ship").textContent = '$' + sub_ship;
                    $templateCheck.querySelector("#calculated_total").textContent = '$' + calculated_total;


                    $templateCheck.querySelector("#first_name").value = d.first_name;
                    $templateCheck.querySelector("#last_name").value = d.last_name;
                    $templateCheck.querySelector("#phone_number").value= d.phone_number;

                    document.querySelector("#main-content").innerHTML='';

                    document.querySelector('#main-content').append(document.importNode($templateCheck, true));

                    // ----------------------------------------

                    document.querySelector('#complete').addEventListener('click', function() {
                        fetch('/api/cart', 
                        {
                            method: "POST", // *GET, POST, PUT, DELETE, etc.
                            // mode: "cors", // no-cors, cors, *same-origin
                            // cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
                            // credentials: "same-origin", // include, *same-origin, omit
                            headers: {
                                "Content-Type": "application/json",
                                // "Content-Type": "application/x-www-form-urlencoded",
                            },
                            // redirect: "follow", // manual, *follow, error
                            // referrer: "no-referrer", // no-referrer, *client

                            body: JSON.stringify({
                                "cart": shoppingCart,
                                "first_name": document.querySelector("#first_name").value,
                                "last_name": document.querySelector("#last_name").value,
                                "phone_number": document.querySelector("#phone_number").value
                            }),
                            
                        })
                        .then(function(response) {
                            console.log('Request success: ', response); 
                                localStorage.removeItem(
                                    'shoppingCart');
                                    document.querySelector(".cart-items").innerHTML = '';
                                shoppingCart = [];
                                updateTotal();
                                document.location.replace('/profile');
                            })
                            .catch(function(error) {
                                console.log(error);
                            });
                    });
                    }
                });
        });
    
    });

    // ====================================================================
})();