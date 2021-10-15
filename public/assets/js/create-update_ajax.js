$(function () {
    $('form[name="formEdit"]').submit(function (event) {
        event.preventDefault();

        var book_id = $(this).find("input#book_id").val();
        $.ajax({
            url: "/books/" + book_id,
            type: "put",
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
                $(".messageBox").removeClass("d-none").html(response.message);
            },
        });
    });

    $('form[name="formCad"]').submit(function (event) {
        event.preventDefault();

        $.ajax({
            url: "/books",
            type: "post",
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
                $(".messageBox").removeClass("d-none").html(response.message);
            },
        });
    });
});

//const { bindAll } = require("lodash");

// (function (win, doc) {
//     "use strict";

//     //Update
//     function confirmUpdate(event) {
//         event.preventDefault();
//         //console.log(event.target.parentNode.action);

//         let token = doc.getElementsByName("_token")[0].value;
//         if (confirm("Deseja mesmo fazer a atualização?")) {
//             var form = document.querySelector("#formEdit");
//             var data = new URLSearchParams(new FormData(form)).toString();

//             let ajax = new XMLHttpRequest();
//             ajax.open("PUT", event.target.parentNode.action);
//             ajax.setRequestHeader("X-CSRF-TOKEN", token);
//             ajax.onreadystatechange = function () {
//                 if (ajax.readyState == 4 && ajax.status == 200) {
//                     window.location.href = "books/create_book";
//                 }
//             };
//             console.log(ajax.status);
//             ajax.send();
//         } else {
//             return false;
//         }
//     }

//     if (doc.querySelector(".js-update")) {
//         let btn = doc.querySelectorAll(".js-update");
//         for (let i = 0; i < btn.length; i++) {
//             btn[i].addEventListener("click", confirmUpdate, false);
//         }
//     }
// })(window, document);
