document.getElementById("sweetalert-basic") && document.getElementById("sweetalert-basic").addEventListener("click", function () {
    Swal.fire({
        title: "Any fool can use a computer",
        confirmButtonClass: "btn btn-primary w-xs mt-2",
        buttonsStyling: !1,
        showCloseButton: !1
    })
}), document.getElementById("sweetalert-title") && document.getElementById("sweetalert-title").addEventListener("click", function () {
    Swal.fire({
        title: "The Internet?",
        text: "That thing is still around?",
        icon: "question",
        confirmButtonClass: "btn btn-primary w-xs mt-2",
        buttonsStyling: !1,
        showCloseButton: !1
    })
}), document.getElementById("sweetalert-success") && document.getElementById("sweetalert-success").addEventListener("click", function () {
    Swal.fire({
        title: "Good job!",
        text: "You clicked the button!",
        icon: "success",
        showCancelButton: !0,
        confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
        cancelButtonClass: "btn btn-danger w-xs mt-2",
        buttonsStyling: !1,
        showCloseButton: !1
    })
}), document.getElementById("sweetalert-error") && document.getElementById("sweetalert-error").addEventListener("click", function () {
    Swal.fire({
        title: "Oops...",
        text: "Something went wrong!",
        icon: "error",
        confirmButtonClass: "btn btn-primary w-xs mt-2",
        buttonsStyling: !1,
        footer: '<a href="">Why do I have this issue?</a>',
        showCloseButton: !1
    })
}), document.getElementById("sweetalert-info") && document.getElementById("sweetalert-info").addEventListener("click", function () {
    Swal.fire({
        title: "Oops...",
        text: "Something went wrong!",
        icon: "info",
        confirmButtonClass: "btn btn-primary w-xs mt-2",
        buttonsStyling: !1,
        footer: '<a href="">Why do I have this issue?</a>',
        showCloseButton: !1
    })
}), document.getElementById("sweetalert-warning") && document.getElementById("sweetalert-warning").addEventListener("click", function () {
    Swal.fire({
        title: "Oops...",
        text: "Something went wrong!",
        icon: "warning",
        confirmButtonClass: "btn btn-primary w-xs mt-2",
        buttonsStyling: !1,
        footer: '<a href="">Why do I have this issue?</a>',
        showCloseButton: !1
    })
}), document.getElementById("sweetalert-longcontent") && document.getElementById("sweetalert-longcontent").addEventListener("click", function () {
    Swal.fire({
        imageUrl: "https://placeholder.pics/svg/300x1500",
        imageHeight: 1500,
        imageAlt: "A tall image",
        confirmButtonClass: "btn btn-primary w-xs mt-2",
        buttonsStyling: !1,
        showCloseButton: !1
    })
}), document.getElementById("sweetalert-params") && document.getElementById("sweetalert-params").addEventListener("click", function () {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
        cancelButtonClass: "btn btn-danger w-xs mt-2",
        buttonsStyling: !1,
        showCloseButton: !1
    }).then(function (t) {
        t.value ? Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success",
            confirmButtonClass: "btn btn-primary w-xs mt-2",
            buttonsStyling: !1
        }) : t.dismiss === Swal.DismissReason.cancel && Swal.fire({
            title: "Cancelled",
            text: "Your imaginary file is safe :)",
            icon: "error",
            confirmButtonClass: "btn btn-primary mt-2",
            buttonsStyling: !1
        })
    })
}), document.getElementById("sweetalert-image") && document.getElementById("sweetalert-image").addEventListener("click", function () {
    Swal.fire({
        title: "Sweet!",
        text: "Modal with a custom image.",
        imageUrl: "assets/images/logo-sm.png",
        imageHeight: 40,
        confirmButtonClass: "btn btn-primary w-xs mt-2",
        buttonsStyling: !1,
        animation: !1,
        showCloseButton: !1
    })
});
