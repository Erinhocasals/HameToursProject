// const { sum } = require("lodash");
// const { data } = require("autoprefixer");

var Quickbeam = (function () {
    // Instance stores a reference to the Singleton
    var instance;

    function init(att) {
        // Singleton
        var els = {};
        var self = {};

        //Select attributes
        var cart = document.querySelector("#quick-cart");
        var cartPay = document.querySelector("#quick-cart-pay");
        var cartPrice = document.querySelector("#quick-cart-price");

        var count;

        (function main() {
            window.onresize = function (event) {
                setPayButtonAction();
            };

            setPayButtonAction();

            if (cartPay.length > 0) {
                return false;
            }

            if (att.animationLib === "gsap") {
                if (typeof TweenMax !== "function") {
                    throw "GSAP is not loaded.";
                }
            }

            //Add event listeners
            var listeners = {
                ".quick-cart-product-remove": function (el) {
                    var id = el.getAttribute("data-id");
                    var type = el.getAttribute("data-model");

                    ajaxProcess({
                        operation: "remove",
                        el: el,
                        type: type,
                        id: id,
                    });
                },
                ".quick-cart-product-removeall": function (el) {
                    var id = el.getAttribute("data-id");
                    var product = el.parentNode;

                    if (!(product && cart)) {
                        return false;
                    }

                    product.classList.add("remove-product");
                    window.setTimeout(function () {
                        removeProduct(product_box);
                    }, 200);

                    ajaxProcess({ operation: "remove", quantity: 0, id: id });
                },
            };

            //Shopping cart list listeners
            $(".cart_elements input[type='text']").keydown(function (event) {
                event.preventDefault();
            });
            document
                .querySelectorAll(".cart_elements .element")
                .forEach((el) => {
                    el.addEventListener("change", function (event) {
                        var elementId = el.getAttribute("data-id");
                        var elementType = el.getAttribute("data-type");
                        var daysDifference = document.getElementById(
                            "fire-" + elementId
                        ).value;

                        ajaxProcess({
                            operation: "update",
                            id: elementId,
                            type: elementType,
                            quantity: el.value,
                            el: el,
                            days: daysDifference,
                        });
                    });
                });
            document.querySelectorAll(".element-remove").forEach((el) => {
                el.addEventListener("click", function () {
                    var elementId = el.getAttribute("data-id");
                    var elementType = el.getAttribute("data-type");

                    ajaxProcess({
                        operation: "update",
                        id: elementId,
                        type: elementType,
                        quantity: 0,
                        el: el,
                    });
                });
            });
            document.querySelectorAll(".fire").forEach((el) => {
                el.addEventListener("click", function () {
                    var elementId = el.getAttribute("data-id");
                    var elementType = el.getAttribute("data-type");
                    var elementQuantity = document.getElementById(
                        "quantity-" + elementId
                    ).value;
                    var daysDifference = el.value;
                    var dateStart = document.querySelector(
                        "[data-field='reservation_start_" + elementId + "']"
                    ).value;
                    var dateEnd = document.querySelector(
                        "[data-field='reservation_end_" + elementId + "']"
                    ).value;

                    ajaxProcess({
                        operation: "update",
                        id: elementId,
                        type: elementType,
                        quantity: elementQuantity,
                        el: el,
                        days: daysDifference,
                        dateStart: dateStart,
                        dateEnd: dateEnd,
                    });
                });
            });

            // document.querySelectorAll('.date-start').forEach(el => {
            //     el.addEventListener('input', (event) => {
            //         // const result = document.querySelector('.result');
            //         // result.textContent = `You like ${event.target.value}`;
            //         alert('www');
            //     });
            // });

            //Add product to cart listener
            document.querySelectorAll(".btn-add-to-cart").forEach((el) => {
                el.addEventListener("click", function () {
                    var elementId = el.getAttribute("data-id");
                    var elementType = el.getAttribute("data-type");
                    var elementTitle = el.getAttribute("data-title");
                    var elementImage = el.querySelector("img");
                    var parentId = el.getAttribute("data-parent-id");
                    var parentType = el.getAttribute("data-parent-type");
                    var beneficiary = el.getAttribute("data-beneficiary");

                    if (beneficiary !== null && beneficiary === "") {
                        console.log("Debes crear un beneficiario");

                        $("#modal-add-beneficiary").modal("show");

                        document.querySelector("#modal-add-beneficiary button[type='submit'].btn").addEventListener("click", function (e) {
                            e.preventDefault();
                            let shouldIContinue = true;

                            document.querySelectorAll("#modal-add-beneficiary input[type='text']").forEach((el) => {
                                if (el.value == "") {
                                    toastr.error("El campo (" + el.getAttribute("data-comp") + ") el obligatorio.");
                                    shouldIContinue = false;
                                }
                            });

                            if (shouldIContinue) {
                                $.blockUI({
                                    message: '<div class="lds-ring"><div></div><div></div><div></div><div></div></div> <h2>Procesando petición ...</h2>',
                                    css: {
                                        backgroundColor: "transparent",
                                        color: "white",
                                        cursor: "wait",
                                        border: "none",
                                    },
                                });

                                axios.post(document.querySelector("#form-add-beneficiary").getAttribute("action"), {}, {
                                    params: {
                                        name: document.querySelector('input[type="text"]#name').value,
                                        identification: document.querySelector('input[type="text"]#identification').value,
                                        phone: document.querySelector('input[type="text"]#phone').value,
                                        email: document.querySelector('input[type="email"]#email').value,
                                        address: document.querySelector('input[type="text"]#address').value,
                                        location: document.querySelector("#modal-add-beneficiary select").value
                                    }
                                })
                                .then(function (response) {
                                    if(response.status == 200) {

                                        if (response.data.result == true) {
                                            toastr.info(response.data.msg);

                                            $("#modal-add-beneficiary").modal('toggle');
                                            // $.unblockUI();

                                            ajaxProcess({
                                                operation: "add",
                                                id: elementId,
                                                type: elementType,
                                                title: elementTitle,
                                                image: elementImage,
                                                parentId: parentId,
                                                parentType: parentType,
                                                beneficiary: response.beneficiary_id,
                                            });
                                        }
                                        else {
                                            toastr.error(response.data.msg);
                                        }
                                    }
                                    $.unblockUI();
                                })
                                .catch(function (error) {
                                    console.log(error);
                                    $.unblockUI();
                                });
                            }

                        });
                    }
                    else {
                        ajaxProcess({
                            operation: "add",
                            id: elementId,
                            type: elementType,
                            title: elementTitle,
                            image: elementImage,
                            parentId: parentId,
                            parentType: parentType,
                            beneficiary: beneficiary,
                        });
                    }
                });
            });

            //Event delegation for cart
            cart.addEventListener("click", function (e) {
                //calling callback if item of object have a match.
                for (var key in listeners) {
                    if (
                        listeners.hasOwnProperty(key) &&
                        e.target &&
                        e.target.matches(key)
                    ) {
                        listeners[key].apply(null, [e.target]);
                    }
                }
            });

            var cartElements =
                document.getElementsByClassName("quick-cart-product");
            if (cartElements.length > 0) {
                if (!cartPay.classList.contains("open")) {
                    cartPay.classList.add("open");
                }
            }

            return false;
        })();

        function stringToDate(_date, _format, _delimiter) {
            var formatLowerCase = _format.toLowerCase();
            var formatItems = formatLowerCase.split(_delimiter);
            var dateItems = _date.split(_delimiter);
            var monthIndex = formatItems.indexOf("mm");
            var dayIndex = formatItems.indexOf("dd");
            var yearIndex = formatItems.indexOf("yyyy");
            var month = parseInt(dateItems[monthIndex]);
            month -= 1;
            var formatedDate = new Date(
                dateItems[yearIndex],
                month,
                dateItems[dayIndex]
            );
            return formatedDate;
        }

        //Procedure for creating product in cart and displaying after animation.
        function addProduct(data) {
            if (!cartPay.classList.contains("open")) {
                cartPay.classList.add("open");
            }

            var cart_product =
                document.querySelector("#quick-cart-product-" + data.id) ||
                false;

            if (cart && data.image && cart_product == false) {
                //Create product box
                var element = createProductBox({
                    id: data.id,
                    title: data.title,
                    price: 100,
                    image: data.image,
                    model: data.type,
                });

                cart.insertBefore(element, cart.firstChild); //Append element to cart
                displayProductBox(element, 1000); //Display created element
            }
        }

        // Function for creating DOM element from pre-set template.
        // Private function
        // Arguments: modelId, price, swatchesContent
        // Returning created DOM element.
        function createProductBox(data) {
            var template =
                '<div class="quick-cart-product-wrap">' +
                '<img src="' +
                data.image.src +
                '">' +
                '<span class=" s1" style="background-color:#000; opacity: .5">' +
                data.price +
                "</span>" +
                '<span class=" s2"><img src="https://ui-avatars.com/api/?name=' +
                data.title +
                '&color=CCCCCC&background=000000"></span>' +
                "</div>" +
                '<span class="count hide fadeUp" id="quick-cart-product-count-' +
                data.id +
                '">0</span>' +
                '<span class="quick-cart-product-remove remove" data-model="' +
                data.model +
                '" data-id="' +
                data.id +
                '"></span>' +
                '<span class="quick-cart-product-removeall removeall" data-id="' +
                data.id +
                '"></span>';

            var div = document.createElement("div");
            div.classList.add("quick-cart-product");
            div.classList.add("quick-cart-product-static");
            div.setAttribute("id", "quick-cart-product-" + data.id);
            div.style.opacity = 0;
            div.innerHTML = template;

            return div;
        }

        // Function for displaying product box.
        // private function
        // Arguments: createde element, delay of display.
        function displayProductBox(el, delay) {
            //Defaults
            delay = typeof delay !== "undefined" ? delay : 0;

            window.setTimeout(function () {
                el.style.opacity = 1;
            }, delay);
        }

        //requst animation frame animation function
        function animate(item) {
            var duration = item.time,
                end = +new Date() + duration;

            var step = function () {
                var current = +new Date(),
                    remaining = end - current;

                if (remaining < 60) {
                    item.run(1); //1 = progress is at 100%
                    return;
                } else {
                    var rate = 1 - remaining / duration;
                    item.run(rate);
                }

                requestAnimationFrame(step);
            };
            step();
        }

        //Procedure for animating process of adding product box to cart using bezire curve.
        //Private
        function animateProduct(data) {
            // create and append copy of large image.
            var element = createAnimatedObject(data);
            var c = getAnimationCoordinations(element, data);

            if (att.animationLib === "gsap") {
                gsapAnimation(element, c, data);
            } else {
                fallbackAnimation(element, c);
            }
        }

        function gsapAnimation(element, c, data) {
            element.style.position = "absolute";
            element.classList.add("run");

            var countBox = document.getElementById(
                "quick-cart-product-count-" + data.id
            );
            if (countBox) {
                countBox.classList.remove("fadeUp");
                countBox.classList.add("fadeDown");
            }

            TweenMax.to(element, 1, {
                bezier: { type: "soft", values: c.through },
                ease: Power1.easeInOut,
            });

            setTimeout(function () {
                element.style.opacity = 0;
                document.body.removeChild(element);

                // setTimeout(function(){
                //   ajaxAddProductToCart();
                // },100)
            }, 1000);
        }

        //Vanilla JS Animation
        function fallbackAnimation(element, c) {
            var cordeIndex = 0;
            var coord = function (x, y) {
                if (!x) var x = 0;
                if (!y) var y = 0;
                return { x: x, y: y };
            };

            var bezier = function (t, p0, p1, p2, p3) {
                var cX = 3 * (p1.x - p0.x),
                    bX = 3 * (p2.x - p1.x) - cX,
                    aX = p3.x - p0.x - cX - bX;

                var cY = 3 * (p1.y - p0.y),
                    bY = 3 * (p2.y - p1.y) - cY,
                    aY = p3.y - p0.y - cY - bY;

                var x =
                    aX * Math.pow(t, 3) + bX * Math.pow(t, 2) + cX * t + p0.x;
                var y =
                    aY * Math.pow(t, 3) + bY * Math.pow(t, 2) + cY * t + p0.y;

                return { x: x, y: y };
            };
            //Coordinations
            //Start
            var P1 = coord(c.start.x, c.start.y);
            //HELPERS
            var P2 = coord(c.start.x - 300, c.final.y);
            var P3 = coord(c.start.x + 500, c.start.y + 500);
            //final destination
            var P4 = coord(c.final.x, c.final.y);

            //Actaully animate.
            var stage = 0;
            element.style.position = "absolute";
            element.classList.add("run");
            animate({
                time: 1000,

                run: function (t) {
                    if (t == 1) {
                        setTimeout(function () {
                            element.style.opacity = 0;
                            document.body.removeChild(element);

                            //   setTimeout(function(){
                            //     ajaxAddProductToCart();
                            //   },1000)
                        }, 500);
                    }
                    //find position on bezier curve
                    var curpos = bezier(t, P1, P2, P3, P4);

                    var trans =
                        "translate(" +
                        Math.round(curpos.x) +
                        "px," +
                        Math.round(curpos.y) +
                        "px)";

                    element.style.webkitTransform = trans;
                    element.style.transform = trans;
                },
            });
        }

        // Function for creating DOM element from pre-set template.
        // Private function
        // Arguments: none
        // Returning created DOM element.
        function createAnimatedObject(data) {
            var width = data.image.offsetWidth - 2;
            var height = Math.round(
                parseInt(data.image.offsetWidth - 2) * 1.33
            );
            var offset = data.image.getBoundingClientRect();

            var template =
                '<div style="width:' +
                width +
                "px; height:" +
                height +
                'px;">' +
                '<img src="' +
                data.image.src +
                '">' +
                '<span class="s1" style="background-color:#000; opacity: .5; transition: 1000ms"></span>' +
                '<span class="s2"></span>' +
                "</div>";

            // Animace pridani produktu k produktovemu boxu
            var div = document.createElement("div");
            div.classList.add("quick-cart-product");
            div.classList.add("quick-cart-product");
            div.classList.add("animated");
            div.setAttribute("id", "quick-cart-product-animated");

            if (att.animationLib === "gsap") {
                var trans =
                    "translate(" + offset.left + "px," + offset.top + "px)";
                div.style.webkitTransform = trans;
                div.style.transform = trans;
            }

            //Apend template
            div.innerHTML = template;
            //Append child to body
            document.body.appendChild(div);
            //return
            return div;
        }

        // Function for calculating animation coordinations
        // Private function
        // Arguments: element from DOM.
        // Returning object { start:{x,y}, finish: {x,y} }.
        function getAnimationCoordinations(element, data) {
            var child = element.querySelector("div");
            // Calc of start and finish positions of animation.
            var start = data.image.getBoundingClientRect();
            var final = document
                .querySelector("#quick-cart-product-" + data.id)
                .getBoundingClientRect();
            var fTop = final.top;
            // adding scroll heihft to Y
            var doc = document.documentElement;
            var left =
                (window.pageXOffset || doc.scrollLeft) - (doc.clientLeft || 0);
            var top =
                (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);

            var throughX =
                parseInt(start.left) - parseInt(child.style.width) * 1.4;
            var throughY = fTop + top - parseInt(child.style.height) / 3;

            return {
                start: {
                    x: start.left,
                    y: start.top,
                },
                through: [
                    { x: throughX, y: throughY },
                    { x: final.left, y: fTop + top },
                ],
                final: {
                    x: final.left,
                    y: fTop + top,
                },
            };
        }

        function postProductAnimation(data, response) {
            data.image.classList.add("animate");
            window.setTimeout(function () {
                data.image.classList.remove("animate");
            }, 400);

            var product_box = document.getElementById(
                "quick-cart-product-" + data.id
            );
            var product_count_box = document.getElementById(
                "quick-cart-product-count-" + data.id
            );
            var cartPay_total_count = document.getElementById(
                "quick-cart-pay-total-count"
            );
            var cartPay_total_count_value = parseInt(
                cartPay_total_count.innerText
            );
            product_count = response.data.modelQuantity;
            product_count_box.innerText = product_count;

            if (product_count > 1) {
                product_count_box.classList.remove("hide");
            }

            cartPay_total_count_value++;
            cartPay_total_count.innerText = cartPay_total_count_value;

            var countBox = document.getElementById(
                "quick-cart-product-count-" + data.id
            );
            countBox.classList.remove("fadeDown");
            countBox.classList.add("fadeUp");

            if (count < 0) {
                count = 1;
            }

            if (product_box) {
                product_box.classList.remove("show-remove-all");
                last_removed_variant_count = 0;
            }

            cartPrice.innerText = response.data.total; //Shopify.formatMoney(response.total_price);
        }

        function postAddOp(data, response) {
            addProduct(data);
            animateProduct(data);
            postProductAnimation(data, response);
        }

        function postRemoveOp(data, response) {
            var product = data.el.parentNode;
            var productCount = product.querySelector(".count");
            var count = parseInt(productCount.innerText);
            var imgWrap = product.querySelector("div");

            if (!(product && cart)) {
                return false;
            }

            count = response.data.modelQuantity;

            if (count <= 0) {
                //Animation
                product.classList.add("remove-product");
                window.setTimeout(function () {
                    product.classList.remove("remove-product");
                    removeProduct(product);
                }, 1000);
            } else {
                productCount.innerText = count;

                var clone = imgWrap.cloneNode(true);
                clone.classList.add("animateOut");
                imgWrap.parentNode.appendChild(clone);

                window.setTimeout(function () {
                    clone.parentNode.removeChild(clone);
                }, 1000);

                if (count <= 1) {
                    productCount.classList.add("hide");
                }
            }

            cartPrice.innerText = response.data.total; //Shopify.formatMoney(response.total_price);

            if (response.data.total <= 0) {
                cartPay.classList.remove("open");
            }
        }

        function postUpdateOp(data, response) {
            if (response.data.modelQuantity == 0) {
                var parent = data.el.closest(".border-top");
                setTimeout(function () {
                    parent.remove();
                }, 1000);
            }

            document.querySelectorAll(".totalElements").forEach((el) => {
                el.innerText = response.data.total + " elementos";
            });
        }

        function ajaxProcess(data) {
            var processing = "";
            switch (data.operation) {
                case "add": {
                    processing = "Adicionando";
                    break;
                }
                case "remove": {
                    processing = "Eliminado";
                    break;
                }
                case "update": {
                    processing = "Actualizando";
                    break;
                }
            }

            $.blockUI({
                //message: '<div class="lds-ring"><div></div><div></div><div></div><div></div></div> <h2>' + processing + ' elemento ...</h2>',
                message:
                    '<div class="lds-ring"><div></div><div></div><div></div><div></div></div> <h2>Procesando petición ...</h2>',
                css: {
                    backgroundColor: "transparent",
                    color: "white",
                    cursor: "wait",
                    border: "none",
                },
            });

            var referral = document.getElementById("referral");

            axios
                .post(
                    $("#baseUrl").val() + "/reservation/book",
                    {},
                    {
                        params: {
                            modelable_id: data.id,
                            modelable_type: data.type,
                            modelable_quantity: data.quantity,
                            parentable_id: data.parentId,
                            parentable_type: data.parentType,
                            operation: data.operation,
                            ref: referral ? referral.value : null,
                            date_start: data.dateStart ? data.dateStart : null,
                            date_end: data.dateEnd ? data.dateEnd : null,
                            beneficiary: data.beneficiary,
                        },
                    }
                )
                .then(function (response) {
                    if (response.status == 200) {
                        if (response.data.auth == false) {
                            window.location = "/login";
                        } else {
                            if (response.data.result == true) {
                                switch (data.operation) {
                                    case "add": {
                                        postAddOp(data, response);
                                        toastr.info(
                                            "Se ha adicionado el elemento."
                                        );
                                        break;
                                    }
                                    case "remove": {
                                        postRemoveOp(data, response);
                                        toastr.info(
                                            "Se ha actualizado el elemento."
                                        );
                                        break;
                                    }
                                    case "update": {
                                        postUpdateOp(data, response);

                                        let rowTotal = 0;
                                        let cartTotal = 0;
                                        let dataDays = 1;

                                        var cart_price =
                                            document.getElementById(
                                                "cart-price-element-" + data.id
                                            );
                                        if (cart_price) {
                                            rowTotal =
                                                response.data.modelQuantity *
                                                response.data.price;
                                            let dayStr = "";
                                            if (
                                                typeof data.days !== "undefined"
                                            ) {
                                                dataDays = data.days;
                                                rowTotal *=
                                                    data.days == 0
                                                        ? 1
                                                        : data.days;
                                                dayStr =
                                                    data.days <= 1
                                                        ? ""
                                                        : " x " +
                                                          data.days +
                                                          "d ";
                                            }

                                            cart_price.innerHTML =
                                                "$" +
                                                document.getElementById(
                                                    "quantity-" + data.id
                                                ).dataset.price +
                                                " x " +
                                                response.data.modelQuantity +
                                                dayStr +
                                                " = $" +
                                                rowTotal;

                                            if (
                                                data.dateStart ||
                                                data.dateEnd
                                            ) {
                                                document.getElementById(
                                                    "quantity-" + data.id
                                                ).dataset.price =
                                                    response.data.price;
                                            }
                                        }

                                        var cartTotalPrice =
                                            document.getElementById(
                                                "cart-total-price"
                                            );
                                        if (cartTotalPrice) {
                                            document
                                                .querySelectorAll(
                                                    ".cart_elements .element"
                                                )
                                                .forEach((el) => {
                                                    var elementId =
                                                        el.getAttribute(
                                                            "data-id"
                                                        );
                                                    var elementPrice =
                                                        el.getAttribute(
                                                            "data-price"
                                                        );
                                                    var elementQuantity =
                                                        el.value;
                                                    var daysDifference =
                                                        document.getElementById(
                                                            "fire-" + elementId
                                                        ).value;

                                                    cartTotal +=
                                                        elementPrice *
                                                        elementQuantity *
                                                        daysDifference;
                                                });

                                            cartTotalPrice.innerHTML =
                                                "$" + cartTotal;
                                        }

                                        toastr.info(
                                            "Se ha actualizado el elemento."
                                        );
                                        break;
                                    }
                                }

                                //Livewire.emit('refreshCartElement');

                                $.unblockUI();
                            } else {
                                toastr.error(
                                    "No se pudo procesar la operación. Intente nuevamente."
                                );
                            }
                        }

                        $.unblockUI();
                    }
                });
        }

        // Function for removing html of product from cart
        // Private function
        function removeProduct(product_box) {
            cart.removeChild(product_box);
        }

        // procedure for changing cart link destionation depending on size of screen.
        function setPayButtonAction() {
            if (cartPay) {
                // Cart is fixed in right bottom of screen
                var window_w =
                    window.innerWidth ||
                    document.documentElement.clientWidth ||
                    document.body.clientWidth;

                if (window_w > 600) {
                    //cartPay.setAttribute("href", "/");
                    cartPay.classList.remove("cart-ico");
                } else {
                    //cartPay.setAttribute("href", "/cart");
                    cartPay.classList.add("cart-ico");
                }
            }
        }
        //public methods
        return self;
    }

    return {
        // Get the Singleton instance if one exists
        // or create one if it doesn't
        init: function (att) {
            if (!instance) {
                instance = init(att);
            }
            return instance;
        },
    };
})();

// Usage:
var cart = Quickbeam.init({
    animationLib: "gsap",
});
