const activePage = window.location.pathname;
const navLinks = document.querySelectorAll('nav .nav-item');
navLinks.forEach(link => {
    const dataPage = link.getAttribute('data-page');
    if (dataPage === `${activePage}`) {
        link.classList.add('active');
    }
});
// // to get current year
// function getYear() {
//     var currentDate = new Date();
//     var currentYear = currentDate.getFullYear();
//     document.querySelector("#displayYear").innerHTML = currentYear;
// }

// getYear();


// // client section owl carousel
// $(".client_owl-carousel").owlCarousel({
//     loop: true,
//     margin: 0,
//     dots: false,
//     nav: true,
//     navText: [],
//     autoplay: true,
//     autoplayHoverPause: true,
//     navText: [
//         '<i class="fa fa-angle-left" aria-hidden="true"></i>',
//         '<i class="fa fa-angle-right" aria-hidden="true"></i>'
//     ],
//     responsive: {
//         0: {
//             items: 1
//         },
//         768: {
//             items: 2
//         },
//         1000: {
//             items: 2
//         }
//     }
// });



/** google_map js **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}

function reply(caller){
    $('.comment_reply').insertAfter($(caller));
    $('.comment_reply').toggle();
    document.getElementById('commentId').value=$(caller).attr('data-commentId');
}

function confirmation(ev){
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    console.log(urlToRedirect);
    swal({
        title: 'Are you sure to cancel this product',
        text: 'You will not be able to revert this action!',
        icon: 'warning',
        buttons: true,
        dangerMode: true
    }).then((willCancel) => {
        if(willCancel){
            window.location.href = urlToRedirect;
        }
    });
}

